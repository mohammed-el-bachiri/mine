<?php

use App\Http\Controllers\Auth\ForgotPWController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPWController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckIfUserAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', ['page' => 'Home']);
});


Route::get('/login', function () {
    return view('Pages.Auth.login', ['page' => 'Login']);
})->name('login');


Route::get('/register', function () {
    return view('Pages.Auth.register', ['page' => 'Register']);
})->name('register');

Route::get('/forgot-password', function () {
    return view('Pages.Auth.forgot_pw', ['page' => 'Forgot Password']);
})->name('password.forgot');

Route::get('/reset-password/{token}', function ($token) {
    $email = request()->input('email', ['page' => 'Reset Password']);
    return view('Pages.Auth.reset_pw', compact('email', 'token'));
});



Route::post('/logout')->name('logout');
// dashboard
Route::get('/dashboard', function () {
    return view('Pages.dashboard');
});

Route::get('/about', function () {
    return view('about', ['page' => 'About']);
});
