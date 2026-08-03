@extends('training-partner.layouts.app')

@section('title', 'Reports')

@php
    $activePage = 'reports';
    $topStats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $reports = [
        ['name' => 'Course Performance Summary', 'text' => 'Overview of all courses performance and key metrics.', 'type' => 'Course Performance', 'dateRange' => '01 May 2024 - 31 May 2024', 'generated' => '31 May 2024 10:30 AM', 'icon' => 'CP'],
        ['name' => 'Learner Engagement Report', 'text' => 'Track learner activity, logins and content interaction.', 'type' => 'Learner Engagement', 'dateRange' => '01 May 2024 - 31 May 2024', 'generated' => '31 May 2024 10:25 AM', 'icon' => 'LE'],
        ['name' => 'Assessment Performance Report', 'text' => 'Performance of learners in assessments and quizzes.', 'type' => 'Assessments', 'dateRange' => '01 May 2024 - 31 May 2024', 'generated' => '31 May 2024 10:20 AM', 'icon' => 'AS'],
        ['name' => 'Payout Summary Report', 'text' => 'Earnings, deductions and net payout details.', 'type' => 'Payouts', 'dateRange' => '01 May 2024 - 31 May 2024', 'generated' => '31 May 2024 10:15 AM', 'icon' => 'PY'],
        ['name' => 'Certificate Issuance Report', 'text' => 'Details of certificates issued to learners.', 'type' => 'Certificates', 'dateRange' => '01 May 2024 - 31 May 2024', 'generated' => '31 May 2024 10:10 AM', 'icon' => 'CT'],
        ['name' => 'Monthly Trend Report', 'text' => 'Month-on-month growth trends for enrollments and revenue.', 'type' => 'Course Performance', 'dateRange' => '01 Apr 2024 - 31 May 2024', 'generated' => '31 May 2024 10:05 AM', 'icon' => 'MT'],
    ];
    $overview = [
        ['label' => 'Total Reports', 'value' => 12, 'icon' => 'TR'],
        ['label' => 'Generated', 'value' => 8, 'icon' => 'GN'],
        ['label' => 'Scheduled', 'value' => 4, 'icon' => 'SC'],
        ['label' => 'Downloads', 'value' => 26, 'icon' => 'DL'],
    ];
    $typeStats = [
        ['label' => 'Course Performance', 'value' => 4, 'color' => '#5b2ce1'],
        ['label' => 'Learner Engagement', 'value' => 3, 'color' => '#2ab96d'],
        ['label' => 'Assessments', 'value' => 2, 'color' => '#ff9f27'],
        ['label' => 'Payouts', 'value' => 2, 'color' => '#4e8cff'],
        ['label' => 'Certificates', 'value' => 1, 'color' => '#f5bd35'],
    ];
    $downloads = [
        ['name' => 'Course Performance Summary', 'count' => '18 Downloads', 'icon' => 'CP'],
        ['name' => 'Learner Engagement Report', 'count' => '15 Downloads', 'icon' => 'LE'],
        ['name' => 'Assessment Performance Report', 'count' => '12 Downloads', 'icon' => 'AS'],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}html,body{max-width:100%;overflow-x:hidden}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#0a1748;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px minmax(0,1fr)}.sidebar{background:#fff;border-right:1px solid #dddff0;display:flex;flex-direction:column}.brand{height:86px;display:flex;align-items:center;padding:0 28px;border-bottom:1px solid #dddff0}.brand img{width:205px}.menu{padding:22px 18px 18px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px}.menu-item.active{background:#f0eaff;color:#5b2ce1;font-weight:800}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f6f0ff;color:#5b2ce1;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.promo{margin:18px 20px 22px;padding:20px;border:1px solid #e4dcff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f2ff)}.promo h3{margin:0 0 14px;color:#5b2ce1;font-size:15px;line-height:1.5}.promo p{margin:0 0 16px;color:#26375f;font-size:13px;line-height:1.8}.promo-art{text-align:center;font-size:68px}.side-bottom{margin-top:auto;padding:0 0 20px}.topbar{height:78px;background:#fff;border-bottom:1px solid #dddff0;display:flex;align-items:center;justify-content:space-between;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#0a1748}.top-stats{display:flex;align-items:center;margin-left:auto}.top-stat{height:54px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e5e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:12px;position:relative;margin-left:16px}.bell{position:relative;width:34px;height:34px;border:0;background:transparent;color:#0a1748;cursor:pointer}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#5b2ce1;color:#fff;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:800}.avatar{width:40px;height:40px;border-radius:50%;background:#e9edf8;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:900}.user h3{margin:0;font-size:12px}.chev{border:0;background:transparent;color:#0a1748;font-size:18px;cursor:pointer}.user-menu{position:absolute;right:0;top:54px;width:160px;background:#fff;border:1px solid #dddff0;border-radius:8px;box-shadow:0 14px 30px rgba(34,23,91,.13);display:none;z-index:4}.user-menu.show{display:block}.user-menu a{display:block;padding:12px 14px;font-size:13px}.content{padding:24px 28px 30px;min-width:0}.head h1{margin:0 0 16px;font-size:22px}.head p{margin:0 0 28px;color:#26375f;font-size:13px}.top-filters{display:grid;grid-template-columns:230px 205px 165px 112px;gap:20px;margin-bottom:36px}.input,.select,.filter-btn{height:40px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 14px;font-size:13px}.filter-btn{border-color:#5b2ce1;color:#5b2ce1;font-weight:800}.page-grid{display:grid;grid-template-columns:minmax(0,1fr) 330px;gap:22px}.tabs{display:flex;gap:34px;border-bottom:1px solid #dddff0;margin-bottom:22px}.tab{border:0;background:transparent;padding:0 8px 14px;color:#0a1748;font-weight:700;cursor:pointer}.tab.active{color:#5b2ce1;border-bottom:3px solid #5b2ce1}.card{background:#fff;border:1px solid #dddff0;border-radius:10px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.table-card{overflow:hidden}.table-head,.report-row{display:grid;grid-template-columns:1.7fr .95fr .9fr .9fr 130px;gap:16px;align-items:center}.table-head{padding:20px 32px;border-bottom:1px solid #e5e7f2;font-size:12px;font-weight:800}.report-row{padding:22px 32px;border-bottom:1px solid #e5e7f2;min-height:96px}.report-row:last-child{border-bottom:0}.report-main{display:flex;align-items:center;gap:22px}.report-main h2{margin:0 0 8px;font-size:13px}.report-main p{margin:0;color:#26375f;font-size:12px;line-height:1.7}.report-icon{width:48px;height:48px;border-radius:50%;background:#f0eaff;color:#5b2ce1;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:900}.badge{display:inline-flex;padding:7px 10px;border-radius:6px;background:#efeaff;color:#5b2ce1;font-size:11px;font-weight:800}.badge.green{background:#dff8e9;color:#05843e}.badge.orange{background:#fff0de;color:#d06d00}.badge.blue{background:#eaf1ff;color:#2867db}.badge.yellow{background:#fff5d8;color:#a86f00}.date{font-size:12px;line-height:1.6}.action-wrap{display:flex;gap:16px;align-items:center}.view-btn{height:34px;width:76px;border:1px solid #8c52ff;border-radius:6px;background:#fff;color:#5b2ce1;font-weight:800}.more{border:0;background:transparent;font-size:20px}.footer{padding:18px 28px;display:flex;justify-content:space-between;align-items:center;color:#26375f;font-size:12px;border-top:1px solid #e5e7f2}.pages{display:flex;gap:8px}.page-btn{min-width:34px;height:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;font-weight:800}.page-btn.active{background:#5b2ce1;color:#fff}.page-size{height:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;padding:0 12px}.side-stack{display:grid;gap:16px}.side-card{padding:18px}.side-card h2{margin:0 0 18px;font-size:15px}.overview-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}.overview-box{border:1px solid #e4e8f2;border-radius:8px;padding:18px;display:grid;grid-template-columns:42px 1fr;gap:12px;align-items:center}.overview-box h3{margin:0 0 8px;font-size:24px}.overview-box p{margin:0;color:#26375f;font-size:12px}.donut-wrap{display:grid;grid-template-columns:145px 1fr;gap:16px;align-items:center}.donut{width:130px;height:130px;border-radius:50%;display:flex;align-items:center;justify-content:center}.donut-center{width:74px;height:74px;border-radius:50%;background:#fff;display:flex;flex-direction:column;align-items:center;justify-content:center}.donut-center strong{font-size:22px}.donut-center span{font-size:11px}.legend{display:grid;gap:12px}.legend-row{display:grid;grid-template-columns:10px 1fr auto;gap:8px;font-size:11px;align-items:center}.dot{width:9px;height:9px;border-radius:50%}.download-item{display:flex;align-items:center;gap:14px;margin-bottom:18px}.download-item h3{margin:0 0 6px;font-size:12px}.download-item p{margin:0;color:#26375f;font-size:11px}.side-card a{color:#5b2ce1;font-size:12px;font-weight:800}.empty{padding:32px;text-align:center;color:#526287}@media(max-width:1220px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.page-grid{grid-template-columns:1fr}.top-filters{grid-template-columns:1fr 1fr}.table-card{overflow:auto}.table-head,.report-row{min-width:850px}}@media(max-width:720px){.topbar{padding:0 14px}.content{padding:22px 14px}.top-filters,.overview-grid,.donut-wrap{grid-template-columns:1fr}.tabs{overflow:auto}.footer{flex-direction:column;gap:14px;align-items:flex-start}}
