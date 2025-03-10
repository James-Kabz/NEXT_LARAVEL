<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;


// Route::resource('posts',PostController::class);
Route::post('addPost',[PostController::class,'addPost']);
Route::get('getPosts',[PostController::class,'getPosts']);
Route::get('getPost/{id}',[PostController::class,'getPost']);
Route::put('editPost/{id}',[PostController::class,'editPost']);
Route::delete('deletePost/{id}',[PostController::class,'deletePost']);