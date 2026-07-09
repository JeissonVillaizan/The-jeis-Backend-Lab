@extends('layouts.app')

@section('title', "Jei's Backendlab - Settings")
@section('page_title', 'Settings')
@section('page_subtitle', 'Manage translations manually')

@section('content')
<div class="space-y-8">
    @if(session('status'))
        <div class="rounded-xl border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-200">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl p-6">
            <h3 class="text-lg font-bold text-white mb-4">Add or update translation</h3>
            <form class="space-y-4" method="POST" action="{{ route('settings.translations.store') }}">
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-sm text-gray-400">Key</label>
                    <input type="text" name="key" value="{{ old('key') }}" placeholder="home.page_title" class="w-full bg-[#0b1116] border @error('key') border-red-500 @else border-blue-900/20 @enderror rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" />
                    @error('key')<p class="text-xs text-red-300">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm text-gray-400">Locale</label>
                    <select name="locale" class="w-full bg-[#0b1116] border @error('locale') border-red-500 @else border-blue-900/20 @enderror rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition">
                        <option value="en" @selected(old('locale') === 'en')>English</option>
                        <option value="es" @selected(old('locale') === 'es')>Spanish</option>
                    </select>
                    @error('locale')<p class="text-xs text-red-300">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm text-gray-400">Value</label>
                    <textarea name="value" rows="5" placeholder="Dashboard" class="w-full bg-[#0b1116] border @error('value') border-red-500 @else border-blue-900/20 @enderror rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition">{{ old('value') }}</textarea>
                    @error('value')<p class="text-xs text-red-300">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-all">
                    Save translation
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-blue-900/20 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white">Current translations</h3>
                    <p class="text-sm text-gray-400">{{ $translations->count() }} entries</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-blue-900/20 text-sm">
                    <thead class="bg-[#0f1419] text-gray-400 uppercase tracking-wide text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">Key</th>
                            <th class="px-6 py-3 text-left">Locale</th>
                            <th class="px-6 py-3 text-left">Value</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-900/10">
                        @forelse($translations as $translation)
                            <tr class="hover:bg-[#0f1419]/60 transition-colors">
                                <td class="px-6 py-4 text-white font-medium whitespace-nowrap">{{ $translation->key }}</td>
                                <td class="px-6 py-4 text-gray-300 uppercase">{{ $translation->locale }}</td>
                                <td class="px-6 py-4 text-gray-300 max-w-xl break-words">{{ $translation->value }}</td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('settings.translations.destroy', $translation) }}" onsubmit="return confirm('Delete this translation?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-md bg-red-500/10 text-red-300 hover:bg-red-500/20 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-400">No translations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection