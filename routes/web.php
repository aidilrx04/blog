<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('posts.index');

Route::get('/sitemap.xml', [MainController::class, 'sitemap']);

Route::get('/posts/{post}', [MainController::class, 'show'])->name('posts.show');
