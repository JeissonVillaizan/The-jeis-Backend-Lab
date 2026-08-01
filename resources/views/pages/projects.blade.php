@extends('layouts.app')

@section('title', "Jei's Backendlab - " . t('nav.projects'))

@section('page_title', t('projects.page_title'))
@section('page_subtitle', t('projects.page_subtitle'))

@section('content')
<div class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $project)

        <div class="cardGradient border border-[#B7DCE8] dark:border-[#1E3A8A] dark:hover:border-blue-900/50 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-transform duration-200 flex flex-col  rounded-xl overflow-hidden transition-all shadow-xl h-full">

            <!-- Header -->
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>

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
            <div class="flex-1 p-6 space-y-4">
                <div>
                    <p class="text-sm mb-2">{{ t('projects.description') }}</p>
                    <p>{{ $project->description }}</p>
                </div>

                <div>
                    <p class="text-sm mb-2">{{ t('projects.technologies') }}</p>
                    <p class="font-medium text-[var(--primary)]">
                        {{ $project->technologies }}
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-6">
                <button class="buttonPrimary w-full">
                    {{ t('projects.view_details') }}
                </button>
            </div>

        </div>

        @empty
        @endforelse
    </div>
</div>
@endsection
