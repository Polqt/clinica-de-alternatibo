<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/services', function() {
    return view('services');
})->name('services');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');


// Authentication Routes
Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/signup', function() {
    return view('auth.register');
})->name('signup');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// Admin Routes


// User Routes