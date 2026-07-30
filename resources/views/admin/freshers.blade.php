@php
    $activePage = 'freshers';

    $stats = [
        ['title' => 'Total Freshers', 'value' => '12,560', 'change' => '12%', 'note' => 'vs last month', 'type' => 'up', 'icon' => 'users'],
        ['title' => 'Active Profiles', 'value' => '9,850', 'change' => '8%', 'note' => 'verified this month', 'type' => 'up', 'icon' => 'user-check'],
        ['title' => 'Placed Candidates', 'value' => '1,250', 'change' => '10%', 'note' => 'placements this month', 'type' => 'up', 'icon' => 'briefcase'],
        ['title' => 'Pending Verification', 'value' => '320', 'change' => 'Needs review', 'note' => '', 'type' => 'warning', 'icon' => 'clock'],
    ];

    $freshers = [
        ['name' => 'Ananya Gupta', 'email' => 'ananya@gmail.com', 'education' => 'B.Tech CSE', 'skills' => 'React, Node.js, MongoDB', 'status' => 'Active', 'date' => '18 May 2024'],
        ['name' => 'Rohit Kumar', 'email' => 'rohit@gmail.com', 'education' => 'BCA', 'skills' => 'Java, Spring Boot, MySQL', 'status' => 'Active', 'date' => '17 May 2024'],
        ['name' => 'Priya Singh', 'email' => 'priya@gmail.com', 'education' => 'B.Tech IT', 'skills' => 'Python, SQL, Django', 'status' => 'Pending', 'date' => '17 May 2024'],
        ['name' => 'Aman Sharma', 'email' => 'aman@gmail.com', 'education' => 'MCA', 'skills' => 'MERN Stack, Express.js', 'status' => 'Active', 'date' => '16 May 2024'],
        ['name' => 'Neha Verma', 'email' => 'neha@gmail.com', 'education' => 'B.Sc', 'skills' => 'UI/UX, Figma, Adobe XD', 'status' => 'Inactive', 'date' => '15 May 2024'],
        ['name' => 'Sonia Sharma', 'email' => 'sonia@gmail.com', 'education' => 'B.Tech ECE', 'skills' => 'C, C++, Data Structures', 'status' => 'Active', 'date' => '14 May 2024'],
        ['name' => 'Deepak Patel', 'email' => 'deepak@gmail.com', 'education' => 'BCA', 'skills' => 'PHP, Laravel, MySQL', 'status' => 'Pending', 'date' => '14 May 2024'],
        ['name' => 'Arjun Kumar', 'email' => 'arjun@gmail.com', 'education' => 'B.Tech CSE', 'skills' => 'JavaScript, React, Redux', 'status' => 'Active', 'date' => '13 May 2024'],
    ];

    $statuses = ['All Status', 'Active', 'Pending', 'Inactive'];
    $totalFreshers = 12560;
    $perPage = count($freshers);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshers Management - OnlyFreshers Admin</title>

    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .admin-layout { min-height: 100vh; display: grid; grid-template-columns: 220px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 14px 12px 22px; box-sizing: border-box; }
        .logo img { width: 190px; height: auto; display: block; margin: 0 0 26px; }
        .menu { display: grid; gap: 8px; }
        .menu-item { display: flex; align-items: center; gap: 14px; padding: 12px; border-radius: 8px; color: #24344f; font-size: 15px; font-weight: 700; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; border-left: 4px solid #075fe4; }
        .menu-icon, .card-icon, .profile-icon, .avatar { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg, .user-button svg, .card-icon svg, .small-icon svg, .dots svg { fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .profile-icon svg { width: 24px; height: 24px; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 34px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 26px; gap: 20px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 10px; font-size: 30px; font-weight: 600; }
        .page-title p { margin: 0; color: #52607a; font-size: 15px; }
        .top-actions { display: flex; align-items: center; gap: 16px; }
        .month-button, .month-select { height: 46px; border: 1px solid #dce7f8; border-radius: 8px; background: white; color: #24344f; padding: 0 18px; font-weight: 700; display: flex; align-items: center; gap: 12px; }
        .month-select { cursor: pointer; outline: none; padding-right: 30px; }
        .user-button { width: 46px; height: 46px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .top-actions .user-button { position: absolute; top: 0; right: 0; }
        .user-button svg { width: 23px; height: 23px; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 26px; }
        .stat-card, .table-box { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); }
        .stat-card { padding: 16px 14px; min-height: 98px; box-sizing: border-box; }
        .stat-top { display: flex; align-items: center; gap: 13px; margin-bottom: 13px; }
        .card-icon { width: 38px; height: 38px; border-radius: 50%; }
        .card-icon svg { width: 20px; height: 20px; }
        .stat-card p { margin: 0 0 6px; color: #24344f; font-size: 12px; font-weight: 600; }
        .stat-card h2 { margin: 0; font-size: 22px; font-weight: 600; }
        .change { font-size: 12px; font-weight: 600; color: #00a65a; }
        .change.warning { color: #ff8a00; }
        .change span { color: #52607a; margin-left: 18px; font-weight: 500; }
        .table-box { overflow: hidden; }
        .toolbar { padding: 20px 18px; display: grid; grid-template-columns: 1fr auto auto auto; gap: 18px; align-items: center; border-bottom: 1px solid #edf2fb; }
        .search-wrap { position: relative; max-width: 420px; }
        .search-wrap svg { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 20px; height: 20px; color: #33466b; fill: none; stroke: currentColor; stroke-width: 2; }
        .field { width: 100%; height: 48px; border: 1px solid #dce7f8; border-radius: 24px; padding: 0 18px 0 48px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        .select-field, .export-button, .add-button { height: 44px; border-radius: 7px; font-weight: 600; }
        .select-field { min-width: 175px; border: 1px solid #dce7f8; background: white; color: #24344f; padding: 0 14px; }
        .export-button { border: 1px solid #dce7f8; background: white; color: #24344f; padding: 0 22px; }
        .add-button { border: 0; background: #075fe4; color: white; padding: 0 22px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 15px 24px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; }
        td { color: #1b315b; }
        .name-cell { display: flex; align-items: center; gap: 14px; color: #061942; font-weight: 600; }
        .avatar { width: 42px; height: 42px; border-radius: 50%; font-size: 13px; }
        .status { display: inline-block; padding: 8px 13px; border-radius: 18px; font-size: 13px; font-weight: 600; }
        .status.active { color: #009b52; background: #dff8ed; }
        .status.pending { color: #ff8a00; background: #fff3df; }
        .status.inactive { color: red; background: #fff0f0; }
        .actions { display: flex; align-items: center; gap: 10px; }
        .action-button { width: 34px; height: 34px; border: 0; border-radius: 7px; color: #075fe4; background: #eef5ff; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .action-button.delete { color: red; background: #fff0f0; }
        .action-button svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round; }
        .pagination { display: flex; align-items: center; justify-content: space-between; padding: 18px 24px; color: #24344f; font-size: 14px; }
        .pages { display: flex; gap: 12px; align-items: center; }
        .page-button { min-width: 42px; height: 42px; border: 1px solid #dce7f8; border-radius: 8px; background: white; color: #24344f; font-weight: 600; }
        .page-button.active { background: #075fe4; color: white; border-color: #075fe4; }
        .hidden { display: none; }
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } .toolbar { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 980px; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .stats-grid, .toolbar, .menu { grid-template-columns: 1fr; } .search-wrap { max-width: none; } }
    </style>
</head>
<body>
    <div class="admin-layout">
        @include('admin.partials.sidebar')

        <main class="main">
            <div class="page-top">
                <div class="page-title">
                    <h1>Freshers Management</h1>
                    <p>Manage registered freshers, verify profiles and track hiring activity.</p>
                </div>
                <div class="top-actions">
                    <select id="fresherPeriod" class="month-select">
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
                                @if ($stat['icon'] === 'users')
                                    <svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"></circle><path d="M3 19c0-3 2.5-5 6-5"></path><circle cx="17" cy="9" r="2.5"></circle><path d="M14 19c0-2.4 1.8-4 4-4"></path></svg>
                                @elseif ($stat['icon'] === 'user-check')
                                    <svg viewBox="0 0 24 24"><circle cx="10" cy="8" r="4"></circle><path d="M3 21c0-4 3-7 7-7"></path><path d="M15 18l2 2 4-5"></path></svg>
                                @elseif ($stat['icon'] === 'briefcase')
                                    <svg viewBox="0 0 24 24"><rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg>
                                @endif
                            </div>
                            <div>
                                <p>{{ $stat['title'] }}</p>
                            <h2 class="fresher-stat-value" data-stat-index="{{ $loop->index }}">{{ $stat['value'] }}</h2>
                            </div>
                        </div>
                        <div class="change {{ $stat['type'] === 'warning' ? 'warning' : '' }}">
                            {{ $stat['type'] === 'warning' ? '!' : '+' }} {{ $stat['change'] }}
                            @if ($stat['note'])
                                <span>{{ $stat['note'] }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </section>

            <section class="table-box">
                <div class="toolbar">
                    <div class="search-wrap">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                        <input id="fresherSearch" class="field" type="text" placeholder="Search fresher by name, email, phone or skills...">
                    </div>
                    <select id="statusFilter" class="select-field">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                    <button class="export-button" type="button">Export</button>
                    <button class="add-button" type="button">+ Add Fresher</button>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Fresher Name</th>
                            <th>Email</th>
                            <th>Education</th>
                            <th>Skills</th>
                            <th>Status</th>
                            <th>Registered On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($freshers as $fresher)
                            @php
                                $initials = collect(explode(' ', $fresher['name']))->map(fn($part) => substr($part, 0, 1))->join('');
                            @endphp
                            <tr class="fresher-row"
                                data-name="{{ strtolower($fresher['name']) }}"
                                data-email="{{ strtolower($fresher['email']) }}"
                                data-skills="{{ strtolower($fresher['skills']) }}"
                                data-status="{{ $fresher['status'] }}">
                                <td>
                                    <div class="name-cell">
                                        <span class="avatar">{{ $initials }}</span>
                                        {{ $fresher['name'] }}
                                    </div>
                                </td>
                                <td>{{ $fresher['email'] }}</td>
                                <td>{{ $fresher['education'] }}</td>
                                <td>{{ $fresher['skills'] }}</td>
                                <td><span class="status {{ strtolower($fresher['status']) }}">{{ $fresher['status'] }}</span></td>
                                <td>{{ $fresher['date'] }}</td>
                                <td>
                                    <div class="actions">
                                        <button class="action-button" type="button" title="View">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </button>
                                        <button class="action-button" type="button" title="Edit">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M4 20h4l11-11-4-4L4 16v4z"></path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                        </button>
                                        <button class="action-button delete" type="button" title="Delete">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M3 6h18"></path>
                                                <path d="M8 6V4h8v2"></path>
                                                <path d="M6 6l1 15h10l1-15"></path>
                                                <path d="M10 11v6M14 11v6"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    <span id="resultText">Showing 1 to {{ $perPage }} of {{ number_format($totalFreshers) }} entries</span>
                    <div class="pages">
                        <button class="page-button">&lt;</button>
                        <button class="page-button active">1</button>
                        <button class="page-button">2</button>
                        <button class="page-button">3</button>
                        <button class="page-button">4</button>
                        <button class="page-button">5</button>
                        <button class="page-button">...</button>
                        <button class="page-button">&gt;</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const fresherSearch = document.getElementById('fresherSearch');
        const statusFilter = document.getElementById('statusFilter');
        const fresherPeriod = document.getElementById('fresherPeriod');
        const fresherRows = document.querySelectorAll('.fresher-row');
        const resultText = document.getElementById('resultText');
        const fresherPeriodData = {
            'This Month': ['12,560', '9,850', '1,250', '320'],
            'Last Month': ['10,940', '8,960', '1,080', '410'],
            'Last Six Months': ['68,420', '52,300', '6,720', '1,480'],
            'Last Year': ['1,42,800', '1,08,500', '14,500', '3,260']
        };

        function updateFresherStats() {
            const values = fresherPeriodData[fresherPeriod.value];

            document.querySelectorAll('.fresher-stat-value').forEach(function (item) {
                item.textContent = values[item.dataset.statIndex];
            });
        }

        function filterFreshers() {
            const searchText = fresherSearch.value.toLowerCase();
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            fresherRows.forEach(function (row) {
                const matchesSearch = row.dataset.name.includes(searchText) || row.dataset.email.includes(searchText) || row.dataset.skills.includes(searchText);
                const matchesStatus = selectedStatus === 'All Status' || row.dataset.status === selectedStatus;
                const shouldShow = matchesSearch && matchesStatus;

                row.classList.toggle('hidden', !shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing 1 to ' + visibleCount + ' of {{ number_format($totalFreshers) }} entries';
        }

        fresherSearch.addEventListener('input', filterFreshers);
        statusFilter.addEventListener('change', filterFreshers);
        fresherPeriod.addEventListener('change', updateFresherStats);

        document.querySelectorAll('.action-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                const name = row.querySelector('.name-cell').innerText.trim();

                if (button.title === 'View') {
                    alert('Fresher Details: ' + name);
                }

                if (button.title === 'Edit') {
                    const newName = prompt('Edit fresher name', name);
                    if (newName) {
                        row.querySelector('.name-cell').lastChild.textContent = ' ' + newName;
                        row.dataset.name = newName.toLowerCase();
                    }
                }

                if (button.title === 'Delete') {
                    if (confirm('Delete this fresher?')) {
                        row.remove();
                        filterFreshers();
                    }
                }
            });
        });
    </script>
</body>
</html>
