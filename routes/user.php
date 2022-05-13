<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index'])->name('user.home');

Route::get('/about',[FrontendController::class,'about'])->name('user.about-us');

Route::get('/doctors',[FrontendController::class,'doctors'])->name('user.doctors');

Route::get('/contact',[FrontendController::class,'contact'])->name('user.contact');

Route::get('/blog',[FrontendController::class,'blog'])->name('user.blog');

Route::get('/blog-details',[FrontendController::class,'blog_details'])->name('user.blog-details');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
