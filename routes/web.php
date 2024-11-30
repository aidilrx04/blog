<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;


Route::get('/', [RouteController::class, 'index'])->name('index');

Route::group([], function () {

    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.'
    ], function () {

        Route::get('register', [AuthController::class, 'register_view'])->name('register');
        Route::get('login', [AuthController::class, 'login_view'])->name('login');

        Route::post('register', [AuthController::class, 'register'])->name('register_submit');
        Route::post('login', [AuthController::class, 'login'])->name('login_submit');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::get('{post:slug}', [PostController::class, 'view'])->name('view_post');
});

Route::group([
    'prefix' => 'uploads',
    'as' => 'uploads.'
], function () {
    Route::get("{file:name}", [UploadController::class, 'view'])->name('view');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::resource('posts', AdminPostController::class);
});
