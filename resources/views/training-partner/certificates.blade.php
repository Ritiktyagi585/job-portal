@php
    $activePage = 'certificates';
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
        ['label' => 'Total Certificates', 'value' => '980', 'hint' => 'All Time', 'icon' => 'TC'],
        ['label' => 'Issued This Month', 'value' => '120', 'hint' => '+15% from last month', 'icon' => 'IM'],
        ['label' => 'Pending Verification', 'value' => '25', 'hint' => 'Awaiting Verification', 'icon' => 'PV'],
        ['label' => 'Downloads', 'value' => '2,350', 'hint' => 'All Time', 'icon' => 'DL'],
    ];
    $certificates = [
        ['id' => 'CERT-2024-0980', 'student' => 'Rohit Kumar', 'email' => 'rohit.kumar@email.com', 'avatar' => 'RK', 'course' => 'Full Stack Development', 'courseIcon' => 'FS', 'modules' => '12 Modules', 'date' => '10 May 2024', 'time' => '10:30 AM', 'status' => 'Verified'],
        ['id' => 'CERT-2024-0979', 'student' => 'Ananya Gupta', 'email' => 'ananya.gupta@email.com', 'avatar' => 'AG', 'course' => 'Data Science & Analytics', 'courseIcon' => 'DS', 'modules' => '10 Modules', 'date' => '09 May 2024', 'time' => '02:15 PM', 'status' => 'Verified'],
        ['id' => 'CERT-2024-0978', 'student' => 'Aman Sharma', 'email' => 'aman.sharma@email.com', 'avatar' => 'AS', 'course' => 'Digital Marketing', 'courseIcon' => 'DM', 'modules' => '8 Modules', 'date' => '08 May 2024', 'time' => '11:45 AM', 'status' => 'Verified'],
        ['id' => 'CERT-2024-0977', 'student' => 'Priya Singh', 'email' => 'priya.singh@email.com', 'avatar' => 'PS', 'course' => 'React for Beginners', 'courseIcon' => 'RB', 'modules' => '6 Modules', 'date' => '08 May 2024', 'time' => '09:20 AM', 'status' => 'Verified'],
        ['id' => 'CERT-2024-0976', 'student' => 'Neha Verma', 'email' => 'neha.verma@email.com', 'avatar' => 'NV', 'course' => 'Python Programming', 'courseIcon' => 'PY', 'modules' => '8 Modules', 'date' => '07 May 2024', 'time' => '04:30 PM', 'status' => 'Pending'],
    ];
    $verification = [
        ['label' => 'Verified', 'value' => 920, 'percent' => 93.9, 'color' => '#22b66c'],
        ['label' => 'Pending', 'value' => 25, 'percent' => 2.6, 'color' => '#ffb23f'],
        ['label' => 'Expired', 'value' => 35, 'percent' => 3.5, 'color' => '#4777ef'],
    ];
    $tips = ['Verify student details before issuing', 'Use unique certificate ID', 'Certificates are auto-verified after course completion', 'Students can download anytime'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
    <style>
        *{box-sizing:border-box}html,body{max-width:100%;overflow-x:hidden}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px minmax(0,1fr);max-width:100vw}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 18px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:16px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:26px 30px 34px;min-width:0}.head{display:flex;justify-content:space-between;align-items:flex-start;gap:18px}.head h1{margin:0 0 8px;font-size:22px}.head p{margin:0 0 24px;color:#526287;font-size:13px}.btn{height:38px;border:1px solid #5b2ce1;border-radius:5px;background:#5b2ce1;color:#fff;padding:0 18px;font-weight:800;cursor:pointer;font-size:12px}.btn.light{background:#fff;color:#5b2ce1}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.page-grid{display:grid;grid-template-columns:minmax(0,1fr) 180px;gap:18px}.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px}.stat-card{min-height:126px;padding:22px;display:grid;grid-template-columns:58px 1fr;gap:16px;align-items:center}.stat-card .icon{width:56px;height:56px;border-radius:50%;font-size:11px}.stat-card h2{margin:0 0 10px;font-size:28px}.stat-card p{margin:0 0 10px;font-size:13px}.stat-card small{color:#526287;font-size:12px}.stat-card small.green{color:#089845}.filters{display:grid;grid-template-columns:240px 160px 150px 140px 1fr 150px;gap:16px;margin-bottom:20px}.input,.select{height:38px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 12px;font-size:12px}.table-card{overflow:hidden}.table-head,.cert-row{display:grid;grid-template-columns:76px 140px 1.2fr 1.1fr 110px 100px 130px;gap:12px;align-items:center}.table-head{padding:16px 18px;border-bottom:1px solid #e5e7f2;font-size:12px;font-weight:800}.cert-row{padding:16px 18px;border-bottom:1px solid #e5e7f2;min-height:88px}.cert-row:last-child{border-bottom:0}.preview{width:54px;height:44px;border:1px solid #e8cf8d;border-radius:3px;background:linear-gradient(135deg,#fff,#f8f4ff);display:flex;align-items:center;justify-content:center;color:#5b2ce1;font-size:10px;font-weight:900}.student,.course{display:flex;gap:12px;align-items:center}.mini-avatar{width:38px;height:38px;border-radius:50%;background:#eaf1ff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900}.course .icon{width:34px;height:34px}.student h2,.course h3{margin:0 0 5px;font-size:12px}.student p,.course p,.date p{margin:0;color:#526287;font-size:11px;line-height:1.4}.status{display:inline-flex;padding:7px 10px;border-radius:7px;background:#dff8e9;color:#05843e;font-size:11px}.status.pending{background:#fff0de;color:#d06d00}.actions{display:flex;gap:8px}.action{width:34px;height:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;cursor:pointer;font-size:11px}.footer{padding:18px;display:flex;justify-content:space-between;align-items:center;color:#526287;font-size:12px;border-top:1px solid #e5e7f2}.pages{display:flex;gap:8px}.page-btn{min-width:34px;height:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;font-weight:800}.page-btn.active{background:#5b2ce1;color:#fff}.page-size{height:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;padding:0 12px}.side-stack{display:grid;gap:16px}.side-card{padding:16px}.side-card h2{margin:0 0 14px;font-size:14px}.template-card p{margin:0 0 14px;color:#526287;font-size:12px;line-height:1.6}.template-art{height:94px;border-radius:7px;background:#f6f2ff;display:flex;align-items:center;justify-content:center;font-size:38px}.donut{width:124px;height:124px;border-radius:50%;margin:4px auto 16px;display:flex;align-items:center;justify-content:center}.donut-center{width:72px;height:72px;border-radius:50%;background:#fff;display:flex;flex-direction:column;align-items:center;justify-content:center}.donut-center strong{font-size:22px}.donut-center span{font-size:10px;color:#526287}.legend{display:grid;gap:10px}.legend-row{display:grid;grid-template-columns:10px 1fr auto;gap:8px;font-size:11px}.dot{width:9px;height:9px;border-radius:50%}.tips{background:linear-gradient(145deg,#fff,#f7f2ff)}.tips ul{margin:0;padding-left:18px;font-size:11px;color:#26375f;line-height:1.8}.tips a{color:#5b2ce1;font-weight:800;font-size:12px}.empty{padding:30px;text-align:center;color:#526287}@media(max-width:1240px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.page-grid{grid-template-columns:1fr}.stats-grid{grid-template-columns:repeat(2,1fr)}.filters{grid-template-columns:1fr 1fr}.table-card{overflow:auto}.table-head,.cert-row{min-width:980px}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.head{flex-direction:column}.stats-grid,.filters{grid-template-columns:1fr}.btn{width:100%}}
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar"><a class="brand" href="/training-partner/dashboard"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a><nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav><div class="side-bottom"><div class="upgrade"><h3>Recognize Achievement</h3><p>Issue verified certificates and boost learner careers.</p><button class="btn">Issue Certificate</button><div class="upgrade-art">📜</div></div></div></aside>
        <!-- End Sidebar Section -->

        <main>
            <header class="topbar"><button class="hamburger">=</button><div class="top-stats" id="topStats"></div><div class="user"><button class="bell">♢<span>{{ $partner['notifications'] }}</span></button><div class="avatar">TP</div><div><h3>{{ $partner['name'] }}</h3><p>{{ $partner['role'] }}</p></div><button class="chev" id="userMenuBtn">⌄</button><div class="user-menu" id="userMenu"><a href="/training-partner/profile">My Profile</a><a href="/training-partner/login">Logout</a></div></div></header>
            <!-- End Topbar Section -->

            <section class="content">
                <div class="head"><div><h1>Certificates</h1><p>Manage and view all certificates issued by your institute.</p></div><button class="btn" id="issueBtn">+ Issue New Certificate</button></div>
                <!-- End Header Section -->

                <div class="page-grid">
                    <div>
                        <div class="stats-grid" id="stats"></div>
                        <!-- End Stats Section -->

                        <div class="filters"><input class="input" id="searchInput" placeholder="Search by student or course..."><select class="select" id="courseFilter"><option>All Courses</option></select><select class="select" id="statusFilter"><option>All Status</option><option>Verified</option><option>Pending</option></select><select class="select"><option>All Time</option></select><span></span><button class="btn light">Export Report</button></div>
                        <!-- End Filter Section -->

                        <article class="card table-card"><div class="table-head"><span></span><span>Certificate ID</span><span>Student</span><span>Course</span><span>Issued Date</span><span>Status</span><span>Actions</span></div><div id="certificateRows"></div><div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">‹</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">196</button><button class="page-btn">›</button><select class="page-size"><option>5 / page</option><option>10 / page</option></select></div></div></article>
                        <!-- End Certificate Table Section -->
                    </div>

                    <aside class="side-stack"><article class="card side-card template-card"><h2>Certificate Templates</h2><p>Create and customize certificate templates.</p><button class="btn light">Manage Templates</button><div class="template-art">📄</div></article><article class="card side-card"><h2>Verification Stats</h2><div class="donut" id="donut"><div class="donut-center"><strong>980</strong><span>Total</span></div></div><div class="legend" id="legend"></div></article><article class="card side-card tips"><h2>Quick Tips</h2><ul id="tips"></ul><a href="#">Learn More -></a></article></aside>
                    <!-- End Right Sidebar Section -->
                </div>
            </section>
            <!-- End Content Section -->
        </main>
    </div>

    <script>
        const topStats=@json($topStats),stats=@json($stats),verification=@json($verification),tips=@json($tips);
        let certificates=@json($certificates);
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('stats').innerHTML=stats.map(item=>`<article class="card stat-card"><span class="icon">${item.icon}</span><div><p>${item.label}</p><h2>${item.value}</h2><small class="${item.hint.includes('+')?'green':''}">${item.hint}</small></div></article>`).join('');
        document.getElementById('courseFilter').innerHTML='<option>All Courses</option>'+[...new Set(certificates.map(c=>c.course))].map(course=>`<option>${course}</option>`).join('');
        document.getElementById('tips').innerHTML=tips.map(tip=>`<li>${tip}</li>`).join('');

        function renderDonut(){
            let start=0;
            const gradient=verification.map(item=>{const end=start+item.percent;const part=`${item.color} ${start}% ${end}%`;start=end;return part}).join(',');
            document.getElementById('donut').style.background=`conic-gradient(${gradient})`;
            document.getElementById('legend').innerHTML=verification.map(item=>`<div class="legend-row"><span class="dot" style="background:${item.color}"></span><span>${item.label}</span><strong>${item.value} (${item.percent}%)</strong></div>`).join('');
        }

        function renderCertificates(){
            const query=document.getElementById('searchInput').value.toLowerCase();
            const course=document.getElementById('courseFilter').value;
            const status=document.getElementById('statusFilter').value;
            const filtered=certificates.filter(cert=>`${cert.id} ${cert.student} ${cert.course}`.toLowerCase().includes(query)&&(course==='All Courses'||cert.course===course)&&(status==='All Status'||cert.status===status));
            document.getElementById('certificateRows').innerHTML=filtered.length?filtered.map(cert=>`<div class="cert-row"><span class="preview">CERT</span><strong>${cert.id}</strong><div class="student"><span class="mini-avatar">${cert.avatar}</span><div><h2>${cert.student}</h2><p>${cert.email}</p></div></div><div class="course"><span class="icon">${cert.courseIcon}</span><div><h3>${cert.course}</h3><p>${cert.modules}</p></div></div><div class="date"><p>${cert.date}<br>${cert.time}</p></div><span class="status ${cert.status==='Pending'?'pending':''}">${cert.status}</span><div class="actions"><button class="action">👁</button><button class="action">↓</button><button class="action">⋮</button></div></div>`).join(''):`<div class="empty">No certificates found.</div>`;
            document.getElementById('resultText').textContent=`Showing 1 to ${filtered.length} of ${certificates.length} certificates`;
        }

        ['searchInput','courseFilter','statusFilter'].forEach(id=>document.getElementById(id).addEventListener('input',renderCertificates));
        document.getElementById('issueBtn').addEventListener('click',()=>alert('Issue New Certificate clicked'));
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
        renderCertificates();
        renderDonut();
    </script>
</body>
</html>

