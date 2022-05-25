<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $data['doctors'] = Doctor::all();
        return view('user.home',$data);
    }


}
