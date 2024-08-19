<?php

use App\Http\Controllers\ApController;
use App\Http\Controllers\CCTVController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\OsController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\NetworkingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\SwController;


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
//
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    //   Route::get('/',function () {
    //       return view('home.index');
    //   })->name('home');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Menu User
    Route::resource('user', UserController::class);
    Route::put('update-password/{id}', [UserController::class, 'UpdatePassword']);
    Route::get('edit-profile', function () {
        return view('home.profile');
    })->name('profile.edit');

    // Menu Server
    Route::resource('server', ServerController::class);
    Route::resource('host', HostController::class);
    Route::resource('instance', InstanceController::class);

    //Menu Settings
    Route::resource('os', OsController::class);
    Route::resource('pengadaan', PengadaanController::class);
    Route::resource('rack', RackController::class);

    // ImageUPloadConfiguration
    Route::post('file-pond', [FilepondController::class, 'store'])->name('filepond.store');
    Route::delete('file-pond', [FilepondController::class, 'destroy'])->name('filepond.destroy');

    // Switch Controller
    Route::resource('switch', SwController::class);

    // Acesspoint Controller
    Route::resource('accespoint', ApController::class);

    // Router Controller
    Route::resource('router', RouterController::class);

    // CCTV CONTROLLER
    Route::resource('cctv', CCTVController::class);


    Route::resource('networking', NetworkingController::class);
    Route::get('networking-sw', [NetworkingController::class, 'sw'])->name('networking.sw');
    Route::get('networking-router', [NetworkingController::class, 'router'])->name('networking.router');
    Route::get('networking-tv', [NetworkingController::class, 'tv'])->name('networking.tv');
    Route::get('networking-domain', [NetworkingController::class, 'domain'])->name('networking.domain');
    Route::get('networking-ip', [NetworkingController::class, 'ip'])->name('networking.ip ');
    Route::get('networking-ls', [NetworkingController::class, 'ls'])->name('networking.ls');
});
