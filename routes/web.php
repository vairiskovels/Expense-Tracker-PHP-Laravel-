<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

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

// Main route
Route::get('/', [MainController::class, 'index']);

// Login (GET, POST) route
Route::get('/login', [MainController::class, 'login']);
Route::post('/login/auth', [MainController::class, 'auth']);

// Register (GET, POST) route
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/reset', [UserController::class, 'passReset']);
Route::get('/logout', [MainController::class, 'logout']);

// Other routes
Route::get('/add', [MainController::class, 'create']);
Route::post('/add', [MainController::class, 'store']);
Route::get('/reports', [MainController::class, 'reports']);
Route::get('/history', [MainController::class, 'history']);
Route::post('/history', [MainController::class, 'history']);
Route::get('/edit-record/{id}', [MainController::class, 'editRecord']);
Route::post('/edit-record', [MainController::class, 'updateRecord']);
Route::get('/profile', [UserController::class, 'show']);
Route::get('/profile/change-password', [UserController::class, 'editPassword']);
Route::get('category/{id}', [MainController::class, 'category']);
Route::post('/delete-record/{id}', [MainController::class, 'destroy']);