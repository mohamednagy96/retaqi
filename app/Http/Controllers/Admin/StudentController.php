<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\Day;
use App\Models\Governorate;
use App\Models\Governorates;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $students = Student::paginate(15);
        return view('admin.pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group=Group::pluck('name','id')->toArray();
        $day=Day::pluck('name','id')->toArray();
        $teacher=Teacher::pluck('name','id')->toArray();
        $governorate=Governorate::pluck('name','id')->toArray();
        return view('admin.pages.students.create',compact('group','day','governorate','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try{
        $requestData = $request->all();
        $product = Student::create($requestData);
        return $this->redirectRouteWithSuccessStore('admin.students.index');

        }catch(Exception $ex){
            return redirect()->route('admin.students.index')->with(['error'=>'حدث خطا ما ... الرجاء اعاده المحاوله لاحقا  ']);
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $group=Group::pluck('name','id')->toArray();
        $day=Day::pluck('name','id')->toArray();
        $governorate= Governorate::pluck('name','id')->toArray();
        $teacher=Teacher::pluck('name','id')->toArray();
        return view('admin.pages.students.edit',compact('student','group','day','governorate','teacher'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        try{
            $student->update($request->all());
            return $this->redirectRouteWithSuccessUpdate('admin.categories.index',$student->id);
        }catch(Exception $e){
            return redirect()->route('admin.students.index')->with(['error'=>'حدث خطا ما ... الرجاء اعاده المحاوله لاحقا  ']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    { 
        $student->delete();
        return redirect()->route('admin.students.index');
        
    }
    
}
