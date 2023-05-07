<?php

use App\Http\Controllers\AppartementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppartementController::class, 'showAll'])->name('accueil');


Route::get('/signup', [UserController::class, 'signUp'])->name("signUp");
Route::post('/signup', [UserController::class, 'doSignUp']);
Route::get('/login', [UserController::class, 'login'])->name("login");
Route::post('/login', [UserController::class, 'doLogin']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');