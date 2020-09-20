<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Models\SmsVerification;
// use App\Models\Student;
// use App\Models\Teacher;
// use Carbon\Carbon;
// use Illuminate\Http\Request;
// use Twilio\Rest\Client; -->


// class AuthController extends Controller
// {
//     public function register(Request $request){
//         // dd($request->all());
//         $request=$request->all();
//         if($request['type'] == "student"){
//             Student::create(['mobile' => $request['mobile']]);
//            $code= SmsVerification::create([
//                 'mobile'=>$request['mobile'],
//                 'code'=>rand(1111,9999)
//                 ]);
//                 // dd($code['code']);
//             $code=SmsVerification::where('mobile',$request['mobile'])->first()->code;
//             // dd($code);
//             $this->sendMessage($code, $request['mobile']);    
//             }elseif($request['type'] == "teacher"){
//             Teacher::create(['mobile' => $request['mobile']]);
//             SmsVerification::create([
//                 'mobile'=>$request['mobile'],
//                 'code'=>rand(1111,9999)
//                 ]);
//             $code=SmsVerification::where('mobile',$request['mobile'])->first()->code;
//             // dd($code);
//             $this->sendMessage($code, $request['mobile']); 
//         }
//         return $this->successResponse();
//     }


    

    // public function saveMobile(Request $request){
    //     SmsVerification::create([
    //         'mobile'=>$request->mobile,
    //         'code'=>rand(1111,9999)
    //         ]);
    //     return response()->json(['success'=>"Done"]);
    // }

//     public function verificate(Request $request){
//         $mobile=SmsVerification::whereMobile($request->mobile)->first();
//         if($mobile != null && $mobile->code==$request['code']){
//             $mobile->update(['verified_at'=>Carbon::now(),'status'=>'Verification']);
//             return response()->json(['success'=>"vetification"]);
//         }
//         return response()->json(['error'=>"not vetification .. there is error in code"]);
//     }

//     private function sendMessage($message, $recipients)
//     {
//         $account_sid = config('services.twilio.account_sid');
//         $auth_token = config('services.twilio.auth_token');
//         $twilio_number = config('services.twilio.from');
//         $client = new Client($account_sid, $auth_token);
//         $client->messages->create($recipients, ['from' => $twilio_number, 'body' => $message]);
//     }
// }
