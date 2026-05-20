@extends('layouts.app')

@section('title', "Jei's Backendlab - " . t('nav.dashboard'))

@section('page_title', t('home.page_title'))
@section('page_subtitle', t('home.page_subtitle'))

@section('content')
<div class="space-y-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <a href="{{ route('projects') }}" class="block bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl p-6 hover:border-blue-800/50 transition-all shadow-xl group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">{{ t('home.stats.completed_projects') }}</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $projectsCount }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-400 mt-4">{{ t('home.stats.completed_projects_change') }}</p>
        </a>

        <!-- Card 2 -->
        <div class="bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl p-6 hover:border-blue-800/50 transition-all shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">{{ t('home.stats.month_visits') }}</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $monthVisits }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-400 mt-4">{{ t('home.stats.month_visits_change') }}</p>
        </div>

        <!-- Card 3 -->
        <a href="{{ route('certifications') }}" class="block bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl p-6 hover:border-blue-800/50 transition-all shadow-xl group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">{{ t('home.stats.skills') }}</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $certificationsCount }}</p>
                </div>
                <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-4">{{ t('nav.certifications') }}</p>
        </a>

        <!-- Card 4 -->
        <div class="bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl p-6 hover:border-blue-800/50 transition-all shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">{{ t('home.stats.contacts_received') }}</p>
                    <p class="text-3xl font-bold text-white mt-2">{{ $contactsReceivedCount }}</p>
                </div>
                <div class="w-12 h-12 bg-pink-500/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl p-8 shadow-xl">
        <h3 class="text-2xl font-bold text-white mb-4">{{ t('home.welcome.title') }}</h3>
        <p class="text-gray-300 leading-relaxed mb-6">
            {{ t('home.welcome.description') }}
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <button class="border border-gray-600 text-gray-300 hover:bg-gray-700 font-medium py-2 px-4 rounded-lg transition-all">
                {{ t('home.actions.github') }}
            </button>
            <button class="border border-blue-500 text-blue-400 hover:bg-blue-500/10 font-medium py-2 px-4 rounded-lg transition-all">
                {{ t('home.actions.resume') }}
            </button>
                <button id="contact-open-btn" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-all">
                {{ t('home.actions.contact') }}
            </button>
        </div>
    </div>

    <!-- Recent Projects -->
    <div class="bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl">
        <div class="p-6 border-b border-blue-900/20">
            <h3 class="text-xl font-bold text-white">{{ t('home.recent_projects') }}</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($recentProjects as $project)
                <div class="flex items-center justify-between p-4 bg-[#0f1419] rounded-lg hover:bg-[#1a2942] transition-all">
                    <div>
                        <p class="text-white font-medium">{{ $project->title }}</p>
                        <p class="text-sm text-gray-400">{{ $project->technologies }}</p>
                    </div>
                    <span class="px-3 py-1 text-xs rounded-full
                        @if($project->status === 'Completado')
                            bg-green-500/20 text-green-400
                        @elseif($project->status === 'En Progreso')
                            bg-yellow-500/20 text-yellow-400
                        @else
                            bg-blue-500/20 text-blue-400
                        @endif
                    ">
                        @if($project->status === 'Completado')
                            {{ t('status.completed') }}
                        @elseif($project->status === 'En Progreso')
                            {{ t('status.in_progress') }}
                        @else
                            {{ t('status.planned') }}
                        @endif
                    </span>
                </div>
                @empty
                <p class="text-gray-400 text-center py-4">{{ t('projects.empty_short') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Contact modal -->
<div id="contact-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 {{ session('open_contact_modal') || $errors->getBag('contact')->any() ? '' : 'hidden' }}"></div>
<div id="contact-modal" class="fixed inset-0 z-50 flex items-start pt-24 justify-center px-4 sm:px-6 lg:px-8 {{ session('open_contact_modal') || $errors->getBag('contact')->any() ? '' : 'hidden' }}">
    <div class="w-full max-w-2xl bg-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-blue-900/20 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">{{ t('contacts.modal.title') }}</h3>
            <button id="contact-close-btn" type="button" class="text-gray-400 hover:text-white">✕</button>
        </div>

        <form class="p-6 space-y-5" method="POST" action="{{ route('contact.store') }}">
            @csrf

            @if($errors->getBag('contact')->any())
                <div class="rounded-md border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->getBag('contact')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('contacts.fields.email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('contacts.placeholders.email') }}" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('contacts.fields.subject') }}</label>
                <input type="text" name="subject" value="{{ old('subject') }}" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('contacts.placeholders.subject') }}" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('contacts.fields.message') }}</label>
                <textarea name="message" rows="5" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('contacts.placeholders.message') }}">{{ old('message') }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" id="contact-cancel" class="px-4 py-2 rounded-md bg-gray-700 text-gray-200 hover:bg-gray-600">{{ t('actions.cancel') }}</button>
                <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">{{ t('actions.save') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const contactOpenBtn = document.getElementById('contact-open-btn');
    const contactOverlay = document.getElementById('contact-overlay');
    const contactModal = document.getElementById('contact-modal');
    const contactCloseBtn = document.getElementById('contact-close-btn');
    const contactCancelBtn = document.getElementById('contact-cancel');

    function openContactModal() {
        if (contactOverlay) contactOverlay.classList.remove('hidden');
        if (contactModal) contactModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeContactModal() {
        if (contactOverlay) contactOverlay.classList.add('hidden');
        if (contactModal) contactModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    if (contactOpenBtn) contactOpenBtn.addEventListener('click', openContactModal);
    if (contactCloseBtn) contactCloseBtn.addEventListener('click', closeContactModal);
    if (contactCancelBtn) contactCancelBtn.addEventListener('click', closeContactModal);
    if (contactOverlay) contactOverlay.addEventListener('click', closeContactModal);

    if (contactModal && !contactModal.classList.contains('hidden')) {
        document.body.classList.add('overflow-hidden');
    }
});
</script>
@endsection
