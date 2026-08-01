@php
    $activePage = 'courses';
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
        ['title' => 'Full Stack Development', 'badge' => 'Most Popular', 'text' => 'Build modern web applications from scratch and become a full stack developer.', 'duration' => '12 Months', 'fees' => 'Rs.14,999', 'mode' => 'Online Live', 'icon' => 'FS', 'color' => '#071743'],
        ['title' => 'Data Science & Analytics', 'badge' => '', 'text' => 'Learn data analysis, visualization and machine learning to solve real-world problems.', 'duration' => '10 Months', 'fees' => 'Rs.16,999', 'mode' => 'Online Live', 'icon' => 'DS', 'color' => '#7744eb'],
        ['title' => 'Digital Marketing', 'badge' => '', 'text' => 'Master SEO, Social Media, Google Ads and more to grow businesses online.', 'duration' => '6 Months', 'fees' => 'Rs.9,999', 'mode' => 'Online Live', 'icon' => 'DM', 'color' => '#0a8f3f'],
        ['title' => 'Backend Development', 'badge' => '', 'text' => 'Learn server-side development, databases, APIs and scalable architecture.', 'duration' => '10 Months', 'fees' => 'Rs.13,999', 'mode' => 'Online Live', 'icon' => 'BD', 'color' => '#ff9800'],
    ];
    $benefits = [
        ['title' => 'Job Ready Faster', 'text' => 'Industry-focused curriculum designed to get you job-ready quickly.', 'icon' => 'JR'],
        ['title' => 'Industry Certified', 'text' => 'Earn recognized certificates that boost your career opportunities.', 'icon' => 'IC'],
        ['title' => 'Expert Mentors', 'text' => 'Learn from industry experts and get guidance at every step.', 'icon' => 'EM'],
        ['title' => 'Career Support', 'text' => 'Get placement assistance and interview preparation support.', 'icon' => 'CS'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Track Courses</title>
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
        .menu-icon, .course-icon, .benefit-icon { width: 28px; height: 28px; border-radius: 7px; background: #f0f5ff; color: #075fe4; display: inline-flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 800; flex: 0 0 auto; }
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
        .content { padding: 34px 30px 38px; }
        .page-head { display: flex; justify-content: space-between; align-items: start; gap: 22px; margin-bottom: 26px; }
        .page-head h1 { margin: 0 0 10px; font-size: 29px; font-weight: 700; }
        .page-head p { margin: 0; color: #334b83; font-size: 14px; }
        .tools { display: flex; gap: 12px; align-items: center; }
        .search { height: 44px; width: 250px; border: 1px solid #dce7f8; border-radius: 7px; padding: 0 14px; font-size: 13px; outline: none; }
        .filter { height: 44px; border: 1px solid #075fe4; background: white; color: #075fe4; border-radius: 7px; padding: 0 18px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .section-title { margin: 0 0 16px; font-size: 17px; font-weight: 700; }
        .course-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 22px; }
        .card { background: white; border: 1px solid #dce7f8; border-radius: 9px; box-shadow: 0 10px 24px rgba(6,25,66,.04); }
        .course-card { padding: 20px; min-height: 360px; display: flex; flex-direction: column; }
        .course-icon { width: 54px; height: 54px; border-radius: 8px; color: white; font-size: 13px; margin-bottom: 18px; }
        .course-card h3 { margin: 0 0 12px; font-size: 15px; font-weight: 700; }
        .badge { display: inline-flex; align-self: flex-start; margin-bottom: 14px; padding: 5px 8px; background: #eee7ff; color: #7744eb; border-radius: 5px; font-size: 11px; font-weight: 700; }
        .course-card p { margin: 0 0 18px; color: #334b83; font-size: 13px; line-height: 1.6; }
        .meta { display: grid; gap: 12px; margin-top: auto; margin-bottom: 22px; font-size: 13px; }
        .meta-row { display: flex; justify-content: space-between; gap: 18px; color: #334b83; }
        .meta-row strong { color: #061942; font-weight: 500; }
        .view-btn { height: 42px; border: 1px solid #075fe4; border-radius: 7px; background: white; color: #075fe4; font-size: 13px; font-weight: 700; cursor: pointer; }
        .course-card:first-child .view-btn { background: #075fe4; color: white; }
        .benefits { padding: 28px 20px; margin-bottom: 24px; }
        .benefit-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }
        .benefit { display: grid; grid-template-columns: 54px 1fr; gap: 16px; align-items: center; border-right: 1px solid #dce7f8; padding-right: 18px; }
        .benefit:last-child { border-right: 0; }
        .benefit-icon { width: 52px; height: 52px; border-radius: 50%; font-size: 11px; }
        .benefit h3 { margin: 0 0 8px; font-size: 14px; }
        .benefit p { margin: 0; color: #536484; font-size: 12px; line-height: 1.55; }
        .quiz { padding: 22px 38px; display: flex; justify-content: space-between; align-items: center; background: #eaf2ff; overflow: hidden; }
        .quiz h3 { margin: 0 0 9px; font-size: 16px; }
        .quiz p { margin: 0; color: #536484; font-size: 12px; }
        .primary { height: 44px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 24px; font-size: 13px; font-weight: 700; cursor: pointer; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .sidebar { display: none; } .course-grid, .benefit-grid { grid-template-columns: repeat(2, 1fr); } .benefit { border-right: 0; } }
        @media (max-width: 650px) { .content { padding: 24px 14px; } .topbar { padding: 0 14px; } .page-head, .quiz { flex-direction: column; align-items: stretch; } .tools { flex-direction: column; align-items: stretch; } .search { width: 100%; } .course-grid, .benefit-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <a href="/fast-track/dashboard" class="brand"><img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"></a>
            <nav class="menu">
                @foreach ($menuItems as $item)
                    <a class="menu-item {{ $activePage === $item['key'] ? 'active' : '' }}" href="{{ $item['url'] }}"><span class="menu-icon">{{ $item['icon'] }}</span><span>{{ $item['title'] }}</span></a>
                @endforeach
            </nav>
            <div class="side-bottom"><a class="bottom-link" href="#"><span class="menu-icon">ST</span><span>Settings</span></a><a class="bottom-link" href="/fast-track/login"><span class="menu-icon">LO</span><span>Logout</span></a></div>
        </aside>
        <main>
            <header class="topbar">
                <button class="hamburger" type="button">=</button>
                <div class="user">
                    <button class="bell" type="button"><svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg><span>{{ $student['notifications'] }}</span></button>
                    <div class="top-avatar"></div><h3>{{ $student['name'] }}</h3>
                    <button id="userMenuBtn" type="button"><svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg></button>
                    <div class="user-menu" id="userMenu"><a href="/fast-track/profile">My Profile</a><a href="/fast-track/login">Logout</a></div>
                </div>
            </header>
            <section class="content">
                <div class="page-head">
                    <div><h1>Fast Track Courses</h1><p>Choose a career track to start your learning journey and get job-ready faster.</p></div>
                    <div class="tools"><input class="search" id="searchInput" placeholder="Search courses..."><button class="filter" id="filterBtn" type="button">Filter</button></div>
                </div>
                <h2 class="section-title">Popular Career Tracks</h2>
                <div class="course-grid" id="courseGrid"></div>
                <article class="card benefits">
                    <h2 class="section-title">Why Choose Fast Track Courses?</h2>
                    <div class="benefit-grid">
                        @foreach ($benefits as $benefit)
                            <div class="benefit"><span class="benefit-icon">{{ $benefit['icon'] }}</span><div><h3>{{ $benefit['title'] }}</h3><p>{{ $benefit['text'] }}</p></div></div>
                        @endforeach
                    </div>
                </article>
                <article class="card quiz">
                    <div><h3>Not sure which course is right for you?</h3><p>Take our career guidance quiz and get personalized course recommendations.</p></div>
                    <button class="primary" type="button">Take Career Quiz</button>
                </article>
            </section>
        </main>
    </div>
    <script>
        const courses = @json($courses);
        const courseGrid = document.getElementById('courseGrid');
        const searchInput = document.getElementById('searchInput');
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');

        function renderCourses(list) {
            courseGrid.innerHTML = '';
            list.forEach(function (course, index) {
                const card = document.createElement('article');
                card.className = 'card course-card';
                card.innerHTML =
                    '<span class="course-icon" style="background:' + course.color + '">' + course.icon + '</span>' +
                    '<h3>' + course.title + '</h3>' +
                    (course.badge ? '<span class="badge">' + course.badge + '</span>' : '') +
                    '<p>' + course.text + '</p>' +
                    '<div class="meta">' +
                        '<div class="meta-row"><span>Duration</span><strong>' + course.duration + '</strong></div>' +
                        '<div class="meta-row"><span>Fees</span><strong>' + course.fees + '</strong></div>' +
                        '<div class="meta-row"><span>Mode</span><strong>' + course.mode + '</strong></div>' +
                    '</div>' +
                    '<button class="view-btn" type="button">View Course</button>';
                courseGrid.appendChild(card);
            });
        }

        searchInput.addEventListener('input', function () {
            const value = searchInput.value.toLowerCase();
            renderCourses(courses.filter(function (course) {
                return course.title.toLowerCase().includes(value) || course.text.toLowerCase().includes(value);
            }));
        });

        document.getElementById('filterBtn').addEventListener('click', function () {
            renderCourses(courses.filter(function (course) {
                return course.duration.includes('10') || course.duration.includes('12');
            }));
        });

        courseGrid.addEventListener('click', function (event) {
            if (event.target.classList.contains('view-btn')) {
                window.location.href = '/fast-track/course-details';
            }
        });

        userMenuBtn.addEventListener('click', function () { userMenu.classList.toggle('show'); });
        document.addEventListener('click', function (event) { if (!userMenu.contains(event.target) && !userMenuBtn.contains(event.target)) userMenu.classList.remove('show'); });
        renderCourses(courses);
    </script>
</body>
</html>




