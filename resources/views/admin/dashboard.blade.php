@php
    $stats = [
        ['title' => 'Total Freshers', 'value' => '12,560', 'change' => '12%', 'icon' => 'FR'],
        ['title' => 'Companies', 'value' => '2,350', 'change' => '8%', 'icon' => 'CO'],
        ['title' => 'Training Partners', 'value' => '320', 'change' => '5%', 'icon' => 'TP'],
        ['title' => 'Jobs Posted', 'value' => '4,850', 'change' => '15%', 'icon' => 'JB'],
        ['title' => 'Applications', 'value' => '18,750', 'change' => '18%', 'icon' => 'AP'],
        ['title' => 'Courses', 'value' => '1,250', 'change' => '10%', 'icon' => 'CR'],
    ];

    $activities = [
        ['title' => 'New Company Registered', 'text' => 'TechNova Solutions', 'time' => '2 min ago', 'icon' => 'CO'],
        ['title' => 'New Course Added', 'text' => 'Full Stack Development', 'time' => '15 min ago', 'icon' => 'CR'],
        ['title' => 'New Fresher Registered', 'text' => 'Ananya Gupta', 'time' => '30 min ago', 'icon' => 'FR'],
        ['title' => 'Job Posted', 'text' => 'Frontend Developer', 'time' => '45 min ago', 'icon' => 'JB'],
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - OnlyFreshers</title>

    <style>
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
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 34px;
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

        .small-button {
            border: 1px solid #dce7f8;
            border-radius: 6px;
            background: white;
            color: #24344f;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            line-height: 1;
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
</head>
<body>
    <div class="admin-layout">
        @include('admin.partials.sidebar')

        <main class="main">
            <div class="top-bar">
                <div class="welcome">
                    <h1>Welcome Back, Admin!</h1>
                    <p>Here's what's happening with your platform today.</p>
                </div>

                <div class="top-actions">
                    <select class="month-select">
                        <option>This Month</option>
                        <option>Last Month</option>
                    </select>
                    <div class="user-button">AD</div>
                </div>
            </div>

            <section class="stats-grid">
                @foreach ($stats as $stat)
                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="card-icon">{{ $stat['icon'] }}</div>
                            <div>
                                <p>{{ $stat['title'] }}</p>
                                <h2>{{ $stat['value'] }}</h2>
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
                        <button class="small-button">View All Activities</button>
                    </div>

                    @foreach ($activities as $activity)
                        <div class="activity-row">
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
                        <button class="small-button" type="button">This Month</button>
                    </div>
                    <div class="line-chart-box">
                        <canvas id="fresherChart"></canvas>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h2>Applications Received</h2>
                        <button class="small-button" type="button">This Month</button>
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
        </main>
    </div>

    <script>
        const fresherChartData = {
            labels: ["1 May", "6 May", "11 May", "16 May", "21 May", "26 May", "31 May"],
            values: [2000, 1200, 4100, 3200, 5400, 3000, 5000, 4400, 6500, 6400, 7500],
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

        drawLineChart("fresherChart", fresherChartData);
        window.addEventListener("resize", () => drawLineChart("fresherChart", fresherChartData));
    </script>
</body>
</html>
