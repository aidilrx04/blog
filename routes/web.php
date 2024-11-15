<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::group([], function () {
    Route::get('{post:slug}', [PostController::class, 'view'])->name('view_post');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::resource('posts', AdminPostController::class);
});
