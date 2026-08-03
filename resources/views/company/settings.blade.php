@extends('company.layouts.app')

@section('title', 'Account Settings - OnlyFreshers')
@section('pageTitle', 'Account Settings')
@section('pageSubtitle', 'Manage your account, preferences and security settings.')

@php
    $activePage = 'settings';

    $settingTabs = [
        ['key' => 'profile', 'title' => 'Company Profile', 'icon' => '▦'],
        ['key' => 'account', 'title' => 'Account Information', 'icon' => '♙'],
        ['key' => 'password', 'title' => 'Change Password', 'icon' => '▣'],
        ['key' => 'notifications', 'title' => 'Notification Preferences', 'icon' => '♢'],
        ['key' => 'privacy', 'title' => 'Privacy Settings', 'icon' => '♧'],
        ['key' => 'team', 'title' => 'Team Members', 'icon' => '♚'],
        ['key' => 'api', 'title' => 'API & Integrations', 'icon' => '⚙'],
        ['key' => 'delete', 'title' => 'Delete Account', 'icon' => '⌫'],
    ];

    $company = [
        'name' => 'TechNova Solutions',
        'email' => 'hr@technovasolutions.com',
        'phone' => '+91 98765 43210',
        'website' => 'https://www.technovasolutions.com',
        'industry' => 'IT Services & Consulting',
        'size' => '51 - 200 Employees',
        'address' => '123, Business Park, Sector 62, Noida, Uttar Pradesh - 201309, India',
    ];

    $industries = ['IT Services & Consulting', 'Software Development', 'FinTech', 'Healthcare'];
    $sizes = ['1 - 10 Employees', '11 - 50 Employees', '51 - 200 Employees', '200+ Employees'];
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
        .top-actions { display: flex; align-items: center; gap: 18px; }
        .bell { position: relative; width: 42px; height: 42px; border: 0; background: white; border-radius: 50%; color: #061942; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(6, 25, 66, 0.05); }
        .bell svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; }
        .top-avatar { width: 50px; height: 50px; font-size: 22px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .settings-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); display: grid; grid-template-columns: 240px 1fr; min-height: 720px; overflow: hidden; }
        .settings-menu { padding: 24px 18px; border-right: 1px solid #dce7f8; }
        .settings-tab { width: 100%; min-height: 44px; border: 0; border-radius: 7px; background: transparent; color: #24344f; display: flex; align-items: center; gap: 14px; padding: 0 14px; text-align: left; font-size: 13px; cursor: pointer; margin-bottom: 8px; }
        .settings-tab span { width: 24px; height: 24px; border-radius: 6px; background: #edf4ff; color: #075fe4; display: inline-flex; align-items: center; justify-content: center; font-size: 0; flex: 0 0 auto; }
        .settings-tab:nth-child(1) span::before { content: 'CP'; font-size: 9px; font-weight: 800; }
        .settings-tab:nth-child(2) span::before { content: 'AI'; font-size: 9px; font-weight: 800; }
        .settings-tab:nth-child(3) span::before { content: 'PW'; font-size: 9px; font-weight: 800; }
        .settings-tab:nth-child(4) span::before { content: 'NP'; font-size: 9px; font-weight: 800; }
        .settings-tab:nth-child(5) span::before { content: 'PS'; font-size: 9px; font-weight: 800; }
        .settings-tab:nth-child(6) span::before { content: 'TM'; font-size: 9px; font-weight: 800; }
        .settings-tab:nth-child(7) span::before { content: 'API'; font-size: 8px; font-weight: 800; }
        .settings-tab:nth-child(8) span::before { content: 'DL'; font-size: 9px; font-weight: 800; }
        .settings-tab.active { background: #eaf2ff; color: #075fe4; font-weight: 700; border-left: 3px solid #075fe4; }
        .settings-content { padding: 28px 34px; }
        .content-top { display: flex; justify-content: space-between; gap: 18px; align-items: flex-start; margin-bottom: 28px; }
        .content-top h2 { margin: 0 0 10px; font-size: 18px; font-weight: 700; }
        .content-top p { margin: 0; color: #24344f; font-size: 12px; }
        .view-button { width: 190px; height: 40px; border: 1px solid #dce7f8; border-radius: 7px; background: white; color: #075fe4; font-size: 13px; font-weight: 700; cursor: pointer; }
        .media-grid { display: grid; grid-template-columns: 170px 170px 1fr; gap: 16px 28px; margin-bottom: 28px; align-items: end; }
        .media-label { grid-column: 1 / 3; color: #061942; font-size: 12px; font-weight: 700; }
        .cover-label { color: #061942; font-size: 12px; font-weight: 700; }
        .logo-card, .upload-card, .cover-card { border: 1px solid #dce7f8; border-radius: 8px; min-height: 150px; display: flex; align-items: center; justify-content: center; text-align: center; box-sizing: border-box; }
        .logo-card strong { display: block; color: #075fe4; font-size: 20px; margin-top: 8px; }
        .logo-card span { display: block; letter-spacing: 5px; color: #52607a; font-size: 11px; }
        .upload-card { border-style: dashed; color: #24344f; font-size: 12px; }
        .upload-card b { display: block; color: #061942; margin: 8px 0; font-size: 13px; }
        .cover-card { min-height: 150px; background: linear-gradient(160deg, #eef5ff, #cfe1ff); position: relative; }
        .cover-card button { position: absolute; right: 14px; top: 14px; width: 38px; height: 38px; border: 0; border-radius: 50%; background: white; color: #075fe4; cursor: pointer; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px 24px; }
        label { display: block; margin-bottom: 8px; font-size: 12px; font-weight: 700; }
        input, select, textarea { width: 100%; border: 1px solid #dce7f8; border-radius: 7px; outline: none; box-sizing: border-box; color: #24344f; font-size: 13px; font-family: inherit; background: white; }
        input, select { height: 42px; padding: 0 14px; }
        textarea { min-height: 78px; resize: vertical; padding: 14px; line-height: 1.5; }
        .full { grid-column: 1 / -1; }
        .actions { display: flex; justify-content: flex-end; gap: 18px; margin-top: 18px; }
        .cancel, .save { width: 130px; height: 42px; border-radius: 7px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .cancel { border: 1px solid #dce7f8; background: white; color: #075fe4; }
        .save { border: 0; background: #075fe4; color: white; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .settings-card { grid-template-columns: 1fr; } .settings-menu { border-right: 0; border-bottom: 1px solid #dce7f8; } .media-grid { grid-template-columns: 1fr; } .media-label { grid-column: auto; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .content-top { flex-direction: column; align-items: flex-start; } .company-menu, .form-grid { grid-template-columns: 1fr; } .full { grid-column: auto; } .settings-content { padding: 22px 16px; } }
</style>
@endpush

@section('content')
<section class="settings-card">
                <aside class="settings-menu">
                    @foreach ($settingTabs as $tab)
                        <button class="settings-tab {{ $loop->first ? 'active' : '' }}" type="button" data-title="{{ $tab['title'] }}">
                            <span>{{ $tab['icon'] }}</span>{{ $tab['title'] }}
                        </button>
                    @endforeach
                </aside>

                <div class="settings-content">
                    <div class="content-top">
                        <div>
                            <h2 id="settingTitle">Company Profile</h2>
                            <p id="settingText">Update your company details and branding.</p>
                        </div>
                        <button class="view-button" type="button">View Company Page ↗</button>
                    </div>

                    <div class="media-grid">
                        <div class="media-label">Company Logo</div>
                        <div class="cover-label">Cover Image (Optional)</div>
                        <div class="logo-card"><div>▥<strong>TechNova</strong><span>SOLUTIONS</span></div></div>
                        <div class="upload-card"><div>☁<b>Upload New Logo</b><span>PNG, JPG up to 2MB</span></div></div>
                        <div class="cover-card"><button type="button">✎</button></div>
                    </div>

                    <form id="settingsForm">
                        <div class="form-grid">
                            <div>
                                <label for="companyName">Company Name</label>
                                <input id="companyName" value="{{ $company['name'] }}">
                            </div>
                            <div>
                                <label for="industry">Industry</label>
                                <select id="industry">
                                    @foreach ($industries as $industry)
                                        <option {{ $industry === $company['industry'] ? 'selected' : '' }}>{{ $industry }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="email">Company Email</label>
                                <input id="email" value="{{ $company['email'] }}">
                            </div>
                            <div>
                                <label for="phone">Company Phone</label>
                                <input id="phone" value="{{ $company['phone'] }}">
                            </div>
                            <div>
                                <label for="website">Company Website</label>
                                <input id="website" value="{{ $company['website'] }}">
                            </div>
                            <div>
                                <label for="size">Company Size</label>
                                <select id="size">
                                    @foreach ($sizes as $size)
                                        <option {{ $size === $company['size'] ? 'selected' : '' }}>{{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="full">
                                <label for="address">Company Address</label>
                                <textarea id="address">{{ $company['address'] }}</textarea>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="cancel" type="button">Cancel</button>
                            <button class="save" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </section>
@endsection

@push('scripts')
<script>
const settingText = {
            'Company Profile': 'Update your company details and branding.',
            'Account Information': 'Manage login email and account ownership.',
            'Change Password': 'Update your account password securely.',
            'Notification Preferences': 'Control email and platform alerts.',
            'Privacy Settings': 'Manage profile visibility and data settings.',
            'Team Members': 'Invite and manage your hiring team.',
            'API & Integrations': 'Connect external tools and integrations.',
            'Delete Account': 'Permanently delete your company account.'
        };

        document.querySelectorAll('.settings-tab').forEach(function (button) {
            button.addEventListener('click', function () {
                document.querySelectorAll('.settings-tab').forEach(function (item) {
                    item.classList.remove('active');
                });
                button.classList.add('active');
                document.getElementById('settingTitle').textContent = button.dataset.title;
                document.getElementById('settingText').textContent = settingText[button.dataset.title];
            });
        });

        document.getElementById('settingsForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Settings saved.');
        });
</script>
@endpush

