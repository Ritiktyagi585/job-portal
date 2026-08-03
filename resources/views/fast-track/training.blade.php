@extends('fast-track.layouts.app')

@section('title', 'My Training')

@php
    $activePage = 'training';
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
    $courses = [
        ['title' => 'Full Stack Development', 'text' => 'Build modern web applications', 'status' => 'In Progress', 'progress' => 45, 'color' => '#24249c'],
        ['title' => 'Data Science & Analytics', 'text' => 'Analyze data and build solutions', 'status' => 'In Progress', 'progress' => 30, 'color' => '#6041db'],
        ['title' => 'Digital Marketing', 'text' => 'Master online marketing skills', 'status' => 'Not Started', 'progress' => 0, 'color' => '#44bda9'],
        ['title' => 'Backend Development', 'text' => 'Learn server-side development', 'status' => 'Not Started', 'progress' => 0, 'color' => '#ffad34'],
    ];
    $activity = [
        ['title' => 'Completed lesson "HTML Forms and Inputs"', 'course' => 'Full Stack Development', 'time' => '2 hours ago', 'icon' => 'OK'],
        ['title' => 'Started lesson "Data Cleaning Basics"', 'course' => 'Data Science & Analytics', 'time' => '1 day ago', 'icon' => 'ST'],
        ['title' => 'Enrolled in "Digital Marketing"', 'course' => '', 'time' => '3 days ago', 'icon' => 'EN'],
        ['title' => 'Completed lesson "Introduction to React"', 'course' => 'Full Stack Development', 'time' => '5 days ago', 'icon' => 'OK'],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f6f9ff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:260px 1fr}.sidebar{background:#fff;border-right:1px solid #dce7f8;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 18px;border-bottom:1px solid #dce7f8}.brand img{width:205px}.menu{padding:28px 14px 18px;display:grid;gap:8px}.menu-item{min-height:42px;display:flex;align-items:center;gap:14px;padding:8px 12px;border-radius:8px;font-size:14px}.menu-item.active{background:#eaf2ff;color:#075fe4;font-weight:700}.menu-icon,.icon{width:28px;height:28px;border-radius:7px;background:#f0f5ff;color:#075fe4;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:800;flex:0 0 auto}.side-bottom{margin-top:auto;padding:18px 22px 28px;border-top:1px solid #dce7f8;display:grid;gap:12px}.bottom-link{display:flex;align-items:center;gap:14px;font-size:14px;min-height:34px}.topbar{height:76px;background:#fff;border-bottom:1px solid #dce7f8;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#061942}.user{display:flex;align-items:center;gap:12px;position:relative}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;display:flex;align-items:center;justify-content:center}.bell svg,.user button svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.bell span{position:absolute;top:-1px;right:0;width:15px;height:15px;border-radius:50%;background:#ff3045;color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;font-weight:700}.top-avatar{width:46px;height:46px;border-radius:50%;background-image:url('{{ asset('student.png') }}');background-size:220px auto;background-position:16% 28%;border:3px solid #eaf2ff}.user h3{margin:0;font-size:14px}.user button:last-child{border:0;background:transparent;cursor:pointer;display:flex}.user-menu{position:absolute;top:58px;right:0;width:155px;border:1px solid #dce7f8;border-radius:8px;background:#fff;box-shadow:0 12px 28px rgba(6,25,66,.12);display:none;z-index:5}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 30px 38px}.head{display:flex;justify-content:space-between;gap:20px;align-items:flex-start;margin-bottom:24px}.head h1{margin:0 0 8px;font-size:27px}.head p{margin:0;color:#334b83;font-size:14px}.browse{height:40px;border:1px solid #075fe4;background:#fff;color:#075fe4;border-radius:7px;padding:0 18px;font-size:13px;font-weight:700}.tabs{display:flex;gap:34px;border-bottom:1px solid #dce7f8;margin-bottom:24px}.tab{border:0;background:transparent;padding:0 0 14px;font-size:14px;color:#334b83;cursor:pointer;border-bottom:3px solid transparent}.tab.active{color:#075fe4;border-bottom-color:#075fe4;font-weight:700}.course-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:22px;margin-bottom:22px}.card{background:#fff;border:1px solid #dce7f8;border-radius:9px;box-shadow:0 10px 24px rgba(6,25,66,.04)}.course-card{overflow:hidden}.thumb{height:135px;background:linear-gradient(135deg,var(--c),#dff5ff);position:relative;padding:14px}.status{display:inline-flex;background:#e6fff0;color:#05843e;border-radius:7px;padding:7px 12px;font-size:12px;font-weight:700}.pct{float:right;background:#fff;color:#075fe4;border-radius:50%;padding:8px 9px;font-size:12px;font-weight:800}.thumb h4{position:absolute;bottom:28px;left:22px;margin:0;color:#fff;font-size:36px}.course-body{padding:18px}.course-body h3{margin:0 0 10px;font-size:15px}.course-body p{margin:0 0 18px;color:#334b83;font-size:13px}.bar{height:7px;background:#e9edf5;border-radius:20px;overflow:hidden;margin-bottom:12px}.bar span{display:block;height:100%;background:#075fe4}.course-body small{color:#334b83}.actions{display:grid;grid-template-columns:1fr 44px;gap:10px;margin-top:18px}.primary,.save{height:38px;border-radius:7px;font-weight:700;cursor:pointer}.primary{border:1px solid #075fe4;background:#fff;color:#075fe4}.course-card:first-child .primary{background:#075fe4;color:#fff}.save{border:1px solid #dce7f8;background:#fff;color:#061942}.bottom-grid{display:grid;grid-template-columns:1.05fr 1fr;gap:20px}.section{padding:22px}.section h2{margin:0 0 22px;font-size:17px}.progress-wrap{display:grid;grid-template-columns:180px 1fr;gap:28px;align-items:center}.ring{width:150px;height:150px;border-radius:50%;background:conic-gradient(#075fe4 0 38%,#e9edf5 38% 100%);display:flex;align-items:center;justify-content:center}.ring span{width:110px;height:110px;border-radius:50%;background:#fff;display:flex;align-items:center;justify-content:center;text-align:center;font-size:26px;font-weight:800;line-height:1.2}.stats{display:grid;gap:17px}.stat-row{display:grid;grid-template-columns:1fr auto;gap:20px;font-size:13px}.activity-row{display:grid;grid-template-columns:38px 1fr auto;gap:14px;align-items:center;padding:13px 0;border-bottom:1px solid #e6eef8}.activity-row:last-child{border-bottom:0}.activity-row h3{margin:0 0 6px;font-size:13px}.activity-row p,.activity-row time{margin:0;color:#536484;font-size:12px}.view-all{float:right;color:#075fe4;font-size:12px}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.course-grid{grid-template-columns:repeat(2,1fr)}.bottom-grid{grid-template-columns:1fr}}@media(max-width:650px){.content{padding:22px 14px}.topbar{padding:0 14px}.head{flex-direction:column}.course-grid,.progress-wrap{grid-template-columns:1fr}.tabs{overflow-x:auto}}
</style>
@endpush

@section('content')
<section class="content">
<div class="head"><div><h1>My Training</h1><p>Continue learning and track your enrolled courses.</p></div><button class="browse" onclick="location.href='/fast-track/courses'">Browse Courses</button></div>
    <div class="tabs"><button class="tab active" data-tab="enrolled">Enrolled Courses</button><button class="tab" data-tab="progress">Learning Progress</button></div>
    <div class="course-grid" id="trainingGrid"></div>
    <div class="bottom-grid"><article class="card section"><h2><span class="icon">OP</span> Overall Progress</h2><div class="progress-wrap"><div class="ring"><span>38%<br><small>Overall</small></span></div><div class="stats"><p>Keep going! You are doing great.</p><div class="stat-row"><span>Courses Enrolled</span><strong>4</strong></div><div class="stat-row"><span>Courses Completed</span><strong>0</strong></div><div class="stat-row"><span>Total Lessons Completed</span><strong>28/74</strong></div><div class="stat-row"><span>Total Study Time</span><strong>12h 45m</strong></div></div></div></article>
    <article class="card section"><h2><span class="icon">RA</span> Recent Activity <a class="view-all" href="#">View All</a></h2><div id="activityList"></div></article></div>
</section>
@endsection

@push('scripts')
<script>
const courses=@json($courses),activities=@json($activity),grid=document.getElementById('trainingGrid'),activityList=document.getElementById('activityList');
        function renderCourses(list){grid.innerHTML='';list.forEach(c=>{grid.innerHTML+=`<article class="card course-card"><div class="thumb" style="--c:${c.color}"><span class="status">${c.status}</span><span class="pct">${c.progress}%</span><h4>${c.icon}</h4></div><div class="course-body"><h3>${c.title}</h3><p>${c.text}</p><div class="bar"><span style="width:${c.progress}%"></span></div><small>${c.progress}% Completed</small><div class="actions"><button class="primary">${c.progress?'Continue Learning':'Start Learning'}</button><button class="save">BM</button></div></div></article>`})}
        function renderActivities(){activityList.innerHTML='';activities.forEach(a=>{activityList.innerHTML+=`<div class="activity-row"><span class="icon">${a.icon}</span><div><h3>${a.title}</h3><p>${a.course}</p></div><time>${a.time}</time></div>`})}
        document.querySelectorAll('.tab').forEach(tab=>tab.addEventListener('click',()=>{document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));tab.classList.add('active');renderCourses(tab.dataset.tab==='progress'?courses.filter(c=>c.progress>0):courses)}));renderCourses(courses);renderActivities();
</script>
@endpush