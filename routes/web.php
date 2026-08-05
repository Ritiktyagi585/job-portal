<?php

use Illuminate\Support\Facades\Route;

function directModeUser(): array
{
    return ['name' => 'Ananya Gupta', 'avatar' => asset('student.png'), 'notifications' => 3];
}

function directModeMenu(): array
{
    return [
        ['key' => 'dashboard', 'title' => 'Dashboard', 'icon' => 'home', 'url' => '/direct-mode/dashboard'],
        ['key' => 'profile', 'title' => 'My Profile', 'icon' => 'user', 'url' => '/direct-mode/profile'],
        ['key' => 'assessments', 'title' => 'Assessments', 'icon' => 'clipboard', 'url' => '/direct-mode/assessments'],
        ['key' => 'jobs', 'title' => 'Jobs', 'icon' => 'briefcase', 'url' => '/direct-mode/jobs'],
        ['key' => 'applications', 'title' => 'My Applications', 'icon' => 'file', 'url' => '/direct-mode/applications'],
        ['key' => 'interviews', 'title' => 'Interviews', 'icon' => 'clock', 'url' => '/direct-mode/interviews'],
        ['key' => 'offers', 'title' => 'Offers', 'icon' => 'chart', 'url' => '/direct-mode/offers'],
        ['key' => 'activity', 'title' => 'Activity', 'icon' => 'activity', 'url' => '/direct-mode/activity'],
        ['key' => 'settings', 'title' => 'Settings', 'icon' => 'settings', 'url' => '/direct-mode/settings'],
        ['key' => 'logout', 'title' => 'Logout', 'icon' => 'logout', 'url' => '#'],
    ];
}

function directModeJobs(): array
{
    return [
        ['slug' => 'frontend-developer', 'title' => 'Frontend Developer', 'company' => 'TechNova Solutions', 'logo' => 'TS', 'sub' => 'TechNova', 'location' => 'Bangalore, Karnataka', 'exp' => '0 - 1 Year', 'salary' => 'Rs 4 - Rs 6 LPA', 'posted' => 'Posted 2h ago', 'tone' => 'navy', 'industry' => 'IT Services & Consulting', 'website' => 'www.technovasolutions.com'],
        ['slug' => 'software-engineer', 'title' => 'Software Engineer', 'company' => 'InfoByte', 'logo' => 'iB', 'sub' => 'InfoByte', 'location' => 'Hyderabad, Telangana', 'exp' => '0 - 2 Years', 'salary' => 'Rs 5 - Rs 8 LPA', 'posted' => 'Posted 1d ago', 'tone' => 'orange', 'industry' => 'Software Development', 'website' => 'www.infobyte.com'],
        ['slug' => 'react-developer', 'title' => 'React Developer', 'company' => 'CodeWave', 'logo' => 'CW', 'sub' => 'CodeWave', 'location' => 'Pune, Maharashtra', 'exp' => '0 - 2 Years', 'salary' => 'Rs 4 - Rs 7 LPA', 'posted' => 'Posted 2d ago', 'tone' => 'black', 'industry' => 'Product Engineering', 'website' => 'www.codewave.com'],
        ['slug' => 'backend-developer', 'title' => 'Backend Developer', 'company' => 'DataMinds', 'logo' => 'DT', 'sub' => 'DataMinds', 'location' => 'Remote', 'exp' => '1 - 3 Years', 'salary' => 'Rs 6 - Rs 10 LPA', 'posted' => 'Posted 3d ago', 'tone' => 'purple', 'industry' => 'Data Platforms', 'website' => 'www.dataminds.com'],
        ['slug' => 'full-stack-developer', 'title' => 'Full Stack Developer', 'company' => 'QuickCode', 'logo' => 'QC', 'sub' => 'QuickCode', 'location' => 'Chennai, Tamil Nadu', 'exp' => '1 - 2 Years', 'salary' => 'Rs 5 - Rs 9 LPA', 'posted' => 'Posted 4d ago', 'tone' => 'green', 'industry' => 'Web Solutions', 'website' => 'www.quickcode.com'],
    ];
}

function directModeData(array $extra = []): array
{
    return array_merge(['user' => directModeUser(), 'menuItems' => directModeMenu(), 'jobs' => directModeJobs()], $extra);
}

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/job', function () {
    return view('frontend.job');
});

Route::get('/fast-track', function () {
    return view('frontend.fast-track');
});

Route::get('/training-partners', function () {
    return view('frontend.training-partners');
});

Route::get('/about', function () {
    return view('frontend.about');
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

Route::get('/direct-mode/login', function () {
    return view('direct-mode.login');
});

Route::get('/direct-mode/register', function () {
    return view('direct-mode.register');
});

Route::get('/direct-mode/dashboard', function () {
    return view('direct-mode.dashboard', directModeData());
});

Route::get('/direct-mode/profile', function () {
    return view('direct-mode.profile', directModeData());
});

Route::get('/direct-mode/assessments', function () {
    return view('direct-mode.assessments', directModeData());
});

Route::get('/direct-mode/jobs', function () {
    return view('direct-mode.jobs', directModeData());
});

Route::get('/direct-mode/jobs/{slug}', function (string $slug) {
    $jobs = directModeJobs();
    $job = collect($jobs)->firstWhere('slug', $slug);
    abort_unless($job, 404);

    return view('direct-mode.job-details', directModeData([
        'job' => $job,
        'similarJobs' => collect($jobs)->where('slug', '!=', $slug)->take(3)->values()->all(),
    ]));
});

Route::get('/direct-mode/applications', function () {
    return view('direct-mode.applications', directModeData());
});

Route::get('/direct-mode/interviews', function () {
    return view('direct-mode.interviews', directModeData());
});

Route::get('/direct-mode/offers', function () {
    return view('direct-mode.offers', directModeData());
});

Route::get('/direct-mode/activity', function () {
    return view('direct-mode.activity', directModeData());
});

Route::get('/direct-mode/settings', function () {
    return view('direct-mode.settings', directModeData());
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

Route::get('/training-partner/reports', function () {
    return view('training-partner.reports');
});

Route::get('/training-partner/payouts', function () {
    return view('training-partner.payouts');
});

Route::get('/training-partner/notifications', function () {
    return view('training-partner.notifications');
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
