<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
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
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


// User Routes
Route::middleware(['auth', 'user.access:user', 'EnsureProfileIsComplete', 'nocache'])->prefix('user')->group(function () {
    Route::get('/dashboard', [
        UserController::class,
        'dashboard'
    ])->name('client.dashboard');


    Route::get('/schedule', [
        UserController::class,
        'schedule'
    ])->name('client.schedule');

    Route::post('/schedule', [
        AppointmentController::class,
        'createAppointment'
    ])->name('client.schedule.store');

    Route::put('/schedule', [
        AppointmentController::class,
        'editAppointment'
    ])->name('client.schedule.edit');

    Route::delete('/schedule', [
        AppointmentController::class,
        'deleteAppointment'
    ])->name('client.schedule.delete');


    Route::get('/history', [
        UserController::class,
        'history'
    ])->name('client.history');

    Route::get('/appointments', [
        UserController::class,
        'appointments'
    ])->name('client.appointments');

    Route::get('/help', function () {
        return view('client.help');
    })->name('client.help');

    Route::get('/profile', [
        UserController::class,
        'profile'
    ])->name('client.profile');
});

// Admin Routes
Route::middleware(['auth', 'user.access:admin', 'nocache'])->prefix('/')->group(function () {
    Route::get('/dashboard', [
        AdminController::class,
        'dashboard'
    ])->name('admin.dashboard');


    Route::get('/doctors', [
        AdminController::class,
        'doctors',
    ])->name('admin.doctors');

    Route::post('/doctors', [
        DoctorController::class,
        'createDoctor',
    ])->name('admin.doctor.create');

    Route::put('/doctors/edit/{id}', [
        DoctorController::class,
        'editDoctor',
    ])->name('admin.doctor.edit');

    Route::delete('/doctors/delete/{id}', [
        DoctorController::class,
        'deleteDoctor',
    ])->name('admin.doctor.delete');


    Route::get('/patients', [
        AdminController::class,
        'patients',
    ])->name('admin.patients');

    Route::get('/appointments', [
        AdminController::class,
        'appointments',
    ])->name('admin.appointments');

    Route::get('/help', [
        AdminController::class,
        'help',
    ])->name('admin.help');

    Route::get('/profile', [
        AdminController::class,
        'profile',
    ])->name('admin.profile.index');
});
