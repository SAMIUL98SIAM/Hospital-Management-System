<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use App\Models\Admin\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin.doctors.index');
        $data['doctors'] = Doctor::all();
        return view('admin.doctors.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin.doctors.create');
        $data['specialities'] = Speciality::all();
        return view('admin.doctors.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('admin.doctors.create');
        $this->validate( $request,[
            'name'=> 'required',
            'phone'=>'required',
            'room'=>'required',
            'avatar'=>'required'
            ]
       );
        if($request->speciality_id == 0)
        {
            $stuff_position = new Speciality();
            $stuff_position->s_name = $request->s_name ;
            $stuff_position->save();
            $speciality_id = $stuff_position->id ;
        }
        else
        {
            $speciality_id = $request->speciality_id ;
        }

        $doctor = Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'room' => $request->room,
            'speciality_id' => $speciality_id,
        ]);


         // upload images
         if ($request->hasFile('avatar')) {
            $doctor->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        notify()->success('Doctor Successfully Added.', 'Added');
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        Gate::authorize('admin.doctors.edit');
        $data['specialities'] = Speciality::all();
        return view('admin.doctors.form',compact('doctor'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        Gate::authorize('admin.doctors.edit');
        $this->validate( $request,[
            'name'=> 'required',
            'phone'=>'required',
            'room'=>'required',
            'avatar'=>'required'
            ]
       );
        if($request->speciality_id == 0)
        {
            $stuff_position = new Speciality();
            $stuff_position->s_name = $request->s_name ;
            $stuff_position->save();
            $speciality_id = $stuff_position->id ;
        }
        else
        {
            $speciality_id = $request->speciality_id ;
        }

        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'room' => $request->room,
            'speciality_id' => $speciality_id,
        ]);


         // upload images
         if ($request->hasFile('avatar')) {
            $doctor->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        notify()->success('Doctor Successfully Updated.', 'Updated');
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        Gate::authorize('admin.doctors.destroy');
        if ($doctor->deletable) {
            $doctor->delete();
            notify()->error('Doctor Deleted','Success');
            return redirect()->back();
        } else {
            notify()->error('Doctor Can not deletable','Success');
            return redirect()->back();
        }
    }
}
