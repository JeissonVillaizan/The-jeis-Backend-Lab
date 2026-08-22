<!-- resources/views/components/sidebar.blade.php -->

<!-- Mobile overlay -->
<div id="mobile-overlay" class="fixed inset-0 bg-gray-900/30 z-30 hidden md:hidden"></div>

<!-- Mobile sidebar (drawer) -->
<div id="mobile-sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 transform -translate-x-full transition-transform md:hidden">
    <aside class="h-full CardGradient shadow-xl">
        <div class="h-full flex flex-col">
            <!-- Logo Section -->
            <div class="px-6 py-8 border-b border-[var(--border)]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-700 dark:text-white" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.4" d="M12 2l8 4.5v9L12 20l-8-4.5v-9L12 2z"></path>
                            <path stroke="currentColor" stroke-width="0.9" stroke-linecap="round" fill="none"
                                d="M13.5 8V13.5H10"></path>
                            <circle cx="13.5" cy="8" r="1" fill="currentColor"></circle>
                            <circle cx="13.5" cy="13.5" r="1" fill="currentColor"></circle>
                            <circle cx="10" cy="13.5" r="1" fill="currentColor"></circle>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-slate-900 dark:text-white">Jei's Backendlab</h1>
                        <p class="text-xs">v1.0</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="/"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-700 dark:text-slate-300 font-medium transition-all hover:bg-slate-900/10 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4">
                        </path>
                    </svg>
                    <span>{{ t('nav.dashboard') }}</span>
                </a>

                <a href="{{ route('projects') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                    </svg>
                    <span>{{ t('nav.projects') }}</span>
                </a>

                <a href="{{ route('certifications') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6M12 9v6m-7 3h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>{{ t('nav.certifications') }}</span>
                </a>

                <a href="{{ route('settings') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                    <span>{{ t('nav.settings') }}</span>
                </a>
            </nav>

            <!-- Footer -->
            <div class="px-4 py-4 border-t border-[var(--border)]">
                <div
                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-900/10 dark:hover:bg-slate-800/50 cursor-pointer transition-all">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-sm font-bold">
                        J
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900 dark:text-white truncate">Jeisson Dev</p>
                        <p class="text-xs truncate">jeissonvillaizan@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>

<!-- Desktop sidebar -->
<aside class="w-64 CardGradient shadow-xl hidden md:block">
    <div class="h-full flex flex-col">
        <!-- Logo Section -->
        <div class="px-6 py-8 ">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center">
                    <svg class="w-100 h-10 text-slate-700 dark:text-white" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                            d="M12 2l8 4.5v9L12 20l-8-4.5v-9L12 2z"></path>
                        <path stroke="currentColor" stroke-width="0.9" stroke-linecap="round" fill="none"
                            d="M13.5 8V13.5H10"></path>
                        <circle cx="13.5" cy="8" r="1" fill="currentColor"></circle>
                        <circle cx="13.5" cy="13.5" r="1" fill="currentColor"></circle>
                        <circle cx="10" cy="13.5" r="1" fill="currentColor"></circle>
                    </svg>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-slate-900 dark:text-white">Jei's Backendlab</h1>
                    <p class="text-xs">v1.0</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="/"
                class="flex items-center gap-3 px-4 py-3 rounded-lg  font-medium hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all {{ request()->routeIs('dashboard') ? 'bg-slate-900/10 text-slate-800 dark:bg-blue-900/20 dark:text-blue-300' : 'text-slate-600 dark:text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4"></path>
                </svg>
                <span>{{ t('nav.dashboard') }}</span>
            </a>

            <a href="{{ route('projects') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg  font-medium hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all {{ request()->routeIs('projects') ? 'bg-slate-900/10 text-slate-800 dark:bg-blue-900/20 dark:text-blue-300' : 'text-slate-600 dark:text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                <span>{{ t('nav.projects') }}</span>
            </a>

            <a href="{{ route('certifications') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg  font-medium hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all {{ request()->routeIs('certifications') ? 'bg-slate-900/10 text-slate-800 dark:bg-blue-900/20 dark:text-blue-300' : 'text-slate-600 dark:text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6M12 9v6m-7 3h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span>{{ t('nav.certifications') }}</span>
            </a>

            <a href="{{ route('settings') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg  font-medium hover:text-slate-900 dark:hover:text-white hover:bg-slate-900/10 dark:hover:bg-slate-800/50 transition-all {{ request()->routeIs('settings') ? 'bg-slate-900/10 text-slate-800 dark:bg-blue-900/20 dark:text-blue-300' : 'text-slate-600 dark:text-slate-400' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                    </path>
                </svg>
                <span>{{ t('nav.settings') }}</span>
            </a>
        </nav>

        <!-- Footer -->
        <div class="px-4 py-4 border-t border-[var(--border)]">
            <div
                class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-900/10 dark:hover:bg-slate-800/50 cursor-pointer transition-all">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-sm font-bold">
                    J
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-900 dark:text-white truncate">Jeisson Dev</p>
                    <p class="text-xs truncate">jeissonvillaizan@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</aside>