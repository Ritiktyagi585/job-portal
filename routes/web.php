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

Route::get('/company/profile', function () {
    return view('company.profile');
});

Route::get('/company/profile/edit', function () {
    return view('company.edit-profile');
});

Route::get('/company/post-job', function () {
    return view('company.post-job');
});

Route::get('/company/jobs', function () {
    return view('company.jobs');
});

Route::get('/company/applications', function () {
    return view('company.applications');
});

Route::get('/company/shortlisted', function () {
    return view('company.shortlisted');
});

Route::get('/company/interviews', function () {
    return view('company.interviews');
});

Route::get('/company/hired', function () {
    return view('company.hired');
});

Route::get('/company/billing', function () {
    return view('company.billing');
});

Route::get('/company/purchase-package', function () {
    return view('company.purchase-package');
});

Route::get('/company/messages', function () {
    return view('company.messages');
});

Route::get('/company/notifications', function () {
    return view('company.notifications');
});

Route::get('/company/settings', function () {
    return view('company.settings');
});

Route::get('/training-partner/login', function () {
    return view('training-partner.login');
});

Route::get('/training-partner/dashboard', function () {
    return view('training-partner.dashboard');
});

Route::get('/training-partner/profile', function () {
    return view('training-partner.profile');
});

Route::get('/training-partner/add-course', function () {
    return view('training-partner.add-course');
});

Route::get('/training-partner/courses', function () {
    return view('training-partner.courses');
});

Route::get('/training-partner/enrollments', function () {
    return view('training-partner.enrollments');
});

Route::get('/training-partner/training-progress', function () {
    return view('training-partner.training-progress');
});

Route::get('/training-partner/assessments', function () {
    return view('training-partner.assessments');
});

Route::get('/training-partner/certificates', function () {
    return view('training-partner.certificates');
});

Route::get('/fast-track/login', function () {
    return view('fast-track.login');
});

Route::get('/fast-track/dashboard', function () {
    return view('fast-track.dashboard');
});

Route::get('/fast-track/profile', function () {
    return view('fast-track.profile');
});

Route::get('/fast-track/assessment', function () {
    return view('fast-track.assessment');
});

Route::get('/fast-track/courses', function () {
    return view('fast-track.courses');
});

Route::get('/fast-track/course-details', function () {
    return view('fast-track.course-details');
});

Route::get('/fast-track/training', function () {
    return view('fast-track.training');
});

Route::get('/fast-track/training-progress', function () {
    return view('fast-track.training-progress');
});

Route::get('/fast-track/final-assessment', function () {
    return view('fast-track.final-assessment');
});

Route::get('/fast-track/certificate', function () {
    return view('fast-track.certificate');
});

Route::get('/fast-track/job-recommendations', function () {
    return view('fast-track.job-recommendations');
});

Route::get('/fast-track/applications', function () {
    return view('fast-track.applications');
});
