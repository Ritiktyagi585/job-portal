@php
    $activePage = 'final';
    $student = ['name' => 'Ananya Gupta', 'notifications' => 3];
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
    $summary = [
        'title' => 'Ready for Final Assessment?',
        'text' => 'You have completed the required training. Attempt the final assessment and get certified.',
        'stats' => [
            ['label' => 'Lessons Completed', 'value' => '28/74', 'icon' => 'LC'],
            ['label' => 'Courses Enrolled', 'value' => '4', 'icon' => 'CE'],
            ['label' => 'Total Study Time', 'value' => '12h 45m', 'icon' => 'ST'],
        ],
    ];
    $overview = [
        ['label' => 'Total Questions', 'value' => '60', 'icon' => 'TQ'],
        ['label' => 'Passing Marks', 'value' => '60%', 'icon' => 'PM'],
        ['label' => 'Time Duration', 'value' => '90 Minutes', 'icon' => 'TD'],
        ['label' => 'Total Attempts Allowed', 'value' => '3', 'icon' => 'TA'],
        ['label' => 'Current Attempts Used', 'value' => '0', 'icon' => 'CU'],
    ];
    $tips = [
        'Go through all the course materials thoroughly.',
        'Practice all quizzes and assignments.',
        'Focus on weak topics and improve your understanding.',
        'Manage your time effectively during the assessment.',
        'Ensure a stable internet connection before starting the test.',
    ];
    $attempts = [];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Assessment</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f6f9ff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:260px 1fr}.sidebar{background:#fff;border-right:1px solid #dce7f8;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 18px;border-bottom:1px solid #dce7f8}.brand img{width:205px}.menu{padding:28px 14px 18px;display:grid;gap:8px}.menu-item{min-height:42px;display:flex;align-items:center;gap:14px;padding:8px 12px;border-radius:8px;font-size:14px}.menu-item.active{background:#eaf2ff;color:#075fe4;font-weight:700}.menu-icon,.icon{width:28px;height:28px;border-radius:7px;background:#f0f5ff;color:#075fe4;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:800;flex:0 0 auto}.side-bottom{margin-top:auto;padding:18px 22px 28px;border-top:1px solid #dce7f8;display:grid;gap:12px}.bottom-link{display:flex;align-items:center;gap:14px;font-size:14px;min-height:34px}.topbar{height:76px;background:#fff;border-bottom:1px solid #dce7f8;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#061942}.user{display:flex;align-items:center;gap:12px;position:relative}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;display:flex;align-items:center;justify-content:center}.bell svg,.user button svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.bell span{position:absolute;top:-1px;right:0;width:15px;height:15px;border-radius:50%;background:#ff3045;color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;font-weight:700}.top-avatar{width:46px;height:46px;border-radius:50%;background-image:url('{{ asset('student.png') }}');background-size:220px auto;background-position:16% 28%;border:3px solid #eaf2ff}.user h3{margin:0;font-size:14px}.user button:last-child{border:0;background:transparent;cursor:pointer;display:flex}.user-menu{position:absolute;top:58px;right:0;width:155px;border:1px solid #dce7f8;border-radius:8px;background:#fff;box-shadow:0 12px 28px rgba(6,25,66,.12);display:none;z-index:5}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 30px 38px}.head h1{margin:0 0 8px;font-size:27px}.head p{margin:0 0 20px;color:#334b83;font-size:14px}.card{background:#fff;border:1px solid #dce7f8;border-radius:9px;box-shadow:0 10px 24px rgba(6,25,66,.04)}.hero{padding:22px;display:grid;grid-template-columns:165px 1fr repeat(3,170px);gap:24px;align-items:center;margin-bottom:16px}.hero-art{height:128px;border-radius:12px;background:linear-gradient(135deg,#eef5ff,#fff);display:flex;align-items:center;justify-content:center;font-size:52px}.hero h2,.section h2{margin:0 0 14px;font-size:17px}.hero p{margin:0 0 18px;color:#334b83;font-size:13px;line-height:1.7}.btn{height:38px;border-radius:5px;border:1px solid #075fe4;background:#075fe4;color:#fff;padding:0 22px;font-weight:700;cursor:pointer}.metric{min-height:118px;border-left:1px solid #dce7f8;padding-left:28px;display:flex;flex-direction:column;justify-content:center}.metric .icon{width:54px;height:54px;border-radius:12px;margin-bottom:14px}.metric strong{font-size:22px}.metric span:last-child{margin-top:8px;color:#334b83;font-size:13px}.grid{display:grid;grid-template-columns:1fr 1.28fr;gap:16px;margin-bottom:16px}.section{padding:22px}.overview-list,.tips-list{display:grid;gap:16px}.overview-row{display:grid;grid-template-columns:28px 1fr auto;gap:14px;align-items:center;font-size:13px}.tips-row{display:flex;gap:12px;align-items:flex-start;font-size:13px;color:#334b83}.check{width:18px;height:18px;border-radius:50%;background:#16a35a;color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;flex:0 0 auto}.tips-card{display:grid;grid-template-columns:1fr 190px;align-items:center}.tips-art{height:150px;border-radius:12px;background:linear-gradient(135deg,#eef5ff,#fff4df);display:flex;align-items:center;justify-content:center;font-size:58px}.attempt-card{padding:20px}.attempt-card h2{margin:0 0 16px;font-size:16px}.table-head{display:grid;grid-template-columns:1.2fr 2fr 1.5fr 1.5fr 1.5fr;padding:13px 12px;border-top:1px solid #e6eef8;border-bottom:1px solid #e6eef8;color:#061942;font-size:12px;font-weight:700}.empty{padding:40px 20px;text-align:center;color:#334b83}.empty-art{width:86px;height:86px;margin:0 auto 12px;border-radius:50%;background:#eaf2ff;display:flex;align-items:center;justify-content:center;font-size:38px}.empty h3{margin:0 0 8px;color:#061942;font-size:16px}.empty p{margin:0 0 16px;font-size:13px}@media(max-width:1200px){.layout{grid-template-columns:1fr}.sidebar{display:none}.hero{grid-template-columns:140px 1fr}.metric{border-left:0;border-top:1px solid #dce7f8;padding:18px 0 0}.grid{grid-template-columns:1fr}}@media(max-width:760px){.content{padding:22px 14px}.topbar{padding:0 14px}.hero,.tips-card{grid-template-columns:1fr}.hero-art,.tips-art{display:none}.table-head{min-width:760px}.attempt-card{overflow:auto}}
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar"><a href="/fast-track/dashboard" class="brand"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a><nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage===$item['key']?'active':'' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav><div class="side-bottom"><a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a><a class="bottom-link" href="/fast-track/login"><span class="menu-icon">LO</span><span>Logout</span></a></div></aside>
    <main><header class="topbar"><button class="hamburger">=</button><div class="user"><button class="bell"><svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg><span>{{ $student['notifications'] }}</span></button><div class="top-avatar"></div><h3>{{ $student['name'] }}</h3><button id="userMenuBtn"><svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg></button><div class="user-menu" id="userMenu"><a href="/fast-track/profile">My Profile</a><a href="/fast-track/login">Logout</a></div></div></header>
    <section class="content"><div class="head"><h1>Final Assessment</h1><p>Take the final assessment to test your knowledge and earn your certificate.</p></div>
        <article class="card hero"><div class="hero-art">🏆</div><div><h2 id="summaryTitle"></h2><p id="summaryText"></p><button class="btn">Start Final Assessment</button></div><div id="summaryStats" style="display:contents"></div></article>
        <div class="grid"><article class="card section"><h2>Assessment Overview</h2><div class="overview-list" id="overviewList"></div></article><article class="card section tips-card"><div><h2>Preparation Tips</h2><div class="tips-list" id="tipsList"></div></div><div class="tips-art">📚</div></article></div>
        <article class="card attempt-card"><h2>Assessment Attempts</h2><div class="table-head"><span>Attempt No.</span><span>Date & Time</span><span>Score</span><span>Status</span><span>Certificate</span></div><div id="attemptsBox"></div></article>
    </section></main>
</div>
<script>
    const summary=@json($summary),overview=@json($overview),tips=@json($tips),attempts=@json($attempts);
    document.getElementById('summaryTitle').textContent=summary.title;
    document.getElementById('summaryText').textContent=summary.text;
    document.getElementById('summaryStats').innerHTML=summary.stats.map(item=>`<div class="metric"><span class="icon">${item.icon}</span><strong>${item.value}</strong><span>${item.label}</span></div>`).join('');
    document.getElementById('overviewList').innerHTML=overview.map(item=>`<div class="overview-row"><span class="icon">${item.icon}</span><span>${item.label}</span><strong>${item.value}</strong></div>`).join('');
    document.getElementById('tipsList').innerHTML=tips.map(tip=>`<div class="tips-row"><span class="check">✓</span><span>${tip}</span></div>`).join('');
    document.getElementById('attemptsBox').innerHTML=attempts.length?attempts.map(a=>`<div class="table-head"><span>${a.no}</span><span>${a.date}</span><span>${a.score}</span><span>${a.status}</span><span>${a.certificate}</span></div>`).join(''):`<div class="empty"><div class="empty-art">📋</div><h3>No attempts yet!</h3><p>Start your final assessment to evaluate your learning.</p><button class="btn">Start Now</button></div>`;
    document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
</script>
</body>
</html>




