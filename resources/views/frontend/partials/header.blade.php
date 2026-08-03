@php
    $activePage = $activePage ?? 'home';
    $navItems = [
        ['key' => 'home', 'label' => 'Home', 'url' => '/'],
        ['key' => 'jobs', 'label' => 'Jobs', 'url' => '/job'],
        ['key' => 'fast-track', 'label' => 'Fast Track Program', 'url' => '/fast-track'],
        ['key' => 'training-partners', 'label' => 'Training Partners', 'url' => '/training-partners'],
        ['key' => 'about', 'label' => 'About Us', 'url' => '/about'],
    ];
@endphp

<header class="navbar">
    <div class="container nav-content">
        <a href="/" class="logo">
            <img src="{{ asset('ofclogo1.png') }}" alt="OnlyFreshers Logo" class="logo-image">
        </a>

        <button class="side-menu-button" type="button" onclick="toggleMobileMenu()">☰</button>

        <nav class="menu">
            @foreach ($navItems as $item)
                <a href="{{ $item['url'] }}" class="{{ $activePage === $item['key'] ? 'active' : '' }}">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <div class="nav-buttons">
            <a href="#" class="button outline-button">Login</a>
            <a href="#" class="button blue-button">Register</a>
        </div>
    </div>
</header>

<div id="mobileSidebar" class="mobile-sidebar">
    <button class="close-menu-button" type="button" onclick="toggleMobileMenu()">×</button>
    <nav class="side-links">
        @foreach ($navItems as $item)
            <a href="{{ $item['url'] }}" class="{{ $activePage === $item['key'] ? 'active' : '' }}">{{ $item['label'] }}</a>
        @endforeach
    </nav>
    <div class="side-buttons">
        <a href="#" class="button outline-button">Login</a>
        <a href="#" class="button blue-button">Register</a>
    </div>
</div>
