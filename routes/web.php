<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{id}',[PostController::class,'destroy']);
Route::get('/posts/edit/{id}', [PostController::class,'edit'])->middleware('auth');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->middleware('auth');
Route::post('/comment', [CommentController::class,'store'])->name('comment')->middleware('auth');

Route::get('/dashboard',[PostController::class,'dashboard'])->middleware('auth');