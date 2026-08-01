@php
    $activePage = 'applications';
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
    $stats = [
        ['label' => 'Total Applied', 'value' => 12, 'icon' => 'TA', 'filter' => 'All Applications'],
        ['label' => 'Under Review', 'value' => 3, 'icon' => 'UR', 'filter' => 'Under Review'],
        ['label' => 'Shortlisted', 'value' => 2, 'icon' => 'SL', 'filter' => 'Shortlisted'],
        ['label' => 'Interview', 'value' => 1, 'icon' => 'IN', 'filter' => 'Interview'],
        ['label' => 'Offer', 'value' => 1, 'icon' => 'OF', 'filter' => 'Offer'],
        ['label' => 'Rejected', 'value' => 5, 'icon' => 'RJ', 'filter' => 'Rejected'],
    ];
    $applications = [
        ['id' => 1, 'title' => 'Frontend Developer', 'company' => 'Microsoft', 'logo' => 'MS', 'location' => 'Bangalore, India', 'date' => 'Applied on 20 May 2026', 'sortDate' => '2026-05-20', 'status' => 'Under Review', 'saved' => true],
        ['id' => 2, 'title' => 'Software Engineer', 'company' => 'IndiaMART InterMESH Ltd.', 'logo' => 'IM', 'location' => 'Noida, India', 'date' => 'Applied on 18 May 2026', 'sortDate' => '2026-05-18', 'status' => 'Shortlisted', 'saved' => false],
        ['id' => 3, 'title' => 'Backend Developer', 'company' => 'Swiggy', 'logo' => 'SW', 'location' => 'Bangalore, India', 'date' => 'Applied on 15 May 2026', 'sortDate' => '2026-05-15', 'status' => 'Interview Scheduled', 'time' => '22 May 2026, 10:00 AM', 'saved' => true],
        ['id' => 4, 'title' => 'Junior Software Developer', 'company' => 'Zoho Corporation', 'logo' => 'ZH', 'location' => 'Chennai, India', 'date' => 'Applied on 12 May 2026', 'sortDate' => '2026-05-12', 'status' => 'Offer Received', 'saved' => false],
        ['id' => 5, 'title' => 'Associate Software Engineer', 'company' => 'PhonePe', 'logo' => 'PP', 'location' => 'Bangalore, India', 'date' => 'Applied on 10 May 2026', 'sortDate' => '2026-05-10', 'status' => 'Rejected', 'saved' => false],
    ];
    $tips = [
        'Keep your profile updated and complete all sections.',
        'Customize your resume for each job application.',
        'Follow up after a week if you do not hear back.',
        'Keep learning and improve your skills.',
    ];
    $interviews = [
        ['title' => 'Backend Developer', 'company' => 'Swiggy', 'logo' => 'SW', 'date' => '22 May 2026', 'time' => '10:00 AM'],
        ['title' => 'Junior Software Developer', 'company' => 'Zoho Corporation', 'logo' => 'ZH', 'date' => '25 May 2026', 'time' => '02:00 PM'],
        ['title' => 'Frontend Developer', 'company' => 'Microsoft', 'logo' => 'MS', 'date' => '28 May 2026', 'time' => '11:30 AM'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f6f9ff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:260px 1fr}.sidebar{background:#fff;border-right:1px solid #dce7f8;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 18px;border-bottom:1px solid #dce7f8}.brand img{width:205px}.menu{padding:28px 14px 18px;display:grid;gap:8px}.menu-item{min-height:42px;display:flex;align-items:center;gap:14px;padding:8px 12px;border-radius:8px;font-size:14px}.menu-item.active{background:#eaf2ff;color:#075fe4;font-weight:700}.menu-icon,.icon{width:28px;height:28px;border-radius:7px;background:#f0f5ff;color:#075fe4;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:800;flex:0 0 auto}.side-bottom{margin-top:auto;padding:18px 22px 28px;border-top:1px solid #dce7f8;display:grid;gap:12px}.bottom-link{display:flex;align-items:center;gap:14px;font-size:14px;min-height:34px}.topbar{height:76px;background:#fff;border-bottom:1px solid #dce7f8;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#061942}.user{display:flex;align-items:center;gap:12px;position:relative}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;display:flex;align-items:center;justify-content:center}.bell svg,.user button svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.bell span{position:absolute;top:-1px;right:0;width:15px;height:15px;border-radius:50%;background:#ff3045;color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;font-weight:700}.top-avatar{width:46px;height:46px;border-radius:50%;background-image:url('{{ asset('student.png') }}');background-size:220px auto;background-position:16% 28%;border:3px solid #eaf2ff}.user h3{margin:0;font-size:14px}.user button:last-child{border:0;background:transparent;cursor:pointer;display:flex}.user-menu{position:absolute;top:58px;right:0;width:155px;border:1px solid #dce7f8;border-radius:8px;background:#fff;box-shadow:0 12px 28px rgba(6,25,66,.12);display:none;z-index:5}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 30px 38px}.head{display:flex;align-items:flex-start;justify-content:space-between;gap:18px;margin-bottom:22px}.head h1{margin:0 0 8px;font-size:27px}.head p{margin:0;color:#334b83;font-size:14px}.btn{height:42px;border:1px solid #075fe4;border-radius:5px;background:#075fe4;color:#fff;padding:0 20px;font-weight:700;cursor:pointer}.btn.light{background:#fff;color:#075fe4}.stats-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:16px;margin-bottom:22px}.card{background:#fff;border:1px solid #dce7f8;border-radius:9px;box-shadow:0 10px 24px rgba(6,25,66,.04)}.stat-card{padding:18px;display:grid;grid-template-columns:48px 1fr;gap:14px;align-items:center}.stat-card .icon{width:44px;height:44px;border-radius:11px}.stat-card h2{margin:0 0 6px;font-size:23px}.stat-card p{margin:0 0 8px;color:#334b83;font-size:12px}.stat-card a{color:#075fe4;font-size:12px;font-weight:700}.tabs-row{display:flex;justify-content:space-between;gap:18px;align-items:center;margin-bottom:18px}.tabs{display:flex;gap:28px;border-bottom:1px solid #dce7f8;flex:1}.tab{padding:0 16px 14px;border:0;background:transparent;color:#334b83;font-size:13px;font-weight:700;cursor:pointer}.tab.active{color:#075fe4;border-bottom:3px solid #075fe4}.sort{height:42px;border:1px solid #cfe0ff;border-radius:6px;background:#fff;padding:0 14px;color:#061942;font-size:13px}.main-grid{display:grid;grid-template-columns:1fr 330px;gap:18px}.app-list{display:grid;gap:12px}.app-card{background:#fff;border:1px solid #dce7f8;border-radius:9px;padding:12px;display:grid;grid-template-columns:84px 1fr 190px 118px 28px;gap:16px;align-items:center}.logo{width:76px;height:76px;border:1px solid #dce7f8;border-radius:8px;background:#f8fbff;color:#075fe4;display:flex;align-items:center;justify-content:center;font-weight:800}.app-card h2{margin:0 0 8px;font-size:16px}.app-card p{margin:0 0 10px;color:#334b83;font-size:13px}.meta{display:flex;gap:12px;flex-wrap:wrap;color:#334b83;font-size:12px}.status{display:inline-flex;align-items:center;justify-content:center;padding:8px 12px;border-radius:7px;background:#fff2d8;color:#b66b00;font-size:12px;font-weight:700}.status.green{background:#e2f9ea;color:#05843e}.status.purple{background:#efeaff;color:#673de6}.status.blue{background:#eaf2ff;color:#075fe4}.status.red{background:#ffe9ec;color:#f0202f}.save{border:0;background:transparent;color:#061942;font-size:21px;cursor:pointer}.side-card{background:#fff;border:1px solid #dce7f8;border-radius:9px;margin-bottom:16px;overflow:hidden}.side-head{display:flex;align-items:center;justify-content:space-between;padding:18px 20px;background:#f8fbff}.side-head h2{margin:0;font-size:16px}.side-head a{color:#075fe4;font-size:12px;font-weight:700}.tips{padding:18px 20px;display:grid;gap:16px}.tip{display:flex;gap:12px;font-size:13px;line-height:1.5;color:#334b83}.check{width:17px;height:17px;border-radius:50%;background:#16a35a;color:#fff;display:flex;align-items:center;justify-content:center;font-size:11px;flex:0 0 auto}.interview-list{display:grid}.interview{display:grid;grid-template-columns:44px 1fr auto;gap:12px;padding:13px 18px;border-top:1px solid #e6eef8;align-items:center}.interview .logo{width:40px;height:40px;font-size:10px}.interview h3{margin:0 0 5px;font-size:12px}.interview p,.interview time{margin:0;color:#334b83;font-size:11px;line-height:1.5}.pager{display:flex;justify-content:center;gap:10px;margin-top:20px}.page-btn{min-width:38px;height:38px;border:1px solid #cfe0ff;border-radius:6px;background:#fff;color:#061942;font-weight:700}.page-btn.active{background:#075fe4;color:#fff}@media(max-width:1240px){.layout{grid-template-columns:1fr}.sidebar{display:none}.stats-grid{grid-template-columns:repeat(3,1fr)}.main-grid{grid-template-columns:1fr}.app-card{grid-template-columns:78px 1fr auto}}@media(max-width:760px){.content{padding:22px 14px}.topbar{padding:0 14px}.head,.tabs-row{flex-direction:column;align-items:stretch}.stats-grid{grid-template-columns:1fr}.tabs{overflow:auto}.app-card{grid-template-columns:1fr}.btn{width:100%}}
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar"><a href="/fast-track/dashboard" class="brand"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a><nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage===$item['key']?'active':'' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav><div class="side-bottom"><a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a><a class="bottom-link" href="/fast-track/login"><span class="menu-icon">LO</span><span>Logout</span></a></div></aside>
    <main><header class="topbar"><button class="hamburger">=</button><div class="user"><button class="bell"><svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg><span>{{ $student['notifications'] }}</span></button><div class="top-avatar"></div><h3>{{ $student['name'] }}</h3><button id="userMenuBtn"><svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg></button><div class="user-menu" id="userMenu"><a href="/fast-track/profile">My Profile</a><a href="/fast-track/login">Logout</a></div></div></header>
    <section class="content"><div class="head"><div><h1>My Applications</h1><p>Track the status of your job applications.</p></div><a class="btn light" href="/fast-track/job-recommendations">Browse Jobs</a></div><div class="stats-grid" id="stats"></div><div class="tabs-row"><div class="tabs" id="tabs"></div><select class="sort" id="sortSelect"><option value="newest">Sort by: Newest</option><option value="oldest">Sort by: Oldest</option></select></div><div class="main-grid"><div><div class="app-list" id="applicationList"></div><div class="pager"><button class="page-btn">Previous</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">5</button><button class="page-btn">Next</button></div></div><aside><article class="side-card"><div class="side-head"><h2>Application Tips</h2></div><div class="tips" id="tips"></div><div style="padding:0 20px 18px"><a href="#" style="color:#075fe4;font-weight:700;font-size:13px">View More Tips -></a></div></article><article class="side-card"><div class="side-head"><h2>Upcoming Interviews</h2><a href="#">View All</a></div><div class="interview-list" id="interviews"></div><div style="padding:16px 18px"><a href="#" style="color:#075fe4;font-weight:700;font-size:13px">Prepare for Interviews -></a></div></article></aside></div></section></main>
</div>
<script>
    const stats=@json($stats),tips=@json($tips),interviews=@json($interviews);
    let applications=@json($applications);
    let currentTab='All Applications';
    const statusClass={Shortlisted:'green','Interview Scheduled':'purple','Offer Received':'blue',Rejected:'red'};
    const tabs=['All Applications','Applied','Under Review','Shortlisted','Interview','Offer','Rejected'];
    const list=document.getElementById('applicationList');
    document.getElementById('stats').innerHTML=stats.map(s=>`<article class="card stat-card"><span class="icon">${s.icon}</span><div><h2>${s.value}</h2><p>${s.label}</p><a href="#" data-filter="${s.filter}">View All</a></div></article>`).join('');
    document.getElementById('tabs').innerHTML=tabs.map((t,i)=>`<button class="tab ${i===0?'active':''}" data-tab="${t}">${t}</button>`).join('');
    function setActiveTab(tab){
        currentTab=tab;
        document.querySelectorAll('.tab').forEach(t=>t.classList.toggle('active',t.dataset.tab===tab));
        renderApplications();
    }
    function getFilteredApplications(){
        let filtered=currentTab==='All Applications'?applications:applications.filter(a=>a.status.includes(currentTab)||currentTab==='Applied');
        const sort=document.getElementById('sortSelect').value;
        return filtered.slice().sort((a,b)=>sort==='newest'?b.sortDate.localeCompare(a.sortDate):a.sortDate.localeCompare(b.sortDate));
    }
    function renderApplications(){
        const filtered=getFilteredApplications();
        list.innerHTML=filtered.map(a=>`<article class="app-card"><span class="logo">${a.logo}</span><div><h2>${a.title}</h2><p>${a.company} <strong style="color:#075fe4">✓</strong></p><div class="meta"><span>${a.location}</span><span>•</span><span>${a.date}</span></div></div><div><span class="status ${statusClass[a.status]||''}">${a.status}</span>${a.time?`<div style="margin-top:12px;font-size:12px;color:#334b83">${a.time}</div>`:''}</div><button class="btn light detail-btn" data-id="${a.id}">View Details</button><button class="save save-btn" data-id="${a.id}">${a.saved?'▣':'▢'}</button></article>`).join('');
    }
    document.getElementById('tabs').addEventListener('click',e=>{if(!e.target.matches('.tab'))return;setActiveTab(e.target.dataset.tab)});
    document.getElementById('stats').addEventListener('click',e=>{if(!e.target.dataset.filter)return;e.preventDefault();setActiveTab(e.target.dataset.filter)});
    document.getElementById('sortSelect').addEventListener('change',renderApplications);
    list.addEventListener('click',e=>{
        const save=e.target.closest('.save-btn');
        const detail=e.target.closest('.detail-btn');
        if(save){
            const app=applications.find(item=>item.id==save.dataset.id);
            app.saved=!app.saved;
            renderApplications();
        }
        if(detail){
            const app=applications.find(item=>item.id==detail.dataset.id);
            alert(`${app.title}\n${app.company}\nStatus: ${app.status}`);
        }
    });
    document.getElementById('tips').innerHTML=tips.map(t=>`<div class="tip"><span class="check">✓</span><span>${t}</span></div>`).join('');
    document.getElementById('interviews').innerHTML=interviews.map(i=>`<div class="interview"><span class="logo">${i.logo}</span><div><h3>${i.title}</h3><p>${i.company}</p></div><time>${i.date}<br>${i.time}</time></div>`).join('');
    renderApplications();
    document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
</script>
</body>
</html>

