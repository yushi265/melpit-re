<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mypage\ProfileController;

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
})->name('top');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('mypage')
        ->namespace('MyPage')
        ->name('mypage.')
        ->middleware('auth')
        ->group(function () {
            Route::get('edit-profile',[ProfileController::class, 'showProfileEditForm'])->name('edit-profile');
            Route::post('edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
        });
