@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - OnlyFreshers')
@section('customTop')
    <div class="dashboard-mobile-top">
        <button class="admin-mobile-toggle" type="button" onclick="toggleAdminSidebar()" aria-label="Open menu">
            <svg viewBox="0 0 24 24"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
        </button>
    </div>
@endsection

@php
    $stats = [
        ['title' => 'Total Freshers', 'value' => '12,560', 'change' => '12%', 'icon' => 'users'],
        ['title' => 'Companies', 'value' => '2,350', 'change' => '8%', 'icon' => 'building'],
        ['title' => 'Training Partners', 'value' => '320', 'change' => '5%', 'icon' => 'book'],
        ['title' => 'Jobs Posted', 'value' => '4,850', 'change' => '15%', 'icon' => 'briefcase'],
        ['title' => 'Applications', 'value' => '18,750', 'change' => '18%', 'icon' => 'file'],
        ['title' => 'Courses', 'value' => '1,250', 'change' => '10%', 'icon' => 'book'],
    ];

    $activities = [
        ['title' => 'New Company Registered', 'text' => 'TechNova Solutions', 'time' => '2 min ago', 'icon' => 'CO', 'type' => 'Companies'],
        ['title' => 'New Course Added', 'text' => 'Full Stack Development', 'time' => '15 min ago', 'icon' => 'CR', 'type' => 'Courses'],
        ['title' => 'New Fresher Registered', 'text' => 'Ananya Gupta', 'time' => '30 min ago', 'icon' => 'FR', 'type' => 'Freshers'],
        ['title' => 'Job Posted', 'text' => 'Frontend Developer', 'time' => '45 min ago', 'icon' => 'JB', 'type' => 'Jobs'],
    ];

    $quickLinks = [
        ['title' => 'Approve Companies', 'text' => 'Review & approve companies', 'icon' => 'CO'],
        ['title' => 'Approve Training Partners', 'text' => 'Review & approve partners', 'icon' => 'TP'],
        ['title' => 'Monitor Jobs', 'text' => 'Check job postings', 'icon' => 'JB'],
        ['title' => 'Monitor Courses', 'text' => 'Check all courses', 'icon' => 'CR'],
        ['title' => 'Platform Reports', 'text' => 'View analytics & reports', 'icon' => 'RP'],
        ['title' => 'System Security', 'text' => 'Manage security & logs', 'icon' => 'SC'],
    ];

    $activePage = 'dashboard';
@endphp

@push('styles')
<style>
.dashboard-mobile-top {
    display: none;
}

