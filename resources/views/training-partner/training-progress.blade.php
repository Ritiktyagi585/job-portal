@php
    $activePage = 'progress';
    $partner = ['name' => 'CodeAcademy', 'role' => 'Training Partner', 'notifications' => 3];
    $topStats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $menuItems = [
        ['key' => 'dashboard', 'title' => 'Dashboard', 'icon' => 'DB', 'url' => '/training-partner/dashboard'],
        ['key' => 'profile', 'title' => 'My Profile', 'icon' => 'MP', 'url' => '/training-partner/profile'],
        ['key' => 'add-course', 'title' => 'Add Course', 'icon' => 'AC', 'url' => '/training-partner/add-course'],
        ['key' => 'courses', 'title' => 'Courses', 'icon' => 'CR', 'url' => '/training-partner/courses'],
        ['key' => 'enrollments', 'title' => 'Enrollments', 'icon' => 'EN', 'url' => '/training-partner/enrollments'],
        ['key' => 'progress', 'title' => 'Training Progress', 'icon' => 'TP', 'url' => '/training-partner/training-progress'],
        ['key' => 'assessments', 'title' => 'Assessments', 'icon' => 'AS', 'url' => '/training-partner/assessments'],
        ['key' => 'certificates', 'title' => 'Certificates', 'icon' => 'CT', 'url' => '/training-partner/certificates'],
        ['key' => 'payouts', 'title' => 'Payouts', 'icon' => 'PO', 'url' => '#'],
        ['key' => 'notifications', 'title' => 'Notifications', 'icon' => 'NT', 'url' => '#'],
    ];
    $stats = [
        ['label' => 'Total Enrollments', 'value' => '1,250', 'hint' => '+12% from last month', 'icon' => 'TE'],
        ['label' => 'Active Students', 'value' => '820', 'hint' => '+10% from last month', 'icon' => 'AS'],
        ['label' => 'Course Completions', 'value' => '430', 'hint' => '+15% from last month', 'icon' => 'CC'],
        ['label' => 'Assessment Submitted', 'value' => '980', 'hint' => '+10% from last month', 'icon' => 'AT'],
    ];
    $courses = [
        ['name' => 'Full Stack Development', 'students' => '650 / 650 Students', 'progress' => 100, 'icon' => 'FS'],
        ['name' => 'Data Science & Analytics', 'students' => '320 / 450 Students', 'progress' => 71, 'icon' => 'DS'],
        ['name' => 'Digital Marketing', 'students' => '0 / 150 Students', 'progress' => 0, 'icon' => 'DM'],
        ['name' => 'React for Beginners', 'students' => '280 / 400 Students', 'progress' => 70, 'icon' => 'RB'],
        ['name' => 'Python Programming', 'students' => '180 / 300 Students', 'progress' => 60, 'icon' => 'PY'],
    ];
    $segments = [
        ['label' => 'Excellent ( 80% and above )', 'value' => 320, 'percent' => 25.6, 'color' => '#23b66e'],
        ['label' => 'Good ( 60% - 79% )', 'value' => 450, 'percent' => 36.0, 'color' => '#4777ef'],
        ['label' => 'Average ( 40% - 59% )', 'value' => 280, 'percent' => 22.4, 'color' => '#ffb23f'],
        ['label' => 'Needs Improvement ( Below 40% )', 'value' => 200, 'percent' => 16.0, 'color' => '#ff3d68'],
    ];
    $activities = [
        ['student' => 'Ananya Gupta', 'email' => 'ananya.gupta@email.com', 'avatar' => 'AG', 'course' => 'Full Stack Development', 'courseIcon' => 'FS', 'activity' => 'Completed Module', 'detail' => 'Module 8: Authentication', 'progress' => 80, 'time' => '2 min ago'],
        ['student' => 'Rohit Kumar', 'email' => 'rohit.kumar@email.com', 'avatar' => 'RK', 'course' => 'Data Science & Analytics', 'courseIcon' => 'DS', 'activity' => 'Submitted Assignment', 'detail' => 'Data Analysis Assignment', 'progress' => 60, 'time' => '15 min ago'],
        ['student' => 'Priya Singh', 'email' => 'priya.singh@email.com', 'avatar' => 'PS', 'course' => 'Digital Marketing', 'courseIcon' => 'DM', 'activity' => 'Completed Quiz', 'detail' => 'Marketing Fundamentals Quiz', 'progress' => 30, 'time' => '30 min ago'],
        ['student' => 'Aman Sharma', 'email' => 'aman.sharma@email.com', 'avatar' => 'AS', 'course' => 'React for Beginners', 'courseIcon' => 'RB', 'activity' => 'Watched Video', 'detail' => 'React Props & State', 'progress' => 70, 'time' => '1 hour ago'],
        ['student' => 'Neha Verma', 'email' => 'neha.verma@email.com', 'avatar' => 'NV', 'course' => 'Python Programming', 'courseIcon' => 'PY', 'activity' => 'Started Module', 'detail' => 'Module 3: Functions', 'progress' => 20, 'time' => '2 hours ago'],
    ];
    $leaders = [
        ['name' => 'Aman Sharma', 'course' => 'React for Beginners', 'score' => 90, 'avatar' => 'AS'],
        ['name' => 'Rohit Kumar', 'course' => 'Data Science & Analytics', 'score' => 85, 'avatar' => 'RK'],
        ['name' => 'Ananya Gupta', 'course' => 'Full Stack Development', 'score' => 80, 'avatar' => 'AG'],
        ['name' => 'Priya Singh', 'course' => 'Digital Marketing', 'score' => 75, 'avatar' => 'PS'],
        ['name' => 'Neha Verma', 'course' => 'Python Programming', 'score' => 70, 'avatar' => 'NV'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Progress</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px 1fr}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:20px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:26px 30px 34px}.head{display:flex;align-items:flex-start;justify-content:space-between;gap:18px}.head h1{margin:0 0 8px;font-size:22px}.head p{margin:0 0 20px;color:#526287;font-size:13px}.filters{display:flex;gap:14px}.select{height:38px;min-width:145px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 14px;font-size:13px}.btn{height:36px;border:1px solid #5b2ce1;border-radius:5px;background:#5b2ce1;color:#fff;padding:0 14px;font-weight:800}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:18px}.stat-card{min-height:132px;padding:22px;display:grid;grid-template-columns:62px 1fr;gap:18px;align-items:center}.stat-card .icon{width:58px;height:58px;border-radius:50%;font-size:11px}.stat-card h2{margin:0 0 10px;font-size:28px}.stat-card p{margin:0 0 12px;font-size:13px}.stat-card small{color:#089845;font-size:12px}.middle{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px}.panel{padding:20px}.panel-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}.panel h2{margin:0;font-size:15px}.panel a{color:#5b2ce1;font-size:12px;font-weight:800}.course-progress{display:grid;gap:12px}.course-row{display:grid;grid-template-columns:44px 1fr 250px 44px;gap:14px;align-items:center;border-bottom:1px solid #e9edf5;padding-bottom:10px}.course-row:last-child{border-bottom:0}.course-row h3{margin:0 0 6px;font-size:13px}.course-row p{margin:0;color:#526287;font-size:11px}.bar{height:7px;border-radius:20px;background:#e7eaf2;overflow:hidden}.bar span{display:block;height:100%;background:#6b31e8}.percent{font-size:12px;font-weight:900;color:#089845}.donut-wrap{display:grid;grid-template-columns:230px 1fr;gap:26px;align-items:center}.donut{width:210px;height:210px;border-radius:50%;display:flex;align-items:center;justify-content:center}.donut-center{width:116px;height:116px;background:#fff;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}.donut-center strong{font-size:25px}.donut-center span{font-size:12px;color:#526287;line-height:1.4}.legend{display:grid;gap:18px}.legend-row{display:grid;grid-template-columns:12px 1fr auto;gap:12px;align-items:center;font-size:12px}.dot{width:10px;height:10px;border-radius:50%}.bottom{display:grid;grid-template-columns:1.8fr .9fr;gap:18px}.activity-table{padding:16px}.table-head,.activity-row{display:grid;grid-template-columns:1.2fr 1.25fr 1.2fr .75fr .7fr;gap:12px;align-items:center}.table-head{padding:0 0 12px;border-bottom:1px solid #e5e7f2;font-size:12px;font-weight:800}.activity-row{padding:12px 0;border-bottom:1px solid #e5e7f2}.activity-row:last-child{border-bottom:0}.person,.course-cell{display:flex;align-items:center;gap:10px}.mini-avatar{width:34px;height:34px;border-radius:50%;background:#eaf1ff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900}.activity-row h3,.leader h3{margin:0 0 5px;font-size:12px}.activity-row p,.leader p{margin:0;color:#526287;font-size:11px}.smallbar{width:95px}.leader-card{padding:18px}.leaders{display:grid;gap:16px}.leader{display:grid;grid-template-columns:38px 1fr 80px 34px;gap:10px;align-items:center}.leader .bar{height:6px}.leader .bar span{background:#0aa45a}.leader-score{font-size:12px;font-weight:900}.leader-btn{width:100%;margin-top:18px;background:#fff;color:#5b2ce1}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.stats-grid,.middle,.bottom{grid-template-columns:1fr}.activity-table{overflow:auto}.table-head,.activity-row{min-width:820px}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.head{flex-direction:column}.filters{width:100%;flex-direction:column}.donut-wrap,.course-row{grid-template-columns:1fr}.donut{margin:auto}}
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a class="brand" href="/training-partner/dashboard"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav>
            <div class="side-bottom"><div class="upgrade"><h3>Empower Freshers,<br>Build Future!</h3><p>Track learning, improve outcomes and build job-ready talent.</p><button class="btn">Add New Course</button><div class="upgrade-art">🎓</div></div></div>
        </aside>
        <!-- End Sidebar Section -->

        <main>
            <header class="topbar"><button class="hamburger">=</button><div class="top-stats" id="topStats"></div><div class="user"><button class="bell">♢<span>{{ $partner['notifications'] }}</span></button><div class="avatar">TP</div><div><h3>{{ $partner['name'] }}</h3><p>{{ $partner['role'] }}</p></div><button class="chev" id="userMenuBtn">⌄</button><div class="user-menu" id="userMenu"><a href="/training-partner/profile">My Profile</a><a href="/training-partner/login">Logout</a></div></div></header>
            <!-- End Topbar Section -->

            <section class="content">
                <div class="head"><div><h1>Training Progress</h1><p>Track overall learning progress across courses and students.</p></div><div class="filters"><select class="select" id="courseFilter"><option>All Courses</option></select><select class="select" id="studentFilter"><option>All Students</option><option>Excellent</option><option>Good</option><option>Average</option><option>Needs Improvement</option></select></div></div>
                <!-- End Header Section -->

                <div class="stats-grid" id="stats"></div>
                <!-- End Stats Section -->

                <div class="middle">
                    <article class="card panel"><div class="panel-head"><h2>Course-wise Progress</h2><a href="/training-partner/courses">View All Courses</a></div><div class="course-progress" id="courseProgress"></div></article>
                    <!-- End Course Progress Section -->

                    <article class="card panel"><div class="panel-head"><h2>Student Progress Overview</h2><a href="/training-partner/enrollments">View All Students</a></div><div class="donut-wrap"><div class="donut" id="donut"><div class="donut-center"><strong>1,250</strong><span>Total<br>Enrollments</span></div></div><div class="legend" id="legend"></div></div></article>
                    <!-- End Student Overview Section -->
                </div>

                <div class="bottom">
                    <article class="card activity-table"><div class="panel-head"><h2>Recent Student Activity</h2><a href="#">View All Activity</a></div><div class="table-head"><span>Student</span><span>Course</span><span>Activity</span><span>Progress</span><span>Time</span></div><div id="activityRows"></div></article>
                    <!-- End Activity Section -->

                    <article class="card leader-card"><div class="panel-head"><h2>Top Performing Students</h2><a href="#">View All</a></div><div class="leaders" id="leaders"></div><button class="btn leader-btn">View Leaderboard</button></article>
                    <!-- End Leaderboard Section -->
                </div>
            </section>
            <!-- End Content Section -->
        </main>
    </div>

    <script>
        const topStats=@json($topStats),stats=@json($stats),courses=@json($courses),segments=@json($segments),activities=@json($activities),leaders=@json($leaders);
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('stats').innerHTML=stats.map(item=>`<article class="card stat-card"><span class="icon">${item.icon}</span><div><p>${item.label}</p><h2>${item.value}</h2><small>${item.hint}</small></div></article>`).join('');
        document.getElementById('courseFilter').innerHTML='<option>All Courses</option>'+courses.map(c=>`<option>${c.name}</option>`).join('');

        function renderCourses(courseName='All Courses'){
            const list=courseName==='All Courses'?courses:courses.filter(c=>c.name===courseName);
            document.getElementById('courseProgress').innerHTML=list.map(course=>`<div class="course-row"><span class="icon">${course.icon}</span><div><h3>${course.name}</h3><p>${course.students}</p></div><div class="bar"><span style="width:${course.progress}%"></span></div><span class="percent">${course.progress}%</span></div>`).join('');
        }

        function renderDonut(items){
            let start=0;
            const gradient=items.map(item=>{const end=start+item.percent;const part=`${item.color} ${start}% ${end}%`;start=end;return part}).join(',');
            document.getElementById('donut').style.background=`conic-gradient(${gradient})`;
            document.getElementById('legend').innerHTML=items.map(item=>`<div class="legend-row"><span class="dot" style="background:${item.color}"></span><span>${item.label}</span><strong>${item.value} (${item.percent.toFixed(1)}%)</strong></div>`).join('');
        }

        document.getElementById('activityRows').innerHTML=activities.map(item=>`<div class="activity-row"><div class="person"><span class="mini-avatar">${item.avatar}</span><div><h3>${item.student}</h3><p>${item.email}</p></div></div><div class="course-cell"><span class="icon">${item.courseIcon}</span><h3>${item.course}</h3></div><div><h3>${item.activity}</h3><p>${item.detail}</p></div><div><strong>${item.progress}%</strong><div class="bar smallbar"><span style="width:${item.progress}%"></span></div></div><p>${item.time}</p></div>`).join('');
        document.getElementById('leaders').innerHTML=leaders.map(item=>`<div class="leader"><span class="mini-avatar">${item.avatar}</span><div><h3>${item.name}</h3><p>${item.course}</p></div><div class="bar"><span style="width:${item.score}%"></span></div><span class="leader-score">${item.score}%</span></div>`).join('');
        document.getElementById('courseFilter').addEventListener('change',e=>renderCourses(e.target.value));
        document.getElementById('studentFilter').addEventListener('change',e=>{const value=e.target.value;renderDonut(value==='All Students'?segments:segments.filter(s=>s.label.startsWith(value)))});
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
        renderCourses();
        renderDonut(segments);
    </script>
</body>
</html>



