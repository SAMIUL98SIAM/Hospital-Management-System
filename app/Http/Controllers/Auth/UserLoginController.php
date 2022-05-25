<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function login(Request $request)
   {
       $this->validate($request,[
           'email'=>'required',
           'password'=>'required'
       ]);

       $email = $request->email;
       $password = $request->password ;
       $validData = User::where('email',$email)->first();
       $password_check = password_verify($password,@$validData->password);
       if ($password_check == false) {
           notify()->error('Email or Password does not match','Error');
           return redirect()->back();
       }
       elseif($validData->status==0)
       {
            notify()->error('Sorry! your are not verified yet','Error');
            return redirect()->back();
       }
       if(Auth::attempt(['email'=>$email,'password'=>$password])) {
           return redirect()->route('frontend.login');
       }
   }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
