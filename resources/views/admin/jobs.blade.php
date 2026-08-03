@extends('admin.layouts.app')

@section('title', 'Jobs - OnlyFreshers Admin')
@section('pageTitle', 'Jobs')
@section('breadcrumb', 'Dashboard > Jobs')
@section('topbarExtra')
    <button class="add-button" type="button">+ Add Job</button>
@endsection

@php
    $activePage = 'jobs';

    $stats = [
        ['title' => 'Total Jobs', 'value' => '120', 'change' => '15%', 'type' => 'up', 'icon' => 'briefcase'],
        ['title' => 'Active Jobs', 'value' => '85', 'change' => '12%', 'type' => 'up', 'icon' => 'briefcase-check'],
        ['title' => 'Closed Jobs', 'value' => '20', 'change' => '8%', 'type' => 'down', 'icon' => 'briefcase-x'],
        ['title' => 'New This Month', 'value' => '15', 'change' => '25%', 'type' => 'up', 'icon' => 'plus'],
    ];

    $jobs = [
        ['title' => 'Frontend Developer', 'company' => 'TechNova Solutions', 'location' => 'Noida', 'salary' => 'Rs15,000 - Rs20,000 /mo', 'type' => 'Full-Time', 'status' => 'Active', 'date' => '31 May 2025'],
        ['title' => 'Backend Developer', 'company' => 'InnoSoft Technologies', 'location' => 'Delhi', 'salary' => 'Rs25,000 - Rs35,000 /mo', 'type' => 'Full-Time', 'status' => 'Active', 'date' => '30 May 2025'],
        ['title' => 'UI/UX Designer', 'company' => 'Creative Minds', 'location' => 'Bangalore', 'salary' => 'Rs18,000 - Rs25,000 /mo', 'type' => 'Full-Time', 'status' => 'Active', 'date' => '29 May 2025'],
        ['title' => 'Full Stack Developer', 'company' => 'WebCraft India', 'location' => 'Hyderabad', 'salary' => 'Rs30,000 - Rs40,000 /mo', 'type' => 'Full-Time', 'status' => 'Active', 'date' => '28 May 2025'],
        ['title' => 'Data Analyst Intern', 'company' => 'DataWiz Pvt Ltd', 'location' => 'Pune', 'salary' => 'Rs10,000 - Rs15,000 /mo', 'type' => 'Internship', 'status' => 'Active', 'date' => '27 May 2025'],
        ['title' => 'Python Developer', 'company' => 'CodeEdge Solutions', 'location' => 'Noida', 'salary' => 'Rs20,000 - Rs28,000 /mo', 'type' => 'Full-Time', 'status' => 'Closed', 'date' => '26 May 2025'],
        ['title' => 'Digital Marketing Intern', 'company' => 'MarketGurus', 'location' => 'Remote', 'salary' => 'Rs8,000 - Rs12,000 /mo', 'type' => 'Internship', 'status' => 'Closed', 'date' => '25 May 2025'],
        ['title' => 'DevOps Engineer', 'company' => 'CloudNet Systems', 'location' => 'Mumbai', 'salary' => 'Rs35,000 - Rs45,000 /mo', 'type' => 'Full-Time', 'status' => 'Active', 'date' => '24 May 2025'],
    ];

    $statuses = ['All', 'Active', 'Closed'];
    $jobTypes = ['All', 'Full-Time', 'Internship'];
    $locations = ['All', 'Noida', 'Delhi', 'Bangalore', 'Hyderabad', 'Pune', 'Remote', 'Mumbai'];
    $totalJobs = 120;
    $perPage = count($jobs);
    $totalPages = ceil($totalJobs / $perPage);
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
        .filter-box { padding: 18px; margin-bottom: 14px; display: grid; grid-template-columns: 1.8fr .8fr .8fr .8fr 1fr auto; gap: 18px; align-items: end; }
        .field-group label { display: block; margin-bottom: 8px; color: #061942; font-size: 13px; font-weight: 600; }
        .search-wrap { position: relative; }
        .search-wrap svg { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: #33466b; stroke-width: 2; }
        .field { width: 100%; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        input.field { padding: 0 42px 0 14px; }
        select.field, input[type="date"].field { padding: 0 14px; }
        .reset-button { height: 44px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 18px; font-weight: 600; }
        .table-box { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 15px 18px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; }
        td { color: #1b315b; }
        .job-title { color: #061942; font-weight: 600; }
        .status { display: inline-block; padding: 7px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; }
        .status.active { color: #009b52; background: #dff8ed; }
        .status.closed { color: red; background: #fff0f0; }
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
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 1050px; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .stats-grid, .filter-box, .menu { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')


            <section class="stats-grid">
                @foreach ($stats as $stat)
                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="card-icon">
                                @if ($stat['icon'] === 'plus')
                                    <svg viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"></rect><path d="M12 8v8M8 12h8"></path></svg>
                                @elseif ($stat['icon'] === 'briefcase-x')
                                    <svg viewBox="0 0 24 24"><rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16M14 15l4 4M18 15l-4 4"></path></svg>
                                @elseif ($stat['icon'] === 'briefcase-check')
                                    <svg viewBox="0 0 24 24"><rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16M14 16l2 2 4-5"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><rect x="4" y="7" width="16" height="12" rx="2"></rect><path d="M9 7V5h6v2M4 12h16"></path></svg>
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
                        <input id="jobSearch" class="field" type="text" placeholder="Search by job title, company or location...">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                    </div>
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
                    <label>Job Type</label>
                    <select id="typeFilter" class="field">
                        @foreach ($jobTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>Location</label>
                    <select id="locationFilter" class="field">
                        @foreach ($locations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>Posted On</label>
                    <input id="dateFilter" class="field" type="date">
                </div>
                <button id="resetFilters" class="reset-button" type="button">Reset</button>
            </section>

            <section class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Salary</th>
                            <th>Job Type</th>
                            <th>Status</th>
                            <th>Posted On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $index => $job)
                            <tr class="job-row"
                                data-title="{{ strtolower($job['title']) }}"
                                data-company="{{ strtolower($job['company']) }}"
                                data-location="{{ $job['location'] }}"
                                data-type="{{ $job['type'] }}"
                                data-status="{{ $job['status'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td class="job-title">{{ $job['title'] }}</td>
                                <td>{{ $job['company'] }}</td>
                                <td>{{ $job['location'] }}</td>
                                <td>{{ $job['salary'] }}</td>
                                <td>{{ $job['type'] }}</td>
                                <td><span class="status {{ strtolower($job['status']) }}">{{ $job['status'] }}</span></td>
                                <td>{{ $job['date'] }}</td>
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
                    <span id="resultText">Showing 1 to {{ $perPage }} of {{ $totalJobs }} results</span>
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
@endsection

@push('scripts')
<script>
const jobSearch = document.getElementById('jobSearch');
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const locationFilter = document.getElementById('locationFilter');
        const dateFilter = document.getElementById('dateFilter');
        const resetFilters = document.getElementById('resetFilters');
        const jobRows = document.querySelectorAll('.job-row');
        const resultText = document.getElementById('resultText');

        function filterJobs() {
            const searchText = jobSearch.value.toLowerCase();
            const selectedStatus = statusFilter.value;
            const selectedType = typeFilter.value;
            const selectedLocation = locationFilter.value;
            let visibleCount = 0;

            jobRows.forEach(function (row) {
                const matchesSearch = row.dataset.title.includes(searchText) || row.dataset.company.includes(searchText) || row.dataset.location.toLowerCase().includes(searchText);
                const matchesStatus = selectedStatus === 'All' || row.dataset.status === selectedStatus;
                const matchesType = selectedType === 'All' || row.dataset.type === selectedType;
                const matchesLocation = selectedLocation === 'All' || row.dataset.location === selectedLocation;
                const shouldShow = matchesSearch && matchesStatus && matchesType && matchesLocation;

                row.classList.toggle('hidden', !shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing 1 to ' + visibleCount + ' of {{ $totalJobs }} results';
        }

        jobSearch.addEventListener('input', filterJobs);
        statusFilter.addEventListener('change', filterJobs);
        typeFilter.addEventListener('change', filterJobs);
        locationFilter.addEventListener('change', filterJobs);
        dateFilter.addEventListener('change', filterJobs);

        resetFilters.addEventListener('click', function () {
            jobSearch.value = '';
            statusFilter.value = 'All';
            typeFilter.value = 'All';
            locationFilter.value = 'All';
            dateFilter.value = '';
            filterJobs();
        });

        document.querySelectorAll('.action-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                const title = row.querySelector('.job-title').innerText.trim();

                if (button.title === 'View') {
                    alert('Job Details: ' + title);
                }

                if (button.title === 'Edit') {
                    const newTitle = prompt('Edit job title', title);
                    if (newTitle) {
                        row.querySelector('.job-title').textContent = newTitle;
                        row.dataset.title = newTitle.toLowerCase();
                    }
                }

                if (button.title === 'Delete') {
                    if (confirm('Delete this job?')) {
                        row.remove();
                        filterJobs();
                    }
                }
            });
        });
</script>
@endpush


