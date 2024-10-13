<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HICController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedController;
use App\Http\Controllers\PrescriptionController;



Route::get('/', function () {
    return view('home');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashHome');
})->name('dashboard');

Route::resource('users', UserController::class);

Route::resource('hics', HICController::class);

Route::resource('categories', CategoryController::class);

Route::resource('medicines', MedController::class);

Route::get('/main', function () {
    return view('landing.pages.main'); 
})->name('main');

Route::resource('prescriptions', PrescriptionController::class);


