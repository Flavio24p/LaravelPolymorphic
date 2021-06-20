<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
    /*return view('welcome');*/
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/profile/{user_id}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/user/update/{user_id}', [App\Http\Controllers\UserController::class, 'update'])->name('profile.edit');

    Route::resource('clients', App\Http\Controllers\ClientsController::class);
});
