<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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


//all->index->blogs.index
//single->show->blogs.show
//form->create->blogs.create
//server store->store->--
//edit form->edit->blogs.edit
//server update->update->--
//server delete->destory->--