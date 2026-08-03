@extends('admin.layouts.app')

@section('title', 'Settings - OnlyFreshers Admin')
@section('pageTitle', 'Settings')
@section('breadcrumb', 'Dashboard > Settings')
@section('topbarExtra')
    <button class="save-button" type="button">Save Changes</button>
@endsection

@php
    $activePage = 'settings';

    $settingTabs = [
        ['title' => 'General Settings', 'icon' => 'gear'],
        ['title' => 'Site Settings', 'icon' => 'globe'],
        ['title' => 'Email Settings', 'icon' => 'mail'],
        ['title' => 'Page Settings', 'icon' => 'card'],
        ['title' => 'Security Settings', 'icon' => 'shield'],
        ['title' => 'Notification Settings', 'icon' => 'bell'],
        ['title' => 'Manage Roles', 'icon' => 'users'],
        ['title' => 'Backup & Restore', 'icon' => 'cloud'],
    ];

    $textSettings = [
        ['label' => 'Platform Name', 'value' => 'Only Freshers', 'type' => 'text'],
        ['label' => 'Platform Tagline', 'value' => 'Accelerate Your Career', 'type' => 'text'],
        ['label' => 'Admin Email', 'value' => 'admin@onlyfreshers.com', 'type' => 'email'],
        ['label' => 'Support Email', 'value' => 'support@onlyfreshers.com', 'type' => 'email'],
        ['label' => 'Contact Number', 'value' => '+91 98765 43210', 'type' => 'text'],
        ['label' => 'Website URL', 'value' => 'https://www.onlyfreshers.com', 'type' => 'url'],
    ];

    $selectSettings = [
        ['label' => 'Time Zone', 'options' => ['(UTC +05:30) India Standard Time', '(UTC +00:00) Greenwich Mean Time', '(UTC -05:00) Eastern Time']],
        ['label' => 'Date Format', 'options' => ['DD MMM, YYYY', 'MM/DD/YYYY', 'YYYY-MM-DD']],
    ];

    $toggleSettings = [
        ['title' => 'Maintenance Mode', 'text' => 'Enable maintenance mode to restrict access to the platform.', 'checked' => false],
        ['title' => 'Registration', 'text' => 'Allow new users to register on the platform.', 'checked' => true],
        ['title' => 'Email Verification', 'text' => 'Require email verification for new user registration.', 'checked' => true],
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
        .menu-icon, .profile-icon, .tab-icon { display: flex; align-items: center; justify-content: center; color: #075fe4; background: #eaf2ff; font-weight: 700; flex-shrink: 0; }
        .menu-icon { width: 28px; height: 28px; border-radius: 7px; }
        .menu-icon svg { width: 17px; height: 17px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .admin-profile { display: flex; align-items: center; gap: 12px; padding: 14px 2px 0; }
        .profile-icon { width: 48px; height: 48px; border-radius: 50%; }
        .profile-icon svg, .user-button svg, .tab-icon svg, .save-button svg { fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; }
        .profile-icon svg { width: 24px; height: 24px; stroke-width: 2; }
        .admin-profile h3 { margin: 0 0 4px; font-size: 15px; font-weight: 600; }
        .admin-profile p { margin: 0; color: #52607a; font-size: 13px; }
        .main { padding: 34px 28px; box-sizing: border-box; }
        .page-top { position: relative; display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 28px; gap: 20px; padding-right: 62px; }
        .page-title h1 { margin: 0 0 14px; font-size: 30px; font-weight: 600; }
        .breadcrumb { color: #52607a; font-size: 15px; }
        .save-button { height: 42px; border: 0; border-radius: 7px; background: #075fe4; color: white; padding: 0 22px; font-size: 14px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px; margin-top: 40px; }
        .save-button svg { width: 18px; height: 18px; stroke-width: 2; }
        .user-button { position: absolute; top: 0; right: 0; width: 46px; height: 46px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; }
        .user-button svg { width: 23px; height: 23px; stroke-width: 2; }
        .settings-card { display: grid; grid-template-columns: 260px 1fr; border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 12px 25px rgba(6, 25, 66, 0.04); overflow: hidden; min-height: 680px; }
        .settings-tabs { padding: 20px; border-right: 1px solid #dce7f8; }
        .settings-tab { width: 100%; border: 0; background: white; color: #061942; border-radius: 7px; padding: 14px 12px; display: flex; align-items: center; gap: 16px; font-size: 15px; font-weight: 700; text-align: left; cursor: pointer; }
        .settings-tab.active { background: #eaf2ff; color: #075fe4; }
        .tab-icon { width: 28px; height: 28px; border-radius: 7px; background: transparent; }
        .tab-icon svg { width: 18px; height: 18px; stroke-width: 2.2; }
        .settings-content { padding: 30px; }
        .settings-content h2 { margin: 0 0 12px; font-size: 22px; font-weight: 600; }
        .settings-content .intro { margin: 0 0 34px; color: #52607a; font-size: 15px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px 30px; }
        .field-group label { display: block; margin-bottom: 9px; color: #061942; font-size: 14px; font-weight: 700; }
        .field { width: 100%; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; padding: 0 14px; color: #24344f; background: white; box-sizing: border-box; font-weight: 500; }
        .divider { height: 1px; background: #edf2fb; margin: 34px 0 0; }
        .toggle-list { margin-top: 18px; }
        .toggle-row { display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 22px 0; border-bottom: 1px solid #edf2fb; }
        .toggle-row h3 { margin: 0 0 7px; font-size: 14px; font-weight: 700; }
        .toggle-row p { margin: 0; color: #24344f; font-size: 14px; }
        .switch { position: relative; display: inline-flex; width: 44px; height: 24px; flex-shrink: 0; }
        .switch input { display: none; }
        .slider { position: absolute; inset: 0; cursor: pointer; background: #cfd8e8; border-radius: 20px; transition: 0.2s; }
        .slider::before { content: ""; position: absolute; width: 20px; height: 20px; left: 2px; top: 2px; background: white; border-radius: 50%; transition: 0.2s; box-shadow: 0 2px 8px rgba(6, 25, 66, 0.2); }
        .switch input:checked + .slider { background: #075fe4; }
        .switch input:checked + .slider::before { transform: translateX(20px); }
        @media (max-width: 1000px) { .settings-card { grid-template-columns: 1fr; } .settings-tabs { border-right: 0; border-bottom: 1px solid #dce7f8; display: grid; grid-template-columns: repeat(2, 1fr); gap: 8px; } }
        @media (max-width: 900px) { .admin-layout { grid-template-columns: 1fr; } .menu { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .main { padding: 24px 16px; } .page-top { flex-direction: column; } .form-grid, .settings-tabs, .menu { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')


            <section class="settings-card">
                <aside class="settings-tabs">
                    @foreach ($settingTabs as $index => $tab)
                        <button class="settings-tab {{ $index === 0 ? 'active' : '' }}" type="button">
                            <span class="tab-icon">
                                @if ($tab['icon'] === 'globe')
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"></path></svg>
                                @elseif ($tab['icon'] === 'mail')
                                    <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg>
                                @elseif ($tab['icon'] === 'card')
                                    <svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M3 10h18"></path></svg>
                                @elseif ($tab['icon'] === 'shield')
                                    <svg viewBox="0 0 24 24"><path d="M12 3l8 4v6c0 5-3.5 8-8 8s-8-3-8-8V7l8-4z"></path><path d="M9 12l2 2 4-4"></path></svg>
                                @elseif ($tab['icon'] === 'bell')
                                    <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                                @elseif ($tab['icon'] === 'users')
                                    <svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"></circle><path d="M3 19c0-3 2.5-5 6-5"></path><circle cx="17" cy="9" r="2.5"></circle><path d="M14 19c0-2.4 1.8-4 4-4"></path></svg>
                                @elseif ($tab['icon'] === 'cloud')
                                    <svg viewBox="0 0 24 24"><path d="M7 18h11a4 4 0 0 0 0-8 6 6 0 0 0-11.5-1.5A4.5 4.5 0 0 0 7 18z"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19 12a7 7 0 0 0-.1-1l2-1.5-2-3.5-2.4 1a7 7 0 0 0-1.7-1L14.5 3h-5l-.4 3a7 7 0 0 0-1.7 1L5 6 3 9.5 5 11a7 7 0 0 0 0 2l-2 1.5L5 18l2.4-1a7 7 0 0 0 1.7 1l.4 3h5l.4-3a7 7 0 0 0 1.7-1L19 18l2-3.5-2-1.5a7 7 0 0 0 .1-1z"></path></svg>
                                @endif
                            </span>
                            {{ $tab['title'] }}
                        </button>
                    @endforeach
                </aside>

                <div class="settings-content">
                    <h2>General Settings</h2>
                    <p class="intro">Update your platform general settings and preferences.</p>

                    <div class="form-grid">
                        @foreach ($textSettings as $setting)
                            <div class="field-group">
                                <label>{{ $setting['label'] }}</label>
                                <input class="field" type="{{ $setting['type'] }}" value="{{ $setting['value'] }}">
                            </div>
                        @endforeach

                        @foreach ($selectSettings as $setting)
                            <div class="field-group">
                                <label>{{ $setting['label'] }}</label>
                                <select class="field">
                                    @foreach ($setting['options'] as $option)
                                        <option>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>

                    <div class="divider"></div>

                    <div class="toggle-list">
                        @foreach ($toggleSettings as $setting)
                            <div class="toggle-row">
                                <div>
                                    <h3>{{ $setting['title'] }}</h3>
                                    <p>{{ $setting['text'] }}</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" {{ $setting['checked'] ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
@endsection


