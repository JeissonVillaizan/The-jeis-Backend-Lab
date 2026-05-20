@extends('layouts.app')

@section('title', "Jei's Backendlab - " . t('nav.projects'))

@section('page_title', t('projects.page_title'))
@section('page_subtitle', t('projects.page_subtitle'))

@section('content')
<div class="space-y-8">
    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $project)
        <div class="bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl overflow-hidden hover:border-blue-800/50 transition-all shadow-xl">
            <!-- Header -->
            <div class="p-6 border-b border-blue-900/20">
                <h3 class="text-xl font-bold text-white mb-2">{{ $project->title }}</h3>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium
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

            <!-- Content -->
            <div class="p-6 space-y-4">
                <div>
                    <p class="text-gray-400 text-sm mb-2">{{ t('projects.description') }}</p>
                    <p class="text-gray-300">{{ $project->description }}</p>
                </div>

                <div>
                    <p class="text-gray-400 text-sm mb-2">{{ t('projects.technologies') }}</p>
                    <p class="text-blue-400 font-medium">{{ $project->technologies }}</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 bg-[#0f1419] border-t border-blue-900/20">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-all">
                    {{ t('projects.view_details') }}
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-400 text-lg">{{ t('projects.empty') }}</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
