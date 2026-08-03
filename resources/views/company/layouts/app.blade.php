<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Company Dashboard - OnlyFreshers')</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f4f8ff;font-weight:500}a{color:inherit;text-decoration:none}.layout{min-height:100vh;display:grid;grid-template-columns:250px minmax(0,1fr)}.company-sidebar{background:white;border-right:1px solid #dce7f8;display:flex;flex-direction:column;justify-content:space-between;padding:0 18px 28px}.company-logo img{width:205px;height:auto;display:block;margin:0 0 42px}.company-menu{display:grid;gap:8px}.company-menu-item{position:relative;display:flex;align-items:center;gap:14px;min-height:44px;padding:6px 14px;border-radius:8px;color:#24344f;font-size:14px;font-weight:500}.company-menu-item.active{color:#075fe4;background:#eaf2ff;font-weight:700}.company-menu-icon{width:25px;height:25px;display:flex;align-items:center;justify-content:center;flex-shrink:0}.company-menu-icon svg{width:21px;height:21px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.menu-badge{margin-left:auto;min-width:22px;height:22px;border-radius:50%;background:#ff3045;color:white;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700}.company-account{display:flex;align-items:center;gap:12px;padding:14px;border:1px solid #dce7f8;border-radius:8px;background:white;box-shadow:0 8px 22px rgba(6,25,66,.04)}.company-avatar,.top-avatar{border-radius:50%;background:#075fe4;color:white;display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0}.company-avatar{width:34px;height:34px}.company-account h3{margin:0 0 4px;font-size:14px;font-weight:700}.company-account p{margin:0;color:#075fe4;font-size:12px}.company-account button{margin-left:auto;border:0;background:transparent;color:#061942;cursor:pointer;font-size:18px}.main{padding:0 38px 38px;min-width:0}.topbar{min-height:100px;display:flex;align-items:center;justify-content:space-between;gap:24px;margin-bottom:28px}.page-title h1{margin:0 0 10px;font-size:26px;font-weight:700}.page-title p{margin:0;color:#24344f;font-size:14px}.top-actions{display:flex;align-items:center;gap:18px}.bell{position:relative;width:42px;height:42px;border:0;background:white;border-radius:50%;color:#061942;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 18px rgba(6,25,66,.05)}.bell svg{width:23px;height:23px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.bell span{position:absolute;right:5px;top:4px;width:17px;height:17px;border-radius:50%;background:#ff3045;color:white;font-size:11px;display:flex;align-items:center;justify-content:center;font-weight:700}.top-user{display:flex;align-items:center;gap:14px;border-left:1px solid #dce7f8;padding-left:22px}.top-avatar{width:46px;height:46px;font-size:20px}.top-user h3{margin:0 0 5px;font-size:14px;font-weight:700}.top-user p{margin:0;color:#52607a;font-size:12px}.top-user button{border:0;background:transparent;cursor:pointer;font-size:20px}@media(max-width:1180px){.layout{grid-template-columns:1fr}.company-sidebar{display:none}.main{padding:0 18px 30px}}@media(max-width:650px){.main{padding:0 14px 24px}.topbar{flex-direction:column;align-items:flex-start}.top-actions{width:100%;justify-content:flex-end}}
    </style>
    @stack('styles')
    <style>
        .mobile-menu-toggle,
        .sidebar-backdrop {
            display: none;
        }

        @media (max-width: 1180px) {
            body {
                overflow-x: hidden;
            }

            .layout {
                display: block !important;
                min-width: 0 !important;
            }

            .company-sidebar {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 1000 !important;
                width: 280px !important;
                max-width: 86vw !important;
                height: 100vh !important;
                display: flex !important;
                transform: translateX(-105%) !important;
                transition: transform .25s ease !important;
                box-shadow: 18px 0 36px rgba(6, 25, 66, .16) !important;
                overflow-y: auto !important;
            }

            .layout.sidebar-open .company-sidebar {
                transform: translateX(0) !important;
            }

            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                z-index: 900;
                background: rgba(6, 25, 66, .35);
            }

            .layout.sidebar-open .sidebar-backdrop {
                display: block;
            }

            .mobile-menu-toggle {
                width: 42px;
                height: 42px;
                border: 1px solid #dce7f8;
                border-radius: 8px;
                background: white;
                color: #061942;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                flex-shrink: 0;
            }

            .mobile-menu-toggle svg {
                width: 22px;
                height: 22px;
                fill: none;
                stroke: currentColor;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .main {
                width: 100% !important;
                min-width: 0 !important;
                padding: 0 18px 30px !important;
            }

            .topbar {
                min-height: 78px !important;
                display: grid !important;
                grid-template-columns: auto minmax(0, 1fr) auto !important;
                align-items: center !important;
                gap: 14px !important;
                margin-bottom: 22px !important;
            }

            .page-title {
                min-width: 0;
            }

            .page-title h1 {
                font-size: 24px !important;
                line-height: 1.2 !important;
                margin-bottom: 5px !important;
            }

            .page-title p {
                font-size: 13px !important;
                line-height: 1.45 !important;
            }

            .top-actions {
                width: auto !important;
                justify-content: flex-end !important;
                gap: 10px !important;
            }

            .top-user {
                padding-left: 12px !important;
                gap: 10px !important;
            }

            .top-avatar {
                width: 40px !important;
                height: 40px !important;
                font-size: 17px !important;
            }

            .top-user h3 {
                max-width: 150px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .card,
            .welcome-card,
            .profile-card,
            .job-card,
            .table-card,
            .billing-card,
            .settings-card,
            .message-card,
            .package-card,
            .filter-card,
            .list-card,
            .stat-card,
            .quick-card,
            .activity-card {
                max-width: 100% !important;
            }

            .stats-grid,
            .content-grid,
            .profile-grid,
            .filters,
            .grid,
            .plans,
            .benefits,
            .settings-layout,
            .form-grid,
            .bottom-grid,
            .middle-grid {
                grid-template-columns: 1fr !important;
            }

            .table-wrap,
            .job-list,
            .candidate-list,
            .history-table,
            .billing-table {
                max-width: 100% !important;
                overflow-x: auto !important;
            }
        }

        @media (max-width: 720px) {
            .main {
                padding: 0 12px 24px !important;
            }

            .topbar {
                grid-template-columns: auto 1fr !important;
                align-items: start !important;
                padding-top: 12px !important;
            }

            .top-actions {
                grid-column: 1 / -1;
                width: 100% !important;
                justify-content: space-between !important;
            }

            .top-user {
                border-left: 0 !important;
                padding-left: 0 !important;
            }

            .top-user h3 {
                max-width: 180px;
            }

            .page-title h1 {
                font-size: 22px !important;
            }

            .bell {
                width: 38px !important;
                height: 38px !important;
            }

            .company-logo img {
                width: 205px !important;
            }

            .company-menu-item {
                min-height: 42px !important;
                font-size: 14px !important;
            }
        }

        @media (max-width: 430px) {
            .top-user h3 {
                max-width: 128px;
            }

            .top-user p {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        @include('company.partials.sidebar')
        <button class="sidebar-backdrop" type="button" onclick="toggleCompanySidebar()" aria-label="Close menu"></button>
        <main class="main">
            <header class="topbar">
                <button class="mobile-menu-toggle" type="button" onclick="toggleCompanySidebar()" aria-label="Open menu">
                    <svg viewBox="0 0 24 24"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
                </button>
                <div class="page-title">
                    <h1>@yield('pageTitle')</h1>
                    @hasSection('pageSubtitle')<p>@yield('pageSubtitle')</p>@endif
                </div>
                <div class="top-actions">
                    @yield('topbarExtra')
                    <button class="bell" type="button">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>3</span>
                    </button>
                    <div class="top-user">
                        <div class="top-avatar">T</div>
                        <div><h3>TechNova Solutions</h3><p>Company</p></div>
                        <button type="button">v</button>
                    </div>
                </div>
            </header>
            @yield('content')
        </main>
    </div>
    <script>
        function toggleCompanySidebar() {
            document.querySelector('.layout').classList.toggle('sidebar-open');
        }
    </script>
    @stack('scripts')
</body>
</html>
