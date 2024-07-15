<?php
use App\Http\Controllers\login;
use App\Http\Controllers\register;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', [login::class, 'login'])->middleware('guest')->name('login.index');
Route::post('/login', [login::class, 'processlogin'])->middleware('throttle:10,1')->middleware('guest')->name('login');
Route::get('/register', [register::class, 'showRegister'])->name('register');
Route::post('/register', [register::class, 'processRegister'])->name('register.index');
Route::get('/forgot-password',[login::class,'forgotPassword'])->name('forgot.Password')->middleware('guest');
Route::post('/forgot-password',[login::class,'requestPassword'])->name('Password.email')->middleware('guest');
Route::get('/update-password',[login::class,'updatePassword'])->name('password.reset');
Route::post('/update-password',[login::class,'resetPassword'])->name('post.Password');
// End Auth
