<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;


// Route::get('/emails/emailMessage',[MessageController::class,'index']);

Route::post('/emails/emailMessage', [MessageController::class,'store'])->name('message.store');
Route::get('/emails/tabel', [MessageController::class,'index'])->name('message.tabel');
Route::get('/emails/view/{id}', [MessageController::class,'view'])->name('message.view');
