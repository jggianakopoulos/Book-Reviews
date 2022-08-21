<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookReviewController;

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

// Users
Route::get('/user/registration', [UserController::class, 'registration'])->middleware('guest');
Route::get('/user/loginpage', [UserController::class, 'loginpage'])->name('login')->middleware('guest');

Route::post('/user/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/user/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/user/logout', [UserController::class, 'logout'])->middleware('auth');;

// Books
Route::get('/', [BookController::class, 'index']);
Route::get('/book/show/{book}', [BookController::class, 'show']);
Route::get('/book/add', [BookController::class, 'add'])->middleware('auth');;

Route::post('/book/save', [BookController::class, 'save'])->middleware('auth');;

//Book Reviews
Route::get('/bookreview/show/{bookreview}', [BookReviewController::class, 'show']);
Route::get('/bookreview/showAll/{book}', [BookReviewController::class, 'showAll']);
Route::get('/bookreview/review/{book}', [BookReviewController::class, 'review'])->middleware('auth');

Route::post('/bookreview/save/{book}', [BookReviewController::class, 'save'])->middleware('auth');
Route::post('/bookreview/remove/{book}', [BookReviewController::class, 'remove'])->middleware('auth');
