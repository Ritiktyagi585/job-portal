@extends('company.layouts.app')

@section('title', 'Edit Profile - OnlyFreshers')
@section('pageTitle', 'Edit Profile')
@section('pageSubtitle', 'Update your company profile information.')

@php
    $activePage = 'profile';

    $company = [
        'name' => 'TechNova Solutions',
        'email' => 'info@technova.com',
        'phone' => '+91 98765 43210',
        'website' => 'www.technova.com',
        'size' => '51-100 Employees',
        'industry' => 'IT Services & Consulting',
        'type' => 'Private',
        'founded' => '2018',
        'about' => 'We are a product based company building innovative solutions for businesses worldwide.',
        'location' => 'Bangalore, Karnataka, India',
        'pin' => '560001',
    ];

    $companySizes = ['1-10 Employees', '11-50 Employees', '51-100 Employees', '101-500 Employees', '500+ Employees'];
    $industries = ['IT Services & Consulting', 'Software Development', 'FinTech', 'Healthcare', 'Education'];
    $companyTypes = ['Private', 'Public', 'Startup', 'Partnership'];
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
        .edit-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 28px 30px; box-sizing: border-box; }
        .edit-card h2 { margin: 0 0 26px; font-size: 18px; font-weight: 700; }
        .form-grid { display: grid; grid-template-columns: 170px 1fr 1fr; gap: 24px; align-items: start; }
        .logo-box h3, .field label, .wide-field label { margin: 0 0 9px; font-size: 12px; font-weight: 700; display: block; }
        .required { color: #ff3045; }
        .profile-avatar { width: 118px; height: 118px; font-size: 52px; margin: 26px 0 22px; }
        .upload-button, .cancel-button, .save-button { height: 40px; border-radius: 7px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .upload-button, .cancel-button { border: 1px solid #9fc0f5; background: white; color: #075fe4; }
        .upload-button { width: 120px; }
        .logo-box p { margin: 12px 0 0; color: #52607a; font-size: 11px; }
        .fields { display: contents; }
        .field input, .field select, .wide-field input, textarea { width: 100%; border: 1px solid #dce7f8; border-radius: 7px; outline: none; box-sizing: border-box; color: #24344f; font-size: 13px; font-family: inherit; background: white; }
        .field input, .field select, .wide-field input { height: 40px; padding: 0 14px; }
        .divider { grid-column: 1 / -1; height: 1px; background: #dce7f8; margin: 8px 0 0; }
        .wide-field { grid-column: 1 / -1; position: relative; }
        textarea { min-height: 88px; resize: vertical; padding: 12px 14px 24px; line-height: 1.5; }
        .counter { position: absolute; right: 12px; bottom: 10px; color: #6b7892; font-size: 11px; }
        .location-grid { grid-column: 1 / -1; display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .actions { grid-column: 1 / -1; display: flex; justify-content: space-between; gap: 18px; margin-top: 12px; }
        .cancel-button { width: 120px; }
        .save-button { width: 190px; border: 0; background: #075fe4; color: white; box-shadow: 0 10px 20px rgba(7, 95, 228, 0.16); }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .form-grid { grid-template-columns: 1fr; } .fields { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar { flex-direction: column; align-items: flex-start; } .company-menu, .fields, .location-grid { grid-template-columns: 1fr; } .edit-card { padding: 22px 16px; } .actions { flex-direction: column; } .cancel-button, .save-button { width: 100%; } }
</style>
@endpush

@section('content')
<section class="edit-card">
                <h2>Company Profile</h2>

                <form class="form-grid" id="editCompanyForm">
                    <div class="logo-box">
                        <h3>Company Logo</h3>
                        <div class="profile-avatar">T</div>
                        <button class="upload-button" type="button">Upload Logo</button>
                        <p>JPG, PNG or SVG. Max size 2MB</p>
                    </div>

                    <div class="fields">
                        <div class="field">
                            <label for="companyName">Company Name <span class="required">*</span></label>
                            <input id="companyName" value="{{ $company['name'] }}">
                        </div>
                        <div class="field">
                            <label for="companySize">Company Size <span class="required">*</span></label>
                            <select id="companySize">
                                @foreach ($companySizes as $size)
                                    <option {{ $size === $company['size'] ? 'selected' : '' }}>{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field">
                            <label for="email">Email <span class="required">*</span></label>
                            <input id="email" value="{{ $company['email'] }}">
                        </div>
                        <div class="field">
                            <label for="phone">Phone Number <span class="required">*</span></label>
                            <input id="phone" value="{{ $company['phone'] }}">
                        </div>
                        <div class="field">
                            <label for="website">Website</label>
                            <input id="website" value="{{ $company['website'] }}">
                        </div>
                        <div class="field">
                            <label for="industry">Industry <span class="required">*</span></label>
                            <select id="industry">
                                @foreach ($industries as $industry)
                                    <option {{ $industry === $company['industry'] ? 'selected' : '' }}>{{ $industry }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field">
                            <label for="companyType">Company Type <span class="required">*</span></label>
                            <select id="companyType">
                                @foreach ($companyTypes as $type)
                                    <option {{ $type === $company['type'] ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field">
                            <label for="founded">Founded In <span class="required">*</span></label>
                            <input id="founded" value="{{ $company['founded'] }}">
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="wide-field">
                        <label for="about">About Company <span class="required">*</span></label>
                        <textarea id="about" maxlength="500">{{ $company['about'] }}</textarea>
                        <span class="counter" id="aboutCounter">0/500</span>
                    </div>

                    <div class="wide-field">
                        <label>Company Location <span class="required">*</span></label>
                        <div class="location-grid">
                            <input value="{{ $company['location'] }}" aria-label="Location">
                            <input value="{{ $company['pin'] }}" aria-label="Pin Code">
                        </div>
                    </div>

                    <div class="actions">
                        <a class="cancel-button" href="/company/profile" style="display:flex;align-items:center;justify-content:center;">Cancel</a>
                        <button class="save-button" type="submit">Save Changes</button>
                    </div>
                </form>
            </section>
@endsection

@push('scripts')
<script>
const about = document.getElementById('about');
        const aboutCounter = document.getElementById('aboutCounter');

        function updateCounter() {
            aboutCounter.textContent = about.value.length + '/500';
        }

        about.addEventListener('input', updateCounter);
        updateCounter();

        document.getElementById('editCompanyForm').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Company profile saved.');
        });
</script>
@endpush

