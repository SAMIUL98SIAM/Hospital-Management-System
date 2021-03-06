<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin.appointments.index');
        $data['appointments'] = Appointment::all();
        return view('admin.appointments.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }


    public function approve($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = "Approved";
        $appointment->update();
        notify()->success('Appointment Successfully Approved.', 'Success');
        return redirect()->back();
    }

    public function cancel($id)
    {
        $slider = Appointment::find($id);
        $slider->status = "Cancelled";
        $slider->update();
        notify()->error('Appointment Cancelled.', 'Error');
        return redirect()->back();
    }

    public function email($id)
    {
        $appointmentEmail = Appointment::find($id);
        return view('admin.appointments.email',compact('appointmentEmail'));
    }

    public function email_send(Request $request,$id)
    {
        $appointmentEmail = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting ,

            'body' => $request->body ,

            'actiontext' => $request->actiontext ,

            'actionurl' => $request->actionurl ,

            'endpart' => $request->endpart
        ];

        Notification::send($appointmentEmail,new
        SendEmailNotification($details));

        notify()->success('Email send Successfully.', 'Success');
        return redirect()->back();
    }

}