</style>
@endpush

@section('content')
<div class="head"><h1>Reports</h1><p>Track and analyze the performance of your courses and learners.</p></div>
                <div class="top-filters"><select class="select"><option>01 May 2024 - 31 May 2024</option></select><select class="select" id="courseFilter"><option>All Courses</option></select><select class="select" id="reportFilter"><option>All Report Types</option></select><button class="filter-btn">Filter</button></div>
                <!-- End Header Filter Section -->

                <div class="page-grid">
                    <div><div class="tabs" id="tabs"></div><article class="card table-card"><div class="table-head"><span>Report Name</span><span>Type</span><span>Date Range</span><span>Generated On</span><span>Action</span></div><div id="reportRows"></div><div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">‹</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">6</button><button class="page-btn">›</button><select class="page-size"><option>10 / page</option><option>20 / page</option></select></div></div></article></div>
                    <!-- End Reports Table Section -->

                    <aside class="side-stack"><article class="card side-card"><h2>Reports Overview</h2><div class="overview-grid" id="overview"></div></article><article class="card side-card"><h2>Reports by Type</h2><div class="donut-wrap"><div class="donut" id="donut"><div class="donut-center"><strong>12</strong><span>Reports</span></div></div><div class="legend" id="legend"></div></div></article><article class="card side-card"><h2>Most Downloaded Reports</h2><div id="downloads"></div><a href="#">View All Reports -></a></article></aside>
                    <!-- End Reports Sidebar Section -->
                </div>
