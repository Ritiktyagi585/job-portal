@extends('admin.layouts.app')

@section('title', 'Courses - OnlyFreshers Admin')
@section('pageTitle', 'Courses')
@section('breadcrumb', 'Dashboard > Courses')
@section('topbarExtra')
    <button class="add-button" type="button">+ Add Course</button>
@endsection

@php
    $activePage = 'courses';

    $stats = [
        ['title' => 'Total Courses', 'value' => '48', 'change' => '12%', 'type' => 'up', 'icon' => 'book'],
        ['title' => 'Active Courses', 'value' => '36', 'change' => '15%', 'type' => 'up', 'icon' => 'bookmark'],
        ['title' => 'Inactive Courses', 'value' => '12', 'change' => '10%', 'type' => 'down', 'icon' => 'book-x'],
        ['title' => 'New This Month', 'value' => '8', 'change' => '20%', 'type' => 'up', 'icon' => 'plus'],
    ];

    $categories = ['All', 'Development', 'Data Science', 'Design', 'Marketing', 'Cloud', 'Analytics'];
    $statuses = ['All', 'Active', 'Inactive'];
    $trainingPartnerNames = ['All', 'CodeVista Academy', 'Skillance Learning', 'DataVance Academy', 'CloudKnot Technologies', 'Logixperts Institute'];
    $courses = [
        ['name' => 'Full Stack Development', 'category' => 'Development', 'partner' => 'CodeVista Academy', 'duration' => '6 Months', 'students' => 320, 'status' => 'Active', 'color' => '#075fe4', 'mark' => 'code'],
        ['name' => 'Data Science with Python', 'category' => 'Data Science', 'partner' => 'DataVance Academy', 'duration' => '4 Months', 'students' => 280, 'status' => 'Active', 'color' => '#7c4fe8', 'mark' => 'chart'],
        ['name' => 'UI/UX Design', 'category' => 'Design', 'partner' => 'Skillance Learning', 'duration' => '3 Months', 'students' => 210, 'status' => 'Active', 'color' => '#f0529b', 'mark' => 'pen'],
        ['name' => 'Digital Marketing', 'category' => 'Marketing', 'partner' => 'Logixperts Institute', 'duration' => '3 Months', 'students' => 185, 'status' => 'Inactive', 'color' => '#ff8a1f', 'mark' => 'megaphone'],
        ['name' => 'Python Programming', 'category' => 'Development', 'partner' => 'CodeVista Academy', 'duration' => '4 Months', 'students' => 260, 'status' => 'Active', 'color' => '#f2b400', 'mark' => 'python'],
        ['name' => 'Machine Learning', 'category' => 'Data Science', 'partner' => 'DataVance Academy', 'duration' => '6 Months', 'students' => 150, 'status' => 'Inactive', 'color' => '#22bdb1', 'mark' => 'brain'],
        ['name' => 'Cloud Computing', 'category' => 'Cloud', 'partner' => 'CloudKnot Technologies', 'duration' => '4 Months', 'students' => 130, 'status' => 'Active', 'color' => '#2d7df0', 'mark' => 'cloud'],
        ['name' => 'Business Analytics', 'category' => 'Analytics', 'partner' => 'DataVance Academy', 'duration' => '3 Months', 'students' => 110, 'status' => 'Active', 'color' => '#845ef7', 'mark' => 'chart'],
    ];
    $totalCourses = 48;
    $perPage = 8;
    $totalPages = (int) ceil($totalCourses / $perPage);
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
        .menu-icon, .card-icon, .profile-icon, .course-icon { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg, .user-button svg, .card-icon svg, .search-wrap svg, .action-button svg, .course-icon svg { fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; }
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
        .filter-box { padding: 18px; margin-bottom: 14px; display: grid; grid-template-columns: 1.6fr 1fr 1fr 1fr auto; gap: 22px; align-items: end; }
        .field-group label { display: block; margin-bottom: 8px; color: #061942; font-size: 13px; font-weight: 600; }
        .search-wrap { position: relative; }
        .search-wrap svg { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: #33466b; stroke-width: 2; }
        .field { width: 100%; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        input.field { padding: 0 42px 0 14px; }
        select.field { padding: 0 14px; }
        .reset-button { height: 44px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #24344f; padding: 0 20px; font-weight: 600; }
        .table-box { overflow: hidden; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 15px 18px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; }
        td { color: #1b315b; }
        .course-cell { display: flex; align-items: center; gap: 14px; color: #061942; font-weight: 600; }
        .course-icon { width: 34px; height: 34px; border-radius: 7px; color: white; }
        .course-icon svg { width: 18px; height: 18px; stroke-width: 2.2; }
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
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } .filter-box { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 1080px; } }
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
                                @elseif ($stat['icon'] === 'book-x')
                                    <svg viewBox="0 0 24 24"><path d="M4 5h7a3 3 0 0 1 3 3v11a3 3 0 0 0-3-3H4z"></path><path d="M20 5h-7a3 3 0 0 0-3 3v11a3 3 0 0 1 3-3h7z"></path><path d="M14 10l4 4M18 10l-4 4"></path></svg>
                                @elseif ($stat['icon'] === 'bookmark')
                                    <svg viewBox="0 0 24 24"><path d="M6 4h12v17l-6-4-6 4z"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><path d="M4 5h7a3 3 0 0 1 3 3v11a3 3 0 0 0-3-3H4z"></path><path d="M20 5h-7a3 3 0 0 0-3 3v11a3 3 0 0 1 3-3h7z"></path></svg>
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
                        <input id="courseSearch" class="field" type="text" placeholder="Search by course name or category...">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                    </div>
                </div>
                <div class="field-group">
                    <label>Category</label>
                    <select id="categoryFilter" class="field">
                        @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
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
                    <label>Training Partner</label>
                    <select id="partnerFilter" class="field">
                        @foreach ($trainingPartnerNames as $partnerName)
                            <option value="{{ $partnerName }}">{{ $partnerName }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="resetFilters" class="reset-button" type="button">Reset</button>
            </section>

            <section class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Category</th>
                            <th>Training Partner</th>
                            <th>Duration</th>
                            <th>Enrolled Students</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $index => $course)
                            <tr class="course-row"
                                data-name="{{ strtolower($course['name']) }}"
                                data-category="{{ $course['category'] }}"
                                data-partner="{{ $course['partner'] }}"
                                data-status="{{ $course['status'] }}">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="course-cell">
                                        <span class="course-icon" style="background: {{ $course['color'] }}">
                                            @if ($course['mark'] === 'chart')
                                                <svg viewBox="0 0 24 24"><path d="M5 19V13"></path><path d="M12 19V9"></path><path d="M19 19V5"></path><path d="M3 19h18"></path></svg>
                                            @elseif ($course['mark'] === 'pen')
                                                <svg viewBox="0 0 24 24"><path d="M4 20h4l11-11-4-4L4 16v4z"></path><path d="M13.5 6.5l4 4"></path></svg>
                                            @elseif ($course['mark'] === 'megaphone')
                                                <svg viewBox="0 0 24 24"><path d="M4 14h4l10 4V6L8 10H4z"></path><path d="M8 14v5"></path></svg>
                                            @elseif ($course['mark'] === 'python')
                                                <svg viewBox="0 0 24 24"><path d="M8 8h7a3 3 0 0 1 0 6H9a3 3 0 0 0 0 6h7"></path><path d="M8 4v8M16 12v8"></path></svg>
                                            @elseif ($course['mark'] === 'brain')
                                                <svg viewBox="0 0 24 24"><path d="M8 5a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4"></path><path d="M16 5a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4"></path><path d="M8 5v14M16 5v14M8 12h8"></path></svg>
                                            @elseif ($course['mark'] === 'cloud')
                                                <svg viewBox="0 0 24 24"><path d="M7 18h11a4 4 0 0 0 0-8 6 6 0 0 0-11.5-1.5A4.5 4.5 0 0 0 7 18z"></path></svg>
                                            @else
                                                <svg viewBox="0 0 24 24"><path d="M8 9l-4 3 4 3"></path><path d="M16 9l4 3-4 3"></path><path d="M14 5l-4 14"></path></svg>
                                            @endif
                                        </span>
                                        {{ $course['name'] }}
                                    </div>
                                </td>
                                <td>{{ $course['category'] }}</td>
                                <td>{{ $course['partner'] }}</td>
                                <td>{{ $course['duration'] }}</td>
                                <td>{{ $course['students'] }}</td>
                                <td><span class="status {{ strtolower($course['status']) }}">{{ $course['status'] }}</span></td>
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
                    <span id="resultText">Showing 1 to {{ $perPage }} of {{ $totalCourses }} results</span>
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
const courseSearch = document.getElementById('courseSearch');
        const categoryFilter = document.getElementById('categoryFilter');
        const statusFilter = document.getElementById('statusFilter');
        const partnerFilter = document.getElementById('partnerFilter');
        const resetFilters = document.getElementById('resetFilters');
        const courseRows = document.querySelectorAll('.course-row');
        const resultText = document.getElementById('resultText');

        function filterCourses() {
            const searchText = courseSearch.value.toLowerCase();
            const selectedCategory = categoryFilter.value;
            const selectedStatus = statusFilter.value;
            const selectedPartner = partnerFilter.value;
            let visibleCount = 0;

            courseRows.forEach(function (row) {
                const matchesSearch = row.dataset.name.includes(searchText) || row.dataset.category.toLowerCase().includes(searchText);
                const matchesCategory = selectedCategory === 'All' || row.dataset.category === selectedCategory;
                const matchesStatus = selectedStatus === 'All' || row.dataset.status === selectedStatus;
                const matchesPartner = selectedPartner === 'All' || row.dataset.partner === selectedPartner;
                const shouldShow = matchesSearch && matchesCategory && matchesStatus && matchesPartner;

                row.classList.toggle('hidden', !shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing 1 to ' + visibleCount + ' of {{ $totalCourses }} results';
        }

        courseSearch.addEventListener('input', filterCourses);
        categoryFilter.addEventListener('change', filterCourses);
        statusFilter.addEventListener('change', filterCourses);
        partnerFilter.addEventListener('change', filterCourses);

        resetFilters.addEventListener('click', function () {
            courseSearch.value = '';
            categoryFilter.value = 'All';
            statusFilter.value = 'All';
            partnerFilter.value = 'All';
            filterCourses();
        });

        document.querySelectorAll('.action-button').forEach(function (button) {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                const name = row.querySelector('.course-cell').innerText.trim();

                if (button.title === 'View') {
                    alert('Course Details: ' + name);
                }

                if (button.title === 'Edit') {
                    const newName = prompt('Edit course name', name);
                    if (newName) {
                        row.querySelector('.course-cell').lastChild.textContent = ' ' + newName;
                        row.dataset.name = newName.toLowerCase();
                    }
                }

                if (button.title === 'Delete') {
                    if (confirm('Delete this course?')) {
                        row.remove();
                        filterCourses();
                    }
                }
            });
        });
</script>
@endpush

