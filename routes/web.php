<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;

Auth::routes();
//Admins Routes//
Route::get('/dashboardAdmin', [AdminController::class,'indexAdmin'])->name('admindash');
Route::get('/AllUsers', [AdminController::class,'getUsers']);
Route::get('/getSettings', [AdminController::class,'getSettings']);
Route::put('/SaveSettingsChanges', [AdminController::class,'SaveSettings']);


//User Routes//
Route::get('/', [Controller::class,'welcome'])->name('welcome');
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::post('/change_avatar', [HomeController::class,'Change_avatar'])->name('change_avatar');
Route::get('/userDetails/{id}', [HomeController::class,'GetUserDetails']);
Route::get('/searchUser',[HomeController::class,'SearchUsers']);
Route::post('/contactUs',[Controller::class,'ContactUs'])->name('ContactUs');

//Worker Routes//
Route::post('/addWorkerInfo', [WorkerController::class,'AddWorkerInfo']);
Route::get('/showWorkerSettings', [WorkerController::class,'ShowWorkerSettings']);
Route::put('/changeWorkerSettings', [WorkerController::class,'ChangeWorkerSettings']);

//Portfolios Routes//
Route::post('/savePortFolio', [PortfolioController::class,'SavePortFolio']);
Route::get('/getPortfolios', [PortfolioController::class,'GetPortFolio']);
Route::get('/getPortfolioDetails/{id}', [PortfolioController::class,'GetPortFolioDetails']);
Route::delete('/deleteProject/{id}', [PortfolioController::class,'DeleteProject']);


//Posts Routes//
Route::post('/savePost', [PostController::class,'SavePost']);
Route::get('/getPosts', [PostController::class,'GetPosts']);
Route::get('/getMyPosts', [PostController::class,'GetMyPosts']);
Route::get('/getPostDetails/{id}', [PostController::class,'GetPostDetails']);
Route::delete('/deleteMyPost/{id}', [PostController::class,'DeleteMyPost']);
Route::put('/editMyPost/{id}', [PostController::class,'EditMyPost']);
Route::post('/interessentPost/{id}', [PostController::class,'InteressentPost']);
Route::delete('/unInteressentPost/{id}', [PostController::class,'UnInteressentPost']);
Route::get('/getInteressentPosts', [PostController::class,'GetInteressentPosts']);

//Customer Routes//
Route::get('/showCustomerSettings', [CustomerController::class,'ShowCustomerSettings']);
Route::put('/changeCustomerSettings', [CustomerController::class,'ChangeCustomerSettings']);
Route::post('/setRate/{id}', [CustomerController::class,'SetRate']);
Route::delete('/resetRate/{id}', [CustomerController::class,'ResetRate']);
Route::post('/follow/{id}', [CustomerController::class,'Follow']);
Route::post('/unfollow/{id}', [CustomerController::class,'UnFollow']);
Route::get('/getWorkers', [CustomerController::class,'GetWorkers']);



//Comments Routes//
Route::post('/addComment/{id}', [CommentController::class,'AddComment']);
Route::get('/getComments/{id}', [CommentController::class,'GetComments']);
Route::delete('/deleteMyComment/{id}', [CommentController::class,'DeleteMyComment']);
Route::put('/editMyComment/{id}', [CommentController::class,'EditMyComment']);


//use vue router//
Route::get('/{any}',[HomeController::class,'indexx'])->where('any','.*');
