<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



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
Route::get('users/posts/{id}',[UserController::class,'posts'])->name('users.posts');
