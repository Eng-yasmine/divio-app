<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;



Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts', [PostController::class, 'view'])->name('posts.view');
Route::get('posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/add', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//search

Route::get('posts/search',[PostController::class,'search'])->name('posts.search');
Route::resource('users',UserController::class);
Route::resource('tags',TagController::class);
Route::get('users/posts/{id}',[UserController::class,'posts'])->name('users.posts');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
