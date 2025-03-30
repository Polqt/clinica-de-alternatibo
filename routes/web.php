<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/services', function() {
    return view('services');
});

Route::get('/contact', function() {
    return view('contact');
});


// Authentication Routes

Route::get('/login', function() {
    return view('auth.login');
})->middleware('');

Route::get('/register', function() {
    return view('auth.register');
});

Route::post('/login', function() {

});

Route::post('/register', function() {

});