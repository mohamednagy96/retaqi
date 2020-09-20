<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Models\SmsVerification;
// use Carbon\Carbon;
// use Illuminate\Http\Request;

// class SmsVerifictionController extends Controller
// {
    
//     public function saveMobile(Request $request){
//         SmsVerification::create([
//             'mobile'=>$request->mobile,
//             'code'=>rand()
//             ]);
//         return response()->json(['success'=>"Done"]);
//     }

//     public function verificate(Request $request){
//         $mobile=SmsVerification::whereMobile($request->mobile)->first();
//         if($mobile != null && $mobile->code==$request['code']){
//             $mobile->update(['verified_at'=>Carbon::now()]);
//             return response()->json(['success'=>"vetification"]);
//         }
//         return response()->json(['error'=>"vetification"]);
//     }
    
// }
