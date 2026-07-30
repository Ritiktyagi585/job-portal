@php
    $activePage = 'assessments';

    $stats = [
        ['title' => 'Total Assessments', 'value' => '145', 'change' => '10%', 'type' => 'up', 'icon' => 'clipboard'],
        ['title' => 'Active Assessments', 'value' => '102', 'change' => '12%', 'type' => 'up', 'icon' => 'check'],
        ['title' => 'Inactive Assessments', 'value' => '43', 'change' => '8%', 'type' => 'down', 'icon' => 'x'],
        ['title' => 'New This Month', 'value' => '18', 'change' => '15%', 'type' => 'up', 'icon' => 'calendar'],
    ];

    $assessments = [
        ['name' => 'Full Stack Developer Test', 'type' => 'Technical', 'duration' => '60 mins', 'questions' => 60, 'status' => 'Active', 'date' => '31 May 2025'],
        ['name' => 'Python Programming Test', 'type' => 'Technical', 'duration' => '45 mins', 'questions' => 40, 'status' => 'Active', 'date' => '30 May 2025'],
        ['name' => 'Aptitude Test', 'type' => 'Aptitude', 'duration' => '30 mins', 'questions' => 30, 'status' => 'Active', 'date' => '29 May 2025'],
        ['name' => 'Data Structures Test', 'type' => 'Technical', 'duration' => '60 mins', 'questions' => 50, 'status' => 'Inactive', 'date' => '28 May 2025'],
        ['name' => 'UI/UX Design Test', 'type' => 'Technical', 'duration' => '50 mins', 'questions' => 45, 'status' => 'Active', 'date' => '27 May 2025'],
        ['name' => 'SQL Test', 'type' => 'Technical', 'duration' => '40 mins', 'questions' => 35, 'status' => 'Active', 'date' => '26 May 2025'],
        ['name' => 'Communication Skills Test', 'type' => 'Aptitude', 'duration' => '20 mins', 'questions' => 20, 'status' => 'Inactive', 'date' => '25 May 2025'],
        ['name' => 'Java Programming Test', 'type' => 'Technical', 'duration' => '60 mins', 'questions' => 55, 'status' => 'Active', 'date' => '24 May 2025'],
    ];

    $assessmentTypes = ['All', 'Technical', 'Aptitude'];
    $statuses = ['All', 'Active', 'Inactive'];
    $totalAssessments = 145;
    $perPage = count($assessments);
    $totalPages = ceil($totalAssessments / $perPage);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessments - OnlyFreshers Admin</title>

    <style>
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #061942; background: #f4f8ff; font-weight: 500; }
        a { color: inherit; text-decoration: none; }
        .admin-layout { min-height: 100vh; display: grid; grid-template-columns: 220px 1fr; }
        .sidebar { background: white; border-right: 1px solid #dce7f8; display: flex; flex-direction: column; justify-content: space-between; padding: 14px 12px 22px; box-sizing: border-box; }
        .logo img { width: 190px; height: auto; display: block; margin: 0 0 26px; }
        .menu { display: grid; gap: 8px; }
        .menu-item { display: flex; align-items: center; gap: 14px; padding: 12px; border-radius: 8px; color: #24344f; font-size: 15px; font-weight: 700; }
        .menu-item.active { background: #eaf2ff; color: #075fe4; border-left: 4px solid #075fe4; }
        .menu-icon, .card-icon, .profile-icon { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg, .user-button svg, .card-icon svg, .search-wrap svg, .action-button svg { fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; }
        .profile-icon svg { width: 24px; height: 24px; stroke-width: 2; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 34px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 26px; gap: 20px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 14px; font-size: 30px; font-weight: 600; }
        .breadcrumb { color: #52607a; font-size: 15px; }
        .top-actions { display: flex; align-items: flex-start; gap: 16px; }
        .add-button { height: 42px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 22px; font-size: 14px; font-weight: 600; cursor: pointer; margin-top: 40px; }
        .user-button { position: absolute; top: 0; right: 0; width: 46px; height: 46px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .user-button svg { width: 23px; height: 23px; stroke-width: 2; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 24px; }
        .stat-card, .filter-box, .table-box { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); }
        .stat-card { padding: 16px 14px; min-height: 98px; box-sizing: border-box; }
        .stat-top { display: flex; align-items: center; gap: 13px; margin-bottom: 13px; }
        .card-icon { width: 38px; height: 38px; border-radius: 50%; }
        .card-icon svg { width: 20px; height: 20px; stroke-width: 2; }
        .stat-card p { margin: 0 0 6px; color: #24344f; font-size: 12px; font-weight: 600; }
        .stat-card h2 { margin: 0; font-size: 22px; font-weight: 600; }
        .change { font-size: 12px; font-weight: 600; color: #00a65a; }
        .change.down { color: red; }
        .change span { color: #52607a; margin-left: 18px; font-weight: 500; }
        .filter-box { padding: 18px; margin-bottom: 14px; display: grid; grid-template-columns: 1.8fr 1fr 1fr 1fr auto; gap: 22px; align-items: end; }
        .field-group label { display: block; margin-bottom: 8px; color: #061942; font-size: 13px; font-weight: 600; }
        .search-wrap { position: relative; }
        .search-wrap svg { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: #33466b; stroke-width: 2; }
        .field { width: 100%; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        input.field { padding: 0 42px 0 14px; }
        select.field, input[type="date"].field { padding: 0 14px; }
        .reset-button { height: 44px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 20px; font-weight: 600; }
        .table-box { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 15px 18px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; }
        td { color: #1b315b; }
        .assessment-name { color: #061942; font-weight: 600; }
        .status { display: inline-block; padding: 7px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; }
        .status.active { color: #009b52; background: #dff8ed; }
        .status.inactive { color: #24344f; background: #eef2f8; }
        .actions { display: flex; align-items: center; gap: 10px; }
        .action-button { width: 34px; height: 34px; border: 0; border-radius: 7px; color: #075fe4; background: #eef5ff; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .action-button.delete { color: red; background: #fff0f0; }
        .action-button svg { width: 17px; height: 17px; stroke-width: 2.2; }
        .pagination { display: flex; align-items: center; justify-content: space-between; padding: 16px 18px; color: #24344f; font-size: 14px; }
        .pages { display: flex; gap: 10px; align-items: center; }
        .page-button { min-width: 38px; height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; font-weight: 600; }
        .page-button.active { background: #075fe4; color: white; border-color: #075fe4; }
        .hidden { display: none; }
        @media (max-width: 1200px) { .filter-box { grid-template-columns: 1fr 1fr 1fr; } }
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 1000px; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .stats-grid, .filter-box, .menu { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="admin-layout">
        @include('admin.partials.sidebar')

        <main class="main">
            <div class="page-top">
                <div class="page-title">
                    <h1>Assessments</h1>
                    <div class="breadcrumb">Dashboard &nbsp;&gt;&nbsp; Assessments</div>
                </div>
                <div class="top-actions">
                    <button class="add-button" type="button">+ Add Assessment</button>
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
                                @if ($stat['icon'] === 'calendar')
                                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="17" rx="2"></rect><path d="M8 2v4M16 2v4M3 10h18M12 14v4M10 16h4"></path></svg>
                                @elseif ($stat['icon'] === 'x')
                                    <svg viewBox="0 0 24 24"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 8h6M14 13l4 4M18 13l-4 4"></path></svg>
                                @elseif ($stat['icon'] === 'check')
                                    <svg viewBox="0 0 24 24"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 8h6M9 13l2 2 4-4"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 8h6M9 13h6M9 17h4"></path></svg>
                                @endif
                            </div>
                            <div>
                                <p>{{ $stat['title'] }}</p>
                                <h2>{{ $stat['value'] }}</h2>
                            </div>
                        </div>
                        <div class="change {{ $stat['type'] === 'down' ? 'down' : '' }}">
                            {{ $stat['type'] === 'down' ? '-' : '+' }} {{ $stat['change'] }}
                            <span>vs last month</span>
                        </div>
                    </div>
                @endforeach
            </section>

            <section class="filter-box">
                <div class="field-group">
                    <div class="search-wrap">
                        <input id="assessmentSearch" class="field" type="text" placeholder="Search by assessment name or type...">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                    </div>
                </div>
                <div class="field-group">
                    <label>Assessment Type</label>
                    <select id="typeFilter" class="field">
                        @foreach ($assessmentTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>Status</label>
                    <select id="statusFilter" class="field">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>Created On</label>
                    <input id="dateFilter" class="field" type="date">
                </div>
                <button id="resetFilters" class="reset-button" type="button">Reset</button>
            </section>

            <section class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Assessment Name</th>
                            <th>Assessment Type</th>
                            <th>Duration</th>
                            <th>Total Questions</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $index => $assessment)
                            <tr class="assessment-row"
                                data-name="{{ strtolower($assessment['name']) }}"
                                data-type="{{ $assessment['type'] }}"
                                data-status="{{ $assessment['status'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td class="assessment-name">{{ $assessment['name'] }}</td>
                                <td>{{ $assessment['type'] }}</td>
                                <td>{{ $assessment['duration'] }}</td>
                                <td>{{ $assessment['questions'] }}</td>
                                <td><span class="status {{ strtolower($assessment['status']) }}">{{ $assessment['status'] }}</span></td>
                                <td>{{ $assessment['date'] }}</td>
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
                    <span id="resultText">Showing 1 to {{ $perPage }} of {{ $totalAssessments }} results</span>
                    <div class="pages">
                        <button class="page-button">&lt;</button>
                        <button class="page-button active">1</button>
                        <button class="page-button">2</button>
                        <button class="page-button">3</button>
                        <button class="page-button">...</button>
                        <button class="page-button">{{ $totalPages }}</button>
                        <button class="page-button">&gt;</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const assessmentSearch = document.getElementById('assessmentSearch');
        const typeFilter = document.getElementById('typeFilter');
        const statusFilter = document.getElementById('statusFilter');
        const dateFilter = document.getElementById('dateFilter');
        const resetFilters = document.getElementById('resetFilters');
        const assessmentRows = document.querySelectorAll('.assessment-row');
        const resultText = document.getElementById('resultText');

        function filterAssessments() {
            const searchText = assessmentSearch.value.toLowerCase();
            const selectedType = typeFilter.value;
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            assessmentRows.forEach(function (row) {
                const matchesSearch = row.dataset.name.includes(searchText) || row.dataset.type.toLowerCase().includes(searchText);
                const matchesType = selectedType === 'All' || row.dataset.type === selectedType;
                const matchesStatus = selectedStatus === 'All' || row.dataset.status === selectedStatus;
                const shouldShow = matchesSearch && matchesType && matchesStatus;

                row.classList.toggle('hidden', !shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing 1 to ' + visibleCount + ' of {{ $totalAssessments }} results';
        }

        assessmentSearch.addEventListener('input', filterAssessments);
        typeFilter.addEventListener('change', filterAssessments);
        statusFilter.addEventListener('change', filterAssessments);
        dateFilter.addEventListener('change', filterAssessments);

        resetFilters.addEventListener('click', function () {
            assessmentSearch.value = '';
            typeFilter.value = 'All';
            statusFilter.value = 'All';
            dateFilter.value = '';
            filterAssessments();
        });

        document.querySelectorAll('.action-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                const name = row.querySelector('.assessment-name').innerText.trim();

                if (button.title === 'View') {
                    alert('Assessment Details: ' + name);
                }

                if (button.title === 'Edit') {
                    const newName = prompt('Edit assessment name', name);
                    if (newName) {
                        row.querySelector('.assessment-name').textContent = newName;
                        row.dataset.name = newName.toLowerCase();
                    }
                }

                if (button.title === 'Delete') {
                    if (confirm('Delete this assessment?')) {
                        row.remove();
                        filterAssessments();
                    }
                }
            });
        });
    </script>
</body>
</html>
