<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <script>
        const theme = localStorage.getItem('theme');

        if (theme === 'dark' || theme === null) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#eaf4fb">
    <title>@yield('title', "Jei's Backendlab - Portafolio")</title>
    @if(app()->environment('local') && env('VITE_DEV_SERVER_URL'))
        <script type="module" src="{{ rtrim(env('VITE_DEV_SERVER_URL'), '/') }}/@@vite/client"></script>
        <link rel="stylesheet" href="{{ rtrim(env('VITE_DEV_SERVER_URL'), '/') }}/resources/css/app.css" />
        <script type="module" src="{{ rtrim(env('VITE_DEV_SERVER_URL'), '/') }}/resources/js/app.js"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="cardGradient min-h-screen ">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <x-header />

            <!-- Content -->
            <main id="main-content" class="flex-1 overflow-y-auto">
                <div  class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
<div id="overlay" class="flex items-center justify-center fixed inset-0 bg-black/50 z-40 hidden"></div>

<script>

    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }


    function setTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            document.querySelector('meta[name="theme-color"]').setAttribute('content', '#111827');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            document.querySelector('meta[name="theme-color"]').setAttribute('content', '#eaf4fb');

        }
    }

</script>

    @yield('scripts')
</body>
</html>

