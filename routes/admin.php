<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminAppointmentController;

Route::middleware(['auth', 'user.access:admin', 'nocache'])->prefix('/')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/doctors', [AdminController::class, 'doctors'])->name('admin.doctors');
    Route::post('/doctors', [DoctorController::class, 'createDoctor'])->name('admin.doctor.create');
    Route::put('/doctors/{id}/edit', [DoctorController::class, 'editDoctor'])->name('admin.doctor.edit');
    Route::delete('/doctors/{id}delete', [DoctorController::class, 'deleteDoctor'])->name('admin.doctor.delete');

    Route::get('/patients', [AdminController::class, 'patients'])->name('admin.patients');

    Route::get('/appointments', [AdminController::class, 'appointments'])->name('admin.appointments');
    Route::get('/appointments/{id}', [AdminAppointmentController::class, 'getAppointmentDetails'])->name('admin.appointments.details');
    Route::post('/appontments/{id}/confirm', [AdminAppointmentController::class, 'confirmAppointment'])->name('admin.appointments.confirm');
    Route::post('/appointments/{id}/cancel', [AdminAppointmentController::class, 'cancelAppointment'])->name('admin.appointments.cancel');
    Route::post('/appointments/{id}/complete', [AdminAppointmentController::class, 'completeAppointment'])->name('admin.appointments.complete');
    Route::put('/appointments/{id}/reschedule', [AdminAppointmentController::class, 'rescheduleAppointment'])->name('admin.appointments.reschedule');

    Route::get('/help', [AdminController::class, 'help'])->name('admin.help');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile.index');
});
