<?php
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SertifikatController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/layouts/dashboard', [AdminController::class, 'show'])->name('layouts.dashboard');

    // Route Post
    Route::get('/layouts/maintable', [PostController::class, 'index'])->name('layouts.maintable');
    Route::get('/admin/form_post', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/form_post', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/admin/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/admin/post/show/{slug}', [PostController::class, 'show'])->name('post.show');
    // End Route Post


    // Route Project
    Route::get('/layouts/maintable/project', [ProjectController::class, 'index'])->name('layouts.maintable.project');
    Route::get('/admin/project/Form', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/project/Form', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/admin/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/admin/project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/admin/project/delete{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    // End Route Project


    // Route Sertifikat
    Route::get('/layouts/maintable/sertifikat', [SertifikatController::class, 'index'])->name('layouts.maintable.sertifikat');
    Route::get('/admin/sertifikat/Form', [SertifikatController::class, 'create'])->name('sertifikat.create');
    Route::post('/admin/sertifikat/Form', [SertifikatController::class, 'store'])->name('sertifikat.store');
    Route::get('/admin/sertifikat/edit/{id}', [SertifikatController::class, 'edit'])->name('sertifikat.edit');
    Route::put('/admin/sertifikat/update/{id}', [SertifikatController::class, 'update'])->name('sertifikat.update');
    Route::delete('/admin/sertifikat/delete/{id}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');
    Route::get('/admin/sertifikat/{id}', [SertifikatController::class, 'show'])->name('sertifikat.show');
    // End Route Sertifikat


    // Route users
    Route::get('/layouts/maintable/users', [UsersController::class, 'index'])->name('layouts.maintable.Users');
    Route::post('/admin/Users/Form', [UsersController::class, 'store'])->name('Users.store');
    Route::get('/admin/Users/edit/{id}', [UsersController::class, 'edit'])->name('Users.edit');
    Route::put('/admin/Users/update/{id}', [UsersController::class, 'update'])->name('Users.update');
    Route::delete('/admin/Users/delete', [UsersController::class, 'destroy'])->name('Users.destroy');
    Route::get('/admin/Users/{id}', [UsersController::class, 'show'])->name('user.show');
    // End Route users


    // Like
    Route::post('/toggle-like', [LikesController::class, 'toggleLike'])->name('toggle.like');
    // End Like

    // Route Password
    Route::get('/Auth/Form_password', function () {
        return view('Auth.Form_password');
    })->name('Auth.Form_password');
    // End Password


    // Proccess Log-out
    Route::post('/logout', [login::class, 'logout'])->name('logout');
    // End Proccess Log-out

});
