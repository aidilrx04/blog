<?php

use App\Http\Controllers\Api\SlugController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['as' => 'api.'], function () {
    Route::post('generate_slug', [SlugController::class, 'generate_slug'])->name('generate_slug');
});