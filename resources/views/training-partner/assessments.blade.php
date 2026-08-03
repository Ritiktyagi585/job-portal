@extends('training-partner.layouts.app')

@section('title', 'Assessments')

@php
    $activePage = 'assessments';
    $topStats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $assessments = [
        ['name' => 'HTML Assignment', 'created' => 'Created on 10 May 2024', 'icon' => 'HA', 'course' => 'Full Stack Development', 'courseIcon' => 'FS', 'type' => 'Assignment', 'questions' => 5, 'duration' => '30 mins', 'status' => 'Published', 'date' => '10 May 2024'],
        ['name' => 'React Quiz', 'created' => 'Created on 08 May 2024', 'icon' => 'RQ', 'course' => 'React for Beginners', 'courseIcon' => 'RB', 'type' => 'Quiz', 'questions' => 10, 'duration' => '20 mins', 'status' => 'Published', 'date' => '08 May 2024'],
        ['name' => 'Data Analysis Assignment', 'created' => 'Created on 05 May 2024', 'icon' => 'DA', 'course' => 'Data Science & Analytics', 'courseIcon' => 'DS', 'type' => 'Assignment', 'questions' => 4, 'duration' => '40 mins', 'status' => 'Published', 'date' => '05 May 2024'],
        ['name' => 'Marketing Fundamentals Quiz', 'created' => 'Created on 03 May 2024', 'icon' => 'MQ', 'course' => 'Digital Marketing', 'courseIcon' => 'DM', 'type' => 'Quiz', 'questions' => 15, 'duration' => '25 mins', 'status' => 'Published', 'date' => '03 May 2024'],
        ['name' => 'Python Basics Test', 'created' => 'Created on 28 Apr 2024', 'icon' => 'PT', 'course' => 'Python Programming', 'courseIcon' => 'PY', 'type' => 'Test', 'questions' => 20, 'duration' => '45 mins', 'status' => 'Draft', 'date' => '28 Apr 2024'],
        ['name' => 'JavaScript Assignment', 'created' => 'Created on 25 Apr 2024', 'icon' => 'JA', 'course' => 'Full Stack Development', 'courseIcon' => 'FS', 'type' => 'Assignment', 'questions' => 6, 'duration' => '35 mins', 'status' => 'Archived', 'date' => '25 Apr 2024'],
    ];
    $overview = [
        ['label' => 'Total Assessments', 'value' => 18, 'icon' => 'TA'],
        ['label' => 'Published', 'value' => 12, 'icon' => 'PB'],
        ['label' => 'Drafts', 'value' => 3, 'icon' => 'DR'],
        ['label' => 'Archived', 'value' => 3, 'icon' => 'AR'],
    ];
    $results = [
        ['name' => 'Rohit Kumar', 'course' => 'React Quiz', 'meta' => '10 May 2024 • 20 mins', 'score' => 85, 'status' => 'Passed', 'avatar' => 'RK'],
        ['name' => 'Ananya Gupta', 'course' => 'HTML Assignment', 'meta' => '10 May 2024 • 30 mins', 'score' => 92, 'status' => 'Passed', 'avatar' => 'AG'],
        ['name' => 'Aman Sharma', 'course' => 'Data Analysis Assignment', 'meta' => '09 May 2024 • 40 mins', 'score' => 78, 'status' => 'Passed', 'avatar' => 'AS'],
        ['name' => 'Priya Singh', 'course' => 'Marketing Quiz', 'meta' => '08 May 2024 • 25 mins', 'score' => 65, 'status' => 'Needs Improve', 'avatar' => 'PS'],
    ];
    $tips = ['Keep questions clear and concise', 'Use real-world scenarios', 'Set appropriate time limits', 'Review results and provide feedback'];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}html,body{max-width:100%;overflow-x:hidden}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px minmax(0,1fr);max-width:100vw}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column;min-width:0}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px;min-width:0}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 18px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:16px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:24px 24px 30px;min-width:0}.head h1{margin:0 0 8px;font-size:22px}.head p{margin:0 0 24px;color:#526287;font-size:13px}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.page-grid{display:grid;grid-template-columns:minmax(0,1fr) 300px;gap:18px;min-width:0}.tabs{display:flex;gap:30px;border-bottom:1px solid #dddff0;margin-bottom:24px}.tab{border:0;background:transparent;padding:0 8px 14px;color:#0a1748;font-weight:700;cursor:pointer}.tab.active{color:#5b2ce1;border-bottom:3px solid #5b2ce1}.filters{display:grid;grid-template-columns:minmax(170px,1fr) 145px 145px 120px 145px;gap:14px;margin-bottom:20px}.input,.select{height:36px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 12px;font-size:12px;min-width:0}.btn{height:36px;border:1px solid #5b2ce1;border-radius:5px;background:#5b2ce1;color:#fff;padding:0 12px;font-weight:800;cursor:pointer;font-size:12px}.table-card{overflow:hidden}.table-head,.assess-row{display:grid;grid-template-columns:1.35fr 1fr .78fr .62fr .62fr .78fr 112px;gap:10px;align-items:center}.table-head{padding:14px 14px;border-bottom:1px solid #e5e7f2;font-size:11px;font-weight:800}.assess-row{padding:14px;border-bottom:1px solid #e5e7f2;min-height:78px}.assess-row:last-child{border-bottom:0}.cell-main,.course-cell{display:flex;gap:10px;align-items:center;min-width:0}.cell-main h2,.course-cell h3{margin:0 0 6px;font-size:11px}.cell-main p,.course-cell p,.small{margin:0;color:#526287;font-size:10px;line-height:1.45}.badge,.status{display:inline-flex;padding:6px 8px;border-radius:7px;font-size:10px}.badge{background:#efeaff;color:#5b2ce1}.badge.blue{background:#eaf1ff;color:#2867db}.badge.green{background:#e2f9ea;color:#05843e}.status{background:#dff8e9;color:#05843e}.status.draft{background:#fff0de;color:#d06d00}.status.archived{background:#edf1f7;color:#3c4864}.actions{display:flex;gap:6px}.action{width:30px;height:30px;border:1px solid #dce3f2;border-radius:6px;background:#fff;cursor:pointer;font-size:11px}.footer{padding:16px 14px;display:flex;justify-content:space-between;align-items:center;color:#526287;font-size:11px;border-top:1px solid #e5e7f2}.pages{display:flex;gap:7px}.page-btn{min-width:32px;height:32px;border:1px solid #dce3f2;border-radius:6px;background:#fff;font-weight:800}.page-btn.active{background:#5b2ce1;color:#fff}.page-size{height:32px;border:1px solid #dce3f2;border-radius:6px;background:#fff;padding:0 10px;font-size:11px}.side-stack{display:grid;gap:14px;min-width:0}.side-card{padding:16px;min-width:0}.side-card h2{margin:0 0 14px;font-size:14px}.overview-grid{display:grid;grid-template-columns:1fr 1fr;gap:9px}.overview-box{border:1px solid #e4e8f2;border-radius:8px;padding:12px;display:grid;grid-template-columns:36px 1fr;gap:10px;align-items:center;min-width:0}.overview-box h3{margin:0 0 6px;font-size:20px}.overview-box p{margin:0;color:#526287;font-size:10px}.result{display:grid;grid-template-columns:38px 1fr 48px;gap:9px;align-items:center;margin-bottom:14px}.mini-avatar{width:34px;height:34px;border-radius:50%;background:#eaf1ff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900}.result h3{margin:0 0 4px;font-size:11px}.result p{margin:0;color:#526287;font-size:10px;line-height:1.35}.score{text-align:right;color:#079849;font-weight:900;font-size:14px}.score small{display:block;color:#526287;font-size:9px;font-weight:600}.score.bad{color:#e94242}.tips{background:linear-gradient(145deg,#fff,#f7f2ff)}.tips ul{margin:0;padding-left:18px;font-size:11px;color:#26375f;line-height:1.8}.tips a{color:#5b2ce1;font-weight:800;font-size:12px}.empty{padding:30px;text-align:center;color:#526287}@media(max-width:1220px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.page-grid{grid-template-columns:1fr}.filters{grid-template-columns:1fr 1fr}.table-card{overflow:auto}.table-head,.assess-row{min-width:920px}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.filters,.overview-grid{grid-template-columns:1fr}.tabs{overflow:auto}.btn{width:100%}}
</style>
@endpush

@section('content')
<div class="head"><h1>Assessments</h1><p>Create, manage and evaluate assessments for your courses.</p></div>
                <!-- End Header Section -->

                <div class="page-grid">
                    <div>
                        <div class="tabs" id="tabs"></div>
                        <div class="filters"><input class="input" id="searchInput" placeholder="Search assessments..."><select class="select" id="courseFilter"><option>All Courses</option></select><select class="select" id="typeFilter"><option>All Types</option><option>Assignment</option><option>Quiz</option><option>Test</option></select><select class="select" id="statusFilter"><option>All Status</option><option>Published</option><option>Draft</option><option>Archived</option></select><span></span><button class="btn" id="createBtn">+ Create Assessment</button></div>
                        <article class="card table-card"><div class="table-head"><span>Assessment</span><span>Course</span><span>Type</span><span>Questions</span><span>Duration</span><span>Status</span><span>Actions</span></div><div id="assessmentRows"></div><div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">‹</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">4</button><button class="page-btn">›</button><select class="page-size"><option>6 / page</option><option>12 / page</option></select></div></div></article>
                    </div>
                    <!-- End Assessment List Section -->

                    <aside class="side-stack"><article class="card side-card"><h2>Assessment Overview</h2><div class="overview-grid" id="overview"></div></article><article class="card side-card"><h2>Recent Results</h2><div id="results"></div><a href="#" style="color:#5b2ce1;font-weight:800;font-size:12px;display:block;text-align:center">View All Results -></a></article><article class="card side-card tips"><h2>Assessment Tips</h2><ul id="tips"></ul><a href="#">Learn More -></a></article></aside>
                    <!-- End Right Sidebar Section -->
                </div>
@endsection

@push('scripts')
<script>
const topStats=@json($topStats),overview=@json($overview),results=@json($results),tips=@json($tips);
        let assessments=@json($assessments),currentTab='All Assessments';
        const tabs=['All Assessments','Published','Drafts','Archived'];
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('tabs').innerHTML=tabs.map((tab,index)=>`<button class="tab ${index===0?'active':''}" data-tab="${tab}">${tab}</button>`).join('');
        document.getElementById('courseFilter').innerHTML='<option>All Courses</option>'+[...new Set(assessments.map(a=>a.course))].map(course=>`<option>${course}</option>`).join('');
        document.getElementById('overview').innerHTML=overview.map(item=>`<div class="overview-box"><span class="icon">${item.icon}</span><div><h3>${item.value}</h3><p>${item.label}</p></div></div>`).join('');
        document.getElementById('results').innerHTML=results.map(r=>`<div class="result"><span class="mini-avatar">${r.avatar}</span><div><h3>${r.name}</h3><p>${r.course}<br>${r.meta}</p></div><div class="score ${r.score<70?'bad':''}">${r.score}%<small>${r.status}</small></div></div>`).join('');
        document.getElementById('tips').innerHTML=tips.map(tip=>`<li>${tip}</li>`).join('');

        function renderAssessments(){
            const query=document.getElementById('searchInput').value.toLowerCase();
            const course=document.getElementById('courseFilter').value;
            const type=document.getElementById('typeFilter').value;
            const status=document.getElementById('statusFilter').value;
            const filtered=assessments.filter(item=>
                `${item.name} ${item.course}`.toLowerCase().includes(query) &&
                (course==='All Courses'||item.course===course) &&
                (type==='All Types'||item.type===type) &&
                (status==='All Status'||item.status===status) &&
                (currentTab==='All Assessments'||item.status===currentTab.replace('Drafts','Draft'))
            );
            document.getElementById('assessmentRows').innerHTML=filtered.length?filtered.map((item,index)=>`<div class="assess-row"><div class="cell-main"><span class="icon">${item.icon}</span><div><h2>${item.name}</h2><p>${item.created}</p></div></div><div class="course-cell"><span class="icon">${item.courseIcon}</span><p>${item.course}</p></div><span class="badge ${item.type==='Quiz'?'blue':item.type==='Test'?'green':''}">${item.type}</span><strong>${item.questions}<br><span class="small">Questions</span></strong><strong>${item.duration}</strong><div><span class="status ${item.status==='Draft'?'draft':item.status==='Archived'?'archived':''}">${item.status}</span><p class="small">${item.date}</p></div><div class="actions"><button class="action" data-index="${index}">👁</button><button class="action" data-index="${index}">✎</button><button class="action" data-index="${index}">⋮</button></div></div>`).join(''):`<div class="empty">No assessments found.</div>`;
            document.getElementById('resultText').textContent=`Showing 1 to ${filtered.length} of ${assessments.length} assessments`;
        }

        document.getElementById('tabs').addEventListener('click',event=>{if(!event.target.matches('.tab'))return;document.querySelectorAll('.tab').forEach(tab=>tab.classList.remove('active'));event.target.classList.add('active');currentTab=event.target.dataset.tab;renderAssessments()});
        ['searchInput','courseFilter','typeFilter','statusFilter'].forEach(id=>document.getElementById(id).addEventListener('input',renderAssessments));
        document.getElementById('createBtn').addEventListener('click',()=>alert('Create Assessment clicked'));
        document.getElementById('assessmentRows').addEventListener('click',event=>{if(event.target.closest('.action'))alert('Assessment action clicked')});
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
        renderAssessments();
</script>
@endpush



