<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;



Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::resource('posts', PostController::class);
});
