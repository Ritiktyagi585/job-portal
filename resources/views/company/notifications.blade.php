@extends('company.layouts.app')

@section('title', 'Notifications - OnlyFreshers')
@section('pageTitle', 'Notifications')
@section('pageSubtitle', 'Stay updated with the latest activities and alerts.')

@php
    $activePage = 'notifications';
    $notifications = [
        ['title' => 'New application received', 'text' => 'Ananya Gupta has applied for Full Stack Developer position.', 'type' => 'applications', 'time' => '2 min ago', 'read' => false, 'icon' => 'AP'],
        ['title' => 'New job application', 'text' => 'Rohit Kumar applied for React Developer position.', 'type' => 'applications', 'time' => '18 min ago', 'read' => false, 'icon' => 'AP'],
        ['title' => 'Interview scheduled', 'text' => 'Interview for Priya Singh is scheduled on 25 May 2024.', 'type' => 'interviews', 'time' => '1 hour ago', 'read' => false, 'icon' => 'IN'],
        ['title' => 'Candidate shortlisted', 'text' => 'Aman Sharma has been shortlisted for React Developer position.', 'type' => 'applications', 'time' => '3 hours ago', 'read' => true, 'icon' => 'SH'],
        ['title' => 'New message received', 'text' => 'You have received a new message from Sneha Patel.', 'type' => 'system', 'time' => '1 day ago', 'read' => true, 'icon' => 'MS'],
        ['title' => 'Package expiring soon', 'text' => 'Your Premium Plan package will expire in 5 days.', 'type' => 'system', 'time' => '2 days ago', 'read' => true, 'icon' => 'PK'],
        ['title' => 'System update', 'text' => 'System maintenance scheduled on 28 May 2024 from 02:00 AM to 04:00 AM.', 'type' => 'system', 'time' => '3 days ago', 'read' => true, 'icon' => 'SY'],
        ['title' => 'Interview reminder', 'text' => 'Backend Developer interview starts tomorrow at 11:00 AM.', 'type' => 'interviews', 'time' => '4 days ago', 'read' => true, 'icon' => 'IN'],
    ];
    $unread = collect($notifications)->where('read', false)->count();
    $applications = collect($notifications)->where('type', 'applications')->count();
    $interviews = collect($notifications)->where('type', 'interviews')->count();
    $system = collect($notifications)->where('type', 'system')->count();
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
        .company-avatar, .top-avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .company-avatar { width: 34px; height: 34px; }
        .company-account h3 { margin: 0 0 4px; font-size: 14px; font-weight: 700; }
        .company-account p { margin: 0; color: #075fe4; font-size: 12px; }
        .company-account button { margin-left: auto; border: 0; background: transparent; color: #061942; cursor: pointer; font-size: 18px; }
        .main { padding: 0 38px 38px; box-sizing: border-box; }
        .topbar { min-height: 100px; display: flex; align-items: center; justify-content: space-between; gap: 24px; margin-bottom: 24px; }
        .page-title h1 { margin: 0 0 8px; font-size: 22px; font-weight: 700; }
        .page-title p { margin: 0; color: #24344f; font-size: 12px; }
        .top-actions { display: flex; align-items: center; gap: 14px; }
        .period { height: 38px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #061942; padding: 0 14px; font-size: 12px; font-weight: 700; outline: none; }
        .top-avatar { width: 42px; height: 42px; background: #eaf2ff; color: #075fe4; font-size: 13px; }
        .card { background: white; border: 1px solid #dce7f8; border-radius: 8px; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); overflow: hidden; }
        .tabs { display: flex; align-items: center; gap: 20px; padding: 16px 22px 0; border-bottom: 1px solid #dce7f8; }
        .tab { border: 0; background: transparent; color: #24344f; padding: 0 0 14px; font-size: 13px; cursor: pointer; border-bottom: 3px solid transparent; }
        .tab.active { color: #075fe4; font-weight: 700; border-bottom-color: #075fe4; }
        .mark-read { margin-left: auto; height: 38px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 18px; font-size: 12px; font-weight: 700; cursor: pointer; }
        .notification { display: grid; grid-template-columns: 16px 58px 1fr 110px 28px; align-items: center; gap: 14px; padding: 18px 22px; border-bottom: 1px solid #edf2fb; }
        .notification:last-child { border-bottom: 0; }
        .dot { width: 9px; height: 9px; border-radius: 50%; background: #075fe4; }
        .notification.read .dot { background: transparent; }
        .notice-icon { width: 48px; height: 48px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; }
        .notification[data-type="interviews"] .notice-icon { background: #eef9f2; color: #00a65a; }
        .notification[data-type="system"] .notice-icon { background: #fff4df; color: #ff9800; }
        .notice-text h3 { margin: 0 0 7px; font-size: 13px; font-weight: 700; }
        .notice-text p { margin: 0 0 7px; color: #334b83; font-size: 12px; line-height: 1.4; }
        .tag { display: inline-flex; border-radius: 5px; background: #eaf2ff; color: #075fe4; padding: 4px 9px; font-size: 11px; text-transform: capitalize; }
        .notification[data-type="interviews"] .tag { background: #e9f9ef; color: #00a65a; }
        .notification[data-type="system"] .tag { background: #fff1dc; color: #ff9800; }
        .time { color: #334b83; font-size: 12px; text-align: right; }
        .menu-btn { border: 0; background: transparent; color: #075fe4; font-size: 20px; cursor: pointer; line-height: 1; }
        .footer { display: flex; justify-content: space-between; align-items: center; padding: 16px 22px; border-top: 1px solid #edf2fb; color: #334b83; font-size: 12px; }
        .pager { display: flex; gap: 10px; }
        .page-btn { width: 34px; height: 34px; border: 1px solid #dce7f8; background: white; border-radius: 7px; color: #061942; cursor: pointer; font-weight: 700; }
        .page-btn.active { background: #075fe4; color: white; border-color: #075fe4; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 760px) { .main { padding: 0 14px 24px; } .topbar, .footer { flex-direction: column; align-items: flex-start; } .tabs { flex-wrap: wrap; } .mark-read { margin-left: 0; } .notification { grid-template-columns: 12px 44px 1fr; } .time, .menu-btn { display: none; } .company-menu { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')
<section class="card">
                <div class="tabs">
                    <button class="tab active" type="button" data-filter="all">All ({{ count($notifications) }})</button>
                    <button class="tab" type="button" data-filter="unread">Unread ({{ $unread }})</button>
                    <button class="tab" type="button" data-filter="applications">Applications ({{ $applications }})</button>
                    <button class="tab" type="button" data-filter="interviews">Interviews ({{ $interviews }})</button>
                    <button class="tab" type="button" data-filter="system">System ({{ $system }})</button>
                    <button class="mark-read" type="button" id="markRead">Mark all as read</button>
                </div>

                <div id="notificationList">
                    @foreach ($notifications as $notice)
                        <article class="notification {{ $notice['read'] ? 'read' : '' }}" data-type="{{ $notice['type'] }}" data-read="{{ $notice['read'] ? 'true' : 'false' }}">
                            <span class="dot"></span>
                            <span class="notice-icon">{{ $notice['icon'] }}</span>
                            <div class="notice-text">
                                <h3>{{ $notice['title'] }}</h3>
                                <p>{{ $notice['text'] }}</p>
                                <span class="tag">{{ $notice['type'] }}</span>
                            </div>
                            <span class="time">{{ $notice['time'] }}</span>
                            <button class="menu-btn" type="button">...</button>
                        </article>
                    @endforeach
                </div>

                <div class="footer">
                    <span id="showingText">Showing 1 to {{ count($notifications) }} of {{ count($notifications) }} notifications</span>
                    <div class="pager">
                        <button class="page-btn" type="button">&lt;</button>
                        <button class="page-btn active" type="button">1</button>
                        <button class="page-btn" type="button">2</button>
                        <button class="page-btn" type="button">3</button>
                        <button class="page-btn" type="button">&gt;</button>
                    </div>
                </div>
            </section>
@endsection

@push('scripts')
<script>
const tabs = document.querySelectorAll('.tab');
        const notices = document.querySelectorAll('.notification');
        const showingText = document.getElementById('showingText');

        function applyFilter(filter) {
            let count = 0;
            notices.forEach(function (notice) {
                const match = filter === 'all' || notice.dataset.type === filter || (filter === 'unread' && notice.dataset.read === 'false');
                notice.style.display = match ? 'grid' : 'none';
                if (match) count++;
            });
            showingText.textContent = 'Showing 1 to ' + count + ' of ' + count + ' notifications';
        }

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                tabs.forEach(function (item) { item.classList.remove('active'); });
                tab.classList.add('active');
                applyFilter(tab.dataset.filter);
            });
        });

        document.getElementById('markRead').addEventListener('click', function () {
            notices.forEach(function (notice) {
                notice.classList.add('read');
                notice.dataset.read = 'true';
            });
            alert('All notifications marked as read.');
            applyFilter(document.querySelector('.tab.active').dataset.filter);
        });
</script>
@endpush

