<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use App\Models\Admin\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::authorize('admin.roles.index');
        $data['roles'] = Role::all();
        return view('admin.roles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Gate::authorize('admin.roles.create');
        $data['modules'] = Module::all();
        return view('admin.roles.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Gate::authorize('admin.roles.index');
        $this->validate($request,[
            'name'=> 'required|unique:roles',
            'permissions'=>'required|array',
            'permissions.*'=>'integer',
        ]);
        Role::create([
            'name'=> $request->name ,
            'slug'=> Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions'),[]);
        notify()->success('User Successfully Added.', 'Added');
        return redirect()->route('admin.roles.index')->with('success','Role Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //Gate::authorize('admin.roles.edit');
        // //Gate::authrize('admin.roles.edit');
        $data['modules'] = Module::all();
        return view('admin.roles.form',compact('role'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //Gate::authorize('admin.roles.edit');
        $role->update([
            'name'=> $request->name ,
            'slug'=> Str::slug($request->name),
        ]);
        $role->permissions()->sync($request->input('permissions'));
        notify()->success('Role Successfully Updated.', 'Updated');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //Gate::authorize('admin.roles.destroy');
        if ($role->deletable) {
            $role->delete();
            notify()->error('Role Deleted','Success');
            return redirect()->back();
        } else {
            notify()->error('Role Can not deletable','Success');
            return redirect()->back();
        }

    }
}
