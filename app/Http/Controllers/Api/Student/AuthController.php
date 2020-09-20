<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Api\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StudentStoreRequest as ApiStudentStoreRequest;
use App\Http\Requests\RegisterStudentRequest;
use App\Http\Requests\StudentStoreRequest;
use App\Models\SmsVerification;
use App\Models\Student;
use App\Models\Subscribtion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use CoreJsonResponse;
  
    public function register(ApiStudentStoreRequest $request){
        $input = $request->all();
        $input =$request->except($input['c_password']);
        $verifiyMobile=SmsVerification::where('mobile',$input['mobile'])->first();
        // dd($verifiyMobile->status);
        if($verifiyMobile && $verifiyMobile->status == 'Verification'){
            $input['password'] = bcrypt($input['password']);
            $subscribe=[
                'type'=> $request->type
            ];
            $student = Student::create($input);
            $student->subscribe()->create($subscribe);
            $success = [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,  
            ];
            $success['token'] = $student->createToken('student')->accessToken;
            return $this->ok($success);
        }
       // return response()->json( ["error"=>'Please Verifiy Your Mobile'], 404); 
       return $this->errorResponse('Please Verifiy Your Mobile',404);
    }
    /**
     * @OA\Post(
     *      path="/student/signIn",
     *      operationId="signInStudent",
     *      tags={"students"},
     *      summary="login student",
     *      description="Returns student data and token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StudentSignIn")
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *        
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function login(Request $request){
        if(Auth::guard('student')->attempt(['mobile' =>$request->mobile,'password'=>$request->password])){
            $student=Auth::guard('student')->user();
                $success=[
                'id'=>$student->id,
                'name'=>$student->name,
                'email'=>$student->email
            ];
            $success['token'] = $student->createToken('student')->accessToken;
            return $this->ok($success);
        }else{
            return $this->errorResponse('Unauthorised', 401);
            }
        }


        public function registerMobile(Request $request){
            $request=$request->all();
                $mobile=SmsVerification::where('mobile',$request['mobile'])->where('status','Not Verfifcation')->first();
                if($mobile) {
                    $mobile->delete();
                }
                $sms =SmsVerification::create([
                     'mobile'=>$request['mobile'],
                     'code'=>rand(1111,9999),
                     'status'=>'Not Verfifcation'
                     ]);
                     $this->sendMessage($sms['code'], $request['mobile']);    
                return $this->ok();
        }

        public function verificate(Request $request){
            $mobile=SmsVerification::whereMobile($request->mobile)->first();
            if($mobile != null && $mobile->code==$request['code']){
                $mobile->update(['verified_at'=>Carbon::now(),'status'=>'verification']);
                return $this->ok();
            }
            return $this->errorResponse('Please ensure From Mobile Or Code',404);
        }

        private function sendMessage($message, $recipients)
        {
            $account_sid = config('services.twilio.account_sid');
            $auth_token = config('services.twilio.auth_token');
            $twilio_number = config('services.twilio.from');
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
        }
}
