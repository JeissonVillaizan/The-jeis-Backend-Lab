<!-- resources/views/components/header.blade.php -->
<header class="CardGradient  px-6 py-4 shadow-lg ">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-slate-900/10 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300" aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">@yield('page_title', t('header.default_title'))</h2>
                <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">@yield('page_subtitle', t('header.default_subtitle'))</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 bg-[#d9ebf5] dark:bg-[#111827] border border-[var(--border)] rounded-lg p-1">
                <x-button href="{{ route('locale.update', ['locale' => 'en']) }}" variant="{{ ($currentLocale ?? 'es') === 'en' ? 'active' : 'inactive' }}" >
                    EN
                </x-button>
                <x-button href="{{ route('locale.update', ['locale' => 'es']) }}" variant="{{ ($currentLocale ?? 'en') === 'es' ? 'active' : 'inactive' }}" >
                    ES
                </x-button>
            </div>

            <div class="flex items-center gap-2 border border-[var(--border)] rounded-lg p-0.5 bg-[#d9ebf5] dark:bg-[#111827]">
                    <!-- white mode -->
                     <button onclick="setTheme('light')"  class=" transform scale-80 px-2 py-1 bg-[#0e7490] text-white  rounded-lg transition-all dark:bg-[#111827] dark:hover:bg-slate-800 ">
                        <svg class="w-5 h-5 " stroke-width="2" fill="currentColor" stroke="currentColor" viewBox="0 0 25 25">

                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M12 5l0 -2" />
                            <path d="M17 7l1.4 -1.4" />
                            <path d="M19 12l2 0" />
                            <path d="M17 17l1.4 1.4" />
                            <path d="M12 19l0 2" />
                            <path d="M7 17l-1.4 1.4" />
                            <path d="M6 12l-2 0" />
                            <path d="M7 7l-1.4 -1.4" />   
                        </svg>
                    </button>   
                    <!-- dark mode -->
                     <button onclick="setTheme('dark')" class="transform scale-80 px-2 py-1 hover:bg-slate-900/10 dark:hover:bg-slate-800 rounded-lg transition-all text-slate-700 dark:text-white hover:text-slate-900 dark:bg-[#0e7490] ">
                        <svg class="w-5 h-5" stroke-width="2" fill="currentColor" stroke="currentColor" viewBox="0 0 25 25">
                            <!-- Moon icon -->
                            <path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" />
                        </svg>
                    </button>
            </div>            
            <!-- notifications button -->
            <button id="notifications-button" class="p-2 hover:bg-slate-900/10 dark:hover:bg-slate-800 rounded-lg transition-all text-slate-500 dark:text-slate-400 relative hover:text-slate-700 dark:hover:text-slate-200">
                @php $unreadCount = $notifications->where('visibility_status', true)->count(); @endphp

                @if($unreadCount > 0)
                    <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 flex items-center justify-center bg-red-500 text-white text-[10px] font-bold rounded-full">
                        {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                    </span>
                @endif

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </button>

            <!-- settings button -->
            <a href="{{ route('settings') }}" class="p-2 hover:bg-slate-900/10 dark:hover:bg-slate-800 rounded-lg transition-all text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200    ">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </a>
        </div>
            <!-- desplegable de notificaciones -->
            <div id="notifications-dropdown" class="absolute right-4 top-16 w-80 softCardGradient border border-[var(--border)] rounded-xl shadow-xl z-50 hidden overflow-hidden">
                <div class="px-4 py-3 border-b border-[var(--border)]">
                    <h3 class="text-sm font-semibold text-slate-900 dark:text-white">Notifications</h3>
                </div>
                <div class="p-3">
                    @if($notifications->count() > 0)
                        <ul class="space-y-2 max-h-64 overflow-y-auto pr-1">
                            @foreach($notifications as $notification)
                            @if ($notification->visibility_status)
                                <li class="p-3 softCardGradient border border-[var(--border)] rounded-lg hover:bg-slate-100 dark:hover:bg-[#0f172a]/60 transition-colors cursor-pointer flex gap-3">

                                {{-- Iconos de notificaciones --}}
                                <div class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center
                                    @switch($notification->type)
                                        @case('project') bg-blue-500/15 text-blue-400 @break
                                        @case('certification') bg-green-500/15 text-green-400 @break
                                        @case('contact') bg-purple-500/15 text-purple-400 @break
                                        @default bg-gray-500/15 text-gray-400
                                    @endswitch">
                                    @switch($notification->type)
                                        @case('project')
                                            @break
                                        @case('certification')
                                            @break
                                        @case('contact')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            @break
                                        @default
                                    @endswitch
                                </div>
                                
                                {{-- Contenido de la notificacion --}}
                                <div class="min-w-0 flex-1">
                                    @switch($notification->type)
                                        @case('project')
                                            <span class="inline-block text-[11px] font-medium text-blue-400 bg-blue-500/10 rounded-full px-2 py-0.5 mb-1">Project</span>
                                            @break
                                        @case('certification')
                                            <span class="inline-block text-[11px] font-medium text-green-400 bg-green-500/10 rounded-full px-2 py-0.5 mb-1">Certification</span>
                                            @break
                                        @case('contact')
                                            <span class="inline-block text-[11px] font-medium text-purple-400 bg-purple-500/10 rounded-full px-2 py-0.5 mb-1">Contact Message</span>
                                            @break
                                        @default
                                            <span class="inline-block text-[11px] font-medium text-gray-400 bg-gray-500/10 rounded-full px-2 py-0.5 mb-1">Other</span>
                                    @endswitch

                                    <h4 class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">
                                        {{ t('notifications.new') }}
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-slate-500 dark:text-slate-400 text-center py-6">No notifications available.</p>
                    @endif
                </div>
            </div>
    </div>
</header>
<script>

    const notificationsButton = document.getElementById('notifications-button');
    const notificationsDropdown = document.getElementById('notifications-dropdown');

    notificationsButton.addEventListener('click', () => {
        notificationsDropdown.classList.toggle('hidden');
    });

    // Close the dropdown if clicked outside
    document.addEventListener('click', (event) => {
        if (!notificationsButton.contains(event.target) && !notificationsDropdown.contains(event.target)) {
            notificationsDropdown.classList.add('hidden');
        }
    });
</script>
