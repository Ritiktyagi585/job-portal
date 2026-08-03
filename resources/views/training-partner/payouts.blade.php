@extends('training-partner.layouts.app')

@section('title', 'Training Partner Payouts')

@php
    $activePage = 'payouts';
    $topStats = [
        ['value' => '500+', 'label' => 'Courses Listed', 'icon' => 'CL'],
        ['value' => '1000+', 'label' => 'Freshers Trained', 'icon' => 'FT'],
        ['value' => '200+', 'label' => 'Hiring Companies', 'icon' => 'HC'],
    ];
    $cards = [
        ['title' => 'Total Earnings', 'value' => 'Rs 1,25,680', 'text' => 'All Time', 'icon' => 'TE'],
        ['title' => 'Paid Amount', 'value' => 'Rs 95,240', 'text' => 'Total Paid', 'icon' => 'PA'],
        ['title' => 'Pending Amount', 'value' => 'Rs 30,440', 'text' => 'Will be paid soon', 'icon' => 'PE'],
        ['title' => 'Last Payout', 'value' => 'Rs 18,750', 'text' => '15 May 2024', 'icon' => 'LP'],
    ];
    $earnings = [
        ['source' => 'Course Sales', 'text' => 'Earnings from course purchases', 'total' => 'Rs 98,450', 'paid' => 'Rs 76,200', 'pending' => 'Rs 22,250', 'icon' => 'CS'],
        ['source' => 'Enrollments', 'text' => 'Earnings from learner enrollments', 'total' => 'Rs 18,600', 'paid' => 'Rs 14,000', 'pending' => 'Rs 4,600', 'icon' => 'EN'],
        ['source' => 'Assessments', 'text' => 'Earnings from assessments and quizzes', 'total' => 'Rs 6,780', 'paid' => 'Rs 5,040', 'pending' => 'Rs 1,740', 'icon' => 'AS'],
        ['source' => 'Certificates', 'text' => 'Earnings from certificate issuance', 'total' => 'Rs 1,850', 'paid' => 'Rs 0', 'pending' => 'Rs 1,850', 'icon' => 'CT'],
    ];
    $payouts = [
        ['id' => 'PAYOUT-0008', 'amount' => 'Rs 18,750', 'method' => 'Bank Transfer (****1234)', 'status' => 'Paid', 'date' => '15 May 2024'],
        ['id' => 'PAYOUT-0007', 'amount' => 'Rs 16,320', 'method' => 'Bank Transfer (****1234)', 'status' => 'Paid', 'date' => '30 Apr 2024'],
        ['id' => 'PAYOUT-0006', 'amount' => 'Rs 14,980', 'method' => 'Bank Transfer (****1234)', 'status' => 'Paid', 'date' => '15 Apr 2024'],
        ['id' => 'PAYOUT-0005', 'amount' => 'Rs 12,450', 'method' => 'Bank Transfer (****1234)', 'status' => 'Paid', 'date' => '31 Mar 2024'],
    ];
    $statusStats = [
        ['label' => 'Ready to Pay', 'value' => 18900, 'amount' => 'Rs 18,900', 'color' => '#5b2ce1'],
        ['label' => 'Processing', 'value' => 7540, 'amount' => 'Rs 7,540', 'color' => '#28b76f'],
        ['label' => 'On Hold', 'value' => 2000, 'amount' => 'Rs 2,000', 'color' => '#ffad25'],
    ];
@endphp

