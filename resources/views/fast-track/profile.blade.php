@extends('fast-track.layouts.app')

@section('title', 'My Profile - Fast Track')

@php
    $activePage = 'profile';
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
    $skills = ['React.js', 'JavaScript', 'Node.js', 'HTML', 'CSS', 'MongoDB', 'Git & GitHub', 'Problem Solving'];
    $summary = [
        ['label' => 'Profile Views', 'value' => '128', 'icon' => 'PV'],
        ['label' => 'Applications', 'value' => '5', 'icon' => 'AP'],
        ['label' => 'Shortlisted', 'value' => '2', 'icon' => 'SH'],
        ['label' => 'Training Enrolled', 'value' => '1', 'icon' => 'TE'],
    ];
    $student = [
        'name' => 'Ananya Gupta',
        'role' => 'Fresher',
        'email' => 'ananya@example.com',
        'phone' => '9876543210',
        'location' => 'Bangalore, Karnataka',
        'qualification' => 'B.Tech (Computer Science)',
        'college' => 'RV College of Engineering',
        'passing_year' => '2024',
        'completion' => 75,
        'resume' => 'Ananya_Gupta_Resume.pdf',
        'resume_size' => '512 KB',
        'about' => 'I am a proactive and motivated Computer Science graduate with a strong foundation in web development and problem solving. I am passionate about learning new technologies and building real world applications.',
    ];
@endphp

