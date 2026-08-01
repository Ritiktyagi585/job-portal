@php
    $activePage = 'dashboard';
    $partner = ['name' => 'CodeAcademy', 'role' => 'Training Partner', 'notifications' => 3];
    $menuItems = [
        ['key' => 'dashboard', 'title' => 'Dashboard', 'icon' => 'DB', 'url' => '/training-partner/dashboard'],
        ['key' => 'profile', 'title' => 'My Profile', 'icon' => 'MP', 'url' => '/training-partner/profile'],
        ['key' => 'add-course', 'title' => 'Add Course', 'icon' => 'AC', 'url' => '/training-partner/add-course'],
        ['key' => 'courses', 'title' => 'Courses', 'icon' => 'CR', 'url' => '/training-partner/courses'],
        ['key' => 'enrollments', 'title' => 'Enrollments', 'icon' => 'EN', 'url' => '/training-partner/enrollments'],
        ['key' => 'progress', 'title' => 'Training Progress', 'icon' => 'TP', 'url' => '/training-partner/training-progress'],
        ['key' => 'assessments', 'title' => 'Assessments', 'icon' => 'AS', 'url' => '/training-partner/assessments'],
        ['key' => 'certificates', 'title' => 'Certificates', 'icon' => 'CT', 'url' => '/training-partner/certificates'],
        ['key' => 'reports', 'title' => 'Reports', 'icon' => 'RP', 'url' => '#'],
        ['key' => 'payouts', 'title' => 'Payouts', 'icon' => 'PO', 'url' => '#'],
        ['key' => 'notifications', 'title' => 'Notifications', 'icon' => 'NT', 'url' => '#', 'dot' => true],
    ];
    $stats = [
        ['label' => 'Total Courses', 'value' => '12', 'hint' => 'Active', 'icon' => 'TC'],
        ['label' => 'Total Enrollments', 'value' => '1,250', 'hint' => 'All Courses', 'icon' => 'TE'],
        ['label' => 'Active Students', 'value' => '820', 'hint' => 'Currently Learning', 'icon' => 'AS'],
        ['label' => 'Completed Students', 'value' => '430', 'hint' => 'All Courses', 'icon' => 'CS'],
    ];
    $activities = [
        ['title' => 'New Course Added', 'text' => 'React for Beginners', 'time' => '2 min ago', 'icon' => 'NC'],
        ['title' => 'New Enrollment', 'text' => 'Ananya Gupta enrolled in Full Stack Development', 'time' => '15 min ago', 'icon' => 'NE'],
        ['title' => 'Progress Updated', 'text' => 'Priya Singh completed 40% in React', 'time' => '30 min ago', 'icon' => 'PU'],
        ['title' => 'Assessment Submitted', 'text' => 'Rohit Kumar submitted in HTML Assignment', 'time' => '1 hour ago', 'icon' => 'AS'],
    ];
    $chart = [
        ['label' => '1 May', 'value' => 250],
        ['label' => '8 May', 'value' => 760],
        ['label' => '15 May', 'value' => 1050],
        ['label' => '22 May', 'value' => 780],
        ['label' => '26 May', 'value' => 1320],
        ['label' => '29 May', 'value' => 1580],
    ];
    $performance = [
        ['label' => 'Total Enrollments', 'value' => '1,250', 'growth' => '12%', 'icon' => 'TE'],
        ['label' => 'Course Completions', 'value' => '430', 'growth' => '15%', 'icon' => 'CC'],
        ['label' => 'Assessments Submitted', 'value' => '980', 'growth' => '10%', 'icon' => 'AS'],
    ];
    $actions = [
        ['title' => 'Add New Course', 'text' => 'Create and publish a new course', 'icon' => '+', 'url' => '#'],
        ['title' => 'View Enrollments', 'text' => 'See all students and their progress', 'icon' => 'EN', 'url' => '#'],
        ['title' => 'Review Assessments', 'text' => 'Evaluate and provide feedback', 'icon' => 'RA', 'url' => '#'],
        ['title' => 'Check Reports', 'text' => 'View detailed reports and analytics', 'icon' => 'RP', 'url' => '#'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Partner Dashboard</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}
        a{text-decoration:none;color:inherit}
        .layout{min-height:100vh;display:grid;grid-template-columns:270px 1fr}
        .sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}
        .brand{height:96px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}
        .brand img{width:205px}
        .menu{padding:22px 18px 18px;display:grid;gap:8px}
        .menu-item{min-height:46px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:15px;position:relative}
        .menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}
        .menu-icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}
        .menu-dot{margin-left:auto;width:8px;height:8px;border-radius:50%;background:#8a4fff}
        .side-bottom{margin-top:auto;padding:18px 22px 30px;border-top:1px solid #dddff0;display:grid;gap:18px}
        .bottom-link{display:flex;align-items:center;gap:16px;min-height:38px;color:#26375f;font-size:15px}
        .topbar{height:96px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:flex-end;padding:0 34px}
        .user{display:flex;align-items:center;gap:16px;position:relative}
        .bell{position:relative;width:38px;height:38px;border:0;background:transparent;color:#0a1748;cursor:pointer}
        .bell span{position:absolute;top:1px;right:2px;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}
        .avatar{width:56px;height:56px;border-radius:14px;background:#f0eaff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:900}
        .user h3{margin:0 0 5px;font-size:15px}.user p{margin:0;color:#526287;font-size:12px}
        .chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}
        .user-menu{position:absolute;right:0;top:66px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}
        .user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}
        .content{padding:30px 40px 34px}
        .head h1{margin:0 0 10px;font-size:30px;font-weight:800}.head p{margin:0 0 24px;color:#526287;font-size:15px}.head strong{color:#5b2ce1}
        .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:18px}
        .card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}
        .stat-card{min-height:142px;padding:24px;display:grid;grid-template-columns:62px 1fr;gap:18px;align-items:center}
        .icon{width:56px;height:56px;border-radius:14px;background:#f0eaff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:11px;font-weight:900;flex:0 0 auto}
        .stat-card h2{margin:0 0 12px;font-size:30px}.stat-card p{margin:0 0 12px;color:#526287;font-size:13px}.stat-card small{color:#089845;font-size:13px;font-weight:800}
        .middle{display:grid;grid-template-columns:1fr 1.14fr;gap:18px;margin-bottom:18px}
        .panel{padding:24px}.panel-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}.panel-title{display:flex;align-items:center;gap:14px}.panel h2{margin:0;font-size:17px}.panel a,.panel select{color:#5b2ce1;font-size:12px;font-weight:800}.panel select{height:36px;border:1px solid #dddff0;border-radius:7px;background:#fff;padding:0 12px;color:#26375f}
        .activity-list{display:grid;gap:0;position:relative}.activity-list:before{content:"";position:absolute;left:6px;top:24px;bottom:24px;width:1px;background:#dddff0}
        .activity{display:grid;grid-template-columns:56px 1fr auto;gap:14px;align-items:center;padding:14px 0;border-bottom:1px solid #edf0f8;position:relative}.activity:before{content:"";position:absolute;left:-21px;width:6px;height:6px;border-radius:50%;background:#d9d0ff}.activity:last-child{border-bottom:0}
        .activity h3{margin:0 0 7px;font-size:14px}.activity p{margin:0;color:#526287;font-size:12px}.activity time{color:#526287;font-size:12px}
        .chart-wrap{padding:2px 0 6px}.chart-title{font-size:13px;font-weight:800;margin-bottom:12px}.chart{width:100%;height:190px}.perf-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border:1px solid #dddff0;border-radius:9px;margin-top:14px;overflow:hidden}.perf{display:grid;grid-template-columns:50px 1fr;gap:12px;align-items:center;padding:16px;border-right:1px solid #dddff0}.perf:last-child{border-right:0}.perf .icon{width:42px;height:42px}.perf strong{font-size:15px}.perf p{margin:3px 0;color:#526287;font-size:11px}.perf small{color:#08a04b;font-weight:800;font-size:11px}
        .quick{padding:22px;margin-top:18px}.quick-head{display:flex;align-items:center;gap:14px;margin-bottom:16px}.quick h2{margin:0;font-size:17px}.actions{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}.action{border:1px solid #dddff0;border-radius:9px;padding:18px;display:grid;grid-template-columns:56px 1fr 22px;gap:12px;align-items:center;background:#fff}.action:first-child .icon{background:#7b45ee;color:#fff;font-size:28px}.action h3{margin:0 0 6px;font-size:14px}.action p{margin:0;color:#526287;font-size:12px;line-height:1.5}.arrow{color:#5b2ce1;font-size:22px;font-weight:900}
        @media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.stats-grid,.actions{grid-template-columns:repeat(2,1fr)}.middle{grid-template-columns:1fr}}
        @media(max-width:720px){.topbar{height:76px;padding:0 14px}.content{padding:22px 14px}.stats-grid,.actions,.perf-grid{grid-template-columns:1fr}.stat-card{min-height:110px}.activity{grid-template-columns:48px 1fr}.activity time{grid-column:2}.perf{border-right:0;border-bottom:1px solid #dddff0}.perf:last-child{border-bottom:0}}
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
                <a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a>
                <a class="bottom-link" href="/training-partner/login"><span class="menu-icon">LO</span><span>Logout</span></a>
            </div>
        </aside>
        <!-- End Sidebar Section -->

        <main>
            <header class="topbar">
                <div class="user">
                    <button class="bell">♢<span>{{ $partner['notifications'] }}</span></button>
                    <div class="avatar">CA</div>
                    <div><h3>{{ $partner['name'] }}</h3><p>{{ $partner['role'] }}</p></div>
                    <button class="chev" id="userMenuBtn">⌄</button>
                    <div class="user-menu" id="userMenu"><a href="#">My Profile</a><a href="/training-partner/login">Logout</a></div>
                </div>
            </header>
            <!-- End Topbar Section -->

            <section class="content">
                <div class="head">
                    <h1>Training Partner Dashboard</h1>
                    <p>Welcome back, <strong>{{ $partner['name'] }}!</strong></p>
                </div>
                <!-- End Header Section -->

                <div class="stats-grid" id="stats"></div>
                <!-- End Stats Section -->

                <div class="middle">
                    <article class="card panel">
                        <div class="panel-head"><div class="panel-title"><span class="icon">RA</span><h2>Recent Activity</h2></div><a href="#">View All Activity</a></div>
                        <div class="activity-list" id="activities"></div>
                    </article>
                    <!-- End Recent Activity Section -->

                    <article class="card panel">
                        <div class="panel-head"><div class="panel-title"><span class="icon">CP</span><h2>Course Performance Overview</h2></div><select id="courseFilter"><option>All Courses</option><option>React for Beginners</option><option>Full Stack Development</option></select></div>
                        <div class="chart-wrap"><div class="chart-title">Enrollment Trend (This Month)</div><svg class="chart" id="chart" viewBox="0 0 620 190" preserveAspectRatio="none"></svg></div>
                        <div class="perf-grid" id="performance"></div>
                    </article>
                    <!-- End Performance Section -->
                </div>

                <article class="card quick">
                    <div class="quick-head"><span class="icon">QA</span><h2>Quick Actions</h2></div>
                    <div class="actions" id="actions"></div>
                </article>
                <!-- End Quick Actions Section -->
            </section>
            <!-- End Content Section -->
        </main>
    </div>

    <script>
        const stats = @json($stats);
        const activities = @json($activities);
        const chartData = @json($chart);
        const performance = @json($performance);
        const actions = @json($actions);

        document.getElementById('stats').innerHTML = stats.map(item => `
            <article class="card stat-card">
                <span class="icon">${item.icon}</span>
                <div><p>${item.label}</p><h2>${item.value}</h2><small>${item.hint}</small></div>
            </article>
        `).join('');

        document.getElementById('activities').innerHTML = activities.map(item => `
            <div class="activity">
                <span class="icon">${item.icon}</span>
                <div><h3>${item.title}</h3><p>${item.text}</p></div>
                <time>${item.time}</time>
            </div>
        `).join('');

        function renderChart(data) {
            const svg = document.getElementById('chart');
            const max = Math.max(...data.map(item => item.value));
            const points = data.map((item, index) => {
                const x = 38 + index * ((620 - 76) / (data.length - 1));
                const y = 150 - (item.value / max) * 120;
                return { ...item, x, y };
            });
            const line = points.map(point => `${point.x},${point.y}`).join(' ');
            const area = `38,150 ${line} ${points[points.length - 1].x},150`;
            svg.innerHTML = `
                <defs><linearGradient id="fillPurple" x1="0" x2="0" y1="0" y2="1"><stop offset="0" stop-color="#7b45ee" stop-opacity=".22"/><stop offset="1" stop-color="#7b45ee" stop-opacity="0"/></linearGradient></defs>
                <line x1="38" y1="30" x2="38" y2="150" stroke="#e5e9f4"/>
                <line x1="38" y1="150" x2="592" y2="150" stroke="#e5e9f4"/>
                <text x="8" y="34" font-size="11" fill="#526287">1.5K</text><text x="16" y="92" font-size="11" fill="#526287">1K</text><text x="16" y="150" font-size="11" fill="#526287">500</text>
                <polygon points="${area}" fill="url(#fillPurple)"></polygon>
                <polyline points="${line}" fill="none" stroke="#6a2df0" stroke-width="3"></polyline>
                ${points.map(point => `<circle cx="${point.x}" cy="${point.y}" r="5" fill="#6a2df0"></circle><text x="${point.x - 18}" y="178" font-size="11" fill="#526287">${point.label}</text>`).join('')}
            `;
        }

        document.getElementById('performance').innerHTML = performance.map(item => `
            <div class="perf"><span class="icon">${item.icon}</span><div><strong>${item.value}</strong><p>${item.label}</p><small>↑ ${item.growth}</small></div></div>
        `).join('');

        document.getElementById('actions').innerHTML = actions.map(item => `
            <a class="action" href="${item.url}"><span class="icon">${item.icon}</span><div><h3>${item.title}</h3><p>${item.text}</p></div><span class="arrow">›</span></a>
        `).join('');

        document.getElementById('courseFilter').addEventListener('change', event => {
            const shifted = event.target.value === 'All Courses' ? chartData : chartData.map((item, index) => ({ ...item, value: Math.max(120, item.value - (index + 1) * 80) }));
            renderChart(shifted);
        });

        document.getElementById('userMenuBtn').addEventListener('click', () => {
            document.getElementById('userMenu').classList.toggle('show');
        });

        renderChart(chartData);
    </script>
</body>
</html>






