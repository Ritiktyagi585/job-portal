@extends('fast-track.layouts.app')

@section('title', 'Certificate')

@php
    $activePage = 'certificate';
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
        ['label' => 'Certificates Earned', 'value' => '1', 'hint' => 'Keep learning and earn more', 'icon' => 'CE'],
        ['label' => 'Lessons Completed', 'value' => '28/74', 'hint' => 'Across All Courses', 'icon' => 'LC'],
        ['label' => 'Total Study Time', 'value' => '12h 45m', 'hint' => 'Keep it up!', 'icon' => 'ST'],
        ['label' => 'Overall Progress', 'value' => '38%', 'hint' => 'You are doing great!', 'icon' => 'OP'],
    ];
    $certificates = [
        [
            'student' => 'Ananya Gupta',
            'course' => 'Full Stack Development',
            'description' => 'Build modern web applications from scratch and become a full stack developer.',
            'badge' => 'Most Popular',
            'date' => '20 May 2026',
            'duration' => '12 Months',
            'certificateId' => 'OF-2026-05-0001',
            'credentialId' => '9f3c7b2e-8a4d-4f91-bc1a-2e7b8c9d0123',
            'status' => 'Verified',
        ],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f6f9ff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:260px 1fr}.sidebar{background:#fff;border-right:1px solid #dce7f8;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 18px;border-bottom:1px solid #dce7f8}.brand img{width:205px}.menu{padding:28px 14px 18px;display:grid;gap:8px}.menu-item{min-height:42px;display:flex;align-items:center;gap:14px;padding:8px 12px;border-radius:8px;font-size:14px}.menu-item.active{background:#eaf2ff;color:#075fe4;font-weight:700}.menu-icon,.icon{width:28px;height:28px;border-radius:7px;background:#f0f5ff;color:#075fe4;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:800;flex:0 0 auto}.side-bottom{margin-top:auto;padding:18px 22px 28px;border-top:1px solid #dce7f8;display:grid;gap:12px}.bottom-link{display:flex;align-items:center;gap:14px;font-size:14px;min-height:34px}.topbar{height:76px;background:#fff;border-bottom:1px solid #dce7f8;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#061942}.user{display:flex;align-items:center;gap:12px;position:relative}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;display:flex;align-items:center;justify-content:center}.bell svg,.user button svg{width:20px;height:20px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.bell span{position:absolute;top:-1px;right:0;width:15px;height:15px;border-radius:50%;background:#ff3045;color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;font-weight:700}.top-avatar{width:46px;height:46px;border-radius:50%;background-image:url('{{ asset('student.png') }}');background-size:220px auto;background-position:16% 28%;border:3px solid #eaf2ff}.user h3{margin:0;font-size:14px}.user button:last-child{border:0;background:transparent;cursor:pointer;display:flex}.user-menu{position:absolute;top:58px;right:0;width:155px;border:1px solid #dce7f8;border-radius:8px;background:#fff;box-shadow:0 12px 28px rgba(6,25,66,.12);display:none;z-index:5}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:28px 30px 38px}.head{display:flex;align-items:flex-start;justify-content:space-between;gap:18px;margin-bottom:22px}.head h1{margin:0 0 8px;font-size:27px}.head p{margin:0;color:#334b83;font-size:14px}.btn{height:42px;border:1px solid #075fe4;border-radius:5px;background:#075fe4;color:#fff;padding:0 22px;font-weight:700;cursor:pointer}.btn.light{background:#fff;color:#075fe4}.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-bottom:24px}.card{background:#fff;border:1px solid #dce7f8;border-radius:9px;box-shadow:0 10px 24px rgba(6,25,66,.04)}.stat-card{padding:20px;display:grid;grid-template-columns:60px 1fr;gap:18px;align-items:center}.stat-card .icon{width:54px;height:54px;border-radius:12px;font-size:11px}.stat-card h2{margin:0 0 8px;font-size:24px}.stat-card p{margin:0 0 8px;color:#334b83;font-size:13px}.stat-card small{color:#334b83;font-size:12px}.tabs{display:flex;gap:32px;border-bottom:1px solid #dce7f8;margin-bottom:22px}.tab{padding:0 24px 14px;border:0;background:transparent;color:#334b83;font-size:14px;font-weight:700;cursor:pointer}.tab.active{color:#075fe4;border-bottom:3px solid #075fe4}.certificate-card{padding:8px;display:grid;grid-template-columns:1.08fr 1fr;gap:28px;margin-bottom:22px}.certificate-preview{min-height:350px;border:1px solid #d7b15f;background:#fff;position:relative;overflow:hidden;padding:28px;text-align:center}.certificate-preview:before,.certificate-preview:after{content:"";position:absolute;width:170px;height:170px;border:28px solid #07306e;transform:rotate(45deg)}.certificate-preview:before{right:-95px;top:-95px;border-color:#07306e #d7a63b transparent transparent}.certificate-preview:after{left:-100px;bottom:-100px;border-color:transparent transparent #d7a63b #07306e}.cert-logo{width:170px;margin:0 auto 14px}.certificate-preview h2{letter-spacing:5px;font-size:30px;margin:10px 0 4px;font-family:Georgia,serif}.certificate-preview h3{letter-spacing:4px;font-size:18px;margin:0 0 20px;font-family:Georgia,serif}.certificate-name{font-family:Georgia,serif;font-style:italic;font-size:36px;margin:16px 0;color:#061942;border-bottom:1px solid #d7a63b;display:inline-block;padding:0 40px 8px}.certificate-course{font-size:18px;font-weight:800;margin:10px 0}.cert-footer{display:flex;justify-content:space-around;margin-top:28px;font-size:11px}.cert-seal{width:62px;height:62px;border-radius:50%;background:#d7a63b;color:#fff;display:flex;align-items:center;justify-content:center;margin:auto;font-size:28px}.details{padding:22px 20px}.status{display:inline-flex;padding:6px 12px;border-radius:6px;background:#e2f9ea;color:#05843e;font-size:12px;font-weight:700}.details h2{margin:18px 0 8px;font-size:22px}.details p{margin:0 0 24px;color:#334b83;font-size:13px;line-height:1.7;max-width:560px}.badge{display:inline-flex;margin-left:8px;padding:5px 9px;border-radius:6px;background:#efeaff;color:#673de6;font-size:11px}.info-list{display:grid;gap:18px;margin-bottom:24px}.info-row{display:grid;grid-template-columns:28px 150px 1fr;gap:12px;align-items:center;font-size:13px;color:#334b83}.info-row strong{color:#061942;font-weight:600}.actions{display:grid;gap:12px}.cta{padding:20px 28px;background:#eaf2ff;border:1px solid #cfe0ff;border-radius:9px;display:flex;align-items:center;justify-content:space-between;gap:18px}.cta-left{display:flex;align-items:center;gap:20px}.cta-icon{width:62px;height:62px;border-radius:12px;background:#fff;display:flex;align-items:center;justify-content:center;color:#075fe4;font-size:30px}.cta h3{margin:0 0 8px;font-size:17px}.cta p{margin:0;color:#334b83;font-size:13px}@media(max-width:1180px){.layout{grid-template-columns:1fr}.sidebar{display:none}.stats-grid{grid-template-columns:repeat(2,1fr)}.certificate-card{grid-template-columns:1fr}}@media(max-width:720px){.content{padding:22px 14px}.topbar{padding:0 14px}.head,.cta{flex-direction:column;align-items:stretch}.stats-grid{grid-template-columns:1fr}.certificate-preview{min-height:300px;padding:20px}.certificate-preview h2{font-size:22px}.certificate-name{font-size:28px}.info-row{grid-template-columns:28px 1fr}.info-row strong{grid-column:2}}
</style>
@endpush

@section('content')
<section class="content">
<div class="head"><div><h1>Certificate</h1><p>View and download your earned certificates.</p></div><button class="btn light">Download All Certificates</button></div><div class="stats-grid" id="stats"></div><div class="tabs"><button class="tab active">Earned Certificates</button><button class="tab">In Progress</button></div><div id="certificateList"></div><div class="cta"><div class="cta-left"><span class="cta-icon">🏆</span><div><h3>Complete more courses to earn more certificates!</h3><p>Enhance your skills and boost your career opportunities.</p></div></div><a class="btn" href="/fast-track/courses">Browse Courses ></a></div>
</section>
@endsection

@push('scripts')
<script>
const stats=@json($stats),certificates=@json($certificates);
    document.getElementById('stats').innerHTML=stats.map(item=>`<article class="card stat-card"><span class="icon">${item.icon}</span><div><h2>${item.value}</h2><p>${item.label}</p><small>${item.hint}</small></div></article>`).join('');
    document.getElementById('certificateList').innerHTML=certificates.map(cert=>`<article class="card certificate-card"><div class="certificate-preview"><img class="cert-logo" src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers"><h2>CERTIFICATE</h2><h3>OF COMPLETION</h3><p>This is to certify that</p><div class="certificate-name">${cert.student}</div><p>has successfully completed the course</p><div class="certificate-course">${cert.course}</div><p>and has demonstrated the required skills and knowledge.</p><div class="cert-seal">?</div><div class="cert-footer"><span>${cert.date}<br>Date</span><span>Authorized Signatory<br>OnlyFreshers</span></div></div><div class="details"><span class="status">${cert.status}</span><h2>${cert.course}<span class="badge">${cert.badge}</span></h2><p>${cert.description}</p><div class="info-list"><div class="info-row"><span class="icon">DE</span><span>Date Earned</span><strong>${cert.date}</strong></div><div class="info-row"><span class="icon">DU</span><span>Duration</span><strong>${cert.duration}</strong></div><div class="info-row"><span class="icon">CI</span><span>Certificate ID</span><strong>${cert.certificateId}</strong></div><div class="info-row"><span class="icon">CR</span><span>Credential ID</span><strong>${cert.credentialId}</strong></div></div><div class="actions"><button class="btn">Download Certificate</button><button class="btn light">Share Certificate</button></div></div></article>`).join('');
</script>
@endpush