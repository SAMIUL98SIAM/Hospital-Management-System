<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function doctors()
    {
        return view('user.doctors');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function about()
    {
        return view('user.about-us');
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
