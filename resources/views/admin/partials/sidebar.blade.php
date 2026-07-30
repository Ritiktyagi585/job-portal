@php
    $adminMenuItems = [
        ['title' => 'Dashboard', 'icon' => '<path d="M4 11l8-7 8 7"></path><path d="M6 10v9h5v-5h2v5h5v-9"></path>', 'url' => '/admin/dashboard', 'key' => 'dashboard'],
        ['title' => 'Freshers', 'icon' => '<circle cx="9" cy="8" r="3"></circle><path d="M3 19c0-3 2.5-5 6-5"></path><circle cx="17" cy="9" r="2.5"></circle><path d="M14 19c0-2.4 1.8-4 4-4"></path>', 'url' => '/admin/freshers', 'key' => 'freshers'],
        ['title' => 'Companies', 'icon' => '<path d="M4 21V5a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v16"></path><path d="M15 9h4a1 1 0 0 1 1 1v11"></path><path d="M8 8h3M8 12h3M8 16h3M18 13h.01M18 17h.01"></path>', 'url' => '/admin/companies', 'key' => 'companies'],
        ['title' => 'Training Partners', 'icon' => '<path d="M3 8l9-4 9 4-9 4-9-4z"></path><path d="M7 10v5c0 1.5 2.3 3 5 3s5-1.5 5-3v-5"></path>', 'url' => '/admin/training-partners', 'key' => 'training-partners'],
        ['title' => 'Jobs', 'icon' => '<rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16"></path>', 'url' => '/admin/jobs', 'key' => 'jobs'],
        ['title' => 'Courses', 'icon' => '<path d="M4 5h7a3 3 0 0 1 3 3v11a3 3 0 0 0-3-3H4z"></path><path d="M20 5h-7a3 3 0 0 0-3 3v11a3 3 0 0 1 3-3h7z"></path>', 'url' => '/admin/courses', 'key' => 'courses'],
        ['title' => 'Assessments', 'icon' => '<rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 8h6M9 12l2 2 4-4"></path>', 'url' => '/admin/assessments', 'key' => 'assessments'],
        ['title' => 'Reports', 'icon' => '<path d="M5 19V9"></path><path d="M12 19V5"></path><path d="M19 19v-7"></path><path d="M3 19h18"></path>', 'url' => '/admin/reports', 'key' => 'reports'],
        ['title' => 'Notifications', 'icon' => '<path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path>', 'url' => '/admin/notifications', 'key' => 'notifications'],
        ['title' => 'Settings', 'icon' => '<circle cx="12" cy="12" r="3"></circle><path d="M19 12a7 7 0 0 0-.1-1l2-1.5-2-3.5-2.4 1a7 7 0 0 0-1.7-1L14.5 3h-5l-.4 3a7 7 0 0 0-1.7 1L5 6 3 9.5 5 11a7 7 0 0 0 0 2l-2 1.5L5 18l2.4-1a7 7 0 0 0 1.7 1l.4 3h5l.4-3a7 7 0 0 0 1.7-1L19 18l2-3.5-2-1.5a7 7 0 0 0 .1-1z"></path>', 'url' => '/admin/settings', 'key' => 'settings'],
        ['title' => 'System Logs', 'icon' => '<path d="M12 3l8 4v6c0 5-3.5 8-8 8s-8-3-8-8V7l8-4z"></path><path d="M9 12h6"></path>', 'url' => '/admin/system-logs', 'key' => 'logs'],
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
                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">{!! $item['icon'] !!}</svg>
                    </span>
                    {{ $item['title'] }}
                </a>
            @endforeach
        </nav>
    </div>

    <div class="admin-profile">
        <div class="profile-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path>
            </svg>
        </div>
        <div>
            <h3>Admin Panel</h3>
            <p>Super Admin</p>
        </div>
        <button class="profile-menu-button" type="button" id="profileMenuButton" aria-label="Open admin menu">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M6 9l6 6 6-6"></path>
            </svg>
        </button>
        <div class="profile-menu" id="profileMenu">
            <div class="profile-email">admin@ofc.com</div>
            <a href="/admin/login" id="adminLogout">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <path d="M16 17l5-5-5-5"></path>
                    <path d="M21 12H9"></path>
                </svg>
                Logout
            </a>
        </div>
    </div>
</aside>

<style>
    .admin-profile { position: relative; }
    .profile-menu-button {
        margin-left: auto;
        width: 30px;
        height: 30px;
        border: 1px solid #dce7f8;
        border-radius: 7px;
        background: white;
        color: #075fe4;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .profile-menu-button svg {
        width: 16px;
        height: 16px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .profile-menu {
        position: absolute;
        right: 0;
        bottom: 58px;
        width: 168px;
        padding: 8px;
        border: 1px solid #dce7f8;
        border-radius: 8px;
        background: white;
        box-shadow: 0 12px 28px rgba(6, 25, 66, 0.12);
        display: none;
        z-index: 20;
    }
    .profile-menu.show { display: block; }
    .profile-email {
        padding: 8px 10px;
        color: #52607a;
        font-size: 12px;
        border-bottom: 1px solid #edf2fb;
        margin-bottom: 6px;
    }
    .profile-menu a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 10px;
        border-radius: 7px;
        color: #ff1f2f;
        font-size: 13px;
        font-weight: 700;
    }
    .profile-menu a:hover { background: #fff0f1; }
    .profile-menu a svg {
        width: 16px;
        height: 16px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
</style>

<script>
    if (localStorage.getItem('onlyFreshersAdminLogin') !== 'yes') {
        window.location.href = '/admin/login';
    }

    const profileMenuButton = document.getElementById('profileMenuButton');
    const profileMenu = document.getElementById('profileMenu');
    const adminLogout = document.getElementById('adminLogout');

    if (profileMenuButton && profileMenu) {
        profileMenuButton.addEventListener('click', function () {
            profileMenu.classList.toggle('show');
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('.admin-profile')) {
                profileMenu.classList.remove('show');
            }
        });
    }

    if (adminLogout) {
        adminLogout.addEventListener('click', function () {
            localStorage.removeItem('onlyFreshersAdminLogin');
        });
    }
</script>