@push('styles')
<style>
*{box-sizing:border-box}html,body{max-width:100%;overflow-x:hidden}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#071544;background:#f8faff;font-weight:500}a{text-decoration:none;color:inherit}.layout{min-height:100vh;display:grid;grid-template-columns:270px minmax(0,1fr)}.sidebar{background:#fff;border-right:1px solid #dfe4f2;display:flex;flex-direction:column}.brand{height:88px;display:flex;align-items:center;padding:0 26px;border-bottom:1px solid #dfe4f2}.brand img{width:205px}.menu{padding:22px 16px;display:grid;gap:8px}.menu-item{min-height:44px;display:flex;align-items:center;gap:16px;padding:8px 14px;border-radius:8px;color:#26375f;font-size:14px;font-weight:700}.menu-item.active{background:#f2eaff;color:#5b20e6}.menu-icon,.icon{width:30px;height:30px;border-radius:8px;background:#f3ecff;color:#5b20e6;display:inline-flex;align-items:center;justify-content:center;font-size:9px;font-weight:900;flex:0 0 auto}.side-bottom{margin-top:auto;padding:0 20px 24px}.promo{padding:20px;border:1px solid #eadfff;border-radius:9px;background:linear-gradient(145deg,#fff,#f7f1ff)}.promo h3{margin:0 0 14px;color:#5b20e6;font-size:15px;line-height:1.6}.promo p{margin:0;color:#26375f;font-size:13px;line-height:1.8}.promo-art{height:150px;margin-top:12px;border-radius:10px;background:linear-gradient(160deg,#efe4ff,#fff);display:flex;align-items:center;justify-content:center;font-size:70px}.topbar{height:78px;background:#fff;border-bottom:1px solid #dfe4f2;display:flex;align-items:center;padding:0 28px}.hamburger{border:0;background:transparent;font-size:24px;color:#071544}.top-stats{display:flex;margin-left:auto}.top-stat{height:52px;display:flex;align-items:center;gap:10px;padding:0 22px;border-left:1px solid #e3e7f2}.top-stat strong{display:block;font-size:14px}.top-stat span:last-child{font-size:11px;color:#526287}.user{display:flex;align-items:center;gap:12px;position:relative;margin-left:16px}.bell{position:relative;border:0;background:transparent;width:34px;height:34px}.bell span{position:absolute;top:-1px;right:0;width:16px;height:16px;border-radius:50%;background:#5b20e6;color:#fff;font-size:10px;font-weight:800;display:flex;align-items:center;justify-content:center}.avatar{width:40px;height:40px;border-radius:50%;background:#e9edf8;color:#5b20e6;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:900}.user h3{margin:0;font-size:12px}.chev{border:0;background:transparent;font-size:18px}.content{padding:26px 28px 30px;min-width:0}.head h1{margin:0 0 14px;font-size:22px}.head p{margin:0 0 28px;color:#26375f;font-size:13px}.main-grid{display:grid;grid-template-columns:minmax(0,1fr) 300px;gap:22px}.stat-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:28px}.stat-card{height:104px;background:#fff;border:1px solid #dfe4f2;border-radius:8px;display:flex;align-items:center;gap:18px;padding:18px;box-shadow:0 10px 24px rgba(50,35,120,.04)}.stat-card h3{margin:0 0 7px;font-size:12px;color:#26375f}.stat-card strong{display:block;font-size:20px}.stat-card p{margin:7px 0 0;font-size:12px;color:#26375f}.tabs{display:flex;gap:36px;border-bottom:1px solid #dfe4f2;margin-bottom:20px}.tab{border:0;background:transparent;padding:0 8px 14px;color:#071544;font-weight:800;cursor:pointer}.tab.active{color:#5b20e6;border-bottom:3px solid #5b20e6}.filters{display:grid;grid-template-columns:230px 200px 200px 96px;gap:18px;margin-bottom:16px}.select,.filter-btn{height:40px;border:1px solid #cfd8eb;border-radius:6px;background:#fff;color:#26375f;padding:0 14px;font-size:13px}.filter-btn{border-color:#5b20e6;color:#5b20e6;font-weight:900}.card{background:#fff;border:1px solid #dfe4f2;border-radius:9px;box-shadow:0 12px 26px rgba(50,35,120,.05)}.summary{overflow:hidden}.summary h2,.recent h2{margin:0;padding:18px 18px 12px;font-size:14px}.summary-row,.summary-head,.summary-total{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;align-items:center;gap:16px;padding:14px 18px;border-top:1px solid #e7ebf5}.summary-head{font-size:12px;font-weight:900}.source{display:flex;align-items:center;gap:14px}.source h3{margin:0 0 6px;font-size:12px}.source p{margin:0;font-size:11px;color:#526287}.summary-row span,.summary-total span{font-size:13px}.summary-total{background:#f6f0ff;color:#5b20e6;font-weight:900}.recent{border-top:0;border-radius:0 0 9px 9px}.payout-row,.payout-head{display:grid;grid-template-columns:1fr .7fr 1.3fr .6fr .8fr .5fr;gap:12px;align-items:center;padding:12px 18px;border-top:1px solid #e7ebf5;font-size:12px}.payout-head{font-weight:900}.badge{display:inline-flex;width:max-content;padding:6px 10px;border-radius:6px;background:#dcf7e8;color:#088244;font-weight:800}.view-btn{border:0;background:transparent;color:#5b20e6;font-weight:900;cursor:pointer}.footer{padding:18px;display:flex;justify-content:space-between;align-items:center;font-size:12px;color:#26375f}.pages{display:flex;gap:8px}.page-btn{height:34px;min-width:34px;border:1px solid #dce3f2;border-radius:6px;background:#fff;font-weight:900}.page-btn.active{background:#5b20e6;color:#fff}.side-stack{display:grid;gap:18px}.side-card{padding:18px}.side-card h2{margin:0 0 18px;font-size:14px}.donut-wrap{display:grid;grid-template-columns:120px 1fr;gap:16px;align-items:center}.donut{width:118px;height:118px;border-radius:50%;display:flex;align-items:center;justify-content:center}.donut-center{width:70px;height:70px;border-radius:50%;background:#fff;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center}.donut-center strong{font-size:14px}.donut-center span{font-size:11px}.legend{display:grid;gap:12px}.legend-row{display:grid;grid-template-columns:9px 1fr auto;gap:8px;font-size:11px;align-items:center}.dot{width:8px;height:8px;border-radius:50%}.upcoming strong{display:block;font-size:22px;color:#5b20e6;margin:8px 0}.progress{height:6px;border-radius:999px;background:#e7ebf5;overflow:hidden;margin:18px 0}.progress span{display:block;width:74%;height:100%;background:#5b20e6}.bank{display:flex;gap:14px;align-items:flex-start}.help{background:linear-gradient(145deg,#fff,#f6f0ff)}.help a{color:#5b20e6;font-weight:900;font-size:12px}.user-menu{display:none}@media(max-width:1240px){.layout{grid-template-columns:1fr}.sidebar{display:none}.top-stats{display:none}.main-grid{grid-template-columns:1fr}.stat-grid{grid-template-columns:repeat(2,1fr)}}@media(max-width:760px){.content,.topbar{padding-left:14px;padding-right:14px}.stat-grid,.filters{grid-template-columns:1fr}.tabs{overflow:auto}.summary,.recent{overflow:auto}.summary-row,.summary-head,.summary-total{min-width:720px}.payout-row,.payout-head{min-width:760px}.footer{flex-direction:column;gap:14px;align-items:flex-start}.donut-wrap{grid-template-columns:1fr}}
</style>
@endpush

