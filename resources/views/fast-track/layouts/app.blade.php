@php
    $student = array_merge(['name' => 'Ananya Gupta', 'notifications' => 3], $student ?? []);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fast Track')</title>
    @stack('styles')
    <style>
        .menu-icon svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .topbar .hamburger,
        .topbar .bell,
        .topbar #userMenuBtn {
            width: 34px;
            height: 34px;
            padding: 0;
            border: 0 !important;
            border-radius: 0;
            background: transparent !important;
            box-shadow: none !important;
            outline: 0;
            appearance: none;
            -webkit-appearance: none;
            color: #061942;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0;
            line-height: 0;
        }

        .topbar #userMenuBtn {
            width: 24px;
            height: 24px;
        }

        .topbar .hamburger svg,
        .topbar .bell svg,
        .topbar #userMenuBtn svg {
            width: 21px;
            height: 21px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            display: block;
        }

        .fast-track-backdrop {
            display: none;
        }

        @media (max-width: 1180px) {
            html,
            body {
                max-width: 100%;
                overflow-x: hidden;
            }

            .layout {
                display: block !important;
                min-width: 0 !important;
                max-width: 100vw !important;
            }

            .sidebar {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 1000 !important;
                width: 286px !important;
                max-width: 86vw !important;
                height: 100vh !important;
                display: flex !important;
                transform: translateX(-105%) !important;
                transition: transform .25s ease !important;
                box-shadow: 18px 0 38px rgba(6, 25, 66, .18) !important;
                overflow-y: auto !important;
            }

            .layout.sidebar-open .sidebar {
                transform: translateX(0) !important;
            }

            .fast-track-backdrop {
                position: fixed;
                inset: 0;
                z-index: 900;
                border: 0;
                background: rgba(6, 25, 66, .35);
            }

            .layout.sidebar-open .fast-track-backdrop {
                display: block;
            }

            .hamburger {
                width: 42px !important;
                height: 42px !important;
                border: 1px solid #dce7f8 !important;
                border-radius: 8px !important;
                background: white !important;
                color: #061942 !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                cursor: pointer !important;
                flex-shrink: 0 !important;
                font-size: 0 !important;
            }

            .hamburger svg,
            .bell svg,
            .user button svg {
                width: 21px;
                height: 21px;
                fill: none;
                stroke: currentColor;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .topbar {
                min-height: 76px !important;
                height: auto !important;
                padding: 12px 18px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                gap: 12px !important;
            }

            .user {
                margin-left: auto !important;
                min-width: 0 !important;
            }

            .content {
                width: 100% !important;
                min-width: 0 !important;
            }
        }

        @media (max-width: 720px) {
            .topbar {
                padding: 10px 12px !important;
            }

            .brand img {
                width: 205px !important;
            }

            .top-avatar {
                width: 40px !important;
                height: 40px !important;
            }

            .user h3 {
                max-width: 118px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                font-size: 13px !important;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        @include('fast-track.partials.sidebar')
        <button class="fast-track-backdrop" type="button" onclick="toggleFastTrackSidebar()" aria-label="Close menu"></button>

        <main class="main">
            <header class="topbar">
                <button class="hamburger" type="button" onclick="toggleFastTrackSidebar()" aria-label="Open menu">
                    <svg viewBox="0 0 24 24"><path d="M4 7h16"></path><path d="M4 12h16"></path><path d="M4 17h16"></path></svg>
                </button>

                <div class="user">
                    <button class="bell" type="button" aria-label="Notifications">
                        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path><path d="M10 21h4"></path></svg>
                        <span>{{ $student['notifications'] }}</span>
                    </button>
                    <div class="top-avatar"></div>
                    <h3>{{ $student['name'] }}</h3>
                    <button id="userMenuBtn" type="button" aria-label="Open account menu">
                        <svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"></path></svg>
                    </button>
                    <div class="user-menu" id="userMenu">
                        <a href="/fast-track/profile">My Profile</a>
                        <a href="/fast-track/login">Logout</a>
                    </div>
                </div>
            </header>

            @yield('content')
        </main>
    </div>

    <script>
        function toggleFastTrackSidebar() {
            document.querySelector('.layout').classList.toggle('sidebar-open');
        }

        const fastTrackUserMenuBtn = document.getElementById('userMenuBtn');
        const fastTrackUserMenu = document.getElementById('userMenu');

        if (fastTrackUserMenuBtn && fastTrackUserMenu) {
            fastTrackUserMenuBtn.addEventListener('click', function () {
                fastTrackUserMenu.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {
                if (!event.target.closest('.user')) {
                    fastTrackUserMenu.classList.remove('show');
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
