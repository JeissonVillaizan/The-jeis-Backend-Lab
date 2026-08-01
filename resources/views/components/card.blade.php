@props([

    'href' => null

])















<a @if($href) href="{{ $href }}" @endif class=" cardGradient block  border border-[#B7DCE8]  rounded-xl p-6 hover:border-blue-800/50 transition-all shadow-xl group dark:border-[#1E3A8A] dark:hover:border-blue-900/50">
                {{ $slot }}

</a>