<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/dashboard', function () {
    return view('panel.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/post/{id}', function ($id) {
    return view('post');
})->name('post.show');

Route::get('/profile', function () {
    return 'profile';
})->name('profile');

Route::get('/panel/users', [UserController::class, 'index'])->name('profile');

require __DIR__ . '/auth.php';