body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #061942;
            background: #f4f8ff;
            font-weight: 500;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .admin-layout {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 220px 1fr;
        }

        .sidebar {
            background: white;
            border-right: 1px solid #dce7f8;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 14px 12px 22px;
            box-sizing: border-box;
        }

        .logo img {
            width: 190px;
            height: auto;
            display: block;
            margin: 0 0 26px;
        }

        .menu {
            display: grid;
            gap: 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 12px;
            border-radius: 8px;
            color: #24344f;
            font-size: 15px;
            font-weight: 700;
        }

        .menu-item.active {
            background: #eaf2ff;
            color: #075fe4;
            font-weight: 600;
            border-left: 4px solid #075fe4;
        }

        .menu-icon,
        .card-icon,
        .activity-icon,
        .quick-icon,
        .profile-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #075fe4;
            background: #eaf2ff;
            font-weight: 700;
            flex-shrink: 0;
        }

        .menu-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            font-size: 11px;
        }

        .menu-icon svg {
            width: 17px;
            height: 17px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 2px 0;
        }

        .profile-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
        }

        .profile-icon svg {
            width: 24px;
            height: 24px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .admin-profile h3 {
            margin: 0 0 4px;
            font-size: 15px;
            font-weight: 600;
        }

        .admin-profile p {
            margin: 0;
            color: #52607a;
            font-size: 13px;
        }

        .main {
            padding: 36px 28px;
            box-sizing: border-box;
        }

        .top-bar {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 34px;
            padding-right: 62px;
        }

        .welcome h1 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 600;
        }

        .welcome p {
            margin: 0;
            color: #52607a;
            font-size: 15px;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .month-select {
            height: 46px;
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
            color: #24344f;
            padding: 0 16px;
            font-weight: 500;
        }

        .user-button {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #eaf2ff;
            color: #075fe4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .top-actions .user-button {
            position: absolute;
            top: 0;
            right: 0;
        }

        .user-button svg {
            width: 23px;
            height: 23px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
            margin-bottom: 22px;
        }

        .stat-card,
        .panel {
            border: 1px solid #dce7f8;
            border-radius: 8px;
            background: white;
            box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04);
        }

        .stat-card {
            padding: 16px 14px;
            min-height: 98px;
            box-sizing: border-box;
        }

        .stat-top {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .card-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            font-size: 11px;
        }

        .card-icon svg {
            width: 21px;
            height: 21px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .stat-card p {
            margin: 0 0 5px;
            color: #24344f;
            font-size: 11px;
        }

        .stat-card h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .change {
            color: #00a65a;
            font-size: 12px;
            font-weight: 600;
        }

        .change span {
            color: #52607a;
            margin-left: 8px;
            font-weight: 500;
        }

        .middle-grid {
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            gap: 18px;
            margin-bottom: 18px;
        }

        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .panel {
            padding: 22px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .panel h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .small-button,
        .small-select {
            border: 1px solid #dce7f8;
            border-radius: 6px;
            background: white;
            color: #24344f;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 600;
            outline: none;
        }

        .small-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            line-height: 1;
        }

        .small-select {
            cursor: pointer;
            font-weight: 700;
            padding-right: 26px;
        }

        .small-button::after {
            content: "▼";
            color: #52607a;
            font-size: 8px;
            line-height: 1;
            transform: translateY(1px);
        }

        .activity-row,
        .quick-row {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px solid #edf2fb;
        }

        .activity-row:last-child,
        .quick-row:last-child {
            border-bottom: 0;
        }

        .activity-icon,
        .quick-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            font-size: 12px;
        }

        .row-content {
            flex: 1;
        }

        .row-content h3 {
            margin: 0 0 5px;
            font-size: 15px;
            font-weight: 600;
        }

        .row-content p {
            margin: 0;
            color: #52607a;
            font-size: 14px;
        }

        .row-time,
        .arrow {
            color: #52607a;
            font-size: 13px;
        }

        .chart {
            height: 180px;
            display: flex;
            align-items: end;
            gap: 18px;
            padding: 18px 0 4px;
            border-bottom: 1px solid #dce7f8;
        }

        .line-chart-box {
            height: 220px;
            position: relative;
        }

        .line-chart-box canvas {
            width: 100%;
            height: 100%;
            display: block;
        }

        .bar {
            flex: 1;
            min-width: 10px;
            border-radius: 5px 5px 0 0;
            background: linear-gradient(#075fe4, #86b7ff);
        }

        .chart-labels {
            display: flex;
            justify-content: space-between;
            color: #52607a;
            font-size: 12px;
            margin-top: 12px;
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .admin-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: block;
            }

            .menu {
                grid-template-columns: repeat(2, 1fr);
            }

            .middle-grid,
            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .dashboard-mobile-top {
                display: flex;
                margin-bottom: 16px;
            }

            .main {
                padding: 24px 16px;
            }

            .top-bar {
                flex-direction: column;
                gap: 18px;
            }

            .stats-grid,
            .menu {
                grid-template-columns: 1fr;
            }
        }
</style>
@endpush

