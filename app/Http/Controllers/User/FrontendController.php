<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['doctors'] = Doctor::all();
        return view('user.index',$data);
    }

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
}
