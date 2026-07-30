@php
    $activePage = 'training-partners';
    $statuses = ['All Status', 'Active', 'Inactive'];
@endphp
@php
    $trainingPartners = [
        ['name' => 'TechLearn Academy', 'person' => 'Rahul Sharma', 'email' => 'rahul@techlearn.com', 'courses' => 12, 'status' => 'Active'],
        ['name' => 'CodeMentor', 'person' => 'Priya Patel', 'email' => 'priya@codementor.com', 'courses' => 8, 'status' => 'Active'],
        ['name' => 'DevBridge Institute', 'person' => 'Amit Verma', 'email' => 'amit@devbridge.com', 'courses' => 15, 'status' => 'Active'],
        ['name' => 'SkillUp Training', 'person' => 'Neha Singh', 'email' => 'neha@skillup.com', 'courses' => 10, 'status' => 'Inactive'],
        ['name' => 'LearnHub', 'person' => 'Vikram Nair', 'email' => 'vikram@learnhub.com', 'courses' => 7, 'status' => 'Active'],
    ];

    $partners = $trainingPartners;
    $totalPartners = count($partners);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Partners - OnlyFreshers Admin</title>

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
        .profile-icon svg, .user-button svg, .action-button svg, .search-wrap svg { fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; }
        .profile-icon svg { width: 24px; height: 24px; stroke-width: 2; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 34px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 34px; gap: 20px; padding-right: 58px; }
        .page-title h1 { margin: 0 0 10px; font-size: 30px; font-weight: 600; }
        .breadcrumb { color: #52607a; font-size: 14px; }
        .top-actions { display: flex; align-items: flex-start; gap: 16px; }
        .add-button { height: 42px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 20px; font-size: 14px; font-weight: 600; cursor: pointer; margin-top: 18px; }
        .user-button { width: 42px; height: 42px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .top-actions .user-button { position: absolute; top: 0; right: 0; }
        .user-button svg { width: 22px; height: 22px; stroke-width: 2; }
        .table-box { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); overflow: hidden; }
        .toolbar { padding: 18px; display: flex; align-items: center; justify-content: space-between; gap: 16px; border-bottom: 1px solid #edf2fb; }
        .filters { display: flex; align-items: center; gap: 14px; }
        .search-wrap { position: relative; width: 310px; }
        .search-wrap svg { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: #33466b; stroke-width: 2; }
        .search-field, .status-field { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        .search-field { width: 100%; padding: 0 40px 0 14px; }
        .status-field { min-width: 150px; padding: 0 14px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 15px 22px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; font-size: 13px; }
        td { color: #1b315b; }
        .name-cell { color: #061942; font-weight: 600; }
        .status { display: inline-block; padding: 7px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; }
        .status.active { color: #009b52; background: #dff8ed; }
        .status.inactive { color: red; background: #fff0f0; }
        .actions { display: flex; align-items: center; gap: 10px; }
        .action-button { width: 34px; height: 34px; border: 0; border-radius: 7px; color: #075fe4; background: #eef5ff; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .action-button.delete { color: red; background: #fff0f0; }
        .action-button svg { width: 17px; height: 17px; stroke-width: 2.2; }
        .result-text { padding: 16px 22px; color: #52607a; font-size: 14px; }
        .hidden { display: none; }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 900px; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top, .toolbar, .filters { flex-direction: column; align-items: flex-start; } .search-wrap { width: 100%; } .menu { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="admin-layout">
        @include('admin.partials.sidebar')

        <main class="main">
            <div class="page-top">
                <div class="page-title">
                    <h1>Training Partners</h1>
                    <div class="breadcrumb">Dashboard &nbsp;&gt;&nbsp; Trainings</div>
                </div>
                <div class="top-actions">
                    <button class="add-button" type="button">+ Add Partner</button>
                    <div class="user-button">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <section class="table-box">
                <div class="toolbar">
                    <div class="filters">
                        <div class="search-wrap">
                            <input id="partnerSearch" class="search-field" type="text" placeholder="Search partner...">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                        </div>
                        <select id="statusFilter" class="status-field">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Partner Name</th>
                            <th>Contact Person</th>
                            <th>Email</th>
                            <th>Courses</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $index => $partner)
                            <tr class="partner-row"
                                data-name="{{ strtolower($partner['name']) }}"
                                data-person="{{ strtolower($partner['person']) }}"
                                data-email="{{ strtolower($partner['email']) }}"
                                data-status="{{ $partner['status'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td class="name-cell">{{ $partner['name'] }}</td>
                                <td>{{ $partner['person'] }}</td>
                                <td>{{ $partner['email'] }}</td>
                                <td>{{ $partner['courses'] }}</td>
                                <td><span class="status {{ strtolower($partner['status']) }}">{{ $partner['status'] }}</span></td>
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

                <div id="resultText" class="result-text">Showing {{ $totalPartners }} training partners</div>
            </section>
        </main>
    </div>

    <script>
        const partnerSearch = document.getElementById('partnerSearch');
        const statusFilter = document.getElementById('statusFilter');
        const partnerRows = document.querySelectorAll('.partner-row');
        const resultText = document.getElementById('resultText');

        function filterPartners() {
            const searchText = partnerSearch.value.toLowerCase();
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            partnerRows.forEach(function (row) {
                const matchesSearch = row.dataset.name.includes(searchText) || row.dataset.person.includes(searchText) || row.dataset.email.includes(searchText);
                const matchesStatus = selectedStatus === 'All Status' || row.dataset.status === selectedStatus;
                const shouldShow = matchesSearch && matchesStatus;

                row.classList.toggle('hidden', !shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing ' + visibleCount + ' training partners';
        }

        partnerSearch.addEventListener('input', filterPartners);
        statusFilter.addEventListener('change', filterPartners);

        document.querySelectorAll('.action-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                const name = row.querySelector('.name-cell').innerText.trim();

                if (button.title === 'View') {
                    alert('Training Partner Details: ' + name);
                }

                if (button.title === 'Edit') {
                    const newName = prompt('Edit partner name', name);
                    if (newName) {
                        row.querySelector('.name-cell').textContent = newName;
                        row.dataset.name = newName.toLowerCase();
                    }
                }

                if (button.title === 'Delete') {
                    if (confirm('Delete this partner?')) {
                        row.remove();
                        filterPartners();
                    }
                }
            });
        });
    </script>
</body>
</html>
