<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any('send_sms', [\App\Http\Controllers\SMSController::class, 'send'])->name('send_sms');

Route::any('sms_process', [\App\Http\Controllers\SMSController::class, 'sms_process'])->name('sms_process');
Route::any('sms_process_check', [\App\Http\Controllers\SMSController::class, 'sms_process_check'])->name('sms_process_check');



Route::middleware("auth:web")->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    // Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
});

Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');
});

Route::post('/checkPhoneNumberExist', [\App\Http\Controllers\AuthController::class, 'checkPhoneNumberExist'])->name('checkPhoneNumberExist');

//Route::post('/getFarmer', [\App\Http\Controllers\AuthController::class, 'getFarmer'])->name('getFarmer');
