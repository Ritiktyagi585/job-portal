@php
    $activePage = 'progress';
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
    $cards = [
        ['label' => 'Enrolled Courses', 'value' => '4', 'link' => 'View Courses', 'icon' => 'EC'],
        ['label' => 'Courses Completed', 'value' => '1', 'link' => 'View Certificate', 'icon' => 'CC'],
        ['label' => 'Lessons Completed', 'value' => '28/74', 'link' => 'View Lessons', 'icon' => 'LC'],
        ['label' => 'Total Study Time', 'value' => '12h 45m', 'link' => 'View Reports', 'icon' => 'ST'],
    ];
    $skills = [
        ['name' => 'HTML & CSS', 'score' => 80],
        ['name' => 'JavaScript', 'score' => 65],
        ['name' => 'React.js', 'score' => 50],
        ['name' => 'Node.js', 'score' => 40],
        ['name' => 'MongoDB', 'score' => 35],
        ['name' => 'Problem Solving', 'score' => 60],
    ];
    $courses = [
        ['name' => 'Full Stack Development', 'duration' => '12 Months', 'progress' => 45, 'status' => 'In Progress', 'last' => 'Today, 10:30 AM', 'icon' => 'FS'],
        ['name' => 'Data Science & Analytics', 'duration' => '10 Months', 'progress' => 30, 'status' => 'In Progress', 'last' => 'Yesterday, 6:15 PM', 'icon' => 'DS'],
        ['name' => 'Digital Marketing', 'duration' => '6 Months', 'progress' => 0, 'status' => 'Not Started', 'last' => '-', 'icon' => 'DM'],
        ['name' => 'Backend Development', 'duration' => '10 Months', 'progress' => 0, 'status' => 'Not Started', 'last' => '-', 'icon' => 'BD'],
    ];
    $overall = [
        'percent' => 38,
        'message' => 'Keep going! You are doing great.',
        'items' => [
            ['label' => 'Completed', 'value' => '1 Course', 'icon' => 'CC'],
            ['label' => 'In Progress', 'value' => '2 Courses', 'icon' => 'IP'],
            ['label' => 'Not Started', 'value' => '1 Course', 'icon' => 'NS'],
            ['label' => 'Lessons Completed', 'value' => '28 / 74', 'icon' => 'LC'],
            ['label' => 'Total Study Time', 'value' => '12h 45m', 'icon' => 'ST'],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Progress</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f6f9ff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:260px 1fr}.sidebar{background:#fff;border-right:1px solid #dce7f8;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 18px;border-bottom:1px solid #dce7f8}.brand img{width:205px}.menu{padding:28px 14px 18px;display:grid;gap:8px}.menu-item{min-height:42px;display:flex;align-items:center;gap:14px;padding:8px 12px;border-radius:8px;font-size:14px}.menu-item.active{background:#eaf2ff;color:#075fe4;font-weight:700}.menu-icon,.icon{width:28px;height:28px;border-radius:7px;background:#f0f5ff;color:#075fe4;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:800;flex:0 0 auto}.side-bottom{margin-top:auto;padding:18px 22px 28px;border-top:1px solid #dce7f8;display:grid;gap:12px}.bottom-link{display:flex;align-items:center;gap:14px;font-size:14px;min-height:34px}.topbar{height:76px;background:#fff;border-bottom:1px solid #dce7f8;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#061942}.user{display:flex;align-items:center;gap:12px;position:relative}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;display:flex;align-items:center;justify-content:center}.bell svg,.user button svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.bell span{position:absolute;top:-1px;right:0;width:15px;height:15px;border-radius:50%;background:#ff3045;color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;font-weight:700}.top-avatar{width:46px;height:46px;border-radius:50%;background-image:url('{{ asset('student.png') }}');background-size:220px auto;background-position:16% 28%;border:3px solid #eaf2ff}.user h3{margin:0;font-size:14px}.user button:last-child{border:0;background:transparent;cursor:pointer;display:flex}.user-menu{position:absolute;top:58px;right:0;width:155px;border:1px solid #dce7f8;border-radius:8px;background:#fff;box-shadow:0 12px 28px rgba(6,25,66,.12);display:none;z-index:5}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 30px 38px}.head h1{margin:0 0 8px;font-size:27px}.head p{margin:0 0 24px;color:#334b83;font-size:14px}.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:22px;margin-bottom:20px}.card{background:#fff;border:1px solid #dce7f8;border-radius:9px;box-shadow:0 10px 24px rgba(6,25,66,.04)}.stat-card{padding:20px;display:grid;grid-template-columns:62px 1fr;gap:16px;align-items:center}.stat-card .icon{width:54px;height:54px;border-radius:12px;font-size:11px}.stat-card h2{margin:0 0 8px;font-size:24px}.stat-card p{margin:0 0 10px;color:#334b83;font-size:13px}.stat-card a{color:#075fe4;font-size:12px;font-weight:700}.middle{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px}.section{padding:22px}.section h2{margin:0 0 24px;font-size:16px}.overall{display:grid;grid-template-columns:190px 1fr;gap:24px;align-items:center}.ring{width:160px;height:160px;border-radius:50%;background:conic-gradient(#075fe4 0 38%,#e9edf5 38% 100%);display:flex;align-items:center;justify-content:center}.ring span{width:118px;height:118px;border-radius:50%;background:#fff;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;font-size:26px;font-weight:800;line-height:1.05;white-space:normal}.ring small{display:block;margin-top:8px;font-size:14px;font-weight:500;color:#334b83}.overall-list{display:grid;gap:18px;border-left:1px solid #dce7f8;padding-left:22px}.overall-row{display:grid;grid-template-columns:28px 1fr auto;gap:12px;font-size:13px}.note{margin-top:20px;padding:14px;background:#eef5ff;border-radius:7px;font-size:13px;color:#334b83}.skill-row{display:grid;grid-template-columns:120px 1fr 42px;align-items:center;gap:18px;margin-bottom:20px;font-size:13px}.bar{height:7px;background:#e9edf5;border-radius:20px;overflow:hidden}.bar span{display:block;height:100%;background:#075fe4}.table-card{padding:22px}.table-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px}.table-top h2{margin:0;font-size:16px}.table-top a{color:#075fe4;font-size:12px;font-weight:700}table{width:100%;border-collapse:collapse;font-size:13px}th,td{padding:13px 10px;text-align:left;border-top:1px solid #e6eef8}th{color:#334b83;font-weight:600}.course-cell{display:flex;align-items:center;gap:14px}.course-cell .icon{width:44px;height:44px;background:#061942;color:#fff}.status{display:inline-flex;padding:6px 10px;border-radius:6px;background:#e6fff0;color:#05843e;font-size:12px}.status.gray{background:#eef2f8;color:#334b83}.dots{color:#075fe4;font-size:22px;text-align:right}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.stats-grid,.middle{grid-template-columns:repeat(2,1fr)}}@media(max-width:720px){.content{padding:22px 14px}.topbar{padding:0 14px}.stats-grid,.middle,.overall{grid-template-columns:1fr}.overall-list{border-left:0;padding-left:0}table{min-width:760px}.table-wrap{overflow:auto}}
    </style>
    <style>
        .ring > span { display: none !important; }
        .ring-center {
            width: 118px;
            height: 118px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            line-height: 1;
        }
        .ring-center strong {
            display: block;
            font-size: 27px;
            line-height: 1;
            font-weight: 800;
        }
        .ring-center small {
            display: block;
            margin-top: 9px;
            font-size: 13px;
            line-height: 1;
            font-weight: 500;
            color: #334b83;
        }
    </style>
</head>
<body><div class="layout">
    <aside class="sidebar"><a href="/fast-track/dashboard" class="brand"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a><nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage===$item['key']?'active':'' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav><div class="side-bottom"><a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a><a class="bottom-link" href="/fast-track/login"><span class="menu-icon">LO</span><span>Logout</span></a></div></aside>
    <main><header class="topbar"><button class="hamburger">=</button><div class="user"><button class="bell"><svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg><span>{{ $student['notifications'] }}</span></button><div class="top-avatar"></div><h3>{{ $student['name'] }}</h3><button id="userMenuBtn"><svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg></button><div class="user-menu" id="userMenu"><a href="/fast-track/profile">My Profile</a><a href="/fast-track/login">Logout</a></div></div></header>
    <section class="content"><div class="head"><h1>Training Progress</h1><p>Track your learning journey and monitor your progress.</p></div><div class="stats-grid" id="cards"></div>
    <div class="middle"><article class="card section"><h2>Overall Progress</h2><div class="overall"><div class="ring" id="overallRing"><div class="ring-center"><strong id="overallPercent">0%</strong><small>Overall</small></div></div><div class="overall-list" id="overallList"></div></div><div class="note" id="overallNote"></div></article><article class="card section"><h2>Skill Progress <a style="float:right;color:#075fe4;font-size:12px" href="#">View All</a></h2><div id="skills"></div></article></div>
    <article class="card table-card"><div class="table-top"><h2>Course Progress</h2><a href="/fast-track/courses">View All Courses</a></div><div class="table-wrap"><table><thead><tr><th>Course Name</th><th>Progress</th><th>Status</th><th>Last Studied</th><th></th></tr></thead><tbody id="courseRows"></tbody></table></div></article></section></main></div>
    <script>
        const cards=@json($cards),skills=@json($skills),courses=@json($courses),overall=@json($overall);
        document.getElementById('cards').innerHTML=cards.map(c=>`<article class="card stat-card"><span class="icon">${c.icon}</span><div><h2>${c.value}</h2><p>${c.label}</p><a href="#">${c.link} -></a></div></article>`).join('');
        document.getElementById('overallRing').style.background=`conic-gradient(#075fe4 0 ${overall.percent}%,#e9edf5 ${overall.percent}% 100%)`;
        document.getElementById('overallPercent').textContent=`${overall.percent}%`;
        document.getElementById('overallList').innerHTML=overall.items.map(item=>`<div class="overall-row"><span class="icon">${item.icon}</span><span>${item.label}</span><strong>${item.value}</strong></div>`).join('');
        document.getElementById('overallNote').textContent=overall.message;
        document.getElementById('skills').innerHTML=skills.map(s=>`<div class="skill-row"><strong>${s.name}</strong><div class="bar"><span style="width:${s.score}%"></span></div><strong>${s.score}%</strong></div>`).join('');
        document.getElementById('courseRows').innerHTML=courses.map(c=>`<tr><td><div class="course-cell"><span class="icon">${c.icon}</span><div><strong>${c.name}</strong><br><span>${c.duration}</span></div></div></td><td><div class="bar"><span style="width:${c.progress}%"></span></div></td><td><strong>${c.progress}%</strong></td><td><span class="status ${c.status==='Not Started'?'gray':''}">${c.status}</span></td><td>${c.last}</td><td class="dots">...</td></tr>`).join('');
        const userMenuBtn=document.getElementById('userMenuBtn'),userMenu=document.getElementById('userMenu');userMenuBtn.addEventListener('click',()=>userMenu.classList.toggle('show'));document.addEventListener('click',e=>{if(!userMenu.contains(e.target)&&!userMenuBtn.contains(e.target))userMenu.classList.remove('show')});
    </script>
</body></html>




