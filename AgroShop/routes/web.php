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
    return view('home');
})->name('home');



Route::any('send_sms', [\App\Http\Controllers\SMSController::class, 'send'])->name('send_sms');

Route::any('sms_process', [\App\Http\Controllers\SMSController::class, 'sms_process'])->name('sms_process');
Route::any('sms_process_check', [\App\Http\Controllers\SMSController::class, 'sms_process_check'])->name('sms_process_check');


//Route::middleware("auth:farmer")->group(function (){
//    Route::get('/farmer', )
//});
Route::middleware("auth:web")->group(function () {
    Route::any('/profile',[\App\Http\Controllers\AuthController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [\App\Http\Controllers\AuthController::class, 'editProfile'])->name('editProfile');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    // Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
});

Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');
});

Route::get('/checkPhoneNumberExist', [\App\Http\Controllers\AuthController::class, 'showCheckPhoneNumberExist'])->name('showCheckPhoneNumberExist');
Route::post('/checkPhoneNumberExist', [\App\Http\Controllers\AuthController::class, 'checkPhoneNumberExist'])->name('checkPhoneNumberExist');

Route::any('/catalog', '\App\Http\Controllers\AidsController@Aids')->name('catalog');

Route::get('/{aid_id}', '\App\Http\Controllers\AidsController@getAids')->name('show_aids');

Route::get('producer', [\App\Http\Controllers\ProducersController::class, 'index'])->name('producer.index');
