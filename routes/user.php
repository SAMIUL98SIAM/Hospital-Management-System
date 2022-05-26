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


Route::get('/dashboard',[FrontendController::class,'dashboard'])->name('dashboard');

Route::get('/appointment', [FrontendController::class, 'appointment'])->name('appointment');

Route::get('/appointment-cancel/{id}', [FrontendController::class, 'appointment_cancel'])->name('appointment.cancel');


Route::post('/appointment-store', [FrontendController::class, 'appointment_store'])->name('appointment.store');
