@extends('training-partner.layouts.app')

@section('title', 'Enrollments')

@php
    $activePage = 'enrollments';
    $topStats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $stats = [
        ['label' => 'Total Enrollments', 'value' => '1,250', 'hint' => 'All Courses', 'icon' => 'TE'],
        ['label' => 'Active Students', 'value' => '820', 'hint' => 'Currently Learning', 'icon' => 'AS'],
        ['label' => 'Completed Students', 'value' => '430', 'hint' => 'Completed Courses', 'icon' => 'CS'],
        ['label' => 'New This Month', 'value' => '120', 'hint' => '+12% from last month', 'icon' => 'NM'],
    ];
    $enrollments = [
        ['student' => 'Ananya Gupta', 'email' => 'ananya.gupta@email.com', 'avatar' => 'AG', 'course' => 'Full Stack Development', 'courseIcon' => 'FS', 'meta' => '12 Modules • 6 Months', 'date' => '10 May 2024', 'time' => '10:30 AM', 'progress' => 40, 'status' => 'Active'],
        ['student' => 'Rohit Kumar', 'email' => 'rohit.kumar@email.com', 'avatar' => 'RK', 'course' => 'Data Science & Analytics', 'courseIcon' => 'DS', 'meta' => '10 Modules • 5 Months', 'date' => '07 May 2024', 'time' => '09:15 AM', 'progress' => 60, 'status' => 'Active'],
        ['student' => 'Priya Singh', 'email' => 'priya.singh@email.com', 'avatar' => 'PS', 'course' => 'Digital Marketing', 'courseIcon' => 'DM', 'meta' => '8 Modules • 3 Months', 'date' => '05 May 2024', 'time' => '11:45 AM', 'progress' => 30, 'status' => 'Active'],
        ['student' => 'Aman Sharma', 'email' => 'aman.sharma@email.com', 'avatar' => 'AS', 'course' => 'React for Beginners', 'courseIcon' => 'RB', 'meta' => '6 Modules • 2 Months', 'date' => '04 May 2024', 'time' => '02:20 PM', 'progress' => 70, 'status' => 'Active'],
        ['student' => 'Neha Verma', 'email' => 'neha.verma@email.com', 'avatar' => 'NV', 'course' => 'Python Programming', 'courseIcon' => 'PY', 'meta' => '8 Modules • 3 Months', 'date' => '02 May 2024', 'time' => '04:10 PM', 'progress' => 20, 'status' => 'Pending'],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px 1fr}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:20px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 34px 36px}.head h1{margin:0 0 8px;font-size:22px}.head p{margin:0 0 24px;color:#526287;font-size:13px}.btn{height:36px;border:1px solid #5b2ce1;border-radius:5px;background:#5b2ce1;color:#fff;padding:0 14px;font-weight:800}.filters{display:grid;grid-template-columns:250px 170px 150px 1fr 250px;gap:18px;margin-bottom:24px}.input,.select{height:38px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 14px;font-size:13px}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:20px}.stat-card{min-height:132px;padding:22px;display:grid;grid-template-columns:62px 1fr;gap:18px;align-items:center}.stat-card .icon{width:58px;height:58px;border-radius:50%;font-size:11px}.stat-card h2{margin:0 0 12px;font-size:30px}.stat-card p{margin:0 0 12px;font-size:13px}.stat-card small{color:#526287;font-size:13px}.stat-card small.green{color:#089845}.table-card{overflow:hidden}.table-head,.enroll-row{display:grid;grid-template-columns:1.25fr 1.35fr .8fr 1fr .7fr 80px;align-items:center}.table-head{padding:18px 22px;border-bottom:1px solid #e5e7f2;font-size:13px;font-weight:800}.enroll-row{padding:18px 22px;border-bottom:1px solid #e5e7f2;min-height:92px}.enroll-row:last-child{border-bottom:0}.student,.course{display:flex;align-items:center;gap:14px}.student-avatar{width:48px;height:48px;border-radius:50%;background:#eaf1ff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:900}.course-icon{width:40px;height:40px;border:1px solid #d8c8ff;border-radius:7px;background:#f1eaff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900}.student h2,.course h2{margin:0 0 7px;font-size:13px}.student p,.course p,.date p{margin:0;color:#526287;font-size:12px;line-height:1.5}.progress-label{font-size:13px;font-weight:800;margin-bottom:8px}.bar{width:150px;height:7px;border-radius:20px;background:#e7eaf2;overflow:hidden}.bar span{display:block;height:100%;background:#6b31e8}.status{display:inline-flex;padding:8px 12px;border-radius:7px;background:#e2f9ea;color:#05843e;font-size:12px}.status.pending{background:#fff2df;color:#d06d00}.action{width:38px;height:38px;border:1px solid #dce3f2;border-radius:7px;background:#fff;color:#0a1748;font-size:20px;font-weight:900;cursor:pointer}.footer{padding:20px 22px;display:flex;justify-content:space-between;align-items:center;color:#526287;font-size:12px;border-top:1px solid #e5e7f2}.pages{display:flex;gap:10px}.page-btn{min-width:36px;height:36px;border:1px solid #dce3f2;border-radius:6px;background:#fff;color:#0a1748;font-weight:800}.page-btn.active{background:#5b2ce1;color:#fff}.page-size{height:36px;border:1px solid #dce3f2;border-radius:6px;background:#fff;padding:0 14px;color:#26375f}.empty{padding:36px;text-align:center;color:#526287}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.stats-grid{grid-template-columns:repeat(2,1fr)}.filters{grid-template-columns:1fr 1fr}.table-card{overflow:auto}.table-head,.enroll-row{min-width:1040px}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.stats-grid,.filters{grid-template-columns:1fr}}
</style>
@endpush

@section('content')
<div class="head"><h1>Enrollments</h1><p>View and manage student enrollments in your courses.</p></div>
                <!-- End Header Section -->

                <div class="filters"><input class="input" id="searchInput" placeholder="Search student or course..."><select class="select" id="courseFilter"><option>All Courses</option></select><select class="select" id="statusFilter"><option>All Status</option><option>Active</option><option>Pending</option></select><span></span><select class="select"><option>15 Apr 2024 - 15 May 2024</option></select></div>
                <!-- End Filter Section -->

                <div class="stats-grid" id="stats"></div>
                <!-- End Stats Section -->

                <article class="card table-card">
                    <div class="table-head"><span>Student</span><span>Course</span><span>Enrollment Date</span><span>Progress</span><span>Status</span><span>Actions</span></div>
                    <div id="enrollmentRows"></div>
                    <div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">‹</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">5</button><button class="page-btn">›</button><select class="page-size"><option>5 / page</option><option>10 / page</option></select></div></div>
                </article>
                <!-- End Enrollment Table Section -->
@endsection

@push('scripts')
<script>
const topStats=@json($topStats),stats=@json($stats);
        let enrollments=@json($enrollments);
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('stats').innerHTML=stats.map(item=>`<article class="card stat-card"><span class="icon">${item.icon}</span><div><p>${item.label}</p><h2>${item.value}</h2><small class="${item.hint.includes('+')?'green':''}">${item.hint}</small></div></article>`).join('');
        const uniqueCourses=[...new Set(enrollments.map(item=>item.course))];
        document.getElementById('courseFilter').innerHTML='<option>All Courses</option>'+uniqueCourses.map(course=>`<option>${course}</option>`).join('');

        function renderEnrollments(){
            const query=document.getElementById('searchInput').value.toLowerCase();
            const course=document.getElementById('courseFilter').value;
            const status=document.getElementById('statusFilter').value;
            const filtered=enrollments.filter(item=>
                `${item.student} ${item.email} ${item.course}`.toLowerCase().includes(query) &&
                (course==='All Courses'||item.course===course) &&
                (status==='All Status'||item.status===status)
            );
            document.getElementById('enrollmentRows').innerHTML=filtered.length?filtered.map(item=>`<div class="enroll-row"><div class="student"><span class="student-avatar">${item.avatar}</span><div><h2>${item.student}</h2><p>${item.email}</p></div></div><div class="course"><span class="course-icon">${item.courseIcon}</span><div><h2>${item.course}</h2><p>${item.meta}</p></div></div><div class="date"><p>${item.date}<br>${item.time}</p></div><div><div class="progress-label">${item.progress}%</div><div class="bar"><span style="width:${item.progress}%"></span></div></div><span class="status ${item.status==='Pending'?'pending':''}">${item.status}</span><button class="action" data-student="${item.student}">⋮</button></div>`).join(''):`<div class="empty">No enrollments found.</div>`;
            document.getElementById('resultText').textContent=`Showing 1 to ${filtered.length} of ${enrollments.length} enrollments`;
        }

        ['searchInput','courseFilter','statusFilter'].forEach(id=>document.getElementById(id).addEventListener('input',renderEnrollments));
        document.getElementById('enrollmentRows').addEventListener('click',event=>{const btn=event.target.closest('.action');if(btn)alert(`Actions for ${btn.dataset.student}`)});
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
        renderEnrollments();
</script>
@endpush



