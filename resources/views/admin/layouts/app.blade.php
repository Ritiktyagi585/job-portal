<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OnlyFreshers Admin')</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;color:#061942;background:#f4f8ff;font-weight:500}a{color:inherit;text-decoration:none}.admin-layout{min-height:100vh;display:grid;grid-template-columns:220px minmax(0,1fr)}.sidebar{background:white;border-right:1px solid #dce7f8;display:flex;flex-direction:column;justify-content:space-between;padding:14px 12px 22px}.logo img{width:190px;height:auto;display:block;margin:0 0 26px}.menu{display:grid;gap:8px}.menu-item{display:flex;align-items:center;gap:14px;padding:12px;border-radius:8px;color:#24344f;font-size:15px;font-weight:700}.menu-item.active{background:#eaf2ff;color:#075fe4;border-left:4px solid #075fe4}.menu-icon,.profile-icon{display:flex;align-items:center;justify-content:center;color:#075fe4;background:#eaf2ff;font-weight:700;flex-shrink:0}.menu-icon{width:28px;height:28px;border-radius:7px;font-size:11px}.menu-icon svg{width:17px;height:17px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.admin-profile{display:flex;align-items:center;gap:12px;padding:14px 2px 0;position:relative}.profile-icon{width:48px;height:48px;border-radius:50%}.profile-icon svg{width:24px;height:24px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.admin-profile h3{margin:0 0 4px;font-size:15px;font-weight:600}.admin-profile p{margin:0;color:#52607a;font-size:13px}.profile-menu-button{margin-left:auto;width:30px;height:30px;border:1px solid #dce7f8;border-radius:7px;background:white;color:#075fe4;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0}.profile-menu-button svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.profile-menu{position:absolute;right:0;bottom:58px;width:168px;padding:8px;border:1px solid #dce7f8;border-radius:8px;background:white;box-shadow:0 12px 28px rgba(6,25,66,.12);display:none;z-index:20}.profile-menu.show{display:block}.profile-email{padding:8px 10px;color:#52607a;font-size:12px;border-bottom:1px solid #edf2fb;margin-bottom:6px}.profile-menu a{display:flex;align-items:center;gap:8px;padding:9px 10px;border-radius:7px;color:#ff1f2f;font-size:13px;font-weight:700}.profile-menu a:hover{background:#fff0f1}.profile-menu a svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}.main{padding:36px 28px;min-width:0}.page-top{position:relative;display:flex;align-items:center;justify-content:space-between;margin-bottom:26px;padding-right:62px}.page-title h1{margin:0 0 14px;font-size:30px;font-weight:600}.breadcrumb{color:#52607a;font-size:15px}.top-actions{display:flex;align-items:center;gap:16px}.user-button{width:46px;height:46px;border-radius:50%;background:#eaf2ff;color:#075fe4;display:flex;align-items:center;justify-content:center;font-weight:700}.top-actions .user-button{position:absolute;top:0;right:0}.user-button svg{width:23px;height:23px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}@media(max-width:1100px){.admin-layout{grid-template-columns:1fr}.sidebar{display:none}.main{padding:28px 16px}}@media(max-width:680px){.page-top{padding-right:0;align-items:flex-start;gap:16px}.top-actions .user-button{position:static}}
    </style>
    @stack('styles')
    <style>
        .admin-mobile-toggle,
        .admin-sidebar-backdrop {
            display: none;
        }

        @media (max-width: 1100px) {
            html,
            body {
                max-width: 100%;
                overflow-x: hidden;
            }

            .admin-layout {
                display: block !important;
                min-width: 0 !important;
                max-width: 100vw !important;
            }

            .sidebar {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 1000 !important;
                width: 260px !important;
                max-width: 86vw !important;
                height: 100vh !important;
                display: flex !important;
                transform: translateX(-105%) !important;
                transition: transform .25s ease !important;
                box-shadow: 18px 0 38px rgba(6, 25, 66, .16) !important;
                overflow-y: auto !important;
            }

            .admin-layout.sidebar-open .sidebar {
                transform: translateX(0) !important;
            }

            .admin-sidebar-backdrop {
                position: fixed;
                inset: 0;
                z-index: 900;
                border: 0;
                background: rgba(6, 25, 66, .35);
            }

            .admin-layout.sidebar-open .admin-sidebar-backdrop {
                display: block;
            }

            .admin-mobile-toggle {
                width: 42px;
                height: 42px;
                border: 1px solid #dce7f8;
                border-radius: 8px;
                background: #fff;
                color: #075fe4;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                flex-shrink: 0;
            }

            .admin-mobile-toggle svg {
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
                padding: 22px 16px 30px !important;
            }

            .page-top {
                width: 100% !important;
                max-width: 100% !important;
                display: grid !important;
                grid-template-columns: auto minmax(0, 1fr) auto !important;
                align-items: center !important;
                gap: 14px !important;
                padding-right: 0 !important;
                margin-bottom: 22px !important;
            }

            .page-title {
                min-width: 0;
            }

            .page-title h1 {
                font-size: 23px !important;
                line-height: 1.2 !important;
                margin-bottom: 8px !important;
            }

            .breadcrumb {
                font-size: 13px !important;
            }

            .top-actions {
                min-width: 0 !important;
                gap: 10px !important;
                justify-content: flex-end !important;
            }

            .top-actions .user-button {
                position: static !important;
                width: 42px !important;
                height: 42px !important;
                flex-shrink: 0 !important;
            }

            .stats-grid,
            .stat-grid,
            .dashboard-grid,
            .chart-grid,
            .report-layout,
            .settings-card,
            .form-grid,
            .filter-box,
            .toolbar,
            .filters,
            .cards-grid {
                max-width: 100% !important;
                grid-template-columns: 1fr !important;
            }

            .table-box,
            .table-card,
            .table-wrap {
                max-width: 100% !important;
                overflow-x: auto !important;
            }

            table {
                min-width: 820px;
            }

            input,
            select,
            textarea,
            button {
                max-width: 100%;
            }

            .footer,
            .pagination,
            .pages {
                flex-wrap: wrap !important;
            }
        }

        @media (max-width: 680px) {
            .main {
                padding: 18px 12px 26px !important;
            }

            .page-top {
                grid-template-columns: auto minmax(0, 1fr) !important;
                align-items: flex-start !important;
            }

            .top-actions {
                grid-column: 1 / -1;
                width: 100%;
                justify-content: space-between !important;
            }

            .page-title h1 {
                font-size: 21px !important;
            }

            .logo img {
                width: 185px !important;
            }

            .menu-item {
                min-height: 42px !important;
                font-size: 14px !important;
            }

            .stat-card {
                min-height: auto !important;
            }

            .footer {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 12px !important;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        @include('admin.partials.sidebar')
        <button class="admin-sidebar-backdrop" type="button" onclick="toggleAdminSidebar()" aria-label="Close menu"></button>
        <main class="main">
            @hasSection('customTop')
                @yield('customTop')
            @else
                <div class="page-top">
                    <button class="admin-mobile-toggle" type="button" onclick="toggleAdminSidebar()" aria-label="Open menu">
                        <svg viewBox="0 0 24 24"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
                    </button>
                    <div class="page-title">
                        <h1>@yield('pageTitle')</h1>
                        @hasSection('breadcrumb')<div class="breadcrumb">@yield('breadcrumb')</div>@endif
                    </div>
                    <div class="top-actions">
                        @yield('topbarExtra')
                        <div class="user-button">
                            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"></circle><path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"></path></svg>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    <script>
        function toggleAdminSidebar() {
            document.querySelector('.admin-layout').classList.toggle('sidebar-open');
        }
    </script>
    @stack('scripts')
</body>
</html>
