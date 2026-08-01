@php
    $activePage = 'interviews';

    $interviews = [
        ['name' => 'Rohit Kumar', 'email' => 'rohit.kumar@email.com', 'job' => 'Full Stack Developer', 'type' => 'Technical', 'interviewer' => 'Amit Sharma', 'role' => 'Tech Lead', 'date' => '05 Jun 2024', 'time' => '11:00 AM', 'status' => 'Scheduled', 'avatar' => 'RK', 'interviewerAvatar' => 'A'],
        ['name' => 'Priya Singh', 'email' => 'priya.singh@email.com', 'job' => 'Full Stack Developer', 'type' => 'HR Round', 'interviewer' => 'Ritika Verma', 'role' => 'HR Manager', 'date' => '06 Jun 2024', 'time' => '02:00 PM', 'status' => 'Scheduled', 'avatar' => 'PS', 'interviewerAvatar' => 'R'],
        ['name' => 'Aman Sharma', 'email' => 'aman.sharma@email.com', 'job' => 'React Developer', 'type' => 'Technical', 'interviewer' => 'Sandeep Joshi', 'role' => 'Senior Developer', 'date' => '06 Jun 2024', 'time' => '04:00 PM', 'status' => 'Completed', 'avatar' => 'AS', 'interviewerAvatar' => 'S'],
        ['name' => 'Sneha Patel', 'email' => 'sneha.patel@email.com', 'job' => 'UI/UX Designer', 'type' => 'Design Test', 'interviewer' => 'Pooja Mehta', 'role' => 'Design Lead', 'date' => '07 Jun 2024', 'time' => '10:30 AM', 'status' => 'Completed', 'avatar' => 'SP', 'interviewerAvatar' => 'P'],
        ['name' => 'Karan Mehta', 'email' => 'karan.mehta@email.com', 'job' => 'Backend Developer', 'type' => 'Technical', 'interviewer' => 'Vikram Singh', 'role' => 'Tech Lead', 'date' => '07 Jun 2024', 'time' => '01:30 PM', 'status' => 'Cancelled', 'avatar' => 'KM', 'interviewerAvatar' => 'V'],
        ['name' => 'Anjali Verma', 'email' => 'anjali.verma@email.com', 'job' => 'UI/UX Designer', 'type' => 'HR Round', 'interviewer' => 'Ritika Verma', 'role' => 'HR Manager', 'date' => '08 Jun 2024', 'time' => '11:00 AM', 'status' => 'Scheduled', 'avatar' => 'AV', 'interviewerAvatar' => 'R'],
    ];

    $jobs = ['All Jobs', 'Full Stack Developer', 'React Developer', 'UI/UX Designer', 'Backend Developer'];
    $interviewers = ['All Interviewers', 'Amit Sharma', 'Ritika Verma', 'Sandeep Joshi', 'Pooja Mehta', 'Vikram Singh'];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviews - OnlyFreshers</title>
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
        .company-avatar, .top-avatar, .avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
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
        .card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 24px; }
        .card-head { display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #dce7f8; padding-bottom: 14px; margin-bottom: 22px; gap: 18px; }
        .tabs { display: flex; gap: 34px; }
        .tab { border: 0; background: transparent; color: #24344f; font-size: 13px; font-weight: 600; cursor: pointer; padding: 10px 14px; border-bottom: 3px solid transparent; }
        .tab.active { color: #075fe4; border-bottom-color: #075fe4; }
        .schedule-button { width: 180px; height: 42px; border: 1px solid #9fc0f5; border-radius: 8px; background: white; color: #075fe4; font-size: 13px; font-weight: 700; cursor: pointer; }
        .filters { display: grid; grid-template-columns: 1fr 190px 240px 120px; gap: 16px; margin-bottom: 24px; }
        input, select, .filter-button { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 16px; font-size: 13px; outline: none; box-sizing: border-box; }
        .filter-button { color: #075fe4; font-weight: 700; cursor: pointer; }
        .table-wrap { border: 1px solid #dce7f8; border-radius: 8px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { height: 52px; padding: 0 16px; color: #24344f; font-size: 12px; text-align: left; border-bottom: 1px solid #dce7f8; }
        td { padding: 16px; font-size: 13px; border-bottom: 1px solid #edf2fb; vertical-align: middle; }
        tr:last-child td { border-bottom: 0; }
        .person, .interviewer { display: flex; align-items: center; gap: 12px; }
        .avatar { width: 42px; height: 42px; background: #eaf2ff; color: #075fe4; font-size: 12px; }
        .interviewer .avatar { width: 34px; height: 34px; color: white; background: linear-gradient(135deg, #075fe4, #9b51e0); }
        .person h3, .interviewer h3 { margin: 0 0 6px; font-size: 13px; font-weight: 700; }
        .person p, .interviewer p { margin: 0; color: #52607a; font-size: 12px; }
        .pill { display: inline-flex; align-items: center; justify-content: center; min-width: 72px; height: 30px; padding: 0 10px; border-radius: 7px; font-size: 12px; font-weight: 700; }
        .Technical { color: #075fe4; background: #eaf2ff; }
        .HRRound { color: #00a65a; background: #dbf8e9; }
        .DesignTest { color: #8a35db; background: #f1e6ff; }
        .Scheduled { color: #c86b00; background: #fff0d1; }
        .Completed { color: #00a65a; background: #dbf8e9; }
        .Cancelled { color: #ff3045; background: #ffe8eb; }
        .date-cell div { margin-bottom: 7px; }
        .dots { border: 0; background: transparent; font-size: 22px; line-height: 1; cursor: pointer; color: #061942; }
        .footer-row { display: flex; align-items: center; justify-content: space-between; margin-top: 18px; color: #24344f; font-size: 13px; }
        .pages { display: flex; gap: 10px; align-items: center; }
        .page-btn { min-width: 38px; height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; cursor: pointer; font-weight: 700; }
        .page-btn.active { background: #075fe4; color: white; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .filters { grid-template-columns: 1fr 1fr; } .table-wrap { overflow-x: auto; } table { min-width: 980px; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .card-head, .footer-row { flex-direction: column; align-items: flex-start; } .company-menu, .filters { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Interviews</h1>
                    <p>Schedule and manage interviews with candidates.</p>
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
                <div class="card-head">
                    <div class="tabs">
                        <button class="tab active" data-status="All" type="button">All Interviews (<span id="allCount">0</span>)</button>
                        <button class="tab" data-status="Scheduled" type="button">Scheduled (<span id="scheduledCount">0</span>)</button>
                        <button class="tab" data-status="Completed" type="button">Completed (<span id="completedCount">0</span>)</button>
                        <button class="tab" data-status="Cancelled" type="button">Cancelled (<span id="cancelledCount">0</span>)</button>
                    </div>
                    <button class="schedule-button" type="button">+ Schedule Interview</button>
                </div>

                <div class="filters">
                    <input id="searchInput" placeholder="Search by candidate name or job role...">
                    <select id="jobFilter">
                        @foreach ($jobs as $job)
                            <option>{{ $job }}</option>
                        @endforeach
                    </select>
                    <select id="interviewerFilter">
                        @foreach ($interviewers as $person)
                            <option>{{ $person }}</option>
                        @endforeach
                    </select>
                    <button class="filter-button" type="button">Filters</button>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Candidate</th>
                                <th>Job Role</th>
                                <th>Interview Type</th>
                                <th>Interviewer</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interviews as $interview)
                                <tr class="interview-row" data-name="{{ strtolower($interview['name'].' '.$interview['job']) }}" data-job="{{ $interview['job'] }}" data-interviewer="{{ $interview['interviewer'] }}" data-status="{{ $interview['status'] }}">
                                    <td>
                                        <div class="person">
                                            <div class="avatar">{{ $interview['avatar'] }}</div>
                                            <div>
                                                <h3>{{ $interview['name'] }}</h3>
                                                <p>{{ $interview['email'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $interview['job'] }}</td>
                                    <td><span class="pill {{ str_replace(' ', '', $interview['type']) }}">{{ $interview['type'] }}</span></td>
                                    <td>
                                        <div class="interviewer">
                                            <div class="avatar">{{ $interview['interviewerAvatar'] }}</div>
                                            <div>
                                                <h3>{{ $interview['interviewer'] }}</h3>
                                                <p>{{ $interview['role'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="date-cell"><div>{{ $interview['date'] }}</div><span>{{ $interview['time'] }}</span></td>
                                    <td><span class="pill {{ $interview['status'] }}">{{ $interview['status'] }}</span></td>
                                    <td><button class="dots" type="button">⋮</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="footer-row">
                    <span id="resultText">Showing 1 to 6 of 8 interviews</span>
                    <div class="pages">
                        <button class="page-btn">‹</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">›</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const rows = document.querySelectorAll('.interview-row');
        const searchInput = document.getElementById('searchInput');
        const jobFilter = document.getElementById('jobFilter');
        const interviewerFilter = document.getElementById('interviewerFilter');
        const resultText = document.getElementById('resultText');
        let activeStatus = 'All';

        function count(status) {
            if (status === 'All') return rows.length;
            return Array.from(rows).filter(function (row) { return row.dataset.status === status; }).length;
        }

        function filterRows() {
            const search = searchInput.value.toLowerCase();
            const job = jobFilter.value;
            const interviewer = interviewerFilter.value;
            let visible = 0;

            rows.forEach(function (row) {
                const matchesStatus = activeStatus === 'All' || row.dataset.status === activeStatus;
                const matchesSearch = row.dataset.name.includes(search);
                const matchesJob = job === 'All Jobs' || row.dataset.job === job;
                const matchesInterviewer = interviewer === 'All Interviewers' || row.dataset.interviewer === interviewer;
                const show = matchesStatus && matchesSearch && matchesJob && matchesInterviewer;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            resultText.textContent = 'Showing 1 to ' + visible + ' of 8 interviews';
        }

        document.getElementById('allCount').textContent = count('All');
        document.getElementById('scheduledCount').textContent = count('Scheduled');
        document.getElementById('completedCount').textContent = count('Completed');
        document.getElementById('cancelledCount').textContent = count('Cancelled');

        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.addEventListener('click', function () {
                document.querySelectorAll('.tab').forEach(function (item) {
                    item.classList.remove('active');
                });
                tab.classList.add('active');
                activeStatus = tab.dataset.status;
                filterRows();
            });
        });

        searchInput.addEventListener('input', filterRows);
        jobFilter.addEventListener('change', filterRows);
        interviewerFilter.addEventListener('change', filterRows);
    </script>
</body>
</html>
