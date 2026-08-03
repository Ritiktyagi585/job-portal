@extends('company.layouts.app')

@section('title', 'Packages & Billing - OnlyFreshers')
@section('pageTitle', 'Packages & Billing')
@section('pageSubtitle', 'Manage your subscription and billing details.')

@php
    $activePage = 'billing';

    $plan = [
        'name' => 'Premium Plan',
        'badge' => 'Premium',
        'status' => 'Your plan is active',
        'validity' => '01 May 2024 - 01 May 2025',
        'daysLeft' => '320 Days',
    ];

    $features = [
        'Unlimited Job Postings',
        'Access to Fresh Candidates',
        'Advanced Search & Filters',
        'Priority Support',
        'Company Branding',
    ];

    $invoices = [
        ['id' => 'INV-2024-1006', 'date' => '01 May 2024', 'amount' => '₹ 6,000.00', 'status' => 'Paid'],
        ['id' => 'INV-2024-1005', 'date' => '01 Apr 2024', 'amount' => '₹ 6,000.00', 'status' => 'Paid'],
        ['id' => 'INV-2024-1004', 'date' => '01 Mar 2024', 'amount' => '₹ 6,000.00', 'status' => 'Paid'],
        ['id' => 'INV-2024-1003', 'date' => '01 Feb 2024', 'amount' => '₹ 6,000.00', 'status' => 'Paid'],
        ['id' => 'INV-2024-1002', 'date' => '01 Jan 2024', 'amount' => '₹ 6,000.00', 'status' => 'Paid'],
    ];

    $payment = [
        'brand' => 'VISA',
        'number' => 'Visa ending in 4242',
        'expiry' => 'Expires 12/27',
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
        .bell svg, .small-icon svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; }
        .top-avatar { width: 50px; height: 50px; font-size: 22px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .grid { display: grid; grid-template-columns: 0.9fr 1.4fr; gap: 22px; }
        .stack { display: grid; gap: 18px; }
        .card, .help-card { border: 1px solid #dce7f8; border-radius: 8px; background: white; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); padding: 24px; box-sizing: border-box; }
        .card h2 { margin: 0 0 22px; font-size: 17px; font-weight: 700; }
        .plan-row { display: flex; align-items: center; gap: 20px; margin-bottom: 24px; }
        .crown { width: 62px; height: 62px; border-radius: 50%; background: linear-gradient(135deg, #075fe4, #a65cff); color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; }
        .plan-name { display: flex; align-items: center; gap: 12px; margin-bottom: 8px; }
        .plan-name h3 { margin: 0; font-size: 19px; font-weight: 700; }
        .badge { display: inline-flex; align-items: center; justify-content: center; height: 26px; padding: 0 12px; border-radius: 7px; background: #efe7ff; color: #7b35e8; font-size: 12px; font-weight: 700; }
        .active-text { margin: 0; color: #00a65a; font-size: 13px; }
        .line { height: 1px; background: #dce7f8; margin: 0 0 22px; }
        .validity { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 28px; }
        .validity-item { display: flex; gap: 12px; align-items: flex-start; }
        .small-icon { color: #061942; }
        .validity-item p { margin: 0 0 10px; color: #52607a; font-size: 12px; }
        .validity-item strong { font-size: 13px; }
        .plan-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .primary-button, .upgrade-button { height: 44px; border-radius: 7px; font-size: 14px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; box-sizing: border-box; }
        .primary-button { border: 0; background: #075fe4; color: white; }
        .upgrade-button { border: 1px solid #9fc0f5; background: white; color: #075fe4; }
        .feature-row { display: flex; align-items: center; gap: 14px; padding: 13px 0; border-bottom: 1px solid #edf2fb; font-size: 13px; }
        .feature-row:last-child { border-bottom: 0; }
        .check { width: 24px; height: 24px; border-radius: 50%; background: #d8f7e7; color: #00a65a; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .table-wrap { border: 1px solid #dce7f8; border-radius: 8px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { height: 48px; padding: 0 16px; color: #24344f; font-size: 12px; text-align: left; border-bottom: 1px solid #dce7f8; font-weight: 600; }
        td { padding: 14px 16px; font-size: 13px; border-bottom: 1px solid #edf2fb; }
        tr:last-child td { border-bottom: 0; }
        .paid { display: inline-flex; align-items: center; justify-content: center; min-width: 48px; height: 28px; border-radius: 7px; background: #dbf8e9; color: #00a65a; font-size: 12px; font-weight: 700; }
        .download { width: 36px; height: 36px; border: 1px solid #9fc0f5; border-radius: 7px; background: white; color: #075fe4; cursor: pointer; font-weight: 700; }
        .history-footer { display: flex; align-items: center; justify-content: space-between; margin-top: 18px; font-size: 13px; color: #24344f; }
        .pages { display: flex; align-items: center; gap: 10px; }
        .page-btn { min-width: 34px; height: 34px; border: 1px solid #dce7f8; border-radius: 7px; background: white; cursor: pointer; font-weight: 700; color: #24344f; }
        .page-btn.active { background: #075fe4; color: white; }
        .payment-row { display: grid; grid-template-columns: 70px 1fr auto auto; align-items: center; gap: 18px; }
        .visa { width: 64px; height: 44px; border: 1px solid #dce7f8; border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700; color: #0b3a9e; }
        .payment-row h3 { margin: 0 0 8px; font-size: 13px; font-weight: 700; }
        .payment-row p { margin: 0; color: #24344f; font-size: 13px; }
        .default { height: 24px; padding: 0 10px; border-radius: 7px; background: #dbf8e9; color: #00a65a; display: inline-flex; align-items: center; font-size: 11px; font-weight: 700; }
        .edit-button, .support-button { width: 112px; height: 40px; border: 1px solid #9fc0f5; border-radius: 7px; background: white; color: #075fe4; font-size: 13px; font-weight: 700; cursor: pointer; }
        .help-card { grid-column: 1 / -1; display: grid; grid-template-columns: 72px 1fr auto; gap: 18px; align-items: center; }
        .help-icon { width: 62px; height: 62px; border-radius: 50%; background: #eaf2ff; color: #075fe4; display: flex; align-items: center; justify-content: center; font-size: 24px; }
        .help-card h3 { margin: 0 0 8px; font-size: 15px; font-weight: 700; }
        .help-card p { margin: 0; color: #24344f; font-size: 12px; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .grid { grid-template-columns: 1fr; } .help-card { grid-column: auto; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar, .history-footer, .help-card, .payment-row { grid-template-columns: 1fr; flex-direction: column; align-items: flex-start; } .company-menu, .validity { grid-template-columns: 1fr; } .table-wrap { overflow-x: auto; } table { min-width: 680px; } }
</style>
@endpush

@section('content')
<section class="grid">
                <div class="stack">
                    <div class="card">
                        <h2>Current Plan</h2>
                        <div class="plan-row">
                            <div class="crown">♛</div>
                            <div>
                                <div class="plan-name">
                                    <h3>{{ $plan['name'] }}</h3>
                                    <span class="badge">{{ $plan['badge'] }}</span>
                                </div>
                                <p class="active-text">{{ $plan['status'] }}</p>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="validity">
                            <div class="validity-item">
                                <span class="small-icon"><svg viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="15" rx="2"></rect><path d="M8 3v4M16 3v4M4 10h16"></path></svg></span>
                                <div><p>Plan Validity</p><strong>{{ $plan['validity'] }}</strong></div>
                            </div>
                            <div class="validity-item">
                                <span class="small-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg></span>
                                <div><p>Days Left</p><strong>{{ $plan['daysLeft'] }}</strong></div>
                            </div>
                        </div>
                        <div class="plan-actions">
                            <button class="primary-button" type="button">View Details</button>
                            <a class="upgrade-button" href="/company/purchase-package">Upgrade Plan</a>
                        </div>
                    </div>

                    <div class="card">
                        <h2>Package Features</h2>
                        @foreach ($features as $feature)
                            <div class="feature-row"><span class="check">✓</span>{{ $feature }}</div>
                        @endforeach
                    </div>
                </div>

                <div class="stack">
                    <div class="card">
                        <h2>Billing History</h2>
                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice['id'] }}</td>
                                            <td>{{ $invoice['date'] }}</td>
                                            <td>{{ $invoice['amount'] }}</td>
                                            <td><span class="paid">{{ $invoice['status'] }}</span></td>
                                            <td><button class="download" type="button" title="Download invoice">↓</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="history-footer">
                            <span>Showing 1 to 5 of 10 invoices</span>
                            <div class="pages">
                                <button class="page-btn">‹</button>
                                <button class="page-btn active">1</button>
                                <button class="page-btn">2</button>
                                <button class="page-btn">3</button>
                                <span>...</span>
                                <button class="page-btn">10</button>
                                <button class="page-btn">›</button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h2>Payment Method</h2>
                        <div class="payment-row">
                            <div class="visa">{{ $payment['brand'] }}</div>
                            <div>
                                <h3>{{ $payment['number'] }}</h3>
                                <p>{{ $payment['expiry'] }}</p>
                            </div>
                            <span class="default">Default</span>
                            <button class="edit-button" type="button">Edit</button>
                        </div>
                    </div>
                </div>

                <div class="help-card">
                    <div class="help-icon">☊</div>
                    <div>
                        <h3>Need help?</h3>
                        <p>If you have any questions regarding billing or invoices, our support team is here to help.</p>
                    </div>
                    <button class="support-button" type="button">Contact Support</button>
                </div>
            </section>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.download').forEach(function (button) {
            button.addEventListener('click', function () {
                alert('Invoice download started.');
            });
        });
</script>
@endpush

