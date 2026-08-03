@extends('company.layouts.app')

@section('title', 'Purchase Package - OnlyFreshers')
@section('pageTitle', 'Purchase Package')

@php
    $activePage = 'billing';

    $plans = [
        ['name' => 'Basic', 'monthly' => '₹1,999', 'yearly' => '₹19,999', 'popular' => false, 'features' => ['10 Job Postings', 'Basic Search Access', 'Email Support']],
        ['name' => 'Premium', 'monthly' => '₹4,999', 'yearly' => '₹49,999', 'popular' => true, 'features' => ['Unlimited Job Postings', 'Access to Fresh Candidates', 'Priority Support']],
        ['name' => 'Enterprise', 'monthly' => '₹9,999', 'yearly' => '₹99,999', 'popular' => false, 'features' => ['50 Job Postings', 'Dedicated Account Manager', 'Custom Reports']],
    ];

    $benefits = [
        ['title' => 'Secure Payment', 'text' => '100% secure & encrypted', 'icon' => '♢'],
        ['title' => 'Instant Activation', 'text' => 'Plan activates immediately', 'icon' => '▣'],
        ['title' => 'Cancel Anytime', 'text' => 'No questions asked', 'icon' => '☊'],
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
        .page-heading { display: flex; align-items: center; gap: 20px; }
        .cart-icon { width: 54px; height: 54px; border-radius: 8px; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; font-size: 26px; }
        .page-title h1 { margin: 0; font-size: 28px; font-weight: 700; }
        .top-actions { display: flex; align-items: center; gap: 18px; }
        .bell { position: relative; width: 42px; height: 42px; border: 0; background: white; border-radius: 50%; color: #061942; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(6, 25, 66, 0.05); }
        .bell svg { width: 23px; height: 23px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
        .bell span { position: absolute; right: 5px; top: 4px; width: 17px; height: 17px; border-radius: 50%; background: #ff3045; color: white; font-size: 11px; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .top-user { display: flex; align-items: center; gap: 14px; }
        .top-avatar { width: 50px; height: 50px; font-size: 22px; }
        .top-user h3 { margin: 0 0 5px; font-size: 14px; font-weight: 700; }
        .top-user p { margin: 0; color: #52607a; font-size: 12px; }
        .top-user button { border: 0; background: transparent; cursor: pointer; font-size: 20px; }
        .step-row { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 24px; margin-bottom: 36px; }
        .step { display: flex; align-items: center; gap: 14px; font-size: 15px; font-weight: 700; }
        .step span { width: 28px; height: 28px; border-radius: 50%; background: #075fe4; color: white; display: flex; align-items: center; justify-content: center; }
        .tenure { display: flex; align-items: center; gap: 20px; font-size: 15px; }
        .toggle { display: grid; grid-template-columns: 130px 130px 110px; align-items: center; border: 1px solid #dce7f8; border-radius: 24px; overflow: hidden; background: white; }
        .toggle button, .toggle span { height: 48px; border: 0; background: transparent; font-size: 14px; font-weight: 700; color: #061942; }
        .toggle button { cursor: pointer; }
        .toggle button.active { background: white; color: #075fe4; box-shadow: inset 0 0 0 1px #dce7f8; border-radius: 24px; }
        .save { display: flex; align-items: center; justify-content: center; color: #00a65a; background: #dbf8e9; }
        .plans { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-bottom: 40px; align-items: stretch; }
        .plan-card { position: relative; border: 1px solid #dce7f8; border-radius: 16px; background: white; padding: 40px 32px 32px; box-shadow: 0 10px 24px rgba(6, 25, 66, 0.04); box-sizing: border-box; }
        .plan-card.popular { background: linear-gradient(160deg, #7b35e8, #4b2be8); color: white; transform: translateY(-2px); }
        .popular-badge { position: absolute; top: -26px; left: 50%; transform: translateX(-50%); min-width: 128px; height: 46px; border-radius: 12px; background: #7b35e8; color: white; display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 700; }
        .plan-card h2 { margin: 0 0 28px; text-align: center; font-size: 23px; font-weight: 700; }
        .price { text-align: center; font-size: 34px; font-weight: 700; margin-bottom: 36px; }
        .price span { font-size: 15px; font-weight: 500; }
        .divider { height: 1px; background: #dce7f8; margin-bottom: 28px; }
        .popular .divider { background: rgba(255,255,255,0.25); }
        .feature { display: flex; align-items: center; gap: 16px; margin: 26px 0; font-size: 15px; }
        .check { width: 34px; height: 34px; border-radius: 50%; background: #dbf8e9; color: #00a65a; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
        .popular .check { background: rgba(255,255,255,0.15); color: white; }
        .choose { width: 100%; height: 58px; border: 1px solid #075fe4; border-radius: 8px; background: white; color: #075fe4; font-size: 18px; font-weight: 700; cursor: pointer; margin-top: 22px; }
        .popular .choose { border: 0; }
        .benefits { border: 1px solid #dce7f8; border-radius: 12px; background: white; padding: 30px 42px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
        .benefit { display: flex; align-items: center; justify-content: center; gap: 18px; border-right: 1px solid #dce7f8; }
        .benefit:last-child { border-right: 0; }
        .benefit-icon { width: 58px; height: 58px; border-radius: 50%; background: #eaf2ff; color: #061942; display: flex; align-items: center; justify-content: center; font-size: 24px; }
        .benefit h3 { margin: 0 0 7px; font-size: 15px; }
        .benefit p { margin: 0; color: #24344f; font-size: 13px; }
        @media (max-width: 1180px) { .layout { grid-template-columns: 1fr; } .company-menu { grid-template-columns: repeat(2, 1fr); } .plans, .benefits { grid-template-columns: 1fr; } .benefit { border-right: 0; justify-content: flex-start; } .step-row { grid-template-columns: 1fr; } }
        @media (max-width: 650px) { .main { padding: 0 14px 24px; } .topbar { flex-direction: column; align-items: flex-start; } .company-menu { grid-template-columns: 1fr; } .toggle { grid-template-columns: 1fr; border-radius: 12px; } .plan-card.popular { transform: none; } }
</style>
@endpush

@section('content')
<section class="step-row">
                <div class="step"><span>1</span> CHOOSE PLAN</div>
                <div class="tenure">
                    <strong>Choose Tenure</strong>
                    <div class="toggle">
                        <button class="active" type="button" data-tenure="monthly">Monthly</button>
                        <button type="button" data-tenure="yearly">Yearly</button>
                        <span class="save">Save 20%</span>
                    </div>
                </div>
                <div></div>
            </section>

            <section class="plans">
                @foreach ($plans as $plan)
                    <div class="plan-card {{ $plan['popular'] ? 'popular' : '' }}">
                        @if ($plan['popular'])
                            <div class="popular-badge">Popular</div>
                        @endif
                        <h2>{{ $plan['name'] }}</h2>
                        <div class="price"><span class="price-value" data-monthly="{{ $plan['monthly'] }}" data-yearly="{{ $plan['yearly'] }}">{{ $plan['monthly'] }}</span> <span class="period">/month</span></div>
                        <div class="divider"></div>
                        @foreach ($plan['features'] as $feature)
                            <div class="feature"><span class="check">✓</span>{{ $feature }}</div>
                        @endforeach
                        <button class="choose" type="button">Choose Plan</button>
                    </div>
                @endforeach
            </section>

            <section class="benefits">
                @foreach ($benefits as $benefit)
                    <div class="benefit">
                        <div class="benefit-icon">{{ $benefit['icon'] }}</div>
                        <div>
                            <h3>{{ $benefit['title'] }}</h3>
                            <p>{{ $benefit['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </section>
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-tenure]').forEach(function (button) {
            button.addEventListener('click', function () {
                document.querySelectorAll('[data-tenure]').forEach(function (item) {
                    item.classList.remove('active');
                });
                button.classList.add('active');

                const tenure = button.dataset.tenure;
                document.querySelectorAll('.price-value').forEach(function (price) {
                    price.textContent = price.dataset[tenure];
                });
                document.querySelectorAll('.period').forEach(function (period) {
                    period.textContent = tenure === 'monthly' ? '/month' : '/year';
                });
            });
        });

        document.querySelectorAll('.choose').forEach(function (button) {
            button.addEventListener('click', function () {
                alert('Plan selected.');
            });
        });
</script>
@endpush

