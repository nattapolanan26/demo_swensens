<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register/step2', [RegisterController::class, 'registerStep2'])->name('register-step-2');

Route::post('/register/step3', [RegisterController::class, 'registerStep3'])->name('register-step-3');

Route::post('/register/create', [RegisterController::class, 'create'])->name('create-register');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/account/profile', [LoginController::class, 'profile'])->name('user-profile')->middleware('auth');

Auth::routes(['verify' => true]);