@section('content')
<div class="top-bar">
                <div class="welcome">
                    <h1>Welcome Back, Admin!</h1>
                    <p>Here's what's happening with your platform today.</p>
                </div>

                <div class="top-actions">
                    <select class="month-select dashboard-stats-period">
                        <option>This Month</option>
                        <option>Last Month</option>
                        <option>Last Six Months</option>
                        <option>Last Year</option>
                    </select>
                    <div class="user-button">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <section class="stats-grid">
                @foreach ($stats as $stat)
                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="card-icon">
                                @include('admin.partials.report-icon', ['icon' => $stat['icon']])
                            </div>
                            <div>
                                <p>{{ $stat['title'] }}</p>
                                <h2 class="dashboard-stat-value" data-stat-index="{{ $loop->index }}">{{ $stat['value'] }}</h2>
                            </div>
                        </div>
                        <div class="change">↑ {{ $stat['change'] }} <span>vs last month</span></div>
                    </div>
                @endforeach
            </section>

            <section class="middle-grid">
                <div class="panel">
                    <div class="panel-header">
                        <h2>Recent Activities</h2>
                        <select id="activityFilter" class="small-select">
                            <option value="All">View All Activities</option>
                            <option value="Companies">Companies</option>
                            <option value="Courses">Courses</option>
                            <option value="Freshers">Freshers</option>
                            <option value="Jobs">Jobs</option>
                        </select>
                    </div>

                    @foreach ($activities as $activity)
                        <div class="activity-row" data-type="{{ $activity['type'] }}">
                            <div class="activity-icon">{{ $activity['icon'] }}</div>
                            <div class="row-content">
                                <h3>{{ $activity['title'] }}</h3>
                                <p>{{ $activity['text'] }}</p>
                            </div>
                            <div class="row-time">{{ $activity['time'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h2>Quick Access</h2>
                    </div>

                    @foreach ($quickLinks as $link)
                        <a href="#" class="quick-row">
                            <div class="quick-icon">{{ $link['icon'] }}</div>
                            <div class="row-content">
                                <h3>{{ $link['title'] }}</h3>
                                <p>{{ $link['text'] }}</p>
                            </div>
                            <div class="arrow">›</div>
                        </a>
                    @endforeach
                </div>
            </section>

            <section class="bottom-grid">
                <div class="panel">
                    <div class="panel-header">
                        <h2>Fresher Registrations</h2>
                        <select class="small-select fresher-chart-period">
                            <option>This Month</option>
                            <option>Last Month</option>
                            <option>Last Six Months</option>
                            <option>Last Year</option>
                        </select>
                    </div>
                    <div class="line-chart-box">
                        <canvas id="fresherChart"></canvas>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h2>Applications Received</h2>
                        <select class="small-select applications-period">
                            <option>This Month</option>
                            <option>Last Month</option>
                            <option>Last Six Months</option>
                            <option>Last Year</option>
                        </select>
                    </div>
                    <div class="chart">
                        <div class="bar" style="height: 25%"></div>
                        <div class="bar" style="height: 48%"></div>
                        <div class="bar" style="height: 36%"></div>
                        <div class="bar" style="height: 62%"></div>
                        <div class="bar" style="height: 28%"></div>
                        <div class="bar" style="height: 50%"></div>
                        <div class="bar" style="height: 35%"></div>
                        <div class="bar" style="height: 82%"></div>
                        <div class="bar" style="height: 68%"></div>
                        <div class="bar" style="height: 96%"></div>
                        <div class="bar" style="height: 74%"></div>
                        <div class="bar" style="height: 42%"></div>
                        <div class="bar" style="height: 62%"></div>
                        <div class="bar" style="height: 35%"></div>
                    </div>
                    <div class="chart-labels">
                        <span>1 May</span>
                        <span>11 May</span>
                        <span>21 May</span>
                        <span>31 May</span>
                    </div>
                </div>
            </section>
@endsection

@push('scripts')
<script>
const dashboardData = {
            "This Month": {
                stats: ["12,560", "2,350", "320", "4,850", "18,750", "1,250"],
                labels: ["1 May", "6 May", "11 May", "16 May", "21 May", "26 May", "31 May"],
                freshers: [2000, 1200, 4100, 3200, 5400, 3000, 5000, 4400, 6500, 6400, 7500],
                applications: [25, 48, 36, 62, 28, 50, 35, 82, 68, 96, 74, 42, 62, 35],
            },
            "Last Month": {
                stats: ["10,940", "2,110", "305", "4,210", "15,880", "1,080"],
                labels: ["1 Apr", "6 Apr", "11 Apr", "16 Apr", "21 Apr", "26 Apr", "30 Apr"],
                freshers: [1600, 2100, 3000, 2600, 4200, 3900, 5200, 4800, 5800, 6100, 6900],
                applications: [30, 42, 55, 40, 34, 62, 58, 70, 64, 78, 67, 52, 46, 60],
            },
            "Last Six Months": {
                stats: ["68,420", "12,870", "1,780", "24,950", "96,300", "6,720"],
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                freshers: [2400, 3600, 4700, 5400, 6500, 7600],
                applications: [38, 46, 52, 66, 72, 80, 88, 76, 69, 84, 91, 73, 82, 95],
            },
            "Last Year": {
                stats: ["1,42,800", "28,450", "3,920", "57,600", "2,18,900", "14,500"],
                labels: ["Jan", "Mar", "May", "Jul", "Sep", "Nov", "Dec"],
                freshers: [3200, 4200, 5800, 6900, 7400, 6800, 7900],
                applications: [45, 52, 59, 63, 71, 76, 68, 82, 88, 93, 86, 78, 90, 96],
            },
        };

        let fresherChartData = {
            labels: dashboardData["This Month"].labels,
            values: dashboardData["This Month"].freshers,
        };

        function drawLineChart(canvasId, chartData) {
            const canvas = document.getElementById(canvasId);
            const ctx = canvas.getContext("2d");
            const box = canvas.parentElement;
            const width = box.clientWidth;
            const height = box.clientHeight;
            const pixelRatio = window.devicePixelRatio || 1;

            canvas.width = width * pixelRatio;
            canvas.height = height * pixelRatio;
            ctx.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
            ctx.clearRect(0, 0, width, height);

            const padding = { top: 16, right: 18, bottom: 32, left: 42 };
            const maxValue = 8000;
            const chartWidth = width - padding.left - padding.right;
            const chartHeight = height - padding.top - padding.bottom;
            const values = chartData.values;
            const labels = chartData.labels;

            ctx.font = "12px Arial";
            ctx.fillStyle = "#52607a";
            ctx.strokeStyle = "#dce7f8";
            ctx.lineWidth = 1;

            [8000, 6000, 4000, 2000, 0].forEach((value) => {
                const y = padding.top + chartHeight - (value / maxValue) * chartHeight;
                ctx.beginPath();
                ctx.moveTo(padding.left, y);
                ctx.lineTo(width - padding.right, y);
                ctx.stroke();
                ctx.fillText(value === 0 ? "0" : value / 1000 + "K", 8, y + 4);
            });

            const points = values.map((value, index) => {
                const x = padding.left + (index / (values.length - 1)) * chartWidth;
                const y = padding.top + chartHeight - (value / maxValue) * chartHeight;
                return { x, y };
            });

            const gradient = ctx.createLinearGradient(0, padding.top, 0, height - padding.bottom);
            gradient.addColorStop(0, "rgba(7, 95, 228, 0.18)");
            gradient.addColorStop(1, "rgba(7, 95, 228, 0.02)");

            ctx.beginPath();
            ctx.moveTo(points[0].x, height - padding.bottom);
            points.forEach((point) => ctx.lineTo(point.x, point.y));
            ctx.lineTo(points[points.length - 1].x, height - padding.bottom);
            ctx.closePath();
            ctx.fillStyle = gradient;
            ctx.fill();

            ctx.beginPath();
            points.forEach((point, index) => {
                if (index === 0) {
                    ctx.moveTo(point.x, point.y);
                } else {
                    ctx.lineTo(point.x, point.y);
                }
            });
            ctx.strokeStyle = "#075fe4";
            ctx.lineWidth = 2;
            ctx.stroke();

            points.forEach((point) => {
                ctx.beginPath();
                ctx.arc(point.x, point.y, 4, 0, Math.PI * 2);
                ctx.fillStyle = "white";
                ctx.fill();
                ctx.strokeStyle = "#075fe4";
                ctx.lineWidth = 2;
                ctx.stroke();
            });

            ctx.fillStyle = "#52607a";
            labels.forEach((label, index) => {
                const x = padding.left + (index / (labels.length - 1)) * chartWidth;
                ctx.fillText(label, x - 16, height - 8);
            });
        }

        function updateDashboardStats(period) {
            const data = dashboardData[period];
            document.querySelectorAll(".dashboard-stat-value").forEach((item) => {
                item.textContent = data.stats[item.dataset.statIndex];
            });
        }

        function updateFresherChart(period) {
            const data = dashboardData[period];
            fresherChartData = {
                labels: data.labels,
                values: data.freshers,
            };
            drawLineChart("fresherChart", fresherChartData);
        }

        function updateApplicationBars(period) {
            const data = dashboardData[period];
            document.querySelectorAll(".bar").forEach((bar, index) => {
                bar.style.height = data.applications[index] + "%";
            });
        }

        document.querySelector(".dashboard-stats-period").addEventListener("change", (event) => {
            updateDashboardStats(event.target.value);
        });

        document.querySelector(".fresher-chart-period").addEventListener("change", (event) => {
            updateFresherChart(event.target.value);
        });

        document.querySelector(".applications-period").addEventListener("change", (event) => {
            updateApplicationBars(event.target.value);
        });

        document.getElementById("activityFilter").addEventListener("change", (event) => {
            const selectedType = event.target.value;

            document.querySelectorAll(".activity-row").forEach((row) => {
                const shouldShow = selectedType === "All" || row.dataset.type === selectedType;
                row.style.display = shouldShow ? "flex" : "none";
            });
        });

        drawLineChart("fresherChart", fresherChartData);
        window.addEventListener("resize", () => drawLineChart("fresherChart", fresherChartData));
</script>
@endpush

