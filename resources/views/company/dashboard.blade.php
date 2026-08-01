@php
    $activePage = 'dashboard';

    $stats = [
        ['label' => 'Jobs Posted', 'value' => '31', 'link' => 'View all', 'color' => 'blue', 'icon' => 'briefcase'],
        ['label' => 'Applications', 'value' => '56', 'link' => 'View all', 'color' => 'green', 'icon' => 'users'],
        ['label' => 'Shortlisted', 'value' => '12', 'link' => 'View all', 'color' => 'orange', 'icon' => 'star'],
        ['label' => 'Interviews', 'value' => '5', 'link' => 'View all', 'color' => 'purple', 'icon' => 'calendar'],
        ['label' => 'Hired', 'value' => '3', 'link' => 'View all', 'color' => 'green', 'icon' => 'user-check'],
    ];

    $activities = [
        ['title' => 'New application received for UI/UX Designer', 'time' => '2 min ago', 'color' => 'blue', 'icon' => 'briefcase'],
        ['title' => '3 candidates shortlisted for React Developer', 'time' => '1 hour ago', 'color' => 'green', 'icon' => 'user'],
        ['title' => 'Interview scheduled with Rohit Kumar', 'time' => '3 hours ago', 'color' => 'purple', 'icon' => 'calendar'],
        ['title' => 'Anjali Verma hired for UI/UX Designer', 'time' => '1 day ago', 'color' => 'orange', 'icon' => 'user-check'],
        ['title' => 'Invoice generated for Premium Plan', 'time' => '2 days ago', 'color' => 'pink', 'icon' => 'file'],
    ];

    $quickActions = [
        ['title' => 'Post a New Job', 'text' => 'Find the best talent for your company', 'color' => 'blue', 'icon' => 'briefcase'],
        ['title' => 'View Applications', 'text' => 'Review candidates who applied', 'color' => 'green', 'icon' => 'users'],
        ['title' => 'Shortlist Candidates', 'text' => 'Pick the best matches', 'color' => 'purple', 'icon' => 'star'],
        ['title' => 'Schedule Interview', 'text' => 'Connect with candidates', 'color' => 'orange', 'icon' => 'calendar'],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard - OnlyFreshers</title>

    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; display: grid; grid-template-columns: 250px 1fr; }
        .company-sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 0 18px 28px; box-sizing: border-box; }
        .company-logo img { width: 205px; height: auto; display: block; margin: 0 0 42px; }
        .company-menu { display: grid; gap: 8px; }
        .company-menu-item { position: relative; display: flex; align-items: center; gap: 14px; min-height: 44px; padding: 6px 14px; border-radius: 8px; color: #24344f; font-size: 14px; font-weight: 500; box-sizing: border-box; }
        .company-menu-item.active { color: #075fe4; background: #eaf2ff; font-weight: 700; }
        .company-menu-icon { width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .company-menu-icon svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .menu-badge { margin-left: auto; min-width: 22px; height: 22px; border-radius: 50%; background: #ff3045; color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; }
        .company-account { display: flex; align-items: center; gap: 12px; padding: 14px; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 8px 22px rgba(6, 25, 66, 0.04); }
        .company-avatar, .top-avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .company-avatar { width: 34px; height: 34px; }
        .company-account h3 { margin: 0 0 4px; font-size: 14px; font-weight: 700; }
        .company-account p { margin: 0; color: #075fe4; font-size: 12px; }
        .company-account button { margin-left: auto; border: 0; background: transparent; color: #061942; cursor: pointer; font-size: 18px; }
        .main { padding: 0 38px 38px; box-sizing: border-box; }
        .topbar { min-height: 100px; display: flex; align-items: center; justify-content: space-between; gap: 24px; margin-bottom: 28px; }
        .page-title h1 { margin: 0 0 10px; font-size: 26px; font-weight: 700; }
        .page-title p { margin: 0; color: #24344f; font-size: 14px; }
        .top-actions { display: flex; align-items: center; gap: 18px; }
        .bell { position: relative; width: 42px; height: 42px; border: 0; background: white; border-radius: 50%; color: #061942; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(6, 25, 66, 0.05); }
        .bell svg, .dash-icon svg, .action-icon svg { fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell svg { width: 23px; height: 23px; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; border-left: 1px solid #dce7f8; padding-left: 22px; }
        .top-avatar { width: 46px; height: 46px; font-size: 20px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .welcome-card, .stat-card, .panel, .quick-card { border: 1px solid #dce7f8; background: white; border-radius: 8px; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); }
        .welcome-card { min-height: 170px; padding: 48px 32px; box-sizing: border-box; margin-bottom: 20px; }
        .welcome-card h2 { margin: 0 0 10px; font-size: 22px; line-height: 1.25; font-weight: 700; }
        .welcome-card h2 strong { display: block; font-size: 28px; }
        .welcome-card p { margin: 0; color: #34445e; font-size: 14px; }
        .stats-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px; margin-bottom: 22px; }
        .stat-card { min-height: 142px; padding: 22px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; gap: 18px; }
        .dash-icon, .action-icon { width: 58px; height: 58px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .dash-icon svg, .action-icon svg { width: 28px; height: 28px; }
        .blue { color: #075fe4; background: #eaf2ff; }
        .green { color: #00ad6f; background: #e8fbf3; }
        .orange { color: #ff9c22; background: #fff5e6; }
        .purple { color: #6c50ff; background: #f0edff; }
        .pink { color: #ef3061; background: #fff0f5; }
        .stat-content h3 { margin: 0 0 5px; font-size: 25px; font-weight: 700; }
        .stat-content p { margin: 0 0 15px; color: #34445e; font-size: 12px; }
        .stat-content a { color: #075fe4; font-size: 12px; font-weight: 700; }
        .content-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 20px; }
        .panel { padding: 24px; box-sizing: border-box; }
        .panel h2 { margin: 0 0 18px; font-size: 18px; font-weight: 700; }
        .activity-row { display: grid; grid-template-columns: 48px 1fr auto; align-items: center; gap: 18px; padding: 11px 8px; border-bottom: 1px solid #edf2fb; }
        .activity-row:last-of-type { border-bottom: 0; }
        .activity-row h3 { margin: 0; font-size: 12px; font-weight: 700; }
        .activity-row time { color: #34445e; font-size: 12px; }
        .activity-icon { width: 42px; height: 42px; border-radius: 9px; display: flex; align-items: center; justify-content: center; }
        .activity-icon svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .view-button { display: block; width: 170px; height: 42px; margin: 22px auto 0; border: 1px solid #bfd4f5; border-radius: 8px; background: white; color: #075fe4; font-weight: 700; cursor: pointer; }
        .quick-list { display: grid; gap: 12px; }
        .quick-card { min-height: 76px; padding: 13px 18px; display: grid; grid-template-columns: 52px 1fr auto; align-items: center; gap: 16px; }
        .quick-card h3 { margin: 0 0 5px; font-size: 13px; font-weight: 700; }
        .quick-card p { margin: 0; color: #34445e; font-size: 12px; }
        .arrow { font-size: 30px; line-height: 1; color: #061942; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-sidebar { position: static; } .company-menu { grid-template-columns: repeat(2, 1fr); } .stats-grid { grid-template-columns: repeat(2, 1fr); } .content-grid { grid-template-columns: 1fr; } }
        @media (max-width: 650px) { .main { padding: 22px 14px; } .topbar, .top-user { align-items: flex-start; } .topbar { flex-direction: column; } .company-menu, .stats-grid { grid-template-columns: 1fr; } .welcome-card { padding: 30px 20px; } .welcome-card h2 strong { font-size: 27px; } .activity-row { grid-template-columns: 42px 1fr; } .activity-row time { grid-column: 2; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Company Dashboard</h1>
                    <p>Overview of your hiring activities and company updates.</p>
                </div>
                <div class="top-actions">
                    <button class="bell" type="button">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>3</span>
                    </button>
                    <div class="top-user">
                        <div class="top-avatar">T</div>
                        <div>
                            <h3>TechNova Solutions</h3>
                            <p>Company</p>
                        </div>
                        <button type="button">⌄</button>
                    </div>
                </div>
            </header>

            <section class="welcome-card">
                <h2>Welcome back,<strong>TechNova Solutions 👋</strong></h2>
                <p>Here's what's happening today.</p>
            </section>

            <section class="stats-grid">
                @foreach ($stats as $stat)
                    <div class="stat-card">
                        <div class="dash-icon {{ $stat['color'] }}">
                            @include('company.partials.icon', ['icon' => $stat['icon']])
                        </div>
                        <div class="stat-content">
                            <h3>{{ $stat['value'] }}</h3>
                            <p>{{ $stat['label'] }}</p>
                            <a href="#">{{ $stat['link'] }}</a>
                        </div>
                    </div>
                @endforeach
            </section>

            <section class="content-grid">
                <div class="panel">
                    <h2>Recent Activities</h2>
                    @foreach ($activities as $activity)
                        <div class="activity-row">
                            <div class="activity-icon {{ $activity['color'] }}">
                                @include('company.partials.icon', ['icon' => $activity['icon']])
                            </div>
                            <h3>{{ $activity['title'] }}</h3>
                            <time>{{ $activity['time'] }}</time>
                        </div>
                    @endforeach
                    <button class="view-button" type="button">View All Activities</button>
                </div>

                <div class="panel">
                    <h2>Quick Actions</h2>
                    <div class="quick-list">
                        @foreach ($quickActions as $action)
                            <a href="#" class="quick-card">
                                <div class="action-icon {{ $action['color'] }}">
                                    @include('company.partials.icon', ['icon' => $action['icon']])
                                </div>
                                <div>
                                    <h3>{{ $action['title'] }}</h3>
                                    <p>{{ $action['text'] }}</p>
                                </div>
                                <div class="arrow">›</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
