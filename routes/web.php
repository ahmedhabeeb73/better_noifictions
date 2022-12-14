<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SendEmailController;

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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/services', function () {
    return view('services');
})->name('services');


Route::post('/services',[ServiceController::class,'store'])->name('services.store');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

Route::get('markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
  
    return redirect()->back();
})->name('markAsRead');

Route::get('deleteNot',function(){
    auth()->user()->notifications()->delete();
    return redirect()->back();
})->name('deleteNot');


Auth::routes();

// send email
Route::get('/sentemail',[SendEmailController::class,'index'])->name('sentemail.index');
Route::post('/sentemail',[SendEmailController::class,'mail'])->name('sentemail.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