@section('content')
<div class="head"><h1>24&nbsp; Payouts</h1><p>Track your earnings, payout history and manage payment details.</p></div>
                <!-- End Header Section -->
                <div class="main-grid">
                    <div>
                        <div class="stat-grid" id="cards"></div>
                        <!-- End Stats Section -->
                        <div class="tabs" id="tabs"></div>
                        <div class="filters"><select class="select"><option>01 May 2024 - 31 May 2024</option></select><select class="select"><option>All Courses</option></select><select class="select" id="statusFilter"><option>All Status</option><option>Paid</option></select><button class="filter-btn">Filter</button></div>
                        <!-- End Filters Section -->
                        <article class="card summary"><h2>Earnings Summary</h2><div class="summary-head"><span>Source</span><span>Total Earnings</span><span>Paid Amount</span><span>Pending Amount</span></div><div id="earningRows"></div><div class="summary-total"><span>Total</span><span>Rs 1,25,680</span><span>Rs 95,240</span><span>Rs 30,440</span></div><div class="recent"><h2>Recent Payouts</h2><div class="payout-head"><span>Payout ID</span><span>Amount</span><span>Payment Method</span><span>Status</span><span>Paid On</span><span>Invoice</span></div><div id="payoutRows"></div><div class="footer"><span id="resultText"></span><div class="pages"><button class="page-btn">&lt;</button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">&gt;</button><select class="select"><option>5 / page</option></select></div></div></div></article>
                        <!-- End Payout Table Section -->
                    </div>
                    <aside class="side-stack"><article class="card side-card"><h2>Payout Status</h2><div class="donut-wrap"><div class="donut" id="donut"><div class="donut-center"><strong>Rs 30,440</strong><span>Pending</span></div></div><div class="legend" id="legend"></div></div></article><article class="card side-card upcoming"><h2>Upcoming Payout</h2><div class="bank"><span class="icon">UP</span><div><h3>20 May 2024</h3><p>Expected Payout Date</p><strong>Rs 18,900</strong></div></div><div class="progress"><span></span></div><p>Ready to be paid</p></article><article class="card side-card"><h2>Payment Method</h2><div class="bank"><span class="icon">BK</span><div><h3>HDFC Bank</h3><p>Account No: **** **** 1234</p><p>IFSC: HDFC0001234</p></div></div><br><button class="filter-btn" style="width:100%">Manage Payment Details</button></article><article class="card side-card help"><h2>Need Help?</h2><p>Have questions about payouts? Check our help guide or contact our support team.</p><a href="#">View Help Guide -></a></article></aside>
                    <!-- End Payout Sidebar Section -->
                </div>
