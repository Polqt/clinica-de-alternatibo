<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/signup', function () {
    return view('auth.register');
})->name('signup');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});


// User Routes
Route::middleware(['auth', 'user.access:user', 'EnsureProfileIsComplete', 'nocache'])->prefix('user')->group(function () {
    Route::get('/dashboard', [
        UserController::class, 'dashboard'
    ])->name('client.dashboard');

    Route::get('/schedule', [
        UserController::class, 'schedule'
    ])->name('client.schedule');

    Route::get('/history', function () {
        return view('client.history');
    })->name('client.history');

    Route::get('/appointments', function () {
        return view('client.appointments');
    })->name('client.appointments');

    Route::get('/settings', function () {
        return view('client.settings');
    })->name('client.settings');

    Route::get('/help', function () {
        return view('client.help');
    })->name('client.help');

    Route::get('/profile', [
        UserController::class, 'profile'
    ])->name('client.profile');
});

// Admin Routes
Route::middleware(['auth', 'user.access:admin', 'nocache'])->prefix('/')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
