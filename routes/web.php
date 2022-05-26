<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserLoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',[HomeController::class,'about'])->name('about-us');

Route::get('/doctors',[HomeController::class,'doctors'])->name('doctors');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::get('/blog',[HomeController::class,'blog'])->name('blog');

Route::get('/blog-details',[HomeController::class,'blog_details'])->name('blog-details');

Route::get('/user-login',[HomeController::class,'user_login'])->name('frontend.login');

Route::post('/user-login-store',[UserLoginController::class,'login'])->name('frontend.login.store');

Route::get('/user-register',[HomeController::class,'user_register'])->name('frontend.register');

Route::post('/user-register-store',[HomeController::class,'user_register_store'])->name('frontend.register.store');

Route::get('/email-verify', [HomeController::class, 'emailVerify'])->name('frontend.user.email_verify');

Route::post('/email-verify-store', [HomeController::class, 'emailVerifyStore'])->name('frontend.user.email_verify_store');

//Route::post('/appointment-store', [FrontendController::class, 'appointment_store'])->name('appointment.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
