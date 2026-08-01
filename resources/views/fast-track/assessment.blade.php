@php
    $activePage = 'assessment';
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
    $results = [
        ['name' => 'Technical Skills', 'score' => 60, 'color' => '#075fe4'],
        ['name' => 'Aptitude', 'score' => 70, 'color' => '#19a85b'],
        ['name' => 'Communication', 'score' => 50, 'color' => '#7744eb'],
        ['name' => 'Problem Solving', 'score' => 62, 'color' => '#ffad28'],
        ['name' => 'Logical Reasoning', 'score' => 55, 'color' => '#ff6565'],
    ];
    $tracks = [
        ['title' => 'Full Stack Development', 'text' => 'Build modern web applications and advance your career.', 'score' => 85, 'tag' => 'Most Popular', 'icon' => 'FS'],
        ['title' => 'Data Science & Analytics', 'text' => 'Analyze data and build impactful solutions.', 'score' => 75, 'tag' => '', 'icon' => 'DS'],
    ];
    $nextSteps = [
        ['title' => 'Explore Fast Track Courses', 'text' => 'Choose a course that matches your goals.', 'icon' => 'EX'],
        ['title' => 'Improve Your Skills', 'text' => 'Access recommended learning resources.', 'icon' => 'IM'],
        ['title' => 'Take Final Assessment', 'text' => 'Complete the final assessment to get certified.', 'icon' => 'FA'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initial Assessment - Fast Track</title>
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
        .menu-icon, .section-icon { width: 28px; height: 28px; border-radius: 7px; background: #f0f5ff; color: #075fe4; display: inline-flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 800; flex: 0 0 auto; }
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
        .content { padding: 28px 30px 38px; }
        .page-head h1 { margin: 0 0 8px; font-size: 27px; font-weight: 700; }
        .page-head p { margin: 0 0 20px; color: #334b83; font-size: 14px; }
        .card { background: white; border: 1px solid #dce7f8; border-radius: 9px; box-shadow: 0 10px 24px rgba(6,25,66,.04); }
        .hero-card { min-height: 168px; display: grid; grid-template-columns: 150px 1fr 260px; align-items: center; gap: 24px; padding: 24px 34px; margin-bottom: 20px; }
        .hero-art { width: 120px; height: 105px; border-radius: 10px; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 800; }
        .status { color: #0a8f3f; font-size: 18px; font-weight: 700; margin-bottom: 18px; }
        .status span { display: inline-flex; width: 24px; height: 24px; border-radius: 50%; background: #19a85b; color: white; align-items: center; justify-content: center; margin-right: 12px; font-size: 13px; }
        .hero-card p { margin: 0 0 20px; color: #334b83; font-size: 14px; }
        .outline { height: 38px; border: 1px solid #075fe4; background: white; color: #075fe4; border-radius: 6px; padding: 0 22px; font-weight: 700; cursor: pointer; }
        .score-box { border-left: 1px solid #dce7f8; text-align: center; padding-left: 32px; }
        .score-box h3 { margin: 0 0 14px; font-size: 14px; }
        .ring { width: 105px; height: 105px; border-radius: 50%; background: conic-gradient(#075fe4 0 60%, #e9edf5 60% 100%); display: inline-flex; align-items: center; justify-content: center; }
        .ring span { width: 76px; height: 76px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 700; }
        .main-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .section { padding: 22px; }
        .section h2 { margin: 0 0 22px; font-size: 16px; font-weight: 700; }
        .result-row { display: grid; grid-template-columns: 130px 1fr 42px; align-items: center; gap: 16px; margin-bottom: 18px; font-size: 13px; }
        .bar { height: 8px; background: #e9edf5; border-radius: 20px; overflow: hidden; }
        .bar span { display: block; height: 100%; border-radius: inherit; }
        .donut-wrap { display: grid; grid-template-columns: 210px 1fr; align-items: center; gap: 22px; }
        .donut { width: 160px; height: 160px; border-radius: 50%; background: #e9edf5; display: flex; align-items: center; justify-content: center; margin: 0 auto; }
        .donut span { width: 102px; height: 102px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; text-align: center; font-size: 20px; font-weight: 700; line-height: 1.2; }
        .legend { display: grid; gap: 17px; font-size: 13px; }
        .legend-row { display: grid; grid-template-columns: 12px 1fr 42px; gap: 12px; align-items: center; }
        .dot { width: 11px; height: 11px; border-radius: 50%; }
        .bottom-grid { display: grid; grid-template-columns: 1.45fr 1fr; gap: 20px; margin-top: 20px; }
        .track { display: grid; grid-template-columns: 54px 1fr 95px 92px; gap: 16px; align-items: center; border: 1px solid #dce7f8; border-radius: 8px; padding: 16px; margin-top: 12px; }
        .track h3 { margin: 0 0 8px; font-size: 14px; }
        .track p, .next p { margin: 0; color: #536484; font-size: 12px; }
        .tag { display: inline-flex; margin-left: 8px; background: #eee7ff; color: #7744eb; padding: 4px 8px; border-radius: 5px; font-size: 10px; }
        .match { color: #0a8f3f; font-size: 21px; font-weight: 800; }
        .primary { height: 38px; border: 0; border-radius: 6px; background: #075fe4; color: white; font-weight: 700; cursor: pointer; }
        .next { display: grid; gap: 18px; }
        .next-row { display: grid; grid-template-columns: 42px 1fr 16px; align-items: center; gap: 14px; }
        .next h3 { margin: 0 0 7px; font-size: 13px; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .sidebar { display: none; } .hero-card, .main-grid, .bottom-grid { grid-template-columns: 1fr; } .score-box { border-left: 0; padding-left: 0; } }
        @media (max-width: 650px) { .content { padding: 22px 14px; } .topbar { padding: 0 14px; } .donut-wrap, .track { grid-template-columns: 1fr; } }
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
                <div class="page-head"><h1>Initial Assessment</h1><p>Complete the assessment to discover your skills and get personalized course recommendations.</p></div>
                <article class="card hero-card">
                    <div class="hero-art">IA</div>
                    <div><div class="status"><span>✓</span>Assessment Completed</div><p>Submitted on 12 May 2024, 10:30 AM</p><button class="outline" type="button">View Details</button></div>
                    <div class="score-box"><h3>Overall Score</h3><div class="ring"><span>60%</span></div></div>
                </article>
                <div class="main-grid">
                    <article class="card section">
                        <h2>Skill Assessment Results</h2>
                        <div id="skillResults"></div>
                    </article>
                    <article class="card section">
                        <h2>Subject Wise Performance</h2>
                        <div class="donut-wrap">
                            <div class="donut" id="subjectDonut"><span id="overallScore">0%<br><small>Overall</small></span></div>
                            <div class="legend" id="subjectLegend"></div>
                        </div>
                    </article>
                </div>
                <div class="bottom-grid">
                    <article class="card section">
                        <h2>Recommended for You</h2><p>Based on your performance, we recommend the following career tracks.</p>
                        @foreach ($tracks as $track)
                            <div class="track"><span class="section-icon">{{ $track['icon'] }}</span><div><h3>{{ $track['title'] }} @if ($track['tag'])<span class="tag">{{ $track['tag'] }}</span>@endif</h3><p>{{ $track['text'] }}</p></div><div><small>Match Score</small><div class="match">{{ $track['score'] }}%</div></div><button class="primary" type="button">Explore</button></div>
                        @endforeach
                    </article>
                    <article class="card section"><h2>What's Next?</h2><div class="next">
                        @foreach ($nextSteps as $step)
                            <div class="next-row"><span class="section-icon">{{ $step['icon'] }}</span><div><h3>{{ $step['title'] }}</h3><p>{{ $step['text'] }}</p></div><span>›</span></div>
                        @endforeach
                    </div></article>
                </div>
            </section>
        </main>
    </div>
    <script>
        const assessmentResults = @json($results);
        const skillResults = document.getElementById('skillResults');
        const subjectLegend = document.getElementById('subjectLegend');
        const subjectDonut = document.getElementById('subjectDonut');
        const overallScore = document.getElementById('overallScore');

        function renderSkillResults() {
            skillResults.innerHTML = '';
            assessmentResults.forEach(function (item) {
                const row = document.createElement('div');
                row.className = 'result-row';
                row.innerHTML =
                    '<span>' + item.name + '</span>' +
                    '<div class="bar"><span style="width:' + item.score + '%; background:' + item.color + ';"></span></div>' +
                    '<strong>' + item.score + '%</strong>';
                skillResults.appendChild(row);
            });
        }

        function renderSubjectPerformance() {
            subjectLegend.innerHTML = '';
            let start = 0;
            const step = 100 / assessmentResults.length;
            const gradientParts = assessmentResults.map(function (item) {
                const end = start + step;
                const part = item.color + ' ' + start + '% ' + end + '%';
                start = end;
                return part;
            });
            const average = Math.round(assessmentResults.reduce(function (total, item) {
                return total + item.score;
            }, 0) / assessmentResults.length);

            subjectDonut.style.background = 'conic-gradient(' + gradientParts.join(', ') + ')';
            overallScore.innerHTML = average + '%<br><small>Overall</small>';

            assessmentResults.forEach(function (item) {
                const row = document.createElement('div');
                row.className = 'legend-row';
                row.innerHTML =
                    '<span class="dot" style="background:' + item.color + ';"></span>' +
                    '<span>' + item.name + '</span>' +
                    '<strong>' + item.score + '%</strong>';
                subjectLegend.appendChild(row);
            });
        }

        renderSkillResults();
        renderSubjectPerformance();

        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');
        userMenuBtn.addEventListener('click', function () { userMenu.classList.toggle('show'); });
        document.addEventListener('click', function (event) { if (!userMenu.contains(event.target) && !userMenuBtn.contains(event.target)) userMenu.classList.remove('show'); });
    </script>
</body>
</html>




