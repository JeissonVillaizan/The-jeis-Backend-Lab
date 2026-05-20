<!-- resources/views/components/header.blade.php -->
<header class="bg-[#0f1419] border-b border-blue-900/20 px-6 py-4 shadow-lg">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-800 text-gray-300" aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div>
                <h2 class="text-2xl font-bold text-white">@yield('page_title', t('header.default_title'))</h2>
                <p class="text-sm text-gray-400 mt-1">@yield('page_subtitle', t('header.default_subtitle'))</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 bg-[#111827] border border-blue-900/30 rounded-lg p-1">
                <a href="{{ route('locale.update', ['locale' => 'en']) }}" class="px-3 py-1 text-xs font-semibold rounded-md transition-all {{ ($currentLocale ?? 'en') === 'en' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    EN
                </a>
                <a href="{{ route('locale.update', ['locale' => 'es']) }}" class="px-3 py-1 text-xs font-semibold rounded-md transition-all {{ ($currentLocale ?? 'en') === 'es' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    ES
                </a>
            </div>

            <button class="p-2 hover:bg-gray-800 rounded-lg transition-all text-gray-400 hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>
            <button class="p-2 hover:bg-gray-800 rounded-lg transition-all text-gray-400 hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</header>
