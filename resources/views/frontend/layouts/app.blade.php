<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OnlyFreshers')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    @stack('styles')
</head>
<body>
    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileSidebar').classList.toggle('show');
        }
    </script>
    @stack('scripts')
</body>
</html>
