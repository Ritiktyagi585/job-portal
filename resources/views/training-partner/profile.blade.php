@php
    $activePage = 'profile';
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
    $profile = [
        'name' => 'CodeAcademy',
        'email' => 'info@codeacademy.com',
        'phone' => '+91 98765 43210',
        'website' => 'www.codeacademy.com',
        'about' => 'We provide industry-relevant training to make freshers job-ready.',
        'address' => 'Bangalore, Karnataka, India',
        'partnerSince' => '15 May 2024',
        'status' => 'Verified Partner',
    ];
    $stats = [
        ['label' => 'Total Courses', 'value' => '12', 'hint' => 'Active', 'icon' => 'TC'],
        ['label' => 'Total Enrollments', 'value' => '1,250', 'hint' => 'All Courses', 'icon' => 'TE'],
        ['label' => 'Active Students', 'value' => '820', 'hint' => 'Currently Learning', 'icon' => 'AS'],
        ['label' => 'Completed Students', 'value' => '430', 'hint' => 'All Courses', 'icon' => 'CS'],
    ];
    $completion = [
        'percent' => 75,
        'items' => [
            ['label' => 'Basic Information', 'done' => true],
            ['label' => 'Institute Details', 'done' => true],
            ['label' => 'Contact Details', 'done' => true],
            ['label' => 'About Us', 'done' => true],
            ['label' => 'Verification Documents', 'done' => false],
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Partner Profile</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px 1fr}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade .btn{height:36px;padding:0 14px}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:20px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 34px 36px}.head h1{margin:0 0 8px;font-size:24px}.head p{margin:0 0 22px;color:#526287;font-size:13px}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.profile-card{padding:30px 36px;display:grid;grid-template-columns:230px 1fr 1fr auto;gap:34px;margin-bottom:22px}.logo-box{border-right:1px solid #e5e7f2;padding-right:34px}.logo-box em{font-size:13px;font-weight:700}.institute-logo{width:120px;height:120px;margin:20px 0 14px;border-radius:10px;background:linear-gradient(135deg,#884df0,#5b2ce1);color:#fff;display:flex;align-items:center;justify-content:center;font-size:42px;font-weight:900}.change{height:36px;border:1px solid #c9b9ff;border-radius:6px;background:#fff;color:#5b2ce1;font-weight:800;padding:0 14px}.info-block{display:grid;gap:18px;align-content:start;padding-top:30px}.info-block h3{margin:0 0 8px;font-size:13px}.info-block p{margin:0;color:#26375f;font-size:13px;line-height:1.6}.verified{display:inline-flex;padding:8px 13px;border-radius:6px;background:#dff8e9;color:#05843e;font-size:12px;font-weight:800}.edit{height:38px;border:0;border-radius:6px;background:#5b2ce1;color:#fff;padding:0 18px;font-weight:800}.stats-card{padding:22px;display:grid;grid-template-columns:repeat(4,1fr);gap:0;margin-bottom:22px}.stat{display:grid;grid-template-columns:54px 1fr;gap:16px;align-items:center;padding:0 20px;border-right:1px solid #e5e7f2}.stat:last-child{border-right:0}.stat .icon{width:50px;height:50px;border-radius:12px}.stat h2{margin:0 0 8px;font-size:28px}.stat p{margin:0 0 8px;font-size:13px}.stat small{color:#089845;font-size:13px;font-weight:800}.completion{padding:22px 26px}.completion-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px}.completion h2{margin:0;font-size:17px}.completion a{color:#5b2ce1;font-size:12px;font-weight:800}.completion p{margin:0 0 24px;color:#526287;font-size:13px}.progress-row{display:grid;grid-template-columns:1fr 42px;gap:16px;align-items:center;margin-bottom:26px}.progress{height:10px;border-radius:20px;background:#e8eaf4;overflow:hidden}.progress span{display:block;height:100%;background:#6430e8}.checklist{display:grid;grid-template-columns:repeat(5,1fr);gap:14px}.check{display:flex;align-items:center;gap:10px;color:#526287;font-size:12px}.check-dot{width:16px;height:16px;border-radius:50%;border:1px solid #98a5c1;display:flex;align-items:center;justify-content:center;font-size:10px}.check.done .check-dot{background:#15a65b;color:#fff;border-color:#15a65b}@media(max-width:1200px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.profile-card{grid-template-columns:1fr}.logo-box{border-right:0;border-bottom:1px solid #e5e7f2;padding:0 0 24px}.stats-card,.checklist{grid-template-columns:repeat(2,1fr)}.stat{border-right:0;border-bottom:1px solid #e5e7f2;padding:18px 0}.stat:last-child{border-bottom:0}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.profile-card{padding:22px}.stats-card,.checklist{grid-template-columns:1fr}.head h1{font-size:22px}}
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a class="brand" href="/training-partner/dashboard"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav>
            <div class="side-bottom"><div class="upgrade"><h3>Upgrade Your Institute</h3><p>Add more courses and reach thousands of freshers.</p><button class="btn edit">Add New Course</button><div class="upgrade-art">🎓</div></div></div>
        </aside>
        <!-- End Sidebar Section -->

        <main>
            <header class="topbar">
                <button class="hamburger">=</button>
                <div class="top-stats" id="topStats"></div>
                <div class="user"><button class="bell">♢<span>{{ $partner['notifications'] }}</span></button><div class="avatar">TP</div><div><h3>{{ $partner['name'] }}</h3><p>{{ $partner['role'] }}</p></div><button class="chev" id="userMenuBtn">⌄</button><div class="user-menu" id="userMenu"><a href="/training-partner/profile">My Profile</a><a href="/training-partner/login">Logout</a></div></div>
            </header>
            <!-- End Topbar Section -->

            <section class="content">
                <div class="head"><h1>My Profile</h1><p>View and update your institute / company details.</p></div>
                <!-- End Header Section -->

                <article class="card profile-card">
                    <div class="logo-box"><em>Institute Logo</em><div class="institute-logo">&lt;/&gt;</div><button class="change">Change Logo</button></div>
                    <div class="info-block" id="leftInfo"></div>
                    <div class="info-block" id="rightInfo"></div>
                    <div><button class="edit">Edit Profile</button></div>
                </article>
                <!-- End Profile Details Section -->

                <article class="card stats-card" id="stats"></article>
                <!-- End Stats Section -->

                <article class="card completion">
                    <div class="completion-head"><h2>Profile Completion</h2><a href="#">View Checklist</a></div>
                    <p>Complete your profile to unlock more features and build trust with students.</p>
                    <div class="progress-row"><div class="progress"><span id="progressBar"></span></div><strong id="progressText"></strong></div>
                    <div class="checklist" id="checklist"></div>
                </article>
                <!-- End Completion Section -->
            </section>
            <!-- End Content Section -->
        </main>
    </div>

    <script>
        const topStats=@json($topStats),profile=@json($profile),stats=@json($stats),completion=@json($completion);
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('leftInfo').innerHTML=`<div><h3>Institute / Company Name</h3><p>${profile.name}</p></div><div><h3>Email</h3><p>${profile.email}</p></div><div><h3>Phone Number</h3><p>${profile.phone}</p></div><div><h3>Website</h3><p>${profile.website}</p></div>`;
        document.getElementById('rightInfo').innerHTML=`<div><h3>About Us</h3><p>${profile.about}</p></div><div><h3>Address</h3><p>${profile.address}</p></div><div><h3>Partner Since</h3><p>${profile.partnerSince}</p></div><div><h3>Verification Status</h3><span class="verified">${profile.status}</span></div>`;
        document.getElementById('stats').innerHTML=stats.map(item=>`<div class="stat"><span class="icon">${item.icon}</span><div><p>${item.label}</p><h2>${item.value}</h2><small>${item.hint}</small></div></div>`).join('');
        document.getElementById('progressBar').style.width=`${completion.percent}%`;
        document.getElementById('progressText').textContent=`${completion.percent}%`;
        document.getElementById('checklist').innerHTML=completion.items.map(item=>`<div class="check ${item.done?'done':''}"><span class="check-dot">${item.done?'✓':''}</span><span>${item.label}</span></div>`).join('');
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
    </script>
</body>
</html>






