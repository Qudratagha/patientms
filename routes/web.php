<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
//,'prefix' => 'admin'
Route::group(['middleware' => 'web'], function() {
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('ajax/{method}', [AjaxController::class, 'handle'])->name('ajax.handle');
    Route::resource('users', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('patients', \App\Http\Controllers\Admin\PatientsController::class);
//    Route::resource('setting', SettingController::class)->only('edit','update');
});
