@php
    $partner = $partner ?? ['name' => 'CodeAcademy', 'role' => 'Training Partner', 'notifications' => 3];
    $menuItems = $menuItems ?? [
        ['key' => 'dashboard', 'title' => 'Dashboard', 'icon' => 'DB', 'url' => '/training-partner/dashboard'],
        ['key' => 'profile', 'title' => 'My Profile', 'icon' => 'MP', 'url' => '/training-partner/profile'],
        ['key' => 'add-course', 'title' => 'Add Course', 'icon' => 'AC', 'url' => '/training-partner/add-course'],
        ['key' => 'courses', 'title' => 'My Courses', 'icon' => 'CR', 'url' => '/training-partner/courses'],
        ['key' => 'enrollments', 'title' => 'Enrollments', 'icon' => 'EN', 'url' => '/training-partner/enrollments'],
        ['key' => 'progress', 'title' => 'Training Progress', 'icon' => 'TP', 'url' => '/training-partner/training-progress'],
        ['key' => 'assessments', 'title' => 'Assessments', 'icon' => 'AS', 'url' => '/training-partner/assessments'],
        ['key' => 'certificates', 'title' => 'Certificates', 'icon' => 'CT', 'url' => '/training-partner/certificates'],
        ['key' => 'reports', 'title' => 'Reports', 'icon' => 'RP', 'url' => '/training-partner/reports'],
        ['key' => 'payouts', 'title' => 'Payouts', 'icon' => 'PO', 'url' => '/training-partner/payouts'],
        ['key' => 'notifications', 'title' => 'Notifications', 'icon' => 'NT', 'url' => '/training-partner/notifications'],
    ];
    $activePage = $activePage ?? '';
    $topStats = $topStats ?? [];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Training Partner')</title>
    <style>
        *{box-sizing:border-box}html,body{max-width:100%;overflow-x:hidden}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#071544;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px minmax(0,1fr)}.sidebar{background:#fff;border-right:1px solid #dfe4f2;display:flex;flex-direction:column}.brand{height:88px;display:flex;align-items:center;padding:0 26px;border-bottom:1px solid #dfe4f2}.brand img{width:205px}.menu{padding:22px 16px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px;font-weight:700;position:relative}.menu-item.active{background:#f2eaff;color:#5b20e6}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f3ecff;color:#5b20e6;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.menu-dot{margin-left:auto;width:8px;height:8px;border-radius:50%;background:#8a4fff}.side-bottom{margin-top:auto;padding:0 20px 24px}.tp-promo{padding:20px;border:1px solid #eadfff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f1ff)}.tp-promo h3{margin:0 0 12px;color:#5b20e6;font-size:15px;line-height:1.6}.tp-promo p{margin:0;color:#26375f;font-size:13px;line-height:1.75}.tp-promo .promo-art{height:118px;margin-top:12px;border-radius:10px;background:linear-gradient(160deg,#efe4ff,#fff);display:flex;align-items:center;justify-content:center;font-size:48px;color:#5b20e6}.topbar{height:78px;background:#fff;border-bottom:1px solid #dfe4f2;display:flex;align-items:center;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#071544}.top-stats{display:flex;margin-left:auto}.top-stat{height:52px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e3e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:12px;position:relative;margin-left:auto}.top-stats+.user{margin-left:16px}.bell{position:relative;border:0;background:transparent;width:34px;height:34px;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#5b20e6;color:#fff;font-size:10px;font-weight:800;display:flex;align-items:center;justify-content:center}.avatar{width:40px;height:40px;border-radius:50%;background:#e9edf8;color:#5b20e6;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:900}.user h3{margin:0;font-size:12px}.user small{color:#526287}.chev{border:0;background:transparent;color:#071544;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:54px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:26px 28px 30px;min-width:0}@media(max-width:1150px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}}@media(max-width:720px){.content,.topbar{padding-left:14px;padding-right:14px}}
    </style>
    @stack('styles')
    <style>
        .sidebar-backdrop {
            display: none;
        }

        @media (max-width: 1150px) {
            body {
                overflow-x: hidden;
            }

            .layout {
                display: block !important;
                min-width: 0 !important;
                max-width: 100vw !important;
            }

            .sidebar {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 1000 !important;
                width: 286px !important;
                max-width: 86vw !important;
                height: 100vh !important;
                display: flex !important;
                transform: translateX(-105%) !important;
                transition: transform .25s ease !important;
                box-shadow: 18px 0 38px rgba(34, 23, 91, .18) !important;
                overflow-y: auto !important;
            }

            .layout.sidebar-open .sidebar {
                transform: translateX(0) !important;
            }

            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                z-index: 900;
                border: 0;
                background: rgba(7, 21, 68, .35);
            }

            .layout.sidebar-open .sidebar-backdrop {
                display: block;
            }

            .hamburger {
                width: 42px !important;
                height: 42px !important;
                border: 1px solid #dfe4f2 !important;
                border-radius: 8px !important;
                background: white !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                flex-shrink: 0 !important;
                cursor: pointer !important;
            }

            .hamburger svg,
            .bell svg,
            .chev svg {
                width: 21px;
                height: 21px;
                fill: none;
                stroke: currentColor;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .topbar {
                height: auto !important;
                min-height: 76px !important;
                display: flex !important;
                gap: 12px !important;
                padding: 12px 18px !important;
            }

            .top-stats {
                display: none !important;
            }

            .user {
                min-width: 0 !important;
                margin-left: auto !important;
                gap: 10px !important;
            }

            .avatar {
                width: 38px !important;
                height: 38px !important;
                font-size: 12px !important;
            }

            .user h3 {
                max-width: 150px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .content {
                width: 100% !important;
                min-width: 0 !important;
                padding: 22px 18px 30px !important;
            }

            .head {
                max-width: 100% !important;
            }

            .head h1 {
                font-size: 22px !important;
                line-height: 1.2 !important;
            }

            .card,
            .side-card,
            .stat-card,
            .table-card,
            .profile-card,
            .form-card,
            .page-grid,
            .main-grid {
                max-width: 100% !important;
            }

            .page-grid,
            .main-grid,
            .dashboard-grid,
            .stats-grid,
            .stat-grid,
            .cards-grid,
            .course-grid,
            .form-grid,
            .filters,
            .side-stack,
            .profile-card,
            .stats-card,
            .checklist,
            .report-layout,
            .payout-layout {
                grid-template-columns: 1fr !important;
            }

            .table-card,
            .table-wrap,
            .summary,
            .recent,
            .course-table,
            .certificate-table,
            .activity-card,
            .results-card,
            .overview-card {
                max-width: 100% !important;
                overflow-x: auto !important;
            }

            .table-head,
            .course-row,
            .enrollment-row,
            .progress-row,
            .assessment-row,
            .cert-row,
            .report-row,
            .payout-row,
            .summary-row,
            .summary-head,
            .summary-total {
                min-width: 760px;
            }

            input,
            select,
            textarea,
            button {
                max-width: 100%;
            }

            .footer,
            .pagination,
            .pages {
                flex-wrap: wrap !important;
            }
        }

        @media (max-width: 720px) {
            .content {
                padding: 20px 12px 26px !important;
            }

            .topbar {
                padding: 10px 12px !important;
            }

            .brand img {
                width: 205px !important;
            }

            .menu-item {
                min-height: 42px !important;
                font-size: 14px !important;
            }

            .user h3 {
                max-width: 118px;
            }

            .user small {
                display: none;
            }

            .bell,
            .chev {
                width: 34px !important;
                height: 34px !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
            }

            .head {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 12px !important;
            }

            .btn,
            .filter-btn,
            .outline-btn {
                max-width: 100%;
            }

            .table-head,
            .course-row,
            .enrollment-row,
            .progress-row,
            .assessment-row,
            .cert-row,
            .report-row,
            .payout-row,
            .summary-row,
            .summary-head,
            .summary-total {
                min-width: 700px;
            }

            .footer {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 12px !important;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a class="brand" href="/training-partner/dashboard"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">
                @foreach($menuItems as $item)
                    <a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}">
                        <span class="menu-icon">{{ $item['icon'] }}</span>
                        <span>{{ $item['title'] }}</span>
                        @if(!empty($item['dot']))<span class="menu-dot"></span>@endif
                    </a>
                @endforeach
            </nav>
            <div class="side-bottom">
                @hasSection('sidebarExtra')
                    @yield('sidebarExtra')
                @else
                    <div class="tp-promo"><h3>Upgrade Your Institute</h3><p>Add more courses and reach thousands of freshers.</p><div class="promo-art">TP</div></div>
                @endif
            </div>
        </aside>
        <button class="sidebar-backdrop" type="button" onclick="toggleTrainingSidebar()" aria-label="Close menu"></button>
        <!-- End Sidebar Section -->
        <main>
            <header class="topbar">
                <button class="hamburger" type="button" onclick="toggleTrainingSidebar()" aria-label="Open menu">
                    <svg viewBox="0 0 24 24"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
                </button>
                @if(count($topStats))<div class="top-stats" id="topStats"></div>@endif
                <div class="user">
                    <button class="bell" type="button" aria-label="Notifications">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>{{ $partner['notifications'] }}</span>
                    </button>
                    <div class="avatar">TP</div>
                    <div><h3>{{ $partner['name'] }}</h3><small>{{ $partner['role'] }}</small></div>
                    <button class="chev" id="userMenuBtn" type="button" aria-label="Open profile menu">
                        <svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="user-menu" id="userMenu"><a href="/training-partner/profile">Profile</a><a href="/training-partner/login">Logout</a></div>
                </div>
            </header>
            <!-- End Topbar Section -->
            <section class="content">
                @yield('content')
            </section>
            <!-- End Content Section -->
        </main>
    </div>
    <script>
        function toggleTrainingSidebar() {
            document.querySelector('.layout').classList.toggle('sidebar-open');
        }

        const commonTopStats = @json($topStats);
        const topStatsBox = document.getElementById('topStats');
        if (topStatsBox && commonTopStats.length) {
            topStatsBox.innerHTML = commonTopStats.map(item => `<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        }
        const userMenuBtn = document.getElementById('userMenuBtn');
        if (userMenuBtn) userMenuBtn.addEventListener('click', () => document.getElementById('userMenu').classList.toggle('show'));
    </script>
    @stack('scripts')
</body>
</html>
