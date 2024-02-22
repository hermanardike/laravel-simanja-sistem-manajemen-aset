<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\HostController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth','verified'])->group(function () {
   Route::get('/',function () {
       return view('home.index');
   })->name('home');

   Route::get('edit-profile', function () {
        return view('home.profile');
    })->name('profile.edit');

   Route::resource('user', UserController::class);
   Route::put('update-password/{id}',[UserController::class,'UpdatePassword']);

   Route::resource('server', ServerController::class);
   Route::resource('host', HostController::class);
});


