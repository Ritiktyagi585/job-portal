@extends('company.layouts.app')

@section('title', 'My Profile - OnlyFreshers')
@section('pageTitle', 'My Profile')
@section('pageSubtitle', 'Manage your company profile and details.')

@php
    $activePage = 'profile';

    $infoCards = [
        ['title' => 'Company Size', 'value' => '51-100 Employees'],
        ['title' => 'Industry', 'value' => 'IT Services & Consulting'],
        ['title' => 'Company Type', 'value' => 'Private'],
        ['title' => 'Founded In', 'value' => '2018'],
    ];
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
        .company-avatar, .top-avatar, .profile-avatar { border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .company-avatar { width: 34px; height: 34px; }
        .company-account h3 { margin: 0 0 4px; font-size: 14px; font-weight: 700; }
        .company-account p { margin: 0; color: #075fe4; font-size: 12px; }
        .company-account button { margin-left: auto; border: 0; background: transparent; color: #061942; cursor: pointer; font-size: 18px; }
        .main { padding: 0 38px 38px; box-sizing: border-box; }
        .topbar { min-height: 100px; display: flex; align-items: center; justify-content: space-between; gap: 24px; margin-bottom: 28px; }
        .page-title h1 { margin: 0 0 8px; font-size: 22px; font-weight: 700; }
        .page-title p { margin: 0; color: #24344f; font-size: 12px; }
        .top-actions { display: flex; align-items: center; gap: 18px; }
        .bell { position: relative; width: 42px; height: 42px; border: 0; background: white; border-radius: 50%; color: #061942; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(6, 25, 66, 0.05); }
        .bell svg, .contact-icon svg { fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell svg { width: 23px; height: 23px; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; }
        .top-avatar { width: 50px; height: 50px; font-size: 22px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .profile-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 34px 36px; min-height: 690px; box-sizing: border-box; }
        .profile-card-top { display: flex; align-items: center; justify-content: space-between; gap: 18px; margin-bottom: 34px; }
        .profile-card-top h2 { margin: 0; font-size: 18px; font-weight: 700; }
        .edit-button { width: 118px; height: 40px; padding: 0; border: 1px solid #9fc0f5; border-radius: 8px; background: white; color: #075fe4; font-size: 13px; line-height: 1; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; box-sizing: border-box; text-decoration: none; }
        .profile-grid { display: grid; grid-template-columns: 1.25fr 0.95fr; gap: 50px; }
        .profile-main { padding-right: 8px; }
        .profile-identity { display: flex; align-items: center; gap: 36px; margin-bottom: 48px; }
        .profile-avatar { width: 145px; height: 145px; font-size: 68px; }
        .company-detail h3 { margin: 0 0 18px; font-size: 20px; font-weight: 700; }
        .contact-row { display: flex; align-items: center; gap: 16px; color: #24344f; font-size: 14px; margin: 14px 0; }
        .contact-icon { width: 24px; height: 24px; color: #52607a; display: flex; align-items: center; justify-content: center; }
        .contact-icon svg { width: 22px; height: 22px; }
        .divider-line { height: 1px; background: #dce7f8; margin: 0 0 42px; }
        .about h3 { margin: 0 0 18px; font-size: 17px; font-weight: 700; }
        .about p { margin: 0; max-width: 570px; color: #24344f; font-size: 14px; line-height: 1.65; }
        .info-list { display: grid; gap: 18px; }
        .info-card { min-height: 122px; border: 1px solid #dce7f8; border-radius: 8px; padding: 26px 30px; box-sizing: border-box; }
        .info-card h3 { margin: 0 0 18px; font-size: 15px; font-weight: 700; }
        .info-card p { margin: 0; color: #24344f; font-size: 14px; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .profile-grid { grid-template-columns: 1fr; gap: 28px; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar { flex-direction: column; align-items: flex-start; } .company-menu { grid-template-columns: 1fr; } .profile-card { padding: 24px 18px; } .profile-card-top, .profile-identity { flex-direction: column; align-items: flex-start; } .profile-avatar { width: 110px; height: 110px; font-size: 50px; } }
</style>
@endpush

@section('content')
<section class="profile-card">
                <div class="profile-card-top">
                    <h2>Company Profile</h2>
                    <a class="edit-button" href="/company/profile/edit">Edit Profile</a>
                </div>

                <div class="profile-grid">
                    <div class="profile-main">
                        <div class="profile-identity">
                            <div class="profile-avatar">T</div>
                            <div class="company-detail">
                                <h3>TechNova Solutions</h3>
                                <div class="contact-row">
                                    <span class="contact-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"></path><path d="M4 7l8 6 8-6"></path></svg></span>
                                    info@technova.com
                                </div>
                                <div class="contact-row">
                                    <span class="contact-icon"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.4 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"></path></svg></span>
                                    +91 98765 43210
                                </div>
                                <div class="contact-row">
                                    <span class="contact-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20"></path></svg></span>
                                    www.technova.com
                                </div>
                            </div>
                        </div>

                        <div class="divider-line"></div>

                        <div class="about">
                            <h3>About Company</h3>
                            <p>We are a product based company building innovative solutions for businesses worldwide.</p>
                        </div>
                    </div>

                    <div class="info-list">
                        @foreach ($infoCards as $card)
                            <div class="info-card">
                                <h3>{{ $card['title'] }}</h3>
                                <p>{{ $card['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
@endsection

