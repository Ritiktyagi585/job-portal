@php
    $activePage = 'add-course';
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
    $tips = [
        'Add clear course title and description',
        'Upload an attractive course image',
        'Break content into modules for better learning',
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px 1fr}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.upgrade{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.upgrade h3{margin:0 0 10px;color:#5b2ce1;font-size:14px}.upgrade p{margin:0 0 16px;color:#526287;font-size:13px;line-height:1.6}.upgrade-art{text-align:right;font-size:52px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:86px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:14px;position:relative;margin-left:20px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#ff3045;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:44px;height:44px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:900}.user h3{margin:0 0 4px;font-size:12px}.user p{margin:0;color:#526287;font-size:11px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:58px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:22px 34px 28px}.head h1{margin:0 0 8px;font-size:22px}.head p{margin:0 0 16px;color:#526287;font-size:13px}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.page-grid{display:grid;grid-template-columns:1fr 320px;gap:20px}.form-card{padding:20px}.form-card h2,.side-card h2{margin:0 0 16px;font-size:15px}.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px 32px}.field.full{grid-column:1/-1}.field.half-row{display:grid;grid-template-columns:1fr 1fr;gap:22px}.field label{display:block;margin-bottom:8px;font-size:12px;font-weight:800}.required{color:#ff3045}input,select,textarea{width:100%;border:1px solid #cfd8eb;border-radius:5px;background:#fff;color:#0a1748;font-size:12px;outline:0;padding:0 12px}input,select{height:36px}textarea{height:76px;padding-top:11px;resize:none}.hint{display:block;margin-top:7px;color:#526287;font-size:11px}.count{text-align:right;color:#526287;font-size:10px;margin-top:-18px;padding-right:10px}.section-title{grid-column:1/-1;margin:16px 0 0;font-size:15px;font-weight:800}.actions{grid-column:1/-1;display:flex;justify-content:flex-end;gap:14px;margin-top:10px}.btn{height:38px;border:1px solid #5b2ce1;border-radius:5px;background:#5b2ce1;color:#fff;padding:0 28px;font-weight:800;cursor:pointer}.btn.light{background:#fff;color:#0a1748;border-color:#d6def0}.btn.small{height:36px;padding:0 14px}.side-stack{display:grid;gap:14px}.side-card{padding:20px}.upload{height:190px;border:1px dashed #8a63ff;border-radius:8px;background:#fbf9ff;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}.upload .cloud{width:48px;height:48px;border-radius:50%;background:#6b31e8;color:#fff;display:flex;align-items:center;justify-content:center;font-size:24px;margin-bottom:14px}.upload h3{margin:0 0 8px;font-size:13px}.upload p{margin:0 0 16px;color:#526287;font-size:11px}.module-empty{height:180px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;color:#526287}.folder{width:74px;height:74px;border-radius:50%;background:#f0eaff;color:#6b31e8;display:flex;align-items:center;justify-content:center;font-size:32px;margin-bottom:14px}.module-empty p{margin:0 0 16px;font-size:12px}.tips{background:linear-gradient(145deg,#fff,#f8f2ff)}.tips ul{margin:0;padding-left:18px;color:#26375f;font-size:12px;line-height:2}.tips-head{display:flex;align-items:center;gap:10px;margin-bottom:12px}.tips-head h2{margin:0}.saved-message{display:none;margin-top:14px;padding:10px;border-radius:6px;background:#e2f9ea;color:#05843e;font-size:12px;font-weight:800}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.page-grid{grid-template-columns:1fr}}@media(max-width:760px){.topbar{padding:0 14px}.content{padding:20px 14px}.form-grid,.field.half-row{grid-template-columns:1fr}.actions{flex-direction:column}.btn{width:100%}}
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a class="brand" href="/training-partner/dashboard"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">@foreach($menuItems as $item)<a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav>
            <div class="side-bottom"><div class="upgrade"><h3>Upgrade Your Institute</h3><p>Add more courses and reach thousands of freshers.</p><button class="btn small">Add New Course</button><div class="upgrade-art">🎓</div></div></div>
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
                <div class="head"><h1>Add Course</h1><p>Create a new course for freshers.</p></div>
                <!-- End Header Section -->

                <div class="page-grid">
                    <form class="card form-card" id="courseForm">
                        <h2>Course Information</h2>
                        <div class="form-grid">
                            <div class="field"><label>Course Title <span class="required">*</span></label><input name="title" placeholder="Enter course title" required></div>
                            <div class="field"><label>Course Subtitle</label><input name="subtitle" placeholder="Enter course subtitle (optional)"></div>
                            <div class="field"><label>Course Category <span class="required">*</span></label><select name="category" required><option value="">Select category</option><option>Development</option><option>Data Science</option><option>Marketing</option><option>Design</option></select></div>
                            <div class="field"><label>Course Tag / Technology</label><input name="tags" placeholder="e.g. React, Data Science, Python"><span class="hint">Enter tags separated by commas</span></div>
                            <div class="field half-row"><div><label>Duration <span class="required">*</span></label><select name="duration" required><option value="">Select duration</option><option>3 Months</option><option>6 Months</option><option>12 Months</option></select></div><div><label>Level <span class="required">*</span></label><select name="level" required><option value="">Select level</option><option>Beginner</option><option>Intermediate</option><option>Advanced</option></select></div></div>
                            <div></div>
                            <div class="field full"><label>Course Description <span class="required">*</span></label><textarea name="description" maxlength="500" placeholder="Enter course description" required></textarea><div class="count" id="descriptionCount">0/500</div></div>
                            <div class="section-title">Course Details</div>
                            <div class="field"><label>What will students learn? <span class="required">*</span></label><textarea name="outcomes" maxlength="300" placeholder="Enter key learning outcomes" required></textarea><div class="count" id="outcomesCount">0/300</div></div>
                            <div class="field"><label>Requirements / Prerequisites</label><textarea name="requirements" maxlength="300" placeholder="Enter prerequisites (optional)"></textarea><div class="count" id="requirementsCount">0/300</div></div>
                            <div class="field"><label>Course Fee (₹) <span class="required">*</span></label><input name="fee" type="number" placeholder="Enter course fee" required></div>
                            <div class="field"><label>Discounted Fee (₹) (Optional)</label><input name="discount" type="number" placeholder="Enter discounted fee"></div>
                            <div class="field"><label>Language <span class="required">*</span></label><select name="language" required><option value="">Select language</option><option>English</option><option>Hindi</option><option>English + Hindi</option></select></div>
                            <div class="field"><label>Certificate</label><select name="certificate"><option>Select certificate type</option><option>Completion Certificate</option><option>Verified Certificate</option></select></div>
                            <div class="actions"><button class="btn light" type="reset">Cancel</button><button class="btn" type="submit">Create Course</button></div>
                        </div>
                        <p class="hint"><span class="required">*</span> Required Fields</p>
                        <div class="saved-message" id="savedMessage">Course saved successfully.</div>
                    </form>
                    <!-- End Course Form Section -->

                    <aside class="side-stack">
                        <article class="card side-card"><h2>Course Image</h2><div class="upload"><span class="cloud">↑</span><h3>Upload Course Image</h3><p>JPG, PNG or WEBP. Max size 2MB</p><button class="btn light small" type="button">Choose File</button></div></article>
                        <!-- End Course Image Section -->

                        <article class="card side-card"><h2>Course Modules</h2><p class="hint">Add modules to organize your course content.</p><div class="module-empty" id="moduleBox"><span class="folder">▭</span><p>No modules added yet</p><button class="btn light small" id="addModuleBtn" type="button">+ Add Module</button></div></article>
                        <!-- End Course Modules Section -->

                        <article class="card side-card tips"><div class="tips-head"><span class="icon">TP</span><h2>Tips</h2></div><ul id="tips"></ul></article>
                        <!-- End Tips Section -->
                    </aside>
                </div>
                <!-- End Main Grid Section -->
            </section>
            <!-- End Content Section -->
        </main>
    </div>

    <script>
        const topStats=@json($topStats),tips=@json($tips);
        let modules=[];
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('tips').innerHTML=tips.map(tip=>`<li>${tip}</li>`).join('');

        function updateCounter(name,id,max){const field=document.querySelector(`[name="${name}"]`);field.addEventListener('input',()=>document.getElementById(id).textContent=`${field.value.length}/${max}`)}
        updateCounter('description','descriptionCount',500);
        updateCounter('outcomes','outcomesCount',300);
        updateCounter('requirements','requirementsCount',300);

        function renderModules(){
            document.getElementById('moduleBox').innerHTML=modules.length
                ? modules.map((module,index)=>`<div style="display:flex;justify-content:space-between;align-items:center;width:100%;padding:10px;border:1px solid #e1e6f2;border-radius:6px;margin-bottom:8px"><strong>Module ${index+1}</strong><span>${module}</span></div>`).join('') + '<button class="btn light small" id="addModuleBtn" type="button">+ Add Module</button>'
                : '<span class="folder">▭</span><p>No modules added yet</p><button class="btn light small" id="addModuleBtn" type="button">+ Add Module</button>';
            document.getElementById('addModuleBtn').addEventListener('click',addModule);
        }

        function addModule(){
            modules.push(`Course Module ${modules.length + 1}`);
            renderModules();
        }

        document.getElementById('addModuleBtn').addEventListener('click',addModule);
        document.getElementById('courseForm').addEventListener('submit',event=>{
            event.preventDefault();
            document.getElementById('savedMessage').style.display='block';
        });
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
    </script>
</body>
</html>






