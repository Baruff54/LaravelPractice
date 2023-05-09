<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\Dashboard\BienController;
use App\Http\Controllers\Dashboard\OptionController;

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


Route::prefix('/appart')->name('appart.')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/create', [AppartementController::class, 'create'])->name('create');
        Route::post('/create', [AppartementController::class, 'store']);
    });

    Route::get('/my', [AppartementController::class, 'showMy'])->name('myappart');
    Route::delete('/my', [AppartementController::class, 'delete']);
    Route::get('/{appart}', [AppartementController::class, 'show'])->name('show');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware([IsAdmin::class])->group(function () {
    Route::get('/option', [OptionController::class, 'show'])->name('option');
    Route::post('/option', [OptionController::class, 'store']);
    Route::delete('/option', [OptionController::class, 'delete']);
    Route::get('/appart', [BienController::class, 'show'])->name('appart');
    Route::delete('/appart', [BienController::class, 'delete']);
});