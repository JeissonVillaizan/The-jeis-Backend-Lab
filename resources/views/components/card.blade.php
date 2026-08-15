@props(['href' => null])

@php
    $tag = $href ? 'a' : 'div';
@endphp


<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif 
    {{ $attributes->merge([
        'class' => 'softCardGradient block border border-[var(--border)] rounded-xl p-6 transition-all shadow-xl group'
    ]) }}
>
    {{ $slot }}
</{{ $tag }}>
