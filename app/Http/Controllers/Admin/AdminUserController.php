<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Http\Requests\Admin\AdminUserStoreRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->get();
        return view('admin.pages.adminUsers.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.adminUsers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserStoreRequest $request)
    {
        try{
            $request=$request->all();
            $request['password']=bcrypt($request['password']);
            if(! isset($request['super_admin'])){
                $request['super_admin'] = 0;
            }
            // dd($request);
            $admin = Admin::create($request);
            return $this->redirectRouteWithSuccessStore('admin.admin_users.index');
        }catch(Exception $e){
             return redirect()->route('admin.admin_users.index')->with(['error'=>'حدث خطا ما ... الرجاء اعاده المحاوله لاحقا  ']);
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
        $admin = Admin::findOrFail($id);
        return view('admin.pages.adminUsers.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserStoreRequest $request, $id)
    {
        try{
            $admin = Admin::findOrFail($id);
            $request=$request->all();
            // dd($request);
            if(! isset($request['super_admin'])){
                $request['super_admin'] = 0;
            }else{
                $request['super_admin'] = 1;
            }
            $request['password']=bcrypt($request['password']);
            $admin->update($request);
            return $this->redirectRouteWithSuccessUpdate();
        }catch(Exception $e){
            return redirect()->route('admin.admin_users.index')->with(['error'=>'حدث خطا ما ... الرجاء اعاده المحاوله لاحقا  ']);
            } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        if( auth()->guard('admin')->user()->id == $id){
            return $this->redirectRouteWithErrors('هذا الحساب خاص بك لا يمكنك حذفه');
        }
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return $this->redirectRouteWithSuccessDelete();
    }
}
