<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Integra\IntegraController;
use App\Http\Controllers\Registration\RegistrationItemController;
use App\Http\Controllers\Movement_resources\ResourceController;

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

Route::get('/integra', [IntegraController::class, 'index'])->name('integra')->middleware(App\Http\Middleware\Seguranca::class);

Route::get('/registration_item', [RegistrationItemController::class, 'index'])->name('registration_item')->middleware(App\Http\Middleware\Seguranca::class);
Route::post('/registration_item', [RegistrationItemController::class, 'store'])->name('registration_item')->middleware(App\Http\Middleware\Seguranca::class);

Route::get('/movement_resources', [ResourceController::class, 'index'])->name('movement_resources')->middleware(App\Http\Middleware\Seguranca::class);
Route::get('/select_item', [ResourceController::class, 'selectItem'])->name('select_item')->middleware(App\Http\Middleware\Seguranca::class);
Route::get('/select_item_out', [ResourceController::class, 'selectItemOut'])->name('select_item_out')->middleware(App\Http\Middleware\Seguranca::class);
Route::post('/movement_resources', [ResourceController::class, 'exitItem'])->name('movement_resources')->middleware(App\Http\Middleware\Seguranca::class);
Route::get('/resources_report', [ResourceController::class, 'resourcesReport'])->name('resources_report')->middleware(App\Http\Middleware\Seguranca::class);