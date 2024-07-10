<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\CommentsController;

//Index || Halaman Utama
Route::get('/', [indexController::class, 'index'])->name('index');
Route::get('/layouts/postview/{slug}', [indexController::class, 'view'])->name('view.post');
Route::get('/layouts/postview/{slug}', [CommentsController::class, 'index'])->name('post.views');
Route::post('/layouts/postview/{slug}', [CommentsController::class, 'store'])->name('create.comment');
// End Index


// Blog page & Project
Route::get('/page_blog_project/project',[indexController::class,'show_project__'])->name('project.show');
Route::get('/page_blog_project/blog',[indexController::class,'show_blog__'])->name('blog.show');
// end
