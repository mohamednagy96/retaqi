<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\GeneralResource;
use App\Models\City;
use App\Models\Country;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;

class CityController extends Controller
{
  use CoreJsonResponse;

    /**
     * @OA\Get(
     *      path="/cities",
     *      operationId="getCitiesList",
     *      tags={"cities"},
     *      summary="Get list of Cities",
     *      description="Returns list of cities",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

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
  public function Cities(){
    $city=City::all();
    return $this->ok(CityResource::collection($city)->resolve());

  }
     /**
     * @OA\Get(
     *      path="/country/{id}/cities",
     *      operationId="getAllCitiesOfCountry",
     *      tags={"cities"},
     *      summary="Get All Cities All Of Country",
     *      description="Returns list of  All Cities In Country",
    * @OA\Parameter(
     *          name="id",
     *          description="id of country",
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
    public function countryCities($id){
      $country=Country::findOrFail($id);
      $cities=$country->cities;
      return $this->ok(GeneralResource::collection($cities)->resolve());

    }




}
