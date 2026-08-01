@php
    $activePage = 'applications';

    $applications = [
        ['name' => 'Rohit Kumar', 'email' => 'rohit.kumar@email.com', 'job' => 'Full Stack Developer', 'posted' => '01 Jun 2024', 'experience' => '0 - 1 Year', 'status' => 'New', 'date' => '02 Jun 2024', 'avatar' => 'RK'],
        ['name' => 'Anjali Verma', 'email' => 'anjali.verma@email.com', 'job' => 'UI/UX Designer', 'posted' => '10 May 2024', 'experience' => '1 - 2 Years', 'status' => 'Under Review', 'date' => '01 Jun 2024', 'avatar' => 'AV'],
        ['name' => 'Priya Singh', 'email' => 'priya.singh@email.com', 'job' => 'Full Stack Developer', 'posted' => '01 Jun 2024', 'experience' => '0 - 1 Year', 'status' => 'Shortlisted', 'date' => '31 May 2024', 'avatar' => 'PS'],
        ['name' => 'Aman Sharma', 'email' => 'aman.sharma@email.com', 'job' => 'React Developer', 'posted' => '25 May 2024', 'experience' => '0 - 1 Year', 'status' => 'Shortlisted', 'date' => '29 May 2024', 'avatar' => 'AS'],
        ['name' => 'Sneha Patel', 'email' => 'sneha.patel@email.com', 'job' => 'UI/UX Designer', 'posted' => '10 May 2024', 'experience' => '1 - 3 Years', 'status' => 'Rejected', 'date' => '30 May 2024', 'avatar' => 'SP'],
        ['name' => 'Karan Mehta', 'email' => 'karan.mehta@email.com', 'job' => 'Backend Developer', 'posted' => '05 Jun 2024', 'experience' => '1 - 3 Years', 'status' => 'New', 'date' => '06 Jun 2024', 'avatar' => 'KM'],
    ];

    $jobs = ['All Jobs', 'Full Stack Developer', 'UI/UX Designer', 'React Developer', 'Backend Developer'];
    $statuses = ['All Status', 'New', 'Under Review', 'Shortlisted', 'Rejected'];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications - OnlyFreshers</title>
    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; display: grid; grid-template-columns: 250px 1fr; }
        .company-sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 0 18px 28px; box-sizing: border-box; }
        .company-logo img { width: 205px; height: auto; display: block; margin: 0 0 42px; }
        .company-menu { display: grid; gap: 8px; }
        .company-menu-item { position: relative; display: flex; align-items: center; gap: 14px; min-height: 44px; padding: 6px 14px; border-radius: 8px; color: #24344f; font-size: 14px; font-weight: 500; box-sizing: border-box; }
        .company-menu-item.active { color: #075fe4; background: #eaf2ff; font-weight: 700; }
        .company-menu-icon { width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .company-menu-icon svg { width: 21px; height: 21px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .menu-badge { margin-left: auto; min-width: 22px; height: 22px; border-radius: 50%; background: #ff3045; color: white; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; }
        .company-account { display: flex; align-items: center; gap: 12px; padding: 14px; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 8px 22px rgba(6, 25, 66, 0.04); }
        .company-avatar, .top-avatar, .candidate-avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .company-avatar { width: 34px; height: 34px; }
        .company-account h3 { margin: 0 0 4px; font-size: 14px; font-weight: 700; }
        .company-account p { margin: 0; color: #075fe4; font-size: 12px; }
        .company-account button { margin-left: auto; border: 0; background: transparent; color: #061942; cursor: pointer; font-size: 18px; }
        .main { padding: 0 38px 38px; box-sizing: border-box; }
        .topbar { min-height: 100px; display: flex; align-items: center; justify-content: space-between; gap: 24px; margin-bottom: 24px; }
        .page-title h1 { margin: 0 0 8px; font-size: 22px; font-weight: 700; }
        .page-title p { margin: 0; color: #24344f; font-size: 12px; }
        .top-actions { display: flex; align-items: center; gap: 18px; }
        .bell { position: relative; width: 42px; height: 42px; border: 0; background: white; border-radius: 50%; color: #061942; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(6, 25, 66, 0.05); }
        .bell svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; }
        .top-avatar { width: 50px; height: 50px; font-size: 22px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 26px; }
        .filters { display: grid; grid-template-columns: 170px 170px 1fr 120px; gap: 18px; margin-bottom: 26px; }
        select, input { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 16px; font-size: 13px; outline: none; box-sizing: border-box; }
        .filter-button { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; font-size: 13px; font-weight: 700; cursor: pointer; }
        .table-wrap { border: 1px solid #dce7f8; border-radius: 8px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { height: 58px; padding: 0 20px; color: #24344f; font-size: 13px; text-align: left; border-bottom: 1px solid #dce7f8; }
        td { padding: 18px 20px; font-size: 13px; border-bottom: 1px solid #edf2fb; vertical-align: middle; }
        tr:last-child td { border-bottom: 0; }
        .candidate { display: flex; align-items: center; gap: 14px; }
        .candidate-avatar { width: 42px; height: 42px; font-size: 12px; background: #eaf2ff; color: #075fe4; }
        .candidate h3, .job-info h3 { margin: 0 0 7px; font-size: 13px; font-weight: 700; }
        .candidate p, .job-info p { margin: 0; color: #52607a; font-size: 12px; }
        .status { display: inline-flex; align-items: center; justify-content: center; min-width: 68px; height: 30px; padding: 0 12px; border-radius: 8px; font-size: 12px; font-weight: 700; }
        .New, .UnderReview { color: #075fe4; background: #eaf2ff; }
        .Shortlisted { color: #00a65a; background: #dbf8e9; }
        .Rejected { color: #ff3045; background: #ffe8eb; }
        .dots { border: 0; background: transparent; font-size: 22px; line-height: 1; cursor: pointer; color: #061942; }
        .footer-row { display: flex; align-items: center; justify-content: space-between; margin-top: 18px; color: #24344f; font-size: 13px; }
        .pages { display: flex; gap: 10px; align-items: center; }
        .page-btn { min-width: 38px; height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; cursor: pointer; font-weight: 700; }
        .page-btn.active { background: #075fe4; color: white; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .filters { grid-template-columns: 1fr 1fr; } .table-wrap { overflow-x: auto; } table { min-width: 900px; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .footer-row { flex-direction: column; align-items: flex-start; } .company-menu, .filters { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Applications</h1>
                    <p>Review all applications received for your posted jobs.</p>
                </div>
                <div class="top-actions">
                    <button class="bell" type="button">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>3</span>
                    </button>
                    <div class="top-user">
                        <div class="top-avatar">T</div>
                        <div>
                            <h3>TechNova Solutions</h3>
                            <p>Company</p>
                        </div>
                        <button type="button">⌄</button>
                    </div>
                </div>
            </header>

            <section class="card">
                <div class="filters">
                    <select id="jobFilter">
                        @foreach ($jobs as $job)
                            <option>{{ $job }}</option>
                        @endforeach
                    </select>
                    <select id="statusFilter">
                        @foreach ($statuses as $status)
                            <option>{{ $status }}</option>
                        @endforeach
                    </select>
                    <input id="searchInput" placeholder="Search by name or skills...">
                    <button class="filter-button" type="button">Filters</button>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Candidate</th>
                                <th>Job Role</th>
                                <th>Experience</th>
                                <th>Status</th>
                                <th>Applied Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="applicationBody">
                            @foreach ($applications as $app)
                                <tr class="application-row" data-name="{{ strtolower($app['name'].' '.$app['email']) }}" data-job="{{ $app['job'] }}" data-status="{{ $app['status'] }}">
                                    <td>
                                        <div class="candidate">
                                            <div class="candidate-avatar">{{ $app['avatar'] }}</div>
                                            <div>
                                                <h3>{{ $app['name'] }}</h3>
                                                <p>{{ $app['email'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="job-info">
                                            <h3>{{ $app['job'] }}</h3>
                                            <p>Posted on {{ $app['posted'] }}</p>
                                        </div>
                                    </td>
                                    <td>{{ $app['experience'] }}</td>
                                    <td><span class="status {{ str_replace(' ', '', $app['status']) }}">{{ $app['status'] }}</span></td>
                                    <td>{{ $app['date'] }}</td>
                                    <td><button class="dots" type="button">⋮</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="footer-row">
                    <span id="resultText">Showing 1 to 6 of 56 applications</span>
                    <div class="pages">
                        <button class="page-btn">‹</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <span>...</span>
                        <button class="page-btn">10</button>
                        <button class="page-btn">›</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const jobFilter = document.getElementById('jobFilter');
        const statusFilter = document.getElementById('statusFilter');
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll('.application-row');
        const resultText = document.getElementById('resultText');

        function filterApplications() {
            const job = jobFilter.value;
            const status = statusFilter.value;
            const search = searchInput.value.toLowerCase();
            let count = 0;

            rows.forEach(function (row) {
                const matchJob = job === 'All Jobs' || row.dataset.job === job;
                const matchStatus = status === 'All Status' || row.dataset.status === status;
                const matchSearch = row.dataset.name.includes(search);
                const show = matchJob && matchStatus && matchSearch;
                row.style.display = show ? '' : 'none';
                if (show) count++;
            });

            resultText.textContent = 'Showing 1 to ' + count + ' of 56 applications';
        }

        jobFilter.addEventListener('change', filterApplications);
        statusFilter.addEventListener('change', filterApplications);
        searchInput.addEventListener('input', filterApplications);
    </script>
</body>
</html>