@endsection

@push('scripts')
<script>
const topStats=@json($topStats),cards=@json($cards),earnings=@json($earnings),payouts=@json($payouts),statusStats=@json($statusStats);
        const tabs=['Payout Overview','Payout History','Payment Details','Tax Documents'];
        document.getElementById('topStats').innerHTML=topStats.map(item=>`<div class="top-stat"><span class="icon">${item.icon}</span><span><strong>${item.value}</strong><span>${item.label}</span></span></div>`).join('');
        document.getElementById('cards').innerHTML=cards.map(item=>`<article class="stat-card"><span class="icon">${item.icon}</span><div><h3>${item.title}</h3><strong>${item.value}</strong><p>${item.text}</p></div></article>`).join('');
        document.getElementById('tabs').innerHTML=tabs.map((tab,index)=>`<button class="tab ${index===0?'active':''}">${tab}</button>`).join('');
        document.getElementById('earningRows').innerHTML=earnings.map(item=>`<div class="summary-row"><div class="source"><span class="icon">${item.icon}</span><div><h3>${item.source}</h3><p>${item.text}</p></div></div><span>${item.total}</span><span>${item.paid}</span><span>${item.pending}</span></div>`).join('');
        function renderPayouts(){const status=document.getElementById('statusFilter').value;const rows=payouts.filter(row=>status==='All Status'||row.status===status);document.getElementById('payoutRows').innerHTML=rows.map(row=>`<div class="payout-row"><span>${row.id}</span><span>${row.amount}</span><span>${row.method}</span><span class="badge">${row.status}</span><span>${row.date}</span><button class="view-btn">View</button></div>`).join('');document.getElementById('resultText').textContent=`Showing 1 to ${rows.length} of ${payouts.length} payouts`;}
        function renderDonut(){const total=statusStats.reduce((sum,item)=>sum+item.value,0);let start=0;document.getElementById('donut').style.background=`conic-gradient(${statusStats.map(item=>{const end=start+(item.value/total*100);const part=`${item.color} ${start}% ${end}%`;start=end;return part}).join(',')})`;document.getElementById('legend').innerHTML=statusStats.map(item=>`<div class="legend-row"><span class="dot" style="background:${item.color}"></span><span>${item.label}</span><strong>${item.amount}</strong></div>`).join('');}
        document.getElementById('tabs').addEventListener('click',e=>{if(!e.target.matches('.tab'))return;document.querySelectorAll('.tab').forEach(tab=>tab.classList.remove('active'));e.target.classList.add('active')});
        document.getElementById('statusFilter').addEventListener('change',renderPayouts);
        document.getElementById('payoutRows').addEventListener('click',e=>{if(e.target.matches('.view-btn'))alert('Invoice preview opened')});
        renderPayouts();renderDonut();
</script>
@endpush



