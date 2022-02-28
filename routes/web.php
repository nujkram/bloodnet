<?php

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
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

Route::get('/donors', [App\Http\Controllers\DonorController::class, 'index'])->name('donors')->middleware('user','fireauth');

Route::get('/accept/{id}', [App\Http\Controllers\DonorController::class, 'accept'])->middleware('user','fireauth');

Route::get('/reject/{id}', [App\Http\Controllers\DonorController::class, 'reject'])->middleware('user','fireauth');

Route::get('/announcements', [App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcements')->middleware('user','fireauth');

Route::post('/announcements', [App\Http\Controllers\AnnouncementController::class, 'store'])->middleware('user','fireauth');

Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);
