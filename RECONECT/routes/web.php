<?php

use Illuminate\Support\Facades\Route;
use App\Http\middleware\Seguranca;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Integra\IntegraController;
use App\Http\Controllers\Registration\RegistrationItemController;
use App\Http\Controllers\Movement_resources\ResourceController;
use App\Http\Controllers\Registration\RegistrationGroupController;
use App\Http\Controllers\Registration\RegistrationStatusController;
use App\Http\Controllers\Registration\RegistrationUserController;
use App\Http\Controllers\Registration\RegistrationTagController;
use App\Http\Controllers\RH\BirthdayController;
use App\Http\Controllers\Teste\TesteController;
use App\Http\Controllers\Ordinance\ManagersController;
use App\Http\Controllers\Impressions\ImpressionsController;
use App\Http\Controllers\Registration\RegistrationPrinterController;

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

Route::controller(RegistrationItemController::class)->group(function() {
    Route::get('/registration_item', 'index')->name('registration_item')->middleware(Seguranca::class);
    Route::post('/registration_item', 'store')->name('registration_item')->middleware(Seguranca::class);
});

Route::controller(RegistrationGroupController::class)->group(function() {
    Route::get('/registration_group', 'index')->name('registration_group')->middleware(Seguranca::class);
    Route::post('/registration_group', 'store')->name('registration_group')->middleware(Seguranca::class);
});

Route::controller(RegistrationStatusController::class)->group(function() {
    Route::get('/registration_status', 'index')->name('registration_status')->middleware(Seguranca::class);
    Route::post('/registration_status', 'store')->name('registration_status')->middleware(Seguranca::class);
});

Route::controller(RegistrationUserController::class)->group(function() {
    Route::get('/registration_user', 'index')->name('registration_user')->middleware(Seguranca::class);
    Route::post('/registration_user', 'store')->name('registration_user')->middleware(Seguranca::class);
    Route::get('/profile', 'profile')->name('profile')->middleware(Seguranca::class);
    Route::post('/profile', 'alterPhoto')->name('profile')->middleware(Seguranca::class);
});

Route::controller(RegistrationPrinterController::class)->group(function() {
    Route::get('/registration_printer', 'index')->name('registration_printer')->middleware(Seguranca::class);
    Route::post('/registration_printer', 'store')->name('registration_printer')->middleware(Seguranca::class);
});

Route::controller(ResourceController::class)->group(function() {
    Route::get('/movement_resources', 'index')->name('movement_resources')->middleware(Seguranca::class);
    Route::get('/select_item', 'selectItem')->name('select_item')->middleware(Seguranca::class);
    Route::get('/select_item_out', 'selectItemOut')->name('select_item_out')->middleware(Seguranca::class);
    Route::post('/movement_resources', 'exitItem')->name('movement_resources')->middleware(Seguranca::class);
    Route::get('/resources_report', 'resourcesReport')->name('resources_report')->middleware(Seguranca::class);
    Route::get('/load_user', 'loadUser')->name('load_user')->middleware(Seguranca::class);
    Route::get('/select_user', 'selectUser')->name('select_user')->middleware(Seguranca::class);
    Route::get('/select_user_out', 'selectUserOut')->name('select_user_out')->middleware(Seguranca::class);
    Route::get('/load_user_out', 'loadUserOut')->name('load_user_out')->middleware(Seguranca::class);
});

Route::controller(BirthdayController::class)->group(function() {
    Route::get('/birthday', 'index')->name('birthday')->middleware(Seguranca::class);
});

Route::controller(TesteController::class)->group(function() {
    Route::get('/teste', 'index')->name('teste')->middleware(Seguranca::class);
    Route::post('/teste', 'store')->name('teste')->middleware(Seguranca::class);
    Route::get('export', 'export')->name('export')->middleware(Seguranca::class);
    Route::post('export', 'export')->name('export')->middleware(Seguranca::class);
});

Route::controller(ManagersController::class)->group(function() {
    Route::get('/managers', 'index')->name('managers')->middleware(Seguranca::class);
    Route::get('/load_manager', 'loadManager')->name('load_manager')->middleware(Seguranca::class);
    Route::get('/select_manager', 'selectManager')->name('select_manager')->middleware(Seguranca::class);
    Route::post('/managers', 'saveEntryExit')->name('managars')->middleware(Seguranca::class);
    Route::get('/managers', 'flowDay')->name('managers')->middleware(Seguranca::class);
});

Route::controller(ImpressionsController::class)->group(function() {
    Route::get('/impressions', 'index')->name('impressions')->middleware(Seguranca::class);
});

