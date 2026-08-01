@props([
    'type' => 'button',
    'variant' => 'off',
    'href' => null
    
])

@php
$classes = match ($variant) {
    'active' => 'bg-[#0B78B3] hover:bg-blue-700 text-white   dark:bg-blue-600 dark:text-white',
    'inactive' => 'dark:text-white hover:bg-gray-300 text-gray-100   dark:text-gray-300 dark:hover:bg-gray-800',
    'off' => 'bg-transparent   dark:text-gray-300',
    'default' => 'bg-blue-600 hover:bg-blue-700 text-white   dark:bg-blue-600 dark:text-white',
};

@endphp

<a @if($href) href="{{ $href }}" @endif>
<button type="{{ $type }}" {{ $attributes->merge(['class' => "px-2 py-1 text-xs font-semibold rounded-md transition-all $classes"]) }}>
    
    {{ $slot }}
</button>
</a>