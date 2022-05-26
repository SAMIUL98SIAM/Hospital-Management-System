<?php

namespace App\Http\Controllers;

use App\Models\Admin\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\ElseIf_;

class HomeController extends Controller
{
    public function doctors()
    {
        $data['doctors'] = Doctor::all();
        return view('user.doctors',$data);
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function about()
    {
        $data['doctors'] = Doctor::all();
        return view('user.about-us',$data);
    }

    public function blog()
    {
        return view('user.blog');
    }

    public function blog_details()
    {
        return view('user.blog-details');
    }


    public function user_login()
    {
        return view('user.login');
    }

    public function user_register()
    {
        return view('user.register');
    }

    public function user_register_store(Request $request)
    {
       DB::transaction(function() use($request){
            $this->validate($request,[
                'name'=>'required',
                'email'=> 'required|unique:users,email',
                //'mobile'=>['required','unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
                'phone'=>'required',
                'password'=>'required|min:6'
            ]);
            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->code = $code ;
            $user->status = 0;
            $user->usertype = 'user' ;
            $user->save();

            $data = array(
                'email'=>$request->email,
                'code'=>$code
            );
            Mail::send('user.email-verify-text',$data,function($messages) use($data){
                $messages->from('orbitechproject123@gmail.com','Orbitech Bd');
                $messages->to($data['email']);
                $messages->from($data['email'],'Orbitech Bd');
                $messages->subject('Please your email address');
            });
       });
       notify()->success('You have successfully signed up, please verify your email.', 'Success');
       return redirect()->route('frontend.user.email_verify');

    }

    public function emailVerify()
    {

        return view('user.email-verify');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function emailVerifyStore(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required',
            'code'=>'required'
        ]);
        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData)
        {
           $checkData->status = 1 ;
           $checkData->save();
           notify()->success('You have successfully verified, please, logged in.', 'Success');
           return redirect()->route('frontend.login');
        }
        else
        {
            notify()->error('Sorry email or verification code does not match.', 'Error');
            return redirect()->back();
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment();
        $data->name = $request->name ;
        $data->email = $request->email ;
        $data->date = $request->date ;
        $data->phone = $request->number ;
        $data->message = $request->message ;
        $data->doctor = $request->doctor ;
        $data->status = 'In Progress' ;

        if(Auth::id())
        {
            $data->user_id = Auth::user()->id ;
        }
        // elseif(!Auth::id())
        // {
        //     notify()->error('Please Sign in your acount', 'Error');
        // }
        $data->save();
        notify()->success('Appointment have registered', 'Success');
        return redirect()->back();

    }

}
