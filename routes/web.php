<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/job', function () {
    return view('job');
});

Route::get('/fast-track', function () {
    return view('fast-track');
});

Route::get('/training-partners', function () {
    return view('training-partners');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/admin/login', function () {
    return view('admin.admin');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/companies', function () {
    return view('admin.companies');
});
