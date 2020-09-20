<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeacherRequest;
use App\Models\Governorate;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::paginate(15);
        return view('admin.pages.teachers.index',compact('teachers'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates=Governorate::pluck('name','id')->toArray();
        return view('admin.pages.teachers.create',compact('governorates'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        try{
            Teacher::create($request->all());
            return $this->redirectRouteWithSuccessStore('admin.teachers.index');
        }catch(Exception $e){
            return redirect()->route('admin.teachers.index')->with(['error'=>'حدث خطا ما ... الرجاء اعاده المحاوله لاحقا  ']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher=Teacher::findOrFail($id);
        $governorates=Governorate::pluck('name','id')->toArray();
        return view('admin.pages.teachers.edit',compact('governorates','teacher'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        try{
            $teacher=Teacher::findOrFail($id);
            $teacher->update($request->all());
            return $this->redirectRouteWithSuccessUpdate('admin.teachers.index',$teacher->id);
        }catch(Exception $e){
            return redirect()->route('admin.teachers.index')->with(['error'=>'حدث خطا ما ... الرجاء اعاده المحاوله لاحقا  ']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher=Teacher::findOrFail($id);
        $teacher->delete();
        return $this->redirectRouteWithSuccessDelete('admin.teachers.index');
    }
}
