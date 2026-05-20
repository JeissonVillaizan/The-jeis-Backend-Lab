<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Jei's Backendlab - Portafolio")</title>
    @if(app()->environment('local') && env('VITE_DEV_SERVER_URL'))
        <script type="module" src="{{ rtrim(env('VITE_DEV_SERVER_URL'), '/') }}/@@vite/client"></script>
        <link rel="stylesheet" href="{{ rtrim(env('VITE_DEV_SERVER_URL'), '/') }}/resources/css/app.css" />
        <script type="module" src="{{ rtrim(env('VITE_DEV_SERVER_URL'), '/') }}/resources/js/app.js"></script>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gradient-to-br from-[#0b1120] via-[#111827] to-[#1e3a8a] text-gray-100 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <x-header />

            <!-- Content -->
            <main class="flex-1 overflow-y-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>
