<?php

use App\Http\Controllers\NoticeController;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\SpeechController;
use App\Http\Controllers\UserLoginController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-login',[UserLoginController::class,'login'])->name('user_login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user-list',[UserLoginController::class,'list'])->name('user_list');
    Route::post('/user-store',[UserLoginController::class,'store'])->name('user_store');
    Route::get('/user-add',[UserLoginController::class,'adduser'])->name('user_add');
    Route::get('/user-edit/{id}',[UserLoginController::class,'edituser'])->name('user_edit');
    Route::get('/user-delete/{id}',[UserLoginController::class,'deleteuser'])->name('user_delete');
    Route::resources([
        'water' => WaterController::class,
       'notice' => NoticeController::class,
       'speech' => SpeechController::class
    ]);
});