@push('styles')
<style>
* { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f6f9ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; display: grid; grid-template-columns: 260px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; }
        .brand { height: 86px; display: flex; align-items: center; padding: 0 18px; border-bottom: 1px solid #dce7f8; }
        .brand img { width: 205px; height: auto; display: block; }
        .menu { padding: 28px 14px 18px; display: grid; gap: 8px; }
        .menu-item { min-height: 42px; display: flex; align-items: center; gap: 14px; padding: 8px 12px; border-radius: 8px; color: #071743; font-size: 14px; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; font-weight: 700; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; background: #f0f5ff; color: #075fe4; display: inline-flex; align-items: center; justify-content: center; font-size: 9px; font-weight: 800; flex: 0 0 auto; }
        .side-bottom { margin-top: auto; padding: 18px 22px 28px; border-top: 1px solid #dce7f8; display: grid; gap: 12px; }
        .bottom-link { display: flex; align-items: center; gap: 14px; font-size: 14px; min-height: 34px; }
        .main { min-width: 0; }
        .topbar { height: 76px; background: white; border-bottom: 1px solid #dce7f8; display: flex; align-items: center; justify-content: space-between; padding: 0 28px; }
        .hamburger { width: 34px; height: 34px; border: 0; background: transparent; font-size: 26px; color: #061942; cursor: pointer; }
        .user { display: flex; align-items: center; gap: 12px; }
        .bell { position: relative; width: 34px; height: 34px; border: 0; background: transparent; color: #061942; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .bell svg { width: 22px; height: 22px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; top: 0; right: 2px; width: 16px; height: 16px; border-radius: 50%; background: #ff3045; color: white; font-size: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-avatar { width: 46px; height: 46px; border-radius: 50%; background-image: url('{{ asset('student.png') }}'); background-size: 220px auto; background-position: 16% 28%; border: 3px solid #eaf2ff; }
        .user h3 { margin: 0 0 4px; font-size: 14px; font-weight: 700; }
        .user button { border: 0; background: transparent; cursor: pointer; }
        .user button:last-child { color: #061942; display: flex; align-items: center; justify-content: center; }
        .user button:last-child svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .user-menu { position: absolute; top: 62px; right: 28px; width: 160px; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 28px rgba(6,25,66,.12); display: none; overflow: hidden; z-index: 5; }
        .user-menu.show { display: block; }
        .user-menu a { display: block; padding: 12px 14px; font-size: 13px; }
        .user-menu a:hover { background: #eaf2ff; color: #075fe4; }
        .content { padding: 34px 28px 40px; }
        .page-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin-bottom: 28px; }
        .page-head h1 { margin: 0 0 9px; font-size: 27px; line-height: 1.1; font-weight: 700; }
        .page-head p { margin: 0; font-size: 14px; color: #3e4f75; }
        .edit-btn { height: 42px; border: 1px solid #075fe4; color: #075fe4; background: white; border-radius: 7px; padding: 0 18px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .grid { display: grid; grid-template-columns: 360px 1fr; gap: 22px; }
        .card { background: white; border: 1px solid #dce7f8; border-radius: 9px; box-shadow: 0 10px 24px rgba(6,25,66,.04); }
        .profile-card { padding: 26px 24px; text-align: center; }
        .avatar-wrap { position: relative; width: 118px; height: 118px; margin: 0 auto 18px; }
        .avatar { width: 118px; height: 118px; border-radius: 50%; background-image: url('{{ asset('student.png') }}'); background-size: 470px auto; background-position: 16% 20%; border: 10px solid #eaf2ff; }
        .camera { position: absolute; right: -3px; bottom: 14px; width: 38px; height: 38px; border: 1px solid #075fe4; background: white; color: #075fe4; border-radius: 50%; font-size: 16px; font-weight: 800; display: flex; align-items: center; justify-content: center; }
        .profile-card h2 { margin: 0 0 12px; font-size: 20px; font-weight: 700; }
        .tag { display: inline-flex; padding: 6px 13px; border-radius: 7px; background: #eaf2ff; color: #075fe4; font-size: 12px; font-weight: 700; margin-bottom: 20px; }
        .info-list { display: grid; gap: 15px; margin-top: 6px; text-align: left; }
        .info-row { display: grid; grid-template-columns: 100px 1fr; gap: 10px; align-items: center; font-size: 13px; }
        .info-row span:first-child { color: #061942; display: flex; align-items: center; gap: 8px; }
        .info-row b { font-weight: 500; }
        .right-grid { display: grid; grid-template-columns: 1fr 370px; gap: 22px; }
        .wide { grid-column: 1 / -1; }
        .section { padding: 24px; }
        .section-title { display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
        .section-icon { width: 38px; height: 38px; border-radius: 10px; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 800; }
        .section-title h3 { margin: 0; font-size: 17px; font-weight: 700; }
        .about p { margin: 0; color: #061942; font-size: 13px; line-height: 1.75; }
        .skills { display: flex; flex-wrap: wrap; gap: 13px; }
        .skill { padding: 10px 16px; border-radius: 7px; background: #f0f4ff; color: #075fe4; font-size: 13px; font-weight: 600; }
        .resume-box { border: 1px solid #dce7f8; border-radius: 8px; padding: 16px; display: flex; align-items: center; gap: 16px; margin-bottom: 20px; }
        .pdf { width: 42px; height: 42px; border-radius: 7px; background: #fff0f0; color: #ff2b2b; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 800; }
        .resume-box h4 { margin: 0 0 6px; font-size: 13px; }
        .resume-box p { margin: 0; color: #536484; font-size: 12px; }
        .download { width: 100%; height: 42px; border: 1px solid #075fe4; background: white; color: #075fe4; border-radius: 7px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .bottom-grid { display: grid; grid-template-columns: 1.25fr 1fr; gap: 22px; margin-top: 22px; }
        .completion { padding: 24px; }
        .percent { font-size: 32px; color: #075fe4; font-weight: 700; margin-top: 6px; }
        .progress-line { height: 11px; border-radius: 20px; background: #e5ebf5; overflow: hidden; margin: 10px 0 18px; }
        .progress-line span { display: block; width: 75%; height: 100%; background: #075fe4; border-radius: inherit; }
        .completion p { margin: 0; color: #061942; font-size: 14px; line-height: 1.6; }
        .summary-list { display: grid; gap: 16px; }
        .summary-row { display: grid; grid-template-columns: 34px 1fr auto; align-items: center; gap: 12px; font-size: 13px; }
        .summary-row strong { font-size: 14px; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .sidebar { display: none; } .grid, .right-grid, .bottom-grid { grid-template-columns: 1fr; } }
        @media (max-width: 640px) { .content { padding: 24px 14px; } .topbar { padding: 0 14px; } .page-head { flex-direction: column; } .info-row { grid-template-columns: 1fr; gap: 4px; } }
</style>
@endpush

@section('content')
<section class="content">
<div class="page-head">
                    <div>
                        <h1>My Profile</h1>
                        <p>View and manage your personal information</p>
                    </div>
                    <button class="edit-btn" type="button">Edit Profile</button>
                </div>

                <div class="grid">
                    <article class="card profile-card">
                        <div class="avatar-wrap">
                            <div class="avatar"></div>
                            <span class="camera">C</span>
                        </div>
                        <h2>{{ $student['name'] }}</h2>
                        <span class="tag">{{ $student['role'] }}</span>
                        <div class="info-list">
                            <div class="info-row"><span>Email</span><b>{{ $student['email'] }}</b></div>
                            <div class="info-row"><span>Phone</span><b>{{ $student['phone'] }}</b></div>
                            <div class="info-row"><span>Location</span><b>{{ $student['location'] }}</b></div>
                            <div class="info-row"><span>Qualification</span><b>{{ $student['qualification'] }}</b></div>
                            <div class="info-row"><span>College</span><b>{{ $student['college'] }}</b></div>
                            <div class="info-row"><span>Passing Year</span><b>{{ $student['passing_year'] }}</b></div>
                        </div>
                    </article>

                    <div>
                        <div class="right-grid">
                            <article class="card section about wide">
                                <div class="section-title"><span class="section-icon">AB</span><h3>About Me</h3></div>
                                <p>{{ $student['about'] }}</p>
                            </article>

                            <article class="card section">
                                <div class="section-title"><span class="section-icon">SK</span><h3>Skills</h3></div>
                                <div class="skills">
                                    @foreach ($skills as $skill)
                                        <span class="skill">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </article>

                            <article class="card section">
                                <div class="section-title"><span class="section-icon">RS</span><h3>Resume</h3></div>
                                <div class="resume-box">
                                    <span class="pdf">PDF</span>
                                    <div>
                                        <h4>{{ $student['resume'] }}</h4>
                                        <p>{{ $student['resume_size'] }}</p>
                                    </div>
                                </div>
                                <button class="download" type="button">Download Resume</button>
                            </article>
                        </div>

                        <div class="bottom-grid">
                            <article class="card completion">
                                <div class="section-title"><span class="section-icon">75</span><h3>Profile Completion</h3></div>
                                <div class="percent">{{ $student['completion'] }}%</div>
                                <div class="progress-line"><span style="width: {{ $student['completion'] }}%;"></span></div>
                                <p>Complete your profile to increase your chances of getting hired.</p>
                            </article>

                            <article class="card section">
                                <div class="section-title"><span class="section-icon">SM</span><h3>Profile Summary</h3></div>
                                <div class="summary-list">
                                    @foreach ($summary as $item)
                                        <div class="summary-row">
                                            <span class="section-icon">{{ $item['icon'] }}</span>
                                            <span>{{ $item['label'] }}</span>
                                            <strong>{{ $item['value'] }}</strong>
                                        </div>
                                    @endforeach
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
</section>
@endsection

@push('scripts')
<script>
        document.querySelector('.edit-btn').addEventListener('click', function () {
            alert('Edit profile form will open here.');
        });
        document.querySelector('.download').addEventListener('click', function () {
            alert('Resume download started.');
        });
</script>
@endpush
