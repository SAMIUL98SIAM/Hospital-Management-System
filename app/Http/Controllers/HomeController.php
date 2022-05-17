<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype== 'user')
            {
                return view('user.home');
            }
            elseif(Auth::user()->usertype== 'admin')
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
