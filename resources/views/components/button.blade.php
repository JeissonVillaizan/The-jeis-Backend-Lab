@props([
    'type' => 'button',
    'variant' => 'off',
    'href' => null
    
])

@php
$classes = match ($variant) {
    'active' => 'bg-[#0e7490] hover:bg-[#0b5e73] text-white dark:bg-[#0e7490] dark:text-white',
    'inactive' => 'text-slate-600 hover:bg-slate-200 dark:text-slate-300 dark:hover:bg-slate-800',
    'off' => 'bg-transparent   dark:text-gray-300',
    'default' => 'bg-blue-600 hover:bg-blue-700 text-white   dark:bg-blue-600 dark:text-white',
};

@endphp

<a @if($href) href="{{ $href }}" @endif>
<button type="{{ $type }}" {{ $attributes->merge(['class' => "px-2 py-1 text-xs font-semibold rounded-md transition-all $classes"]) }}>
    
    {{ $slot }}
</button>
</a>