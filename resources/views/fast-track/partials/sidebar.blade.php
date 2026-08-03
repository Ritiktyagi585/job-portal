@php
    $fastTrackMenuItems = $menuItems ?? [
        ['key' => 'dashboard', 'title' => 'Dashboard', 'icon' => 'DB', 'url' => '/fast-track/dashboard'],
        ['key' => 'profile', 'title' => 'My Profile', 'icon' => 'MP', 'url' => '/fast-track/profile'],
        ['key' => 'assessment', 'title' => 'Initial Assessment', 'icon' => 'IA', 'url' => '/fast-track/assessment'],
        ['key' => 'courses', 'title' => 'Fast Track Courses', 'icon' => 'FC', 'url' => '/fast-track/courses'],
        ['key' => 'details', 'title' => 'Course Details', 'icon' => 'CD', 'url' => '/fast-track/course-details'],
        ['key' => 'training', 'title' => 'My Training', 'icon' => 'MT', 'url' => '/fast-track/training'],
        ['key' => 'progress', 'title' => 'Training Progress', 'icon' => 'TP', 'url' => '/fast-track/training-progress'],
        ['key' => 'final', 'title' => 'Final Assessment', 'icon' => 'FA', 'url' => '/fast-track/final-assessment'],
        ['key' => 'certificate', 'title' => 'Certificate', 'icon' => 'CT', 'url' => '/fast-track/certificate'],
        ['key' => 'jobs', 'title' => 'Job Recommendations', 'icon' => 'JR', 'url' => '/fast-track/job-recommendations'],
        ['key' => 'applications', 'title' => 'Applications', 'icon' => 'AP', 'url' => '/fast-track/applications'],
    ];
@endphp

<aside class="sidebar">
    <a href="/fast-track/dashboard" class="brand">
        <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers">
    </a>

    <nav class="menu">
        @foreach ($fastTrackMenuItems as $item)
            <a class="menu-item {{ ($activePage ?? '') === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}">
                <span class="menu-icon">{{ $item['icon'] }}</span>
                <span>{{ $item['title'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="side-bottom">
        <a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a>
        <a class="bottom-link" href="/fast-track/login"><span class="menu-icon">LO</span><span>Logout</span></a>
    </div>
</aside>
