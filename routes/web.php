<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PostController;
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



Auth::routes();

Route::get('/', [Controller::class,'welcome'])->name('welcome');

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::post('/change_avatar', [HomeController::class,'Change_avatar'])->name('change_avatar');
//Worker Routes//
Route::post('/addWorkerInfo', [WorkerController::class,'AddWorkerInfo']);
Route::get('/showWorkerSettings', [WorkerController::class,'ShowWorkerSettings']);
Route::put('/changeWorkerSettings', [WorkerController::class,'ChangeWorkerSettings']);
//Posts Routes//
Route::post('/savePost', [PostController::class,'SavePost']);
Route::get('/getPosts', [PostController::class,'GetPosts']);


