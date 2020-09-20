<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
   use CoreJsonResponse;
      /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    /**
     * @OA\Get(
     *      path="/countries",
     *      operationId="getCountriesList",
     *      tags={"public apis"},
     *      summary="Get list of countries",
     *      description="Returns list of countries",
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
    public function index()
    {
       $countries = Country::all();
       return $this->ok(GeneralResource::collection($countries)->resolve());
    }
}
