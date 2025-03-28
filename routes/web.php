<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('posts',[PostController::class,'index'])->name('posts.view');
Route::get('posts/add',[PostController::class,'create'])->name('posts.create');
Route::get('posts/create',[PostController::class,'store'])->name('posts.store');
Route::get('posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
