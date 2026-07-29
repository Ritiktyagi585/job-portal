@php
    $adminMenuItems = [
        ['title' => 'Dashboard', 'icon' => 'DB', 'url' => '/admin/dashboard', 'key' => 'dashboard'],
        ['title' => 'Freshers', 'icon' => 'FR', 'url' => '#', 'key' => 'freshers'],
        ['title' => 'Companies', 'icon' => 'CO', 'url' => '/admin/companies', 'key' => 'companies'],
        ['title' => 'Training Partners', 'icon' => 'TP', 'url' => '#', 'key' => 'training-partners'],
        ['title' => 'Jobs', 'icon' => 'JB', 'url' => '#', 'key' => 'jobs'],
        ['title' => 'Courses', 'icon' => 'CR', 'url' => '#', 'key' => 'courses'],
        ['title' => 'Assessments', 'icon' => 'AS', 'url' => '#', 'key' => 'assessments'],
        ['title' => 'Reports', 'icon' => 'RP', 'url' => '#', 'key' => 'reports'],
        ['title' => 'Notifications', 'icon' => 'NT', 'url' => '#', 'key' => 'notifications'],
        ['title' => 'Settings', 'icon' => 'ST', 'url' => '#', 'key' => 'settings'],
        ['title' => 'System Logs', 'icon' => 'LG', 'url' => '#', 'key' => 'logs'],
    ];
@endphp

<aside class="sidebar">
    <div>
        <a href="/" class="logo">
            <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo">
        </a>

        <nav class="menu">
            @foreach ($adminMenuItems as $item)
                <a href="{{ $item['url'] }}" class="menu-item {{ ($activePage ?? '') === $item['key'] ? 'active' : '' }}">
                    <span class="menu-icon">{{ $item['icon'] }}</span>
                    {{ $item['title'] }}
                </a>
            @endforeach
        </nav>
    </div>

    <div class="admin-profile">
        <div class="profile-icon">AD</div>
        <div>
            <h3>Admin Panel</h3>
            <p>Super Admin</p>
        </div>
    </div>
</aside>
