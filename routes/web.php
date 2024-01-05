<?php

use Illuminate\Support\Facades\Route;
use App\Http\middleware\Seguranca;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Integra\IntegraController;
use App\Http\Controllers\Registration\RegistrationUserController;
use App\Http\Controllers\Registration\RegistrationTagController;
use App\Http\Controllers\Registration\RegistrationVehicleController;
use App\Http\Controllers\RH\BirthdayController;
use App\Http\Controllers\Concierge\ManagerController;

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

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'store')->name('register');
});

Route::controller(IntegraController::class)->group(function() {
    Route::get('/integra', 'index')->name('integra')->middleware(Seguranca::class);
    Route::get('/data_post', 'dataPost')->name('data_post')->middleware(Seguranca::class);
    Route::post('/data_post', 'savePost')->name('data_post')->middleware(Seguranca::class);
    Route::post('/like', 'likePost')->name('like')->middleware(Seguranca::class);
    Route::post('/delete_post', 'deletePost')->name('delete_post')->middleware(Seguranca::class);
    Route::post('/comment/{id_post}', 'comment')->name('comment')->middleware(Seguranca::class);
    Route::post('/save_comment', 'saveComment')->name('save_comment')->middleware(Seguranca::class);
    Route::post('/delete_comment', 'deleteComment')->name('delete_comment')->middleware(Seguranca::class);
    Route::post('/load_like_/{id_post}', 'loadLike')->name('load_like')->middleware(Seguranca::class);
});

Route::controller(RegistrationTagController::class)->group(function() {
    Route::get('/registration_tag', 'index')->name('registration_tag')->middleware(Seguranca::class);
    Route::post('/registration_tag', 'store')->name('registration_tag')->middleware(Seguranca::class);
});

Route::controller(RegistrationUserController::class)->group(function() {
    Route::get('/registration_user', 'index')->name('registration_user')->middleware(Seguranca::class);
    Route::post('/registration_user', 'store')->name('registration_user')->middleware(Seguranca::class);
    Route::get('/profile', 'profile')->name('profile')->middleware(Seguranca::class);
    Route::post('/profile', 'alterPhoto')->name('profile')->middleware(Seguranca::class);
});

Route::controller(RegistrationVehicleController::class)->group(function() {
    Route::get('/registration_vehicle', 'index')->name('registration_vehicle')->middleware(Seguranca::class);
    Route::post('/registration_vehicle', 'store')->name('registration_vehicle')->middleware(Seguranca::class);
});

Route::controller(BirthdayController::class)->group(function() {
    Route::get('/birthday', 'index')->name('birthday')->middleware(Seguranca::class);
});

Route::controller(ManagerController::class)->group(function() {
    Route::get('/manager', 'index')->name('manager')->middleware(Seguranca::class);
    Route::get('/load_manager', 'loadManager')->name('load_manager')->middleware(Seguranca::class);
    Route::get('/select_manager', 'selectManager')->name('select_manager')->middleware(Seguranca::class);
    Route::get('/load_vehicle', 'loadVehicle')->name('load_vehicle')->middleware(Seguranca::class);
    Route::get('/select_vehicle', 'selectVehicle')->name('select_vehicle')->middleware(Seguranca::class);
    Route::post('/manager', 'saveEntry')->name('manager')->middleware(Seguranca::class);
    Route::post('/saveExit', 'saveExit')->name('saveExit')->middleware(Seguranca::class);
    Route::get('/manager', 'flow')->name('manager')->middleware(Seguranca::class);
});

