<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['prefix' => 'cms'], function () {
    // DASHBOARD
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('home', fn () => view('content.dashboard.home'))->name('dashboard.home.index');
    });

    // MANAJEMEN USER
    Route::group(['prefix' => 'manajemen-user'], function () {
        Route::get('/admin', fn () => view('content.manajemen-user.admin'))->name('manajemen-user.admin.index');
        Route::get('/admin-role', fn () => view('content.manajemen-user.admin-role'))->name('manajemen-user.admin-role.index');
    });
});
