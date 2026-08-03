@extends('training-partner.layouts.app')

@section('title', 'Training Partner Notifications')

@php
    $activePage = 'notifications';
    $notifications = [
        ['title' => 'New Course Available', 'text' => 'React Native Development course is now available. Enroll now!', 'type' => 'Courses', 'time' => '10 min ago', 'read' => false, 'icon' => 'BK'],
        ['title' => 'Assessment Completed', 'text' => 'Great job! You have completed HTML & CSS Basics assessment.', 'type' => 'Assessments', 'time' => '2 hours ago', 'read' => false, 'icon' => 'CK'],
        ['title' => 'Payout Initiated', 'text' => 'Your payout of Rs 4,300.00 has been initiated and will be transferred soon.', 'type' => 'Updates', 'time' => '1 day ago', 'read' => false, 'icon' => 'PY'],
        ['title' => 'System Announcement', 'text' => 'Our platform will be under maintenance on 25 May 2024 from 2:00 AM to 4:00 AM.', 'type' => 'System', 'time' => '2 days ago', 'read' => false, 'icon' => 'AN'],
        ['title' => 'New Certificate Earned', 'text' => 'Congratulations! You have earned a certificate in Python Programming Basics.', 'type' => 'Courses', 'time' => '3 days ago', 'read' => false, 'icon' => 'CT'],
        ['title' => 'Upcoming Assessment', 'text' => 'JavaScript Fundamentals assessment is scheduled on 28 May 2024.', 'type' => 'Assessments', 'time' => '4 days ago', 'read' => true, 'icon' => 'CA'],
        ['title' => 'Course Reminder', 'text' => 'Do not forget to continue Data Science & Analytics course.', 'type' => 'Courses', 'time' => '5 days ago', 'read' => true, 'icon' => 'ST'],
        ['title' => 'Special Offer', 'text' => 'Enroll in any Premium course and get 20% off. Offer valid till 31 May 2024.', 'type' => 'Updates', 'time' => '1 week ago', 'read' => true, 'icon' => 'GF'],
    ];
    $summary = [
        ['label' => 'Total Notifications', 'value' => 18, 'icon' => 'BL'],
        ['label' => 'Unread', 'value' => 7, 'icon' => 'ML'],
        ['label' => 'Read', 'value' => 11, 'icon' => 'OK'],
        ['label' => 'This Week', 'value' => 4, 'icon' => 'WK'],
    ];
    $settings = [
        ['title' => 'Email Notifications', 'text' => 'Manage email preferences', 'icon' => 'EM'],
        ['title' => 'Course Updates', 'text' => 'Get notified about new courses', 'icon' => 'CU'],
        ['title' => 'Assessment Alerts', 'text' => 'Updates on assessments', 'icon' => 'AA'],
        ['title' => 'Payout Alerts', 'text' => 'Notifications about payouts', 'icon' => 'PA'],
        ['title' => 'System Updates', 'text' => 'Important system announcements', 'icon' => 'SU'],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}html,body{max-width:100%;overflow-x:hidden}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#071544;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px minmax(0,1fr)}.sidebar{background:#fff;border-right:1px solid #dfe4f2;display:flex;flex-direction:column}.brand{height:88px;display:flex;align-items:center;padding:0 26px;border-bottom:1px solid #dfe4f2}.brand img{width:205px}.menu{padding:22px 16px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px;font-weight:700}.menu-item.active{background:#f2eaff;color:#5b20e6}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f3ecff;color:#5b20e6;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.side-bottom{margin-top:auto;padding:0 20px 24px}.promo{padding:20px;border:1px solid #eadfff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f1ff)}.promo h3{margin:0 0 14px;color:#5b20e6;font-size:15px;line-height:1.6}.promo p{margin:0;color:#26375f;font-size:13px;line-height:1.8}.promo-art{height:150px;margin-top:12px;border-radius:10px;background:linear-gradient(160deg,#efe4ff,#fff);display:flex;align-items:center;justify-content:center;font-size:72px;position:relative}.promo-art span{position:absolute;right:40px;top:22px;width:34px;height:34px;border-radius:50%;background:#ff3b3b;color:#fff;font-size:18px;font-weight:900;display:flex;align-items:center;justify-content:center}.topbar{height:78px;background:#fff;border-bottom:1px solid #dfe4f2;display:flex;align-items:center;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#071544}.user{display:flex;align-items:center;gap:12px;position:relative;margin-left:auto}.bell{position:relative;border:0;background:transparent;width:34px;height:34px}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#5b20e6;color:#fff;font-size:10px;font-weight:800;display:flex;align-items:center;justify-content:center}.avatar{width:40px;height:40px;border-radius:50%;background:#e9edf8;color:#5b20e6;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:900}.user h3{margin:0;font-size:12px}.chev{border:0;background:transparent;font-size:18px}.content{padding:26px 28px 30px;min-width:0}.head h1{margin:0 0 14px;font-size:22px}.head p{margin:0 0 34px;color:#26375f;font-size:13px}.page-grid{display:grid;grid-template-columns:minmax(0,1fr) 300px;gap:22px}.tabs{display:flex;gap:36px;border-bottom:1px solid #dfe4f2;margin-bottom:28px}.tab{border:0;background:transparent;padding:0 8px 14px;color:#071544;font-weight:800;cursor:pointer}.tab.active{color:#5b20e6;border-bottom:3px solid #5b20e6}.tools{display:flex;gap:16px;align-items:center;margin-bottom:22px}.search{height:40px;max-width:305px;flex:1;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 14px;font-size:13px}.outline-btn{height:40px;border:1px solid #8c52ff;border-radius:6px;background:#fff;color:#5b20e6;font-weight:900;padding:0 18px}.tools .outline-btn:first-of-type{margin-left:auto}.card{background:#fff;border:1px solid #dfe4f2;border-radius:9px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.list{overflow:hidden}.note{display:grid;grid-template-columns:54px 1fr auto 20px;gap:16px;align-items:center;padding:18px;border-bottom:1px solid #e7ebf5}.note:last-child{border-bottom:0}.note h2{margin:0 0 8px;font-size:13px}.note p{margin:0;color:#26375f;font-size:12px;line-height:1.6}.time{font-size:12px;color:#26375f}.dot{width:7px;height:7px;border-radius:50%;background:#5b20e6}.dot.read{background:#8f9bb4}.footer{padding:18px;display:flex;justify-content:space-between;align-items:center;font-size:12px;color:#26375f;border-top:1px solid #e7ebf5}.pages{display:flex;gap:8px}.page-btn{height:34px;min-width:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;font-weight:900}.page-btn.active{background:#5b20e6;color:#fff}.page-size{height:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;padding:0 12px}.side-stack{display:grid;gap:18px}.side-card{padding:18px}.side-card h2{margin:0 0 18px;font-size:14px}.summary-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}.summary-box{border:1px solid #e3e7f2;border-radius:8px;padding:16px}.summary-box strong{display:block;margin:12px 0 6px;font-size:24px}.summary-box p{margin:0;color:#26375f;font-size:12px}.setting-row{display:grid;grid-template-columns:34px 1fr 18px;gap:12px;align-items:center;padding:12px 0;border-bottom:1px solid #eef1f8}.setting-row:last-child{border-bottom:0}.setting-row h3{margin:0 0 5px;font-size:12px}.setting-row p{margin:0;color:#526287;font-size:11px}.help{background:linear-gradient(145deg,#fff,#f6f0ff)}.help a{color:#5b20e6;font-weight:900;font-size:12px}.empty{padding:34px;text-align:center;color:#526287}@media(max-width:1150px){.layout{grid-template-columns:1fr}.sidebar{display:none}.page-grid{grid-template-columns:1fr}}@media(max-width:720px){.content,.topbar{padding-left:14px;padding-right:14px}.tools{display:grid;grid-template-columns:1fr}.tools .outline-btn:first-of-type{margin-left:0}.tabs{overflow:auto}.note{grid-template-columns:44px 1fr}.time,.dot{justify-self:start}.summary-grid{grid-template-columns:1fr}.footer{flex-direction:column;gap:14px;align-items:flex-start}}