@endsection

@push('scripts')
<script>
const topStats=@json($topStats),overview=@json($overview),typeStats=@json($typeStats),downloads=@json($downloads);
        let reports=@json($reports),currentTab='All Reports';
        const tabs=['All Reports','Course Performance','Learner Engagement','Assessments','Payouts'];
        const badgeClass={'Learner Engagement':'green','Assessments':'orange','Payouts':'blue','Certificates':'yellow'};
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('tabs').innerHTML=tabs.map((tab,index)=>`<button class="tab ${index===0?'active':''}" data-tab="${tab}">${tab}</button>`).join('');
        document.getElementById('reportFilter').innerHTML='<option>All Report Types</option>'+[...new Set(reports.map(r=>r.type))].map(type=>`<option>${type}</option>`).join('');
        document.getElementById('overview').innerHTML=overview.map(item=>`<div class="overview-box"><span class="icon">${item.icon}</span><div><h3>${item.value}</h3><p>${item.label}</p></div></div>`).join('');
        document.getElementById('downloads').innerHTML=downloads.map(item=>`<div class="download-item"><span class="icon">${item.icon}</span><div><h3>${item.name}</h3><p>${item.count}</p></div></div>`).join('');

        function renderDonut(){
            const total=typeStats.reduce((sum,item)=>sum+item.value,0);
            let start=0;
            const gradient=typeStats.map(item=>{const percent=item.value/total*100;const end=start+percent;const part=`${item.color} ${start}% ${end}%`;start=end;return part}).join(',');
            document.getElementById('donut').style.background=`conic-gradient(${gradient})`;
            document.getElementById('legend').innerHTML=typeStats.map(item=>`<div class="legend-row"><span class="dot" style="background:${item.color}"></span><span>${item.label}</span><strong>${item.value}</strong></div>`).join('');
        }

        function renderReports(){
            const type=document.getElementById('reportFilter').value;
            const filtered=reports.filter(report=>(currentTab==='All Reports'||report.type===currentTab)&&(type==='All Report Types'||report.type===type));
            document.getElementById('reportRows').innerHTML=filtered.length?filtered.map(report=>`<div class="report-row"><div class="report-main"><span class="report-icon">${report.icon}</span><div><h2>${report.name}</h2><p>${report.text}</p></div></div><span class="badge ${badgeClass[report.type]||''}">${report.type}</span><span class="date">${report.dateRange}</span><span class="date">${report.generated}</span><div class="action-wrap"><button class="view-btn">View</button><button class="more">⋮</button></div></div>`).join(''):`<div class="empty">No reports found.</div>`;
            document.getElementById('resultText').textContent=`Showing 1 to ${filtered.length} of ${reports.length} reports`;
        }

        document.getElementById('tabs').addEventListener('click',event=>{if(!event.target.matches('.tab'))return;document.querySelectorAll('.tab').forEach(tab=>tab.classList.remove('active'));event.target.classList.add('active');currentTab=event.target.dataset.tab;renderReports()});
        document.getElementById('reportFilter').addEventListener('input',renderReports);
        document.getElementById('reportRows').addEventListener('click',event=>{if(event.target.closest('.view-btn'))alert('Report preview opened')});
        document.getElementById('userMenuBtn').addEventListener('click',()=>document.getElementById('userMenu').classList.toggle('show'));
        renderReports();
        renderDonut();
</script>
@endpush



