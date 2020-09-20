<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Api\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\VarifiyStudentFormRequest;
use App\Models\SmsVerification;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use CoreJsonResponse;
  
    public function register(Request $request){
     
        $input = $request->all();
        $input =$request->except($input['c_password']);
        $verifiyMobile=SmsVerification::where('mobile',$input['mobile'])->first();
        // dd($verifiyMobile->status);
        if($verifiyMobile && $verifiyMobile->status == 'Verification'){
            $input['password'] = bcrypt($input['password']);
           
            $subscribe=[
                'type'=> $request->type
            ];
            $teacher = Teacher::create($input);
        
            $teacher->subscribe()->create($subscribe);
            $readTypes = $request->readtypes;
            $teacher->readTypes()->attach($readTypes);
            $teacher->days()->attach($request->available_days);
            $success = [
                'id' => $teacher->id,
                'name' => $teacher->name,
                'email' => $teacher->email,  
            ];
            $success['token'] = $teacher->createToken('teacher')->accessToken;
            return $this->ok($success);
        }
       return $this->errorResponse('Please Verifiy Your Mobile',404);
    }

    public function login(Request $request){
        if(Auth::guard('teacher')->attempt(['mobile' =>$request->mobile,'password'=>$request->password])){
            $teacher=Auth::guard('teacher')->user();
                $success=[
                'id'=>$teacher->id,
                'name'=>$teacher->name,
                'email'=>$teacher->email
            ];
            $success['token'] = $teacher->createToken('teacher')->accessToken;
            return $this->ok($success);
        }else{
            return $this->errorResponse('Unauthorised', 401);
            }
        }


        public function registerMobile(Request $request){
            // dd('ss');
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