</style>
@endpush

@section('content')
<div class="head"><h1>18&nbsp; Notifications</h1><p>Stay updated with the latest activity and announcements.</p></div>
                <!-- End Header Section -->
                <div class="page-grid">
                    <div>
                        <div class="tabs" id="tabs"></div>
                        <div class="tools"><input class="search" id="searchBox" type="search" placeholder="Search notifications..."><button class="outline-btn">Filter</button><button class="outline-btn" id="markRead">Mark all as read</button></div>
                        <!-- End Filter Section -->
                        <article class="card list"><div id="notificationRows"></div><div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">&lt;</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">9</button><button class="page-btn">&gt;</button><select class="page-size"><option>10 / page</option></select></div></div></article>
                        <!-- End Notification List Section -->
                    </div>
                    <aside class="side-stack"><article class="card side-card"><h2>Notification Summary</h2><div class="summary-grid" id="summaryGrid"></div></article><article class="card side-card"><h2>Notification Settings</h2><div id="settingsList"></div></article><article class="card side-card help"><h2>Need Help?</h2><p>Learn how notifications work and manage your preferences.</p><a href="#">View Help Guide -></a></article></aside>
                    <!-- End Notification Sidebar Section -->
                </div>
@endsection

@push('scripts')
<script>
let notifications=@json($notifications);
        const summary=@json($summary),settings=@json($settings);
        const tabs=['All','Unread','Updates','Courses','Assessments','System'];
        let currentTab='All';
        document.getElementById('tabs').innerHTML=tabs.map((tab,index)=>`<button class="tab ${index===0?'active':''}" data-tab="${tab}">${tab}</button>`).join('');
        document.getElementById('summaryGrid').innerHTML=summary.map(item=>`<div class="summary-box"><span class="icon">${item.icon}</span><strong>${item.value}</strong><p>${item.label}</p></div>`).join('');
        document.getElementById('settingsList').innerHTML=settings.map(item=>`<div class="setting-row"><span class="icon">${item.icon}</span><div><h3>${item.title}</h3><p>${item.text}</p></div><strong>&gt;</strong></div>`).join('');
        function renderNotifications(){const query=document.getElementById('searchBox').value.toLowerCase();const rows=notifications.filter(item=>(currentTab==='All'||(currentTab==='Unread'?!item.read:item.type===currentTab))&&(item.title.toLowerCase().includes(query)||item.text.toLowerCase().includes(query)));document.getElementById('notificationRows').innerHTML=rows.length?rows.map(item=>`<div class="note"><span class="icon">${item.icon}</span><div><h2>${item.title}</h2><p>${item.text}</p></div><span class="time">${item.time}</span><span class="dot ${item.read?'read':''}"></span></div>`).join(''):'<div class="empty">No notifications found.</div>';document.getElementById('resultText').textContent=`Showing 1 to ${rows.length} of ${notifications.length} notifications`;}
        document.getElementById('tabs').addEventListener('click',event=>{if(!event.target.matches('.tab'))return;document.querySelectorAll('.tab').forEach(tab=>tab.classList.remove('active'));event.target.classList.add('active');currentTab=event.target.dataset.tab;renderNotifications();});
        document.getElementById('searchBox').addEventListener('input',renderNotifications);
        document.getElementById('markRead').addEventListener('click',()=>{notifications=notifications.map(item=>({...item,read:true}));renderNotifications();});
        renderNotifications();
</script>
@endpush



