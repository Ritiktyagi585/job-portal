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

Route::get('/admin/freshers', function () {
    return view('admin.freshers');
});

Route::get('/admin/companies', function () {
    return view('admin.companies');
});

Route::get('/admin/training-partners', function () {
    return view('admin.training-partners');
});

Route::get('/admin/jobs', function () {
    return view('admin.jobs');
});

Route::get('/admin/courses', function () {
    return view('admin.courses');
});

Route::get('/admin/assessments', function () {
    return view('admin.assessments');
});

Route::get('/admin/reports', function () {
    return view('admin.reports');
});

Route::get('/admin/notifications', function () {
    return view('admin.notifications');
});

Route::get('/admin/settings', function () {
    return view('admin.settings');
});

Route::get('/admin/system-logs', function () {
    return view('admin.system-logs');
});

Route::get('/company/register', function () {
    return view('company.register');
});

Route::get('/company/dashboard', function () {
    return view('company.dashboard');
});
