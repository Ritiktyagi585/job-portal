@extends('admin.layouts.app')

@section('title', 'Companies - OnlyFreshers Admin')
@section('pageTitle', 'Companies')
@section('breadcrumb', 'Dashboard > Companies')
@section('topbarExtra')
    <button class="add-button">+ Add Company</button>
@endsection

@php
    $activePage = 'companies';

    $stats = [
        ['title' => 'Total Companies', 'value' => '256', 'change' => '12%', 'type' => 'up', 'icon' => 'CO'],
        ['title' => 'Active Companies', 'value' => '198', 'change' => '10%', 'type' => 'up', 'icon' => 'AC'],
        ['title' => 'Inactive Companies', 'value' => '58', 'change' => '6%', 'type' => 'down', 'icon' => 'IC'],
        ['title' => 'New This Month', 'value' => '22', 'change' => '15%', 'type' => 'up', 'icon' => 'NW'],
    ];

    $companies = [
        ['name' => 'Microsoft', 'logo' => 'MS', 'industry' => 'Software', 'size' => '10,000+', 'email' => 'hr@microsoft.com', 'status' => 'Active', 'date' => '31 May 2025'],
        ['name' => 'Google', 'logo' => 'G', 'industry' => 'IT Services', 'size' => '10,000+', 'email' => 'careers@google.com', 'status' => 'Active', 'date' => '30 May 2025'],
        ['name' => 'Infosys', 'logo' => 'IN', 'industry' => 'IT Services', 'size' => '5,000 - 10,000', 'email' => 'hr@infosys.com', 'status' => 'Active', 'date' => '29 May 2025'],
        ['name' => 'TCS', 'logo' => 'TC', 'industry' => 'IT Services', 'size' => '10,000+', 'email' => 'careers@tcs.com', 'status' => 'Active', 'date' => '28 May 2025'],
        ['name' => 'Wipro', 'logo' => 'WP', 'industry' => 'IT Services', 'size' => '5,000 - 10,000', 'email' => 'hr@wipro.com', 'status' => 'Inactive', 'date' => '27 May 2025'],
        ['name' => 'Accenture', 'logo' => 'AC', 'industry' => 'Consulting', 'size' => '10,000+', 'email' => 'careers@accenture.com', 'status' => 'Active', 'date' => '26 May 2025'],
        ['name' => 'Deloitte', 'logo' => 'DL', 'industry' => 'Consulting', 'size' => '5,000 - 10,000', 'email' => 'hr@deloitte.com', 'status' => 'Inactive', 'date' => '25 May 2025'],
        ['name' => 'IBM', 'logo' => 'IBM', 'industry' => 'Technology', 'size' => '5,000 - 10,000', 'email' => 'jobs@ibm.com', 'status' => 'Active', 'date' => '24 May 2025'],
    ];

    $industries = ['All', 'Software', 'IT Services', 'Consulting', 'Technology'];
    $companySizes = ['All', '5,000 - 10,000', '10,000+'];
    $statuses = ['All', 'Active', 'Inactive'];
    $totalCompanies = 256;
    $perPage = count($companies);
    $totalPages = ceil($totalCompanies / $perPage);
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
        .menu-icon, .card-icon, .profile-icon, .company-logo { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; font-size: 11px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg { width: 24px; height: 24px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 36px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: center; justify-content: space-between; margin-bottom: 26px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 14px; font-size: 30px; font-weight: 600; }
        .breadcrumb { color: #52607a; font-size: 15px; }
        .add-button { border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 14px 22px; font-size: 15px; font-weight: 600; cursor: pointer; }
        .top-actions { display: flex; align-items: center; gap: 16px; }
        .user-button { width: 46px; height: 46px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-actions .user-button { position: absolute; top: 0; right: 0; }
        .user-button svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 22px; }
        .stat-card, .filter-box, .table-box { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); }
        .stat-card { padding: 20px; }
        .stat-top { display: flex; align-items: center; gap: 18px; margin-bottom: 16px; }
        .card-icon { width: 56px; height: 56px; border-radius: 50%; font-size: 13px; }
        .stat-card p { margin: 0 0 8px; color: #24344f; font-size: 13px; }
        .stat-card h2 { margin: 0; font-size: 26px; font-weight: 600; }
        .change { font-size: 14px; font-weight: 600; color: #00a65a; }
        .change.down { color: red; }
        .change span { color: #52607a; margin-left: 18px; font-weight: 500; }
        .filter-box { padding: 16px; margin-bottom: 14px; display: grid; grid-template-columns: 1.7fr 1fr 1fr 1fr auto; gap: 16px; align-items: end; }
        .field-group label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 600; }
        .field { width: 100%; height: 46px; border: 1px solid #dce7f8; border-radius: 7px; padding: 0 14px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        .reset-button { height: 46px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 18px; font-weight: 600; }
        .table-box { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 15px 18px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { font-weight: 600; color: #24344f; background: white; }
        td { color: #061942; }
        .company-cell { display: flex; align-items: center; gap: 12px; font-weight: 600; }
        .company-logo { width: 30px; height: 30px; border-radius: 7px; font-size: 10px; }
        .status { display: inline-block; padding: 7px 12px; border-radius: 7px; font-size: 12px; }
        .status.active { color: #009b52; background: #dff8ed; }
        .status.inactive { color: #24344f; background: #eef2f8; }
        .actions { display: flex; gap: 10px; }
        .action-button { width: 34px; height: 34px; border: 0; border-radius: 7px; color: #075fe4; background: #eef5ff; font-weight: 700; cursor: pointer; }
        .action-button.delete { color: red; background: #fff0f0; }
        .action-button svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round; }
        .pagination { display: flex; align-items: center; justify-content: space-between; padding: 16px 18px; color: #24344f; font-size: 14px; }
        .pages { display: flex; gap: 10px; align-items: center; }
        .page-button { min-width: 38px; height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; font-weight: 600; }
        .page-button.active { background: #075fe4; color: white; border-color: #075fe4; }
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } .filter-box { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } table { min-width: 900px; } .table-box { overflow-x: auto; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; align-items: flex-start; gap: 16px; } .stats-grid, .filter-box, .menu { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')


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
                        <div class="change {{ $stat['type'] === 'down' ? 'down' : '' }}">{{ $stat['type'] === 'down' ? '↓' : '↑' }} {{ $stat['change'] }} <span>vs last month</span></div>
                    </div>
                @endforeach
            </section>

            <section class="filter-box">
                <div class="field-group">
                    <input id="companySearch" class="field" type="text" placeholder="Search by company name, email or contact...">
                </div>
                <div class="field-group">
                    <label>Industry</label>
                    <select id="industryFilter" class="field">
                        @foreach ($industries as $industry)
                            <option value="{{ $industry }}">{{ $industry }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-group">
                    <label>Company Size</label>
                    <select id="sizeFilter" class="field">
                        @foreach ($companySizes as $size)
                            <option value="{{ $size }}">{{ $size }}</option>
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
                <button id="resetFilters" class="reset-button">Reset</button>
            </section>

            <section class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Industry</th>
                            <th>Company Size</th>
                            <th>Contact Email</th>
                            <th>Status</th>
                            <th>Registered On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $index => $company)
                            <tr class="company-row"
                                data-name="{{ strtolower($company['name']) }}"
                                data-email="{{ strtolower($company['email']) }}"
                                data-industry="{{ $company['industry'] }}"
                                data-size="{{ $company['size'] }}"
                                data-status="{{ $company['status'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="company-cell">
                                        <span class="company-logo">{{ $company['logo'] }}</span>
                                        {{ $company['name'] }}
                                    </div>
                                </td>
                                <td>{{ $company['industry'] }}</td>
                                <td>{{ $company['size'] }}</td>
                                <td>{{ $company['email'] }}</td>
                                <td><span class="status {{ strtolower($company['status']) }}">{{ $company['status'] }}</span></td>
                                <td>{{ $company['date'] }}</td>
                                <td>
                                    <div class="actions">
                                        <button class="action-button" title="View">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </button>
                                        <button class="action-button" title="Edit">
                                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M4 20h4l11-11-4-4L4 16v4z"></path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                        </button>
                                        <button class="action-button delete" title="Delete">
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
                    <span id="resultText">Showing 1 to {{ $perPage }} of {{ $totalCompanies }} results</span>
                    <div class="pages">
                        <button class="page-button">‹</button>
                        <button class="page-button active">1</button>
                        <button class="page-button">2</button>
                        <button class="page-button">3</button>
                        <button class="page-button">...</button>
                        <button class="page-button">{{ $totalPages }}</button>
                        <button class="page-button">›</button>
                    </div>
                </div>
            </section>
@endsection

@push('scripts')
<script>
const searchInput = document.getElementById('companySearch');
        const industryFilter = document.getElementById('industryFilter');
        const sizeFilter = document.getElementById('sizeFilter');
        const statusFilter = document.getElementById('statusFilter');
        const resetButton = document.getElementById('resetFilters');
        const companyRows = document.querySelectorAll('.company-row');
        const resultText = document.getElementById('resultText');

        function filterCompanies() {
            const searchText = searchInput.value.toLowerCase();
            const selectedIndustry = industryFilter.value;
            const selectedSize = sizeFilter.value;
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            companyRows.forEach(function (row) {
                const matchesSearch = row.dataset.name.includes(searchText) || row.dataset.email.includes(searchText);
                const matchesIndustry = selectedIndustry === 'All' || row.dataset.industry === selectedIndustry;
                const matchesSize = selectedSize === 'All' || row.dataset.size === selectedSize;
                const matchesStatus = selectedStatus === 'All' || row.dataset.status === selectedStatus;
                const shouldShow = matchesSearch && matchesIndustry && matchesSize && matchesStatus;

                row.style.display = shouldShow ? '' : 'none';

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing 1 to ' + visibleCount + ' of {{ $totalCompanies }} results';
        }

        searchInput.addEventListener('input', filterCompanies);
        industryFilter.addEventListener('change', filterCompanies);
        sizeFilter.addEventListener('change', filterCompanies);
        statusFilter.addEventListener('change', filterCompanies);

        resetButton.addEventListener('click', function () {
            searchInput.value = '';
            industryFilter.value = 'All';
            sizeFilter.value = 'All';
            statusFilter.value = 'All';
            filterCompanies();
        });

        document.querySelectorAll('.action-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                const name = row.querySelector('.company-cell').innerText.trim();

                if (button.title === 'View') {
                    alert('Company Details: ' + name);
                }

                if (button.title === 'Edit') {
                    const newName = prompt('Edit company name', name);
                    if (newName) {
                        row.querySelector('.company-cell').lastChild.textContent = ' ' + newName;
                        row.dataset.name = newName.toLowerCase();
                    }
                }

                if (button.title === 'Delete') {
                    if (confirm('Delete this company?')) {
                        row.remove();
                        filterCompanies();
                    }
                }
            });
        });
</script>
@endpush


