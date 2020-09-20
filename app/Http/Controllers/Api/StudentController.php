<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Api\StudentStoreRequest as ApiStudentStoreRequest;
// use App\Http\Requests\StudentStoreRequest;
// use App\Models\Student;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class StudentController extends Controller
// {
    
//     /**
//      * @OA\Post(
//      *      path="/student/signUp",
//      *      operationId="signupStudent",
//      *      tags={"students"},
//      *      summary="signup new student",
//      *      description="Returns student data and token",
//      *     @OA\RequestBody(
//      *         required=true,
//      *         @OA\JsonContent(ref="#/components/schemas/StudentSignUp")
//      *     ),
//      *      @OA\Response(
//      *          response=200,
//      *          description="Successful operation",
//      *        
//      *       ),
//      *      @OA\Response(
//      *          response=400,
//      *          description="Bad Request"
//      *      ),
//      *      @OA\Response(
//      *          response=401,
//      *          description="Unauthenticated",
//      *      ),
//      *      @OA\Response(
//      *          response=403,
//      *          description="Forbidden"
//      *      )
//      * )
//      */
//     public function signUp(ApiStudentStoreRequest $request){
     
//         $input = $request->all();
//         $input =$request->except($input['c_password']);
      
//         $input['password'] = bcrypt($input['password']);
//         $student = Student::create($input);
//         $success['student'] = [
//             'id' => $student->id,
//             'name' => $student->name,
//             'email' => $student->email,
            
//         ];
//         $success['student']['token'] = $student->createToken('student')->accessToken;
//         return response()->json( ["success"=>$success], 200); 
//     }
//     /**
//      * @OA\Post(
//      *      path="/api/student/signIn",
//      *      operationId="signInStudent",
//      *      tags={"students"},
//      *      summary="login student",
//      *      description="Returns student data and token",
//      *      @OA\RequestBody(
//      *       required=true,
//      *      ),
//      *      @OA\Response(
//      *          response=200,
//      *          description="Successful operation",
//      *        
//      *       ),
//      *      @OA\Response(
//      *          response=400,
//      *          description="Bad Request"
//      *      ),
//      *      @OA\Response(
//      *          response=401,
//      *          description="Unauthenticated",
//      *      ),
//      *      @OA\Response(
//      *          response=403,
//      *          description="Forbidden"
//      *      )
//      * )
//      */
//     public function signIn(Request $request){
//         if(Auth::guard('student')->attempt(['email' =>$request->email,'password'=>$request->password])){
//             $student=Auth::guard('student')->user();
//                 $success['student']=[
//                 'id'=>$student->id,
//                 'name'=>$student->name,
//                 'email'=>$student->email
//             ];
//             $success['token'] = $student->createToken('student')->accessToken;
//             return $this->dataResponse($success);
//         }else{
//             return $this->errorResponse('Unauthorised', 401);
//             }
//         }
}
