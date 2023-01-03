<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ElectricityController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ReceiveBillController;
use App\Http\Controllers\WaterController;
use App\Http\Controllers\SpeechController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\ForwardController;
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

Route::get('/', [CustomerController::class, 'index'])->name('index');
Route::get('/contact-us', [CustomerController::class, 'contact'])->name('contact_us');
Route::get('/notice-all', [CustomerController::class, 'notice'])->name('notice_all');
Route::get('/speech-all', [CustomerController::class, 'speech'])->name('speech_all');
Auth::routes();


Route::get('/user-login',[UserLoginController::class,'login'])->name('user_login');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/get-data-user/', [WaterController::class,'getuserdata'])->name('get-data-user');

    Route::get('/get-data-electricity/', [ElectricityController::class,'getuserelectricity'])->name('get-data-electricity');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user-list',[UserLoginController::class,'list'])->name('user_list');
    Route::post('/user-store',[UserLoginController::class,'store'])->name('user_store');
    Route::get('/user-add',[UserLoginController::class,'adduser'])->name('user_add');
    Route::get('/user-edit/{id}',[UserLoginController::class,'edituser'])->name('user_edit');
    Route::post('/user-update/{id}',[UserLoginController::class,'updateuser'])->name('user_update');
    Route::get('/user-delete/{id}',[UserLoginController::class,'deleteuser'])->name('user_delete');
    Route::get('/electricity-id', [CustomerController::class, 'electricity'])->name('electricity_by_id');
    Route::get('/water-id', [CustomerController::class, 'water'])->name('water_by_id');
    Route::get('/water-show/{id}', [CustomerController::class, 'water_details'])->name('water_show_id');
    Route::get('/electricity-show/{id}', [CustomerController::class, 'electricity_details'])->name('electricity_show_id');
    Route::get('pdf-wasa/{id}',[WaterController::class, 'pdf'])->name('pdf_wasa');
    Route::get('pdf-electricity/{id}',[ElectricityController::class, 'pdf'])->name('pdf_electricity');
    Route::resources([
        'water' => WaterController::class,
       'notice' => NoticeController::class,
       'speech' => SpeechController::class,
       'electricity' => ElectricityController::class,
       'bill_received' => ReceiveBillController::class,
       'contact' => ContactController::class,
       'rate' => RateController::class,
       'forward' => ForwardController::class
    ]);

    Route::get('/current-month-electricity',[ElectricityController::class,'current_index'])->name('current_month_electricity');
    Route::get('/current-month-electricity-id/{id}',[ElectricityController::class,'current_month'])->name('current_month_electricity_id');
    Route::get('/current-month-water',[WaterController::class,'current_index'])->name('current_month_water');


});

