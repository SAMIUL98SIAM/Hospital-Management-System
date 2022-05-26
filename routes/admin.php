<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\RoleController;
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

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

Route::resource('roles',RoleController::class);

Route::resource('doctors',DoctorController::class);

Route::resource('appointments',AppointmentController::class)->only(['index']);

Route::get('/approve/{id}',[AppointmentController::class,'approve'])->name('appointment.approve');

Route::get('/cancel/{id}',[AppointmentController::class,'cancel'])->name('appointment.cancel');

Route::get('/email/{id}',[AppointmentController::class,'email'])->name('appointment.email');

Route::post('/email/send/{id}',[AppointmentController::class,'email_send'])->name('appointment.email.send');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);
