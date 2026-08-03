@extends('admin.layouts.app')

@section('title', 'Reports - OnlyFreshers Admin')
@section('pageTitle', 'Reports')
@section('breadcrumb', 'Dashboard > Reports')
@section('topbarExtra')
    <select class="month-select report-stats-period">
        <option>This Month</option>
        <option>Last Month</option>
        <option>Last Six Months</option>
        <option>Last Year</option>
    </select>
@endsection

@php
    $activePage = 'reports';

    $reportCards = [
        ['title' => 'Fresher Registrations', 'value' => '12,560', 'change' => '12%', 'icon' => 'users'],
        ['title' => 'Company Registrations', 'value' => '2,350', 'change' => '8%', 'icon' => 'building'],
        ['title' => 'Jobs Posted', 'value' => '4,850', 'change' => '15%', 'icon' => 'briefcase'],
        ['title' => 'Applications Received', 'value' => '18,750', 'change' => '18%', 'icon' => 'file'],
    ];

    $overviewItems = [
        ['title' => 'Fresher Registrations', 'value' => '12,560', 'change' => '12%', 'icon' => 'users'],
        ['title' => 'Company Registrations', 'value' => '2,350', 'change' => '8%', 'icon' => 'building'],
        ['title' => 'Jobs Posted', 'value' => '4,850', 'change' => '15%', 'icon' => 'briefcase'],
        ['title' => 'Applications Received', 'value' => '18,750', 'change' => '18%', 'icon' => 'file'],
        ['title' => 'Courses Added', 'value' => '1,250', 'change' => '10%', 'icon' => 'book'],
    ];

    $chartData = [
        'labels' => ['1 May', '6 May', '11 May', '16 May', '21 May', '26 May', '31 May'],
        'values' => [5000, 3500, 11200, 8700, 11800, 14500, 20000],
    ];

    $periodData = [
        'This Month' => [
            'cards' => ['12,560', '2,350', '4,850', '18,750'],
            'overview' => ['12,560', '2,350', '4,850', '18,750', '1,250'],
            'labels' => ['1 May', '6 May', '11 May', '16 May', '21 May', '26 May', '31 May'],
            'values' => [5000, 3500, 11200, 8700, 11800, 14500, 20000],
        ],
        'Last Month' => [
            'cards' => ['10,940', '2,110', '4,210', '15,880'],
            'overview' => ['10,940', '2,110', '4,210', '15,880', '1,080'],
            'labels' => ['1 Apr', '6 Apr', '11 Apr', '16 Apr', '21 Apr', '26 Apr', '30 Apr'],
            'values' => [4200, 5100, 7600, 6900, 9800, 12700, 15600],
        ],
        'Last Six Months' => [
            'cards' => ['68,420', '12,870', '24,950', '96,300'],
            'overview' => ['68,420', '12,870', '24,950', '96,300', '6,720'],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'values' => [6200, 8800, 11300, 14100, 16800, 19500],
        ],
        'Last Year' => [
            'cards' => ['1,42,800', '28,450', '57,600', '2,18,900'],
            'overview' => ['1,42,800', '28,450', '57,600', '2,18,900', '14,500'],
            'labels' => ['Jan', 'Mar', 'May', 'Jul', 'Sep', 'Nov', 'Dec'],
            'values' => [7200, 9600, 12100, 15000, 17200, 18700, 20000],
        ],
    ];
@endphp

