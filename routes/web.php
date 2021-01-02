<?php

use App\Http\Controllers\{HomeController, PostController, CategoryController, TagController};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/post', [PostController::class, 'index'])->name('post');

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/save', [PostController::class, 'save']);

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/post/{post:slug}/edit', [PostController::class, 'edit']);
Route::patch('/post/{post:slug}/update', [PostController::class, 'update']);

Route::delete('/post/{post:slug}/delete', [PostController::class, 'delete']);

Route::get('/post/category/{category:slug}', [CategoryController::class, 'index']);
Route::get('/post/tag/{tag:slug}', [TagController::class, 'index']);


