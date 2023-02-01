<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ForumsController;

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

Route::get('/', [LandingController::class, "index"]);
Route::get('/singin', [LandingController::class, "singin"]);
Route::get('/singup', [LandingController::class, "singup"]);
Route::post('/singin_check', [LandingController::class, "singincheck"]);
Route::post('/singup_check', [LandingController::class, "singupcheck"]);
Route::get('/dashboard/{user}', [UsersController::class, "dashboard"]);
Route::get('/profile/{user}', [UsersController::class, "index"]);
Route::get('/profile/{user}/edit', [UsersController::class, "edit"]);
Route::patch('/profile/{user}/update', [UsersController::class, "update"]);
Route::get('/logout', [UsersController::class, "logout"]);
Route::get('/forum', [ForumsController::class, "index"]);
Route::post('/forum_check', [ForumsController::class, "forumcheck"]);
Route::get('/forum/{forum}', [ForumsController::class, "view"]);
Route::post('/forum/{forum}/store', [ForumsController::class, "store"]);
Route::get('/forum/{forum}/{discussion}', [ForumsController::class, "discussion"]);
Route::post('/forum/{discussion}/create', [ForumsController::class, "create"]);

