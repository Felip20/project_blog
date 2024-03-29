<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);
Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/sub',[BlogController::class,'subHandler']);

Route::middleware('can:admin')->group(function(){

Route::get('/admin/blogs',[AdminBlogController::class,'index']);
Route::get('/admin/blogs/create',[AdminBlogController::class,'create']);
Route::post('/admin/blogs/store',[AdminBlogController::class,'store']);
Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destory']);
Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit']);
Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update']);

});