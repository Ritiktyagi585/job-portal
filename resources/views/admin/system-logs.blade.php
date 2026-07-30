@php
    $activePage = 'logs';

    $logs = [
        ['date' => '31 May 2025, 10:30 AM', 'user' => 'Super Admin', 'module' => 'Users', 'action' => 'Create'],
        ['date' => '31 May 2025, 10:25 AM', 'user' => 'Super Admin', 'module' => 'Jobs', 'action' => 'Update'],
        ['date' => '31 May 2025, 10:20 AM', 'user' => 'Admin User', 'module' => 'Companies', 'action' => 'Create'],
        ['date' => '31 May 2025, 10:15 AM', 'user' => 'Super Admin', 'module' => 'Courses', 'action' => 'Delete'],
        ['date' => '31 May 2025, 10:10 AM', 'user' => 'Super Admin', 'module' => 'Assessments', 'action' => 'Update'],
        ['date' => '31 May 2025, 10:05 AM', 'user' => 'Admin User', 'module' => 'Users', 'action' => 'Update'],
        ['date' => '31 May 2025, 10:00 AM', 'user' => 'Super Admin', 'module' => 'Settings', 'action' => 'Update'],
    ];

    $modules = ['All', 'Users', 'Jobs', 'Companies', 'Courses', 'Assessments', 'Settings'];
    $actions = ['All', 'Create', 'Update', 'Delete'];
    $users = ['All', 'Super Admin', 'Admin User'];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs - OnlyFreshers Admin</title>

    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .admin-layout { min-height: 100vh; display: grid; grid-template-columns: 220px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 14px 12px 22px; box-sizing: border-box; }
        .logo img { width: 190px; height: auto; display: block; margin: 0 0 26px; }
        .menu { display: grid; gap: 8px; }
        .menu-item { display: flex; align-items: center; gap: 14px; padding: 12px; border-radius: 8px; color: #24344f; font-size: 15px; font-weight: 700; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; border-left: 4px solid #075fe4; }
        .menu-icon, .profile-icon { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg, .user-button svg, .search-wrap svg, .action-button svg { fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; }
        .profile-icon svg { width: 24px; height: 24px; stroke-width: 2; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 34px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 34px; gap: 20px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 14px; font-size: 30px; font-weight: 600; }
        .breadcrumb { color: #52607a; font-size: 15px; }
        .user-button { position: absolute; top: 0; right: 0; width: 46px; height: 46px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .user-button svg { width: 23px; height: 23px; stroke-width: 2; }
        .filter-box, .table-box { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); }
        .filter-box { padding: 26px; margin-bottom: 28px; display: grid; grid-template-columns: 1.8fr 1fr 1fr 1fr 1.1fr auto; gap: 28px; align-items: end; }
        .field-group label { display: block; margin-bottom: 8px; color: #061942; font-size: 13px; font-weight: 600; }
        .search-wrap { position: relative; }
        .search-wrap svg { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: #33466b; stroke-width: 2; }
        .field { width: 100%; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        input.field { padding: 0 42px 0 14px; }
        select.field, input[type="date"].field { padding: 0 14px; }
        .reset-button { height: 44px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 20px; font-weight: 600; }
        .table-box { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 20px 32px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; }
        td { color: #1b315b; }
        .status { display: inline-block; padding: 7px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; }
        .status.create { color: #009b52; background: #dff8ed; }
        .status.update { color: #075fe4; background: #eaf2ff; }
        .status.delete { color: red; background: #fff0f0; }
        .action-button { width: 34px; height: 34px; border: 0; border-radius: 7px; color: #075fe4; background: #eef5ff; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .action-button svg { width: 17px; height: 17px; stroke-width: 2.2; }
        .hidden { display: none; }
        @media (max-width: 1200px) { .filter-box { grid-template-columns: 1fr 1fr 1fr; } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 900px; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .filter-box, .menu { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="admin-layout">
        @include('admin.partials.sidebar')

        <main class="main">
            <div class="page-top">
                <div class="page-title">
                    <h1>System Logs</h1>
                    <div class="breadcrumb">Dashboard &nbsp;&gt;&nbsp; System Logs</div>
                </div>
                <div class="user-button">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path>
                    </svg>
                </div>
            </div>

            <section class="filter-box">
                <div class="field-group">
                    <div class="search-wrap">
                        <input id="logSearch" class="field" type="text" placeholder="Search by module or user...">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                    </div>
                </div>
                <div class="field-group">
                    <label>Module</label>
                    <select id="moduleFilter" class="field">
                        @foreach ($modules as $module)
                            <option value="{{ $module }}">{{ $module }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>Action</label>
                    <select id="actionFilter" class="field">
                        @foreach ($actions as $action)
                            <option value="{{ $action }}">{{ $action }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>User</label>
                    <select id="userFilter" class="field">
                        @foreach ($users as $user)
                            <option value="{{ $user }}">{{ $user }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <input id="dateFilter" class="field" type="date">
                </div>
                <button id="resetFilters" class="reset-button" type="button">Reset</button>
            </section>

            <section class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date & Time</th>
                            <th>User</th>
                            <th>Module</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $index => $log)
                            <tr class="log-row"
                                data-user="{{ strtolower($log['user']) }}"
                                data-module="{{ $log['module'] }}"
                                data-action="{{ $log['action'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $log['date'] }}</td>
                                <td>{{ $log['user'] }}</td>
                                <td>{{ $log['module'] }}</td>
                                <td><span class="status {{ strtolower($log['action']) }}">{{ $log['action'] }}</span></td>
                                <td>
                                    <button class="action-button" type="button" title="View">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <script>
        const logSearch = document.getElementById('logSearch');
        const moduleFilter = document.getElementById('moduleFilter');
        const actionFilter = document.getElementById('actionFilter');
        const userFilter = document.getElementById('userFilter');
        const dateFilter = document.getElementById('dateFilter');
        const resetFilters = document.getElementById('resetFilters');
        const logRows = document.querySelectorAll('.log-row');

        function filterLogs() {
            const searchText = logSearch.value.toLowerCase();
            const selectedModule = moduleFilter.value;
            const selectedAction = actionFilter.value;
            const selectedUser = userFilter.value;

            logRows.forEach(function (row) {
                const matchesSearch = row.dataset.module.toLowerCase().includes(searchText) || row.dataset.user.includes(searchText);
                const matchesModule = selectedModule === 'All' || row.dataset.module === selectedModule;
                const matchesAction = selectedAction === 'All' || row.dataset.action === selectedAction;
                const matchesUser = selectedUser === 'All' || row.dataset.user === selectedUser.toLowerCase();
                const shouldShow = matchesSearch && matchesModule && matchesAction && matchesUser;

                row.classList.toggle('hidden', !shouldShow);
            });
        }

        logSearch.addEventListener('input', filterLogs);
        moduleFilter.addEventListener('change', filterLogs);
        actionFilter.addEventListener('change', filterLogs);
        userFilter.addEventListener('change', filterLogs);
        dateFilter.addEventListener('change', filterLogs);

        resetFilters.addEventListener('click', function () {
            logSearch.value = '';
            moduleFilter.value = 'All';
            actionFilter.value = 'All';
            userFilter.value = 'All';
            dateFilter.value = '';
            filterLogs();
        });
    </script>
</body>
</html>
