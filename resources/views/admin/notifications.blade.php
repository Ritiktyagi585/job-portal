@extends('admin.layouts.app')

@section('title', 'Notifications - OnlyFreshers Admin')
@section('pageTitle', 'Notifications')
@section('breadcrumb', 'Dashboard > Notifications')
@section('topbarExtra')
    <button class="add-button" type="button">+ New Notification</button>
@endsection

@php
    $activePage = 'notifications';

    $notifications = [
        ['title' => 'New Courses Added', 'send_to' => 'All Users', 'sent_on' => '31 May 2025, 10:30 AM', 'status' => 'Sent'],
        ['title' => 'Maintenance Update', 'send_to' => 'All Users', 'sent_on' => '30 May 2025, 09:15 AM', 'status' => 'Sent'],
        ['title' => 'Upcoming Webinar', 'send_to' => 'Active Users', 'sent_on' => '29 May 2025, 04:45 PM', 'status' => 'Sent'],
        ['title' => 'Job Fair 2025', 'send_to' => 'All Users', 'sent_on' => '28 May 2025, 11:00 AM', 'status' => 'Sent'],
        ['title' => 'System Update', 'send_to' => 'Admin Only', 'sent_on' => '27 May 2025, 08:30 PM', 'status' => 'Draft'],
    ];
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
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 24px; gap: 20px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 14px; font-size: 30px; font-weight: 600; }
        .breadcrumb { color: #52607a; font-size: 15px; }
        .add-button { height: 42px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 22px; font-size: 14px; font-weight: 600; cursor: pointer; margin-top: 40px; }
        .user-button { position: absolute; top: 0; right: 0; width: 46px; height: 46px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .user-button svg { width: 23px; height: 23px; stroke-width: 2; }
        .table-box { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); overflow: hidden; }
        .toolbar { padding: 18px; border-bottom: 1px solid #edf2fb; }
        .search-wrap { position: relative; width: 330px; }
        .search-wrap svg { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 17px; height: 17px; color: #33466b; stroke-width: 2; }
        .search-field { width: 100%; height: 42px; border: 1px solid #dce7f8; border-radius: 7px; padding: 0 42px 0 14px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { padding: 16px 22px; border-bottom: 1px solid #edf2fb; text-align: left; }
        th { color: #24344f; font-weight: 600; background: #fbfdff; font-size: 13px; }
        td { color: #1b315b; }
        .title-cell { color: #061942; font-weight: 600; }
        .status { display: inline-block; padding: 7px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; }
        .status.sent { color: #009b52; background: #dff8ed; }
        .status.draft { color: #24344f; background: #eef2f8; }
        .action-button { width: 34px; height: 34px; border: 0; border-radius: 7px; color: #075fe4; background: #eef5ff; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .action-button svg { width: 17px; height: 17px; stroke-width: 2.2; }
        .result-text { padding: 16px 22px; color: #52607a; font-size: 14px; }
        .hidden { display: none; }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } .table-box { overflow-x: auto; } table { min-width: 850px; } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .menu { grid-template-columns: 1fr; } .search-wrap { width: 100%; } }
</style>
@endpush

@section('content')


            <section class="table-box">
                <div class="toolbar">
                    <div class="search-wrap">
                        <input id="notificationSearch" class="search-field" type="text" placeholder="Search notification...">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3-3"></path></svg>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Send To</th>
                            <th>Sent On</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $index => $notification)
                            <tr class="notification-row"
                                data-title="{{ strtolower($notification['title']) }}"
                                data-send="{{ strtolower($notification['send_to']) }}"
                                data-status="{{ strtolower($notification['status']) }}">
                                <td>{{ $index + 1 }}</td>
                                <td class="title-cell">{{ $notification['title'] }}</td>
                                <td>{{ $notification['send_to'] }}</td>
                                <td>{{ $notification['sent_on'] }}</td>
                                <td><span class="status {{ strtolower($notification['status']) }}">{{ $notification['status'] }}</span></td>
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

                <div id="resultText" class="result-text">Showing {{ count($notifications) }} notifications</div>
            </section>
@endsection

@push('scripts')
<script>
const notificationSearch = document.getElementById('notificationSearch');
        const notificationRows = document.querySelectorAll('.notification-row');
        const resultText = document.getElementById('resultText');

        function filterNotifications() {
            const searchText = notificationSearch.value.toLowerCase();
            let visibleCount = 0;

            notificationRows.forEach(function (row) {
                const shouldShow = row.dataset.title.includes(searchText) || row.dataset.send.includes(searchText) || row.dataset.status.includes(searchText);
                row.classList.toggle('hidden', !shouldShow);

                if (shouldShow) {
                    visibleCount++;
                }
            });

            resultText.textContent = 'Showing ' + visibleCount + ' notifications';
        }

        notificationSearch.addEventListener('input', filterNotifications);
</script>
@endpush


