<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatsController;

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

Route::get('/', function () {
    return view('main');
});

Route::resource('account', AccountController::class);
Route::resource('grade', GradeController::class);
Route::resource('attraction', AttractionController::class);
Route::resource('stats', StatsController::class);

Route::post('login/check', [LoginController::class, 'check']);
Route::get('login/logout', [LoginController::class, 'logout']);