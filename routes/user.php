<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'user.access:user', 'EnsureProfileIsComplete', 'nocache'])->prefix('user')->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('client.dashboard');

    Route::get('/schedule', [UserController::class, 'schedule'])->name('client.schedule');
    Route::post('/schedule', [AppointmentController::class, 'createAppointment'])->name('client.schedule.store');
    Route::put('/schedule/edit', [AppointmentController::class, 'updateAppointment'])->name('client.schedule.edit');
    Route::delete('/schedule/delete', [AppointmentController::class, 'deleteAppointment'])->name('client.schedule.delete');

    Route::get('/history', [UserController::class, 'history'])->name('client.history');
    Route::get('/doctors', [UserController::class, 'doctors'])->name('client.doctors');

    Route::get('/help', function () {
        return view('client.help');
    })->name('client.help');

    Route::get('/profile', [UserController::class, 'profile'])->name('client.profile');

});
