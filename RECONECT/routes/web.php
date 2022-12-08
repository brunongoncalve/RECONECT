<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Integra\IntegraController;
use App\Http\Controllers\Registration\RegistrationItemController;
use App\Http\Controllers\Movement_resources\ResourceController;
use App\Http\Controllers\Registration\RegistrationGroupController;
use App\Http\Controllers\Registration\RegistrationStatusController;
use App\Http\Controllers\Registration\RegistrationUserController;
use App\Http\Controllers\RH\BirthdayController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::middleware([App\Http\Middleware\Seguranca::class])->group(function () {
    Route::get('/integra', [IntegraController::class, 'index'])->name('integra');
    Route::get('/registration_item', [RegistrationItemController::class, 'index'])->name('registration_item');
    Route::post('/registration_item', [RegistrationItemController::class, 'store'])->name('registration_item');
    Route::get('/movement_resources', [ResourceController::class, 'index'])->name('movement_resources');
    Route::get('/select_item', [ResourceController::class, 'selectItem'])->name('select_item');
    Route::get('/select_item_out', [ResourceController::class, 'selectItemOut'])->name('select_item_out');
    Route::post('/movement_resources', [ResourceController::class, 'exitItem'])->name('movement_resources');
    Route::get('/resources_report', [ResourceController::class, 'resourcesReport'])->name('resources_report');
    Route::get('/registration_group', [RegistrationGroupController::class, 'index'])->name('registration_group');
    Route::post('/registration_group', [RegistrationGroupController::class, 'store'])->name('registration_group');
    Route::get('/load_user', [ResourceController::class, 'loadUser'])->name('load_user');
    Route::get('/select_user', [ResourceController::class, 'selectUser'])->name('select_user');
    Route::get('/registration_status', [RegistrationStatusController::class, 'index'])->name('registration_status');
    Route::post('/registration_status', [RegistrationStatusController::class, 'store'])->name('registration_status');
    Route::get('/select_user_out', [ResourceController::class, 'selectUserOut'])->name('select_user_out');
    Route::get('/load_user_out', [ResourceController::class, 'loadUserOut'])->name('load_user_out');
    Route::get('/registration_user', [RegistrationUserController::class, 'index'])->name('registration_user');
    Route::post('/registration_user', [RegistrationUserController::class, 'store'])->name('registration_user');
    Route::get('/birthday', [BirthdayController::class, 'index'])->name('birthday');
});