<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Models\Day;
use App\Models\Student;
use App\Models\Teacher;
use App\Repositories\Interfaces\GeneralRepositoryInterface;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
use CoreJsonResponse;
    /**
     * @OA\Tag(
     *     name="general",
     *     description="API Endpoints of general Apis"
     * )
     */
    private $general;

    public function __construct(GeneralRepositoryInterface $general)
    {
        $this->general = $general;
    }

    /**
     * @OA\Get(
     *      path="/days",
     *      summary="Get list of days",
     *      tags={"general"},
     *      description="Returns list of week days",
     *      @OA\Response(
     *        response=200,
     *        description="successful operation"
     *        ),
     *     )
     *
     * Returns list of days
     */
    public function days()
    {
        return $this->ok(GeneralResource::collection($this->general->getDays())->resolve());
     
    }

    /**
     * @OA\Get(
     *      path="/governorates",
     *      summary="Get list of governorates",
     *      tags={"general"},
     *      description="Returns list of governorates",
     *      @OA\Response(
     *        response=200,
     *        description="successful operation"
     *        ),
     *     )
     *
     * Returns list of governorates
     */
    public function governorates()

    {
         return $this->ok(GeneralResource::collection($this->general->getGovernorates())->resolve());

      
    }

    /**
     * @OA\Get(
     *      path="/groups",
     *      summary="Get list of groups",
     *      tags={"general"},
     *      description="Returns list of groups",
     *      @OA\Response(
     *        response=200,
     *        description="successful operation"
     *        ),
     *     )
     *
     * Returns list of groups (الفرق)
     */
    public function groups()
    {
        return $this->ok(GeneralResource::collection($this->general->getGroups())->resolve());
      
    }
     /**
     * @OA\Get(
     *      path="/day/{id}/teachers",
     *      operationId="get All teachers Of day",
     *      tags={"general"},
     *      summary="Get All teachers All Of day",
     *      description="Returns list of  All teachers  In that  day",
    * @OA\Parameter(
     *          name="id",
     *          description="id of day",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *  @OA\Response(
     *          response=500,
     *          description="Internal Server error",
     *           
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *        
     *          
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function dayTeachers($id){
        $day = Day::findOrFail($id);
        $teachers=$day->teachers;
        return $this->ok(GeneralResource::collection($teachers)->resolve());
       
         
       }
        /**
     * @OA\Get(
     *      path="/approvedTeachers",
     *      summary="Get list of teachers approved",
     *      tags={"general"},
     *      description="Returns list of teachers",
     *      @OA\Response(
     *        response=200,
     *        description="successful operation"
     *        ),
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
     *     )
     *
     * Returns list of teachers ( الشيوخ المتاحه)
     */
   public function approvedTeachers(){
       
    return GeneralResource::collection($this->general->getApprovedTeachers());
     
   }
  

//    public function postMobile(Request $request){
//         $type = $request->type;
//         // dd($type);
//         if($type == 'student'){
//             $student = Student::create(['mobile'=>$request->mobile]);
//         }else{
//             $teacher = Teacher::create(['mobile'=>$request->mobile]);
//         }
//         return $this->successResponse();
//    }



}