@push('styles')
<style>
body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .admin-layout { min-height: 100vh; display: grid; grid-template-columns: 220px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 14px 12px 22px; box-sizing: border-box; }
        .logo img { width: 190px; height: auto; display: block; margin: 0 0 26px; }
        .menu { display: grid; gap: 8px; }
        .menu-item { display: flex; align-items: center; gap: 14px; padding: 12px; border-radius: 8px; color: #24344f; font-size: 15px; font-weight: 700; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; border-left: 4px solid #075fe4; }
        .menu-icon, .report-icon, .profile-icon { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg, .user-button svg, .report-icon svg, .month-button svg { fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; }
        .profile-icon svg { width: 24px; height: 24px; stroke-width: 2; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 34px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 28px; gap: 20px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 8px; font-size: 30px; font-weight: 600; }
        .page-title p { margin: 0; color: #52607a; font-size: 14px; }
        .top-actions { display: flex; align-items: center; gap: 14px; }
        .month-select { height: 34px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 28px 0 12px; font-size: 12px; font-weight: 700; outline: none; cursor: pointer; }
        .month-button { height: 34px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 12px; font-size: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
        .month-button svg { width: 14px; height: 14px; stroke-width: 2; }
        .user-button { position: absolute; top: 0; right: 0; width: 42px; height: 42px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .user-button svg { width: 22px; height: 22px; stroke-width: 2; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 22px; }
        .report-card, .panel { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); }
        .report-card { padding: 18px; min-height: 96px; box-sizing: border-box; }
        .card-row { display: flex; align-items: center; gap: 16px; margin-bottom: 14px; }
        .report-icon { width: 44px; height: 44px; border-radius: 50%; }
        .report-icon svg { width: 22px; height: 22px; stroke-width: 2; }
        .report-card p { margin: 0 0 6px; color: #24344f; font-size: 12px; font-weight: 600; }
        .report-card h2 { margin: 0; font-size: 24px; font-weight: 600; }
        .change { color: #00a65a; font-size: 12px; font-weight: 600; }
        .change span { color: #52607a; margin-left: 18px; font-weight: 500; }
        .report-layout { display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 18px; }
        .panel { padding: 22px; }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 18px; }
        .panel-header h2 { margin: 0; font-size: 17px; font-weight: 600; }
        .overview-list { display: grid; gap: 0; }
        .overview-row { display: grid; grid-template-columns: 44px 1fr auto auto; align-items: center; gap: 14px; padding: 13px 0; border-bottom: 1px solid #edf2fb; }
        .overview-row:last-child { border-bottom: 0; }
        .overview-row h3 { margin: 0; font-size: 13px; font-weight: 600; }
        .overview-row strong { font-size: 13px; font-weight: 600; }
        .chart-wrap { height: 285px; }
        .chart-wrap canvas { width: 100%; height: 100%; display: block; }
        .legend { display: flex; justify-content: center; align-items: center; gap: 8px; color: #52607a; font-size: 12px; font-weight: 600; }
        .legend-dot { width: 9px; height: 9px; border-radius: 50%; background: #075fe4; }
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } .report-layout { grid-template-columns: 1fr; } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .stats-grid, .menu { grid-template-columns: 1fr; } .overview-row { grid-template-columns: 40px 1fr; } }
</style>
@endpush

@section('content')


            <section class="stats-grid">
                @foreach ($reportCards as $card)
                    <div class="report-card">
                        <div class="card-row">
                            <div class="report-icon">
                                @include('admin.partials.report-icon', ['icon' => $card['icon']])
                            </div>
                            <div>
                                <p>{{ $card['title'] }}</p>
                                <h2 class="card-value" data-card-index="{{ $loop->index }}">{{ $card['value'] }}</h2>
                            </div>
                        </div>
                        <div class="change">+ {{ $card['change'] }} <span>vs last month</span></div>
                    </div>
                @endforeach
            </section>

            <section class="report-layout">
                <div class="panel">
                    <div class="panel-header">
                        <h2>Registrations Overview</h2>
                        <select class="month-select report-overview-period">
                            <option>This Month</option>
                            <option>Last Month</option>
                            <option>Last Six Months</option>
                            <option>Last Year</option>
                        </select>
                    </div>

                    <div class="overview-list">
                        @foreach ($overviewItems as $item)
                            <div class="overview-row">
                                <div class="report-icon">
                                    @include('admin.partials.report-icon', ['icon' => $item['icon']])
                                </div>
                                <h3>{{ $item['title'] }}</h3>
                                <strong class="overview-value" data-overview-index="{{ $loop->index }}">{{ $item['value'] }}</strong>
                                <span class="change">+ {{ $item['change'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h2>Platform Activity</h2>
                        <select class="month-select report-chart-period">
                            <option>This Month</option>
                            <option>Last Month</option>
                            <option>Last Six Months</option>
                            <option>Last Year</option>
                        </select>
                    </div>

                    <div class="chart-wrap">
                        <canvas id="activityChart"></canvas>
                    </div>
                    <div class="legend"><span class="legend-dot"></span> Total Activities</div>
                </div>
            </section>
@endsection

@push('scripts')
<script>
const periodData = @json($periodData);
        let activityChartData = periodData['This Month'];

        function drawActivityChart() {
            const canvas = document.getElementById('activityChart');
            const ctx = canvas.getContext('2d');
            const box = canvas.parentElement.getBoundingClientRect();
            const dpr = window.devicePixelRatio || 1;

            canvas.width = box.width * dpr;
            canvas.height = box.height * dpr;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
            ctx.clearRect(0, 0, box.width, box.height);

            const padding = { top: 20, right: 18, bottom: 34, left: 42 };
            const maxValue = 20000;
            const chartWidth = box.width - padding.left - padding.right;
            const chartHeight = box.height - padding.top - padding.bottom;

            ctx.font = '12px Arial';
            ctx.fillStyle = '#52607a';
            ctx.strokeStyle = '#edf2fb';
            ctx.lineWidth = 1;

            [20000, 15000, 10000, 5000, 0].forEach(function (value) {
                const y = padding.top + chartHeight - (value / maxValue) * chartHeight;
                ctx.beginPath();
                ctx.moveTo(padding.left, y);
                ctx.lineTo(box.width - padding.right, y);
                ctx.stroke();
                ctx.fillText(value === 0 ? '0' : value / 1000 + 'K', 6, y + 4);
            });

            const points = activityChartData.values.map(function (value, index) {
                return {
                    x: padding.left + (index / (activityChartData.values.length - 1)) * chartWidth,
                    y: padding.top + chartHeight - (value / maxValue) * chartHeight
                };
            });

            const gradient = ctx.createLinearGradient(0, padding.top, 0, box.height - padding.bottom);
            gradient.addColorStop(0, 'rgba(7, 95, 228, 0.18)');
            gradient.addColorStop(1, 'rgba(7, 95, 228, 0.02)');

            ctx.beginPath();
            ctx.moveTo(points[0].x, box.height - padding.bottom);
            points.forEach(function (point) {
                ctx.lineTo(point.x, point.y);
            });
            ctx.lineTo(points[points.length - 1].x, box.height - padding.bottom);
            ctx.closePath();
            ctx.fillStyle = gradient;
            ctx.fill();

            ctx.beginPath();
            points.forEach(function (point, index) {
                if (index === 0) {
                    ctx.moveTo(point.x, point.y);
                } else {
                    ctx.lineTo(point.x, point.y);
                }
            });
            ctx.strokeStyle = '#075fe4';
            ctx.lineWidth = 2.2;
            ctx.stroke();

            points.forEach(function (point) {
                ctx.beginPath();
                ctx.arc(point.x, point.y, 3.5, 0, Math.PI * 2);
                ctx.fillStyle = 'white';
                ctx.fill();
                ctx.strokeStyle = '#075fe4';
                ctx.lineWidth = 2;
                ctx.stroke();
            });

            activityChartData.labels.forEach(function (label, index) {
                const x = padding.left + (index / (activityChartData.labels.length - 1)) * chartWidth;
                ctx.fillStyle = '#52607a';
                ctx.fillText(label, x - 14, box.height - 10);
            });
        }

        function updateReportStats(period) {
            document.querySelectorAll('.card-value').forEach(function (item) {
                item.textContent = periodData[period].cards[item.dataset.cardIndex];
            });
        }

        function updateReportOverview(period) {
            document.querySelectorAll('.overview-value').forEach(function (item) {
                item.textContent = periodData[period].overview[item.dataset.overviewIndex];
            });
        }

        function updateReportChart(period) {
            activityChartData = periodData[period];
            drawActivityChart();
        }

        document.querySelector('.report-stats-period').addEventListener('change', function (event) {
            updateReportStats(event.target.value);
        });

        document.querySelector('.report-overview-period').addEventListener('change', function (event) {
            updateReportOverview(event.target.value);
        });

        document.querySelector('.report-chart-period').addEventListener('change', function (event) {
            updateReportChart(event.target.value);
        });

        drawActivityChart();
        window.addEventListener('resize', drawActivityChart);
</script>
@endpush


