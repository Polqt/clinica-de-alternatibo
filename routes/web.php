<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::get('/dashboard', function() {
    return view('admin.dashboard');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('EnsureProfileIsComplete');
});


// User Routes
// Route::get('/dashboard', function() {
//     return view('client.dashboard');
// })->middleware('auth', 'EnsureProfileIsComplete')->name('dashboard');

// Admin Routes


