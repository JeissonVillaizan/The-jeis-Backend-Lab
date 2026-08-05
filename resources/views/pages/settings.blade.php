@extends('layouts.app')

@section('title', "Jei's Backendlab - Settings")
@section('page_title', 'Settings')
@section('page_subtitle', 'Manage translations manually')

@section('content')
<div class="space-y-8">

        <div id="status-message" class="rounded-xl border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-200 hidden">
            
        </div>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 cardGradient border border-blue-900/30 rounded-xl shadow-xl p-6">
            <h3 class="text-lg font-bold text-white mb-4">Add or update translation</h3>
            <form id="saveTranslation-form" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-sm ">Key</label>
                    <input type="text" name="key" value="{{ old('key') }}" placeholder="home.page_title" class="w-full cardGradient border @error('key') border-red-500 @else border-blue-900/20 @enderror rounded-md px-3 py-2  focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" />
                    <p id="key-error-0" class="text-xs text-red-300"></p>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm ">Locale</label>
                    <select name="locale" class="w-full cardGradient border @error('locale') border-red-500 @else border-blue-900/20 @enderror rounded-md px-3 py-2  focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition">
                        <option value="en" @selected(old('locale') === 'en')>English</option>
                        <option value="es" @selected(old('locale') === 'es')>Spanish</option>
                    </select>
                    <p id="key-error-1" class="text-xs text-red-300"></p>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm ">Value</label>
                    <textarea name="value" rows="5" placeholder="Dashboard" class="w-full cardGradient border @error('value') border-red-500 @else border-blue-900/20 @enderror rounded-md px-3 py-2  focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition">{{ old('value') }}</textarea>
                    <p id="key-error-2" class="text-xs text-red-300"></p>
                </div>
                <button type="submit" class=" buttonPrimary openmodal w-full">
                    Save translation
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 cardGradient border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-blue-900/20 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold">Current translations</h3>
                    <p class="text-sm ">{{ $translations->count() }} entries</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-blue-900/20 text-sm">
                    <thead class="cardGradient  uppercase tracking-wide text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">Key</th>
                            <th class="px-6 py-3 text-left">Locale</th>
                            <th class="px-6 py-3 text-left">Value</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-900/10">
                        @forelse($translations as $translation)
                            <tr class="hover:bg-[#0f1419]/10 dark:hover:bg-[#0f1419]/60 transition-colors">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $translation->key }}</td>
                                <td class="px-6 py-4  uppercase">{{ $translation->locale }}</td>
                                <td class="px-6 py-4  max-w-xl break-words">{{ $translation->value }}</td>
                                <td class="px-6 py-4 text-right">
                                        <button type="button" data-modal="open-modal" data-id="{{ $translation->id }}" data-behavior="deleteTranslation" class=" buttonSecondary translation-open-modal">
                                            Delete
                                        </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center ">No translations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/AuthModal.js') }}" defer></script>
<script type="application/json" id="modalTranslations">
    {
        "confirmChanges":"{{ t('Translation.Confirm_Changes') }}",
        "passwordDescription":"{{ t('Translation.Password.Description') }}",
        "password":"{{ t('Translation.Password') }}",
        "cancel":"{{ t('Translation.cancel') }}",
        "confirm":"{{ t('Translation.confirm') }}",
        "keyError":"{{ t('Translation.Key_Error') }}"
    }
</script>
@endsection