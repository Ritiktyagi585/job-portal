@php
    $companyMenu = [
        ['title' => 'Dashboard', 'key' => 'dashboard', 'url' => '/company/dashboard', 'icon' => '<path d="M4 11l8-7 8 7"></path><path d="M6 10v9h5v-5h2v5h5v-9"></path>'],
        ['title' => 'My Profile', 'key' => 'profile', 'url' => '#', 'icon' => '<circle cx="12" cy="8" r="4"></circle><path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path>'],
        ['title' => 'Post a Job', 'key' => 'post-job', 'url' => '#', 'icon' => '<rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M12 11v4M10 13h4"></path>'],
        ['title' => 'My Jobs', 'key' => 'jobs', 'url' => '#', 'icon' => '<rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16"></path>'],
        ['title' => 'Applications', 'key' => 'applications', 'url' => '#', 'icon' => '<path d="M7 3h8l4 4v14H7z"></path><path d="M15 3v5h5M10 13h6M10 17h4"></path>'],
        ['title' => 'Shortlisted', 'key' => 'shortlisted', 'url' => '#', 'icon' => '<path d="M12 3l2.7 5.4 6 .9-4.3 4.2 1 6-5.4-2.8-5.4 2.8 1-6-4.3-4.2 6-.9z"></path>'],
        ['title' => 'Interviews', 'key' => 'interviews', 'url' => '#', 'icon' => '<rect x="4" y="5" width="16" height="15" rx="2"></rect><path d="M8 3v4M16 3v4M4 10h16"></path>'],
        ['title' => 'Hired', 'key' => 'hired', 'url' => '#', 'icon' => '<path d="M8 21v-2a4 4 0 0 1 8 0v2"></path><circle cx="12" cy="7" r="4"></circle><path d="M19 8l2 2 3-5"></path>'],
        ['title' => 'Packages & Billing', 'key' => 'billing', 'url' => '#', 'icon' => '<rect x="3" y="6" width="18" height="15" rx="2"></rect><path d="M3 10h18M7 15h4"></path>'],
        ['title' => 'Messages', 'key' => 'messages', 'url' => '#', 'icon' => '<path d="M4 5h16v12H7l-3 3z"></path>'],
        ['title' => 'Notifications', 'key' => 'notifications', 'url' => '#', 'badge' => '3', 'icon' => '<path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path>'],
        ['title' => 'Settings', 'key' => 'settings', 'url' => '#', 'icon' => '<circle cx="12" cy="12" r="3"></circle><path d="M19 12a7 7 0 0 0-.1-1l2-1.5-2-3.5-2.4 1a7 7 0 0 0-1.7-1L14.5 3h-5l-.4 3a7 7 0 0 0-1.7 1L5 6 3 9.5 5 11a7 7 0 0 0 0 2l-2 1.5L5 18l2.4-1a7 7 0 0 0 1.7 1l.4 3h5l.4-3a7 7 0 0 0 1.7-1L19 18l2-3.5-2-1.5a7 7 0 0 0 .1-1z"></path>'],
    ];
@endphp

<aside class="company-sidebar">
    <div>
        <a href="/" class="company-logo">
            <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo">
        </a>

        <nav class="company-menu">
            @foreach ($companyMenu as $item)
                <a href="{{ $item['url'] }}" class="company-menu-item {{ ($activePage ?? '') === $item['key'] ? 'active' : '' }}">
                    <span class="company-menu-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">{!! $item['icon'] !!}</svg>
                    </span>
                    <span>{{ $item['title'] }}</span>
                    @if (isset($item['badge']))
                        <span class="menu-badge">{{ $item['badge'] }}</span>
                    @endif
                </a>
            @endforeach
        </nav>
    </div>

    <div class="company-account">
        <div class="company-avatar">T</div>
        <div>
            <h3>TechNova Solutions</h3>
            <p>Premium Plan</p>
        </div>
        <button type="button">⌄</button>
    </div>
</aside>
