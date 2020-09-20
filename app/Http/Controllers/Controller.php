<?php

namespace App\Http\Controllers;

use App\Helper\EmptyData;
use App\Traits\DashboardRedirects;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Ertaqi W Ratel API", version="0.1")
  * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-ID",
 *     securityScheme="X-APP-ID"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests ,DashboardRedirects;

    public function dataResponse($data , $message = null, $code = null){

        $success = [
            'code' => $code ? $code : 200,
            'message' => $message ? $message : 'success',
        ];

        $success = array_merge($success, $data);

        return response()->json($success, 200);
    }

    public function successResponse($message = null, $code = null){
        $success = [
            'code' => $code ? $code : 200,
            'message' => $message ? $message : 'success'
        ];

        return response()->json($success, 200);
    }

    public function errorResponse($message , $status){
        $error = [
            'status' => $status,
            'message' => $message,
            'response' => [
                'data' => $data?? EmptyData::object(),
                'meta' => $meta?? EmptyData::object(),
            ],
            'errors' => $errors?? EmptyData::object()
            
        ];
      
        return response()->json($error, 200);
    }

}
