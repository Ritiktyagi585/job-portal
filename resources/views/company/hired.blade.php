@extends('company.layouts.app')

@section('title', 'Hired Candidates - OnlyFreshers')
@section('pageTitle', 'Hired Candidates')
@section('pageSubtitle', 'View and manage all candidates you have hired.')

@php
    $activePage = 'hired';

    $hires = [
        ['name' => 'Rohit Kumar', 'email' => 'rohit.kumar@email.com', 'job' => 'Full Stack Developer', 'department' => 'Engineering', 'date' => '03 Jun 2024', 'package' => '₹ 6.00 LPA', 'status' => 'Active', 'avatar' => 'RK'],
        ['name' => 'Priya Singh', 'email' => 'priya.singh@email.com', 'job' => 'Full Stack Developer', 'department' => 'Engineering', 'date' => '04 Jun 2024', 'package' => '₹ 5.50 LPA', 'status' => 'Active', 'avatar' => 'PS'],
        ['name' => 'Aman Sharma', 'email' => 'aman.sharma@email.com', 'job' => 'React Developer', 'department' => 'Engineering', 'date' => '06 Jun 2024', 'package' => '₹ 6.25 LPA', 'status' => 'Active', 'avatar' => 'AS'],
        ['name' => 'Sneha Patel', 'email' => 'sneha.patel@email.com', 'job' => 'UI/UX Designer', 'department' => 'Design', 'date' => '07 Jun 2024', 'package' => '₹ 4.80 LPA', 'status' => 'Active', 'avatar' => 'SP'],
        ['name' => 'Karan Mehta', 'email' => 'karan.mehta@email.com', 'job' => 'Backend Developer', 'department' => 'Engineering', 'date' => '08 Jun 2024', 'package' => '₹ 6.00 LPA', 'status' => 'Active', 'avatar' => 'KM'],
        ['name' => 'Anjali Verma', 'email' => 'anjali.verma@email.com', 'job' => 'UI/UX Designer', 'department' => 'Design', 'date' => '10 Jun 2024', 'package' => '₹ 4.75 LPA', 'status' => 'Active', 'avatar' => 'AV'],
    ];

    $jobs = ['All Jobs', 'Full Stack Developer', 'React Developer', 'UI/UX Designer', 'Backend Developer'];
    $departments = ['All Departments', 'Engineering', 'Design'];
@endphp

@push('styles')
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
        .card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 26px; }
        .filters { display: grid; grid-template-columns: 1fr 220px 220px 120px; gap: 18px; margin-bottom: 26px; }
        input, select, .filter-button { height: 42px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 16px; font-size: 13px; outline: none; box-sizing: border-box; }
        .filter-button { color: #075fe4; font-weight: 700; cursor: pointer; }
        .table-wrap { border: 1px solid #dce7f8; border-radius: 8px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { height: 52px; padding: 0 16px; color: #24344f; font-size: 12px; text-align: left; border-bottom: 1px solid #dce7f8; }
        td { padding: 18px 16px; font-size: 13px; border-bottom: 1px solid #edf2fb; vertical-align: middle; }
        tr:last-child td { border-bottom: 0; }
        .candidate { display: flex; align-items: center; gap: 12px; }
        .avatar { width: 46px; height: 46px; background: #eaf2ff; color: #075fe4; font-size: 12px; }
        .candidate h3 { margin: 0 0 6px; font-size: 13px; font-weight: 700; }
        .candidate p { margin: 0; color: #52607a; font-size: 12px; }
        .status { display: inline-flex; align-items: center; justify-content: center; min-width: 62px; height: 30px; border-radius: 8px; color: #00a65a; background: #dbf8e9; font-size: 12px; font-weight: 700; }
        .dots { border: 0; background: transparent; font-size: 22px; line-height: 1; cursor: pointer; color: #061942; }
        .footer-row { display: flex; align-items: center; justify-content: space-between; margin-top: 18px; color: #24344f; font-size: 13px; }
        .pages { display: flex; gap: 10px; align-items: center; }
        .page-btn { min-width: 38px; height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; cursor: pointer; font-weight: 700; }
        .page-btn.active { background: #075fe4; color: white; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .filters { grid-template-columns: 1fr 1fr; } .table-wrap { overflow-x: auto; } table { min-width: 900px; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .footer-row { flex-direction: column; align-items: flex-start; } .company-menu, .filters { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
<section class="card">
                <div class="filters">
                    <input id="searchInput" placeholder="Search by name or job role...">
                    <select id="jobFilter">
                        @foreach ($jobs as $job)
                            <option>{{ $job }}</option>
                        @endforeach
                    </select>
                    <select id="departmentFilter">
                        @foreach ($departments as $department)
                            <option>{{ $department }}</option>
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
                                <th>Department</th>
                                <th>Date of Joining</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hires as $hire)
                                <tr class="hire-row" data-name="{{ strtolower($hire['name'].' '.$hire['job']) }}" data-job="{{ $hire['job'] }}" data-department="{{ $hire['department'] }}">
                                    <td>
                                        <div class="candidate">
                                            <div class="avatar">{{ $hire['avatar'] }}</div>
                                            <div>
                                                <h3>{{ $hire['name'] }}</h3>
                                                <p>{{ $hire['email'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $hire['job'] }}</td>
                                    <td>{{ $hire['department'] }}</td>
                                    <td>{{ $hire['date'] }}</td>
                                    <td>{{ $hire['package'] }}</td>
                                    <td><span class="status">{{ $hire['status'] }}</span></td>
                                    <td><button class="dots" type="button">⋮</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="footer-row">
                    <span id="resultText">Showing 1 to 6 of 6 hired candidates</span>
                    <div class="pages">
                        <button class="page-btn">‹</button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">›</button>
                    </div>
                </div>
            </section>
@endsection

@push('scripts')
<script>
const searchInput = document.getElementById('searchInput');
        const jobFilter = document.getElementById('jobFilter');
        const departmentFilter = document.getElementById('departmentFilter');
        const rows = document.querySelectorAll('.hire-row');
        const resultText = document.getElementById('resultText');

        function filterHires() {
            const search = searchInput.value.toLowerCase();
            const job = jobFilter.value;
            const department = departmentFilter.value;
            let count = 0;

            rows.forEach(function (row) {
                const matchSearch = row.dataset.name.includes(search);
                const matchJob = job === 'All Jobs' || row.dataset.job === job;
                const matchDepartment = department === 'All Departments' || row.dataset.department === department;
                const show = matchSearch && matchJob && matchDepartment;
                row.style.display = show ? '' : 'none';
                if (show) count++;
            });

            resultText.textContent = 'Showing 1 to ' + count + ' of 6 hired candidates';
        }

        searchInput.addEventListener('input', filterHires);
        jobFilter.addEventListener('change', filterHires);
        departmentFilter.addEventListener('change', filterHires);
</script>
@endpush

