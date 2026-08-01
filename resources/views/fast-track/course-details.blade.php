@php
    $activePage = 'details';
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
    $course = [
        'title' => 'Full Stack Development',
        'tag' => 'Most Popular',
        'description' => 'Build modern web applications from scratch and become a full stack developer.',
        'duration' => '12 Months',
        'fees' => 'Rs.14,999',
        'mode' => 'Online Live',
        'level' => 'Beginner to Advanced',
        'certificate' => 'Yes',
        'rating' => '4.8',
        'reviews' => '2,540 reviews',
    ];
    $learn = ['HTML, CSS, JavaScript', 'React.js', 'Node.js & Express.js', 'MongoDB', 'REST APIs', 'Git & GitHub', 'Authentication & Authorization', 'Deployment', 'Project Building', 'And much more...'];
    $highlights = [
        ['title' => 'Industry Expert Mentors', 'text' => 'Learn from 10+ years of experienced professionals', 'icon' => 'IM'],
        ['title' => 'Live Interactive Sessions', 'text' => 'Live classes with doubt clearing sessions', 'icon' => 'LS'],
        ['title' => 'Real-world Projects', 'text' => 'Build projects for your portfolio', 'icon' => 'RP'],
        ['title' => 'Industry Recognized Certificate', 'text' => 'Boost your resume and career opportunities', 'icon' => 'IC'],
        ['title' => 'Placement Assistance', 'text' => 'Get resume reviews, mock interviews and job support', 'icon' => 'PA'],
    ];
    $audience = ['Freshers', 'Engineering Students', 'Career Switchers', 'Working Professionals'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f6f9ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; display: grid; grid-template-columns: 260px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; }
        .brand { height: 86px; display: flex; align-items: center; padding: 0 18px; border-bottom: 1px solid #dce7f8; }
        .brand img { width: 205px; display: block; }
        .menu { padding: 28px 14px 18px; display: grid; gap: 8px; }
        .menu-item { min-height: 42px; display: flex; align-items: center; gap: 14px; padding: 8px 12px; border-radius: 8px; color: #071743; font-size: 14px; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; font-weight: 700; }
        .menu-icon, .detail-icon { width: 28px; height: 28px; border-radius: 7px; background: #f0f5ff; color: #075fe4; display: inline-flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 800; flex: 0 0 auto; }
        .side-bottom { margin-top: auto; padding: 18px 22px 28px; border-top: 1px solid #dce7f8; display: grid; gap: 12px; }
        .bottom-link { display: flex; align-items: center; gap: 14px; font-size: 14px; min-height: 34px; }
        .topbar { height: 76px; background: white; border-bottom: 1px solid #dce7f8; display: flex; align-items: center; justify-content: space-between; padding: 0 28px; }
        .hamburger { border: 0; background: transparent; font-size: 24px; color: #061942; cursor: pointer; }
        .user { display: flex; align-items: center; gap: 12px; position: relative; }
        .bell { position: relative; width: 34px; height: 34px; border: 0; background: transparent; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .bell svg, .user button svg { width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; top: -1px; right: 0; width: 15px; height: 15px; border-radius: 50%; background: #ff3045; color: white; font-size: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-avatar { width: 46px; height: 46px; border-radius: 50%; background-image: url('{{ asset('student.png') }}'); background-size: 220px auto; background-position: 16% 28%; border: 3px solid #eaf2ff; }
        .user h3 { margin: 0; font-size: 14px; font-weight: 700; }
        .user button:last-child { border: 0; background: transparent; cursor: pointer; display: flex; align-items: center; }
        .user-menu { position: absolute; top: 58px; right: 0; width: 155px; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 28px rgba(6,25,66,.12); display: none; z-index: 5; overflow: hidden; }
        .user-menu.show { display: block; }
        .user-menu a { display: block; padding: 12px 14px; font-size: 13px; }
        .content { padding: 24px 30px 38px; }
        .back { display: inline-block; color: #075fe4; font-size: 13px; font-weight: 700; margin-bottom: 20px; }
        .page-head h1 { margin: 0 0 10px; font-size: 26px; font-weight: 700; }
        .page-head p { margin: 0 0 22px; color: #334b83; font-size: 13px; }
        .card { background: white; border: 1px solid #dce7f8; border-radius: 9px; box-shadow: 0 10px 24px rgba(6,25,66,.04); }
        .hero { display: grid; grid-template-columns: 140px 1fr 300px; gap: 28px; align-items: center; padding: 22px; margin-bottom: 20px; }
        .course-icon { width: 126px; height: 126px; border-radius: 8px; background: #071743; color: white; display: flex; align-items: center; justify-content: center; font-size: 30px; font-weight: 800; }
        .hero h2 { margin: 0 0 12px; font-size: 20px; }
        .tag { display: inline-flex; margin-left: 8px; background: #eee7ff; color: #7744eb; padding: 5px 10px; border-radius: 5px; font-size: 11px; }
        .hero p { margin: 0 0 24px; color: #334b83; font-size: 13px; line-height: 1.6; }
        .meta { display: grid; grid-template-columns: repeat(5, 1fr); gap: 18px; font-size: 12px; }
        .meta b { display: block; margin-top: 8px; font-size: 13px; }
        .enroll { border-left: 1px solid #dce7f8; padding-left: 22px; text-align: center; }
        .rating { margin-bottom: 18px; font-size: 13px; }
        .rating strong { font-size: 16px; margin: 0 6px; }
        .primary, .outline { width: 100%; height: 42px; border-radius: 7px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .primary { border: 0; background: #075fe4; color: white; margin-bottom: 14px; }
        .outline { border: 1px solid #075fe4; background: white; color: #075fe4; }
        .main-grid { display: grid; grid-template-columns: 1.25fr 1fr; gap: 20px; margin-bottom: 20px; }
        .tabs { display: flex; gap: 28px; padding: 0 22px; border-bottom: 1px solid #dce7f8; }
        .tab { border: 0; background: transparent; padding: 18px 0 14px; color: #334b83; font-size: 13px; cursor: pointer; border-bottom: 3px solid transparent; }
        .tab.active { color: #075fe4; border-bottom-color: #075fe4; font-weight: 700; }
        .tab-content { padding: 22px; min-height: 270px; }
        .tab-content h3 { margin: 0 0 14px; font-size: 15px; }
        .tab-content p { margin: 0 0 22px; color: #061942; font-size: 13px; line-height: 1.65; }
        .learn-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 13px 36px; }
        .learn-item { color: #061942; font-size: 13px; }
        .learn-item span { color: #0a8f3f; font-weight: 800; margin-right: 8px; }
        .highlights { padding: 22px; }
        .highlights h2, .audience h2 { margin: 0 0 18px; font-size: 16px; }
        .highlight-row { display: grid; grid-template-columns: 40px 1fr; gap: 14px; padding: 14px 0; border-bottom: 1px solid #e6eef8; }
        .highlight-row:last-child { border-bottom: 0; }
        .highlight-row h3 { margin: 0 0 7px; font-size: 13px; }
        .highlight-row p { margin: 0; color: #536484; font-size: 12px; }
        .audience { padding: 20px 22px; }
        .audience-list { display: flex; flex-wrap: wrap; gap: 22px; }
        .audience-chip { min-width: 160px; height: 42px; border: 1px solid #dce7f8; border-radius: 7px; display: inline-flex; align-items: center; justify-content: center; color: #075fe4; font-size: 13px; font-weight: 700; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .sidebar { display: none; } .hero, .main-grid { grid-template-columns: 1fr; } .enroll { border-left: 0; padding-left: 0; } .meta { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 650px) { .content { padding: 20px 14px; } .topbar { padding: 0 14px; } .learn-grid { grid-template-columns: 1fr; } .tabs { overflow-x: auto; } }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a href="/fast-track/dashboard" class="brand"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">@foreach ($menuItems as $item)<a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>@endforeach</nav>
            <div class="side-bottom"><a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a><a class="bottom-link" href="/fast-track/login"><span class="menu-icon">LO</span><span>Logout</span></a></div>
        </aside>
        <main>
            <header class="topbar">
                <button class="hamburger" type="button">=</button>
                <div class="user"><button class="bell" type="button"><svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg><span>{{ $student['notifications'] }}</span></button><div class="top-avatar"></div><h3>{{ $student['name'] }}</h3><button id="userMenuBtn" type="button"><svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg></button><div class="user-menu" id="userMenu"><a href="/fast-track/profile">My Profile</a><a href="/fast-track/login">Logout</a></div></div>
            </header>
            <section class="content">
                <a class="back" href="/fast-track/courses">&lt; Back to Courses</a>
                <div class="page-head"><h1>Course Details</h1><p>Explore course details, curriculum, and other important information.</p></div>
                <article class="card hero">
                    <div class="course-icon">FS</div>
                    <div><h2>{{ $course['title'] }} <span class="tag">{{ $course['tag'] }}</span></h2><p>{{ $course['description'] }}</p><div class="meta"><span>Duration <b>{{ $course['duration'] }}</b></span><span>Fees <b>{{ $course['fees'] }}</b></span><span>Mode <b>{{ $course['mode'] }}</b></span><span>Level <b>{{ $course['level'] }}</b></span><span>Certificate <b>{{ $course['certificate'] }}</b></span></div></div>
                    <div class="enroll"><div class="rating">Star <strong>{{ $course['rating'] }}</strong> ({{ $course['reviews'] }})</div><button class="primary" type="button">Enroll Now</button><button class="outline" type="button">Download Brochure</button></div>
                </article>
                <div class="main-grid">
                    <article class="card">
                        <div class="tabs" id="tabs"><button class="tab active" data-tab="about">About Course</button><button class="tab" data-tab="curriculum">Curriculum</button><button class="tab" data-tab="mentors">Mentors</button><button class="tab" data-tab="reviews">Reviews</button><button class="tab" data-tab="faqs">FAQs</button></div>
                        <div class="tab-content" id="tabContent"></div>
                    </article>
                    <article class="card highlights"><h2>Course Highlights</h2>@foreach ($highlights as $item)<div class="highlight-row"><span class="detail-icon">{{ $item['icon'] }}</span><div><h3>{{ $item['title'] }}</h3><p>{{ $item['text'] }}</p></div></div>@endforeach</article>
                </div>
                <article class="card audience"><h2>Who Should Enroll?</h2><div class="audience-list">@foreach ($audience as $item)<span class="audience-chip">{{ $item }}</span>@endforeach</div></article>
            </section>
        </main>
    </div>
    <script>
        const learnItems = @json($learn);
        const tabData = {
            about: '<h3>About this Course</h3><p>This Full Stack Development course is designed to make you job-ready by teaching front-end, back-end, databases, version control, and deployment. You will build real-world projects and gain industry-level skills.</p><h3>What You Will Learn</h3><div class="learn-grid">' + learnItems.map(function (item) { return '<div class="learn-item"><span>✓</span>' + item + '</div>'; }).join('') + '</div>',
            curriculum: '<h3>Curriculum</h3><p>HTML basics, CSS layouts, JavaScript, React.js, Node.js, Express.js, MongoDB, APIs, authentication, deployment, and final project.</p>',
            mentors: '<h3>Mentors</h3><p>Learn from experienced full stack developers, project mentors, and interview preparation experts.</p>',
            reviews: '<h3>Reviews</h3><p>Students rate this course 4.8 for practical projects, mentor support, and placement preparation.</p>',
            faqs: '<h3>FAQs</h3><p>This course is beginner friendly. Live classes, recordings, projects, certificate, and placement support are included.</p>'
        };
        const tabContent = document.getElementById('tabContent');
        function setTab(name) { tabContent.innerHTML = tabData[name]; }
        document.querySelectorAll('.tab').forEach(function (tab) { tab.addEventListener('click', function () { document.querySelectorAll('.tab').forEach(function (item) { item.classList.remove('active'); }); tab.classList.add('active'); setTab(tab.dataset.tab); }); });
        setTab('about');
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');
        userMenuBtn.addEventListener('click', function () { userMenu.classList.toggle('show'); });
        document.addEventListener('click', function (event) { if (!userMenu.contains(event.target) && !userMenuBtn.contains(event.target)) userMenu.classList.remove('show'); });
    </script>
</body>
</html>




