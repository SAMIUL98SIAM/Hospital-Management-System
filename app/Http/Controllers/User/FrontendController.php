<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Appointment;
use App\Models\User;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $data['doctors'] = Doctor::all();
        return view('user.home',$data);
    }


    public function appointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id', $userid)->get();
            return view('user.my-appointment',compact('appoints'));
        }
        else
        {
            return redirect()->back();
        }
    }


    public function appointment_store(Request $request)
    {
        if(Auth::id())
        {
            $data = new Appointment();
            $data->name = $request->name ;
            $data->email = $request->email ;
            $data->date = $request->date ;
            $data->phone = $request->number ;
            $data->message = $request->message ;
            $data->doctor = $request->doctor ;
            $data->status = 'In Progress' ;
            $data->user_id = Auth::user()->id ;
            $data->save();
            notify()->success('Appointment have registered', 'Success');
        }
        else
        {
            notify()->error('Please Sign in your acount', 'Error');
        }
        return redirect()->back();
    }

    public function appointment_cancel($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        notify()->success('Appointment Cancel Successfully', 'Success');
        return redirect()->back();
    }


}
