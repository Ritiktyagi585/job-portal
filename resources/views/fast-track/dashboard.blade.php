@php
    $activePage = 'dashboard';
    $menuItems = [
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
    $activities = [
        ['title' => 'Profile updated successfully', 'date' => '14 May 2024', 'icon' => 'PR'],
        ['title' => 'Assessment completed', 'date' => '12 May 2024', 'icon' => 'AS'],
        ['title' => 'Enrolled in Full Stack Development', 'date' => '10 May 2024', 'icon' => 'EN'],
        ['title' => 'Certificate of HTML Basics earned', 'date' => '08 May 2024', 'icon' => 'CE'],
        ['title' => 'Resume uploaded', 'date' => '05 May 2024', 'icon' => 'RS'],
    ];
    $actions = [
        ['title' => 'Complete Profile', 'icon' => 'CP', 'url' => '/fast-track/profile'],
        ['title' => 'Give Assessment', 'icon' => 'GA', 'url' => '/fast-track/assessment'],
        ['title' => 'Explore Fast Track', 'icon' => 'EF', 'url' => '/fast-track/courses'],
        ['title' => 'View Training', 'icon' => 'VT', 'url' => '/fast-track/training'],
    ];
    $student = ['name' => 'Ananya Gupta', 'notifications' => 3];
    $stats = [
        ['label' => 'Profile Completion', 'value' => 75, 'class' => 'green'],
        ['label' => 'Assessment Score', 'value' => 60, 'class' => 'purple'],
    ];
    $smallStats = [
        ['label' => 'Current Training', 'value' => 1, 'icon' => 'TR'],
        ['label' => 'Notifications', 'value' => 3, 'icon' => 'NT'],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fast Track</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f6f9ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; display: grid; grid-template-columns: 250px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; }
        .brand { height: 86px; display: flex; align-items: center; padding: 0 18px; border-bottom: 1px solid #dce7f8; }
        .brand img { width: 205px; height: auto; display: block; }
        .menu { padding: 28px 14px 18px; display: grid; gap: 8px; }
        .menu-item { min-height: 42px; display: flex; align-items: center; gap: 14px; padding: 8px 12px; border-radius: 8px; color: #071743; font-size: 14px; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; font-weight: 700; }
        .menu-icon { width: 30px; height: 30px; border-radius: 7px; background: #f0f5ff; color: #075fe4; display: inline-flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 800; flex: 0 0 auto; }
        .side-bottom { margin-top: auto; padding: 18px 22px 28px; border-top: 1px solid #dce7f8; display: grid; gap: 12px; }
        .bottom-link { display: flex; align-items: center; gap: 14px; font-size: 14px; min-height: 34px; }
        .main { min-width: 0; }
        .topbar { height: 86px; background: white; border-bottom: 1px solid #dce7f8; display: flex; align-items: center; justify-content: flex-end; padding: 0 28px; }
        .user { display: flex; align-items: center; gap: 14px; }
        .bell { position: relative; width: 34px; height: 34px; border: 0; background: transparent; color: #061942; cursor: pointer; display: flex; align-items: center; justify-content: center; }
        .bell svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; top: -2px; right: -1px; width: 16px; height: 16px; border-radius: 50%; background: #ff3045; color: white; font-size: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-avatar { width: 50px; height: 50px; border-radius: 50%; background-image: url('{{ asset('student.png') }}'); background-size: 235px auto; background-position: 16% 28%; border: 3px solid #eaf2ff; }
        .user h3 { margin: 0; font-size: 15px; font-weight: 700; }
        .user button:last-child { border: 0; background: transparent; cursor: pointer; color: #061942; display: flex; align-items: center; justify-content: center; }
        .user button:last-child svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .user-menu { position: absolute; top: 62px; right: 28px; width: 160px; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 28px rgba(6,25,66,.12); display: none; overflow: hidden; z-index: 5; }
        .user-menu.show { display: block; }
        .user-menu a { display: block; padding: 12px 14px; font-size: 13px; }
        .user-menu a:hover { background: #eaf2ff; color: #075fe4; }
        .content { padding: 40px 38px; }
        .title h1 { margin: 0 0 24px; font-size: 27px; font-weight: 700; }
        .welcome { margin-bottom: 18px; }
        .welcome p { margin: 0 0 8px; font-size: 16px; color: #24344f; }
        .welcome h2 { margin: 0; font-size: 22px; font-weight: 700; }
        .dashboard-grid { display: grid; grid-template-columns: 500px 1fr; gap: 34px; align-items: start; }
        .cards { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; margin-bottom: 18px; }
        .card { background: white; border: 1px solid #dce7f8; border-radius: 9px; box-shadow: 0 10px 24px rgba(6,25,66,.04); }
        .stat-card { min-height: 190px; padding: 24px; display: flex; align-items: center; justify-content: center; text-align: center; }
        .ring { width: 116px; height: 116px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 28px; font-weight: 700; color: #061942; }
        .green { background: conic-gradient(#19a85b 0 75%, #e9edf5 75% 100%); }
        .purple { background: conic-gradient(#7744eb 0 60%, #e9edf5 60% 100%); }
        .ring span { width: 86px; height: 86px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; }
        .stat-card h3 { margin: 0; font-size: 16px; line-height: 1.35; font-weight: 500; }
        .mini-stat { min-height: 125px; padding: 24px; display: grid; grid-template-columns: 64px 1fr; align-items: center; gap: 16px; }
        .mini-stat .big { font-size: 26px; font-weight: 700; margin-bottom: 6px; }
        .mini-stat p { margin: 0; font-size: 14px; line-height: 1.35; }
        .quick { padding: 20px; }
        .quick h3, .activity h3 { margin: 0 0 18px; font-size: 18px; font-weight: 700; }
        .quick-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
        .action { min-height: 132px; border: 1px solid #dce7f8; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 12px; text-align: center; color: #061942; font-size: 14px; line-height: 1.35; }
        .action .menu-icon { width: 40px; height: 40px; font-size: 10px; }
        .activity { padding: 26px 28px; margin-bottom: 34px; }
        .activity-row { display: grid; grid-template-columns: 44px 1fr auto; align-items: center; gap: 14px; padding: 15px 0; border-bottom: 1px solid #e5edf8; font-size: 13px; }
        .activity-row:last-child { border-bottom: 0; }
        .activity-row time { color: #24344f; white-space: nowrap; }
        .career { min-height: 220px; padding: 34px; background: linear-gradient(100deg, #ffffff 0%, #eef5ff 100%); position: relative; overflow: hidden; display: flex; align-items: center; }
        .career h3 { margin: 0 0 16px; font-size: 22px; }
        .career p { margin: 0 0 26px; font-size: 15px; line-height: 1.55; max-width: 340px; }
        .primary { height: 44px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 24px; font-size: 14px; font-weight: 700; cursor: pointer; }
        .rocket { position: absolute; right: 48px; bottom: 28px; width: 155px; height: 155px; border-radius: 50%; background: #e1edff; color: #075fe4; display: flex; align-items: center; justify-content: center; font-size: 58px; transform: rotate(-28deg); }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .sidebar { display: none; } .dashboard-grid { grid-template-columns: 1fr; } }
        @media (max-width: 680px) { .content { padding: 26px 14px; } .topbar { padding: 0 14px; } .cards, .quick-grid { grid-template-columns: 1fr; } .activity-row { grid-template-columns: 38px 1fr; } .activity-row time { grid-column: 2; } .rocket { display: none; } }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a href="/fast-track/dashboard" class="brand"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">
                @foreach ($menuItems as $item)
                    <a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}">
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

        <main class="main">
            <header class="topbar">
                <div class="user">
                    <button class="bell" type="button" aria-label="Notifications">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>{{ $student['notifications'] }}</span>
                    </button>
                    <div class="top-avatar"></div>
                    <h3>{{ $student['name'] }}</h3>
                    <button type="button" id="userMenuBtn" aria-label="Open account menu">
                        <svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="user-menu" id="userMenu">
                        <a href="/fast-track/profile">My Profile</a>
                        <a href="/fast-track/login">Logout</a>
                    </div>
                </div>
            </header>

            <section class="content">
                <div class="title"><h1>Dashboard</h1></div>
                <div class="welcome"><p>Welcome back,</p><h2>{{ $student['name'] }}!</h2></div>
                <div class="dashboard-grid">
                    <div>
                        <div class="cards">
                            @foreach ($stats as $stat)
                                <article class="card stat-card">
                                    <div>
                                        <div class="ring {{ $stat['class'] }}" style="background: conic-gradient({{ $stat['class'] === 'green' ? '#19a85b' : '#7744eb' }} 0 {{ $stat['value'] }}%, #e9edf5 {{ $stat['value'] }}% 100%);"><span>{{ $stat['value'] }}%</span></div>
                                        <h3>{!! str_replace(' ', '<br>', $stat['label']) !!}</h3>
                                    </div>
                                </article>
                            @endforeach
                            @foreach ($smallStats as $stat)
                                <article class="card mini-stat"><span class="menu-icon">{{ $stat['icon'] }}</span><div><div class="big">{{ $stat['value'] }}</div><p>{!! str_replace(' ', '<br>', $stat['label']) !!}</p></div></article>
                            @endforeach
                        </div>
                        <article class="card quick">
                            <h3>Quick Actions</h3>
                            <div class="quick-grid">
                                @foreach ($actions as $action)
                                    <a class="action" href="{{ $action['url'] }}"><span class="menu-icon">{{ $action['icon'] }}</span><span>{{ $action['title'] }}</span></a>
                                @endforeach
                            </div>
                        </article>
                    </div>
                    <div>
                        <article class="card activity">
                            <h3>Recent Activity</h3>
                            @foreach ($activities as $item)
                                <div class="activity-row"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span><time>{{ $item['date'] }}</time></div>
                            @endforeach
                        </article>
                        <article class="card career">
                            <div><h3>Fast Track Your Career</h3><p>Enroll in Fast Track Courses and get placed in top companies.</p><button class="primary" type="button">Explore Courses</button></div>
                            <div class="rocket">^</div>
                        </article>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script>
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');
        userMenuBtn.addEventListener('click', function () {
            userMenu.classList.toggle('show');
        });
        document.addEventListener('click', function (event) {
            if (!userMenu.contains(event.target) && !userMenuBtn.contains(event.target)) {
                userMenu.classList.remove('show');
            }
        });
    </script>
</body>
</html>




