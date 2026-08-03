@extends('training-partner.layouts.app')

@section('title', 'My Courses')

@php
    $activePage = 'courses';
    $topStats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $courses = [
        ['title' => 'Full Stack Development', 'icon' => 'FS', 'modules' => 12, 'duration' => '6 Months', 'date' => 'Created on 10 May 2024', 'category' => 'Development', 'students' => 650, 'price' => '₹14,999', 'status' => 'Active'],
        ['title' => 'Data Science & Analytics', 'icon' => 'DS', 'modules' => 10, 'duration' => '5 Months', 'date' => 'Created on 07 May 2024', 'category' => 'Data Science', 'students' => 320, 'price' => '₹12,999', 'status' => 'Active'],
        ['title' => 'Digital Marketing', 'icon' => 'DM', 'modules' => 8, 'duration' => '3 Months', 'date' => 'Created on 01 May 2024', 'category' => 'Marketing', 'students' => 0, 'price' => '₹8,999', 'status' => 'Draft'],
        ['title' => 'React for Beginners', 'icon' => 'RB', 'modules' => 6, 'duration' => '2 Months', 'date' => 'Created on 28 Apr 2024', 'category' => 'Development', 'students' => 280, 'price' => '₹4,999', 'status' => 'Active'],
        ['title' => 'Python Programming', 'icon' => 'PY', 'modules' => 8, 'duration' => '3 Months', 'date' => 'Created on 20 Apr 2024', 'category' => 'Programming', 'students' => 180, 'price' => '₹6,999', 'status' => 'Active'],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px 1fr}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:20px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 34px 36px}.head{display:flex;align-items:flex-start;justify-content:space-between;gap:18px}.head h1{margin:0 0 8px;font-size:22px}.head p{margin:0 0 22px;color:#526287;font-size:13px}.btn{height:42px;border:1px solid #5b2ce1;border-radius:5px;background:#5b2ce1;color:#fff;padding:0 22px;font-weight:800;cursor:pointer}.btn.small{height:36px;padding:0 14px}.filters{display:grid;grid-template-columns:260px 160px 150px 1fr 170px;gap:18px;margin-bottom:22px}.input,.select{height:40px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 14px;font-size:13px}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.table-card{overflow:hidden}.table-head,.course-row{display:grid;grid-template-columns:1.8fr .8fr .7fr .7fr .7fr 170px;align-items:center}.table-head{padding:18px 24px;border-bottom:1px solid #e5e7f2;font-size:13px;font-weight:800}.course-row{padding:18px 24px;border-bottom:1px solid #e5e7f2;min-height:104px}.course-row:last-child{border-bottom:0}.course-info{display:flex;align-items:center;gap:22px}.course-icon{width:62px;height:62px;border:1px solid #d8c8ff;border-radius:9px;background:#f1eaff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:900}.course-info h2{margin:0 0 8px;font-size:14px}.course-info p{margin:0;color:#526287;font-size:12px;line-height:1.7}.tag,.status{display:inline-flex;padding:7px 12px;border-radius:7px;font-size:12px}.tag{background:#efeaff;color:#5b2ce1}.tag.green{background:#e2f9ea;color:#05843e}.tag.orange{background:#fff2df;color:#ff6b00}.status{background:#e2f9ea;color:#05843e}.status.draft{background:#fff0de;color:#c46b00}.students strong{display:block;font-size:15px}.students span{color:#526287;font-size:12px}.actions{display:flex;gap:10px}.action{width:38px;height:38px;border:1px solid #dce3f2;border-radius:7px;background:#fff;color:#0a1748;font-weight:800;cursor:pointer}.footer{padding:20px 24px;display:flex;justify-content:space-between;align-items:center;color:#526287;font-size:12px;border-top:1px solid #e5e7f2}.pages{display:flex;gap:10px}.page-btn{min-width:36px;height:36px;border:1px solid #dce3f2;border-radius:6px;background:#fff;color:#0a1748;font-weight:800}.page-btn.active{background:#5b2ce1;color:#fff}.page-size{height:36px;border:1px solid #dce3f2;border-radius:6px;background:#fff;padding:0 14px;color:#26375f}.empty{padding:36px;text-align:center;color:#526287}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.filters{grid-template-columns:1fr 1fr}.table-card{overflow:auto}.table-head,.course-row{min-width:980px}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.head{flex-direction:column}.filters{grid-template-columns:1fr}.btn{width:100%}}
</style>
@endpush

@section('content')
<div class="head"><div><h1>My Courses</h1><p>Manage and organize all your published courses.</p></div><a class="btn" href="/training-partner/add-course">+ Add New Course</a></div>
                <!-- End Header Section -->

                <div class="filters"><input class="input" id="searchInput" placeholder="Search courses..."><select class="select" id="categoryFilter"><option>All Categories</option><option>Development</option><option>Data Science</option><option>Marketing</option><option>Programming</option></select><select class="select" id="statusFilter"><option>All Status</option><option>Active</option><option>Draft</option></select><span></span><select class="select" id="sortSelect"><option value="latest">Sort by: Latest</option><option value="students">Sort by: Students</option><option value="price">Sort by: Price</option></select></div>
                <!-- End Filter Section -->

                <article class="card table-card">
                    <div class="table-head"><span>Course</span><span>Category</span><span>Students</span><span>Price</span><span>Status</span><span>Actions</span></div>
                    <div id="courseRows"></div>
                    <div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">‹</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">›</button><select class="page-size"><option>5 / page</option><option>10 / page</option></select></div></div>
                </article>
                <!-- End Course Table Section -->
@endsection

@push('scripts')
<script>
const topStats=@json($topStats);
        let courses=@json($courses);
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        const courseRows=document.getElementById('courseRows');
        const resultText=document.getElementById('resultText');

        function renderCourses(){
            const query=document.getElementById('searchInput').value.toLowerCase();
            const category=document.getElementById('categoryFilter').value;
            const status=document.getElementById('statusFilter').value;
            const sort=document.getElementById('sortSelect').value;
            let filtered=courses.filter(course=>
                course.title.toLowerCase().includes(query) &&
                (category==='All Categories'||course.category===category) &&
                (status==='All Status'||course.status===status)
            );
            if(sort==='students') filtered=filtered.sort((a,b)=>b.students-a.students);
            if(sort==='price') filtered=filtered.sort((a,b)=>parseInt(b.price.replace(/[^0-9]/g,''))-parseInt(a.price.replace(/[^0-9]/g,'')));
            courseRows.innerHTML=filtered.length?filtered.map((course,index)=>`<div class="course-row"><div class="course-info"><span class="course-icon">${course.icon}</span><div><h2>${course.title}</h2><p>${course.modules} Modules&nbsp;&nbsp;•&nbsp;&nbsp;${course.duration}<br>${course.date}</p></div></div><span class="tag ${course.category==='Data Science'?'green':course.category==='Marketing'?'orange':''}">${course.category}</span><div class="students"><strong>${course.students}</strong><span>Enrolled</span></div><strong>${course.price}</strong><span class="status ${course.status==='Draft'?'draft':''}">${course.status}</span><div class="actions"><button class="action" data-action="view" data-index="${index}">👁</button><button class="action" data-action="edit" data-index="${index}">✎</button><button class="action" data-action="menu" data-index="${index}">⋮</button></div></div>`).join(''):`<div class="empty">No courses found.</div>`;
            resultText.textContent=`Showing 1 to ${filtered.length} of ${courses.length} courses`;
        }

        ['searchInput','categoryFilter','statusFilter','sortSelect'].forEach(id=>document.getElementById(id).addEventListener('input',renderCourses));
        courseRows.addEventListener('click',event=>{
            const button=event.target.closest('.action');
            if(!button)return;
            const course=courses[button.dataset.index];
            alert(`${button.dataset.action.toUpperCase()}: ${course.title}`);
        });
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
        renderCourses();
</script>
@endpush



