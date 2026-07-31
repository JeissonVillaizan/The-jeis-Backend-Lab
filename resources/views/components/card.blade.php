@props([

    'href' => null

])






<a @if($href) href="{{ $href }}" @endif class="block bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl p-6 hover:border-blue-800/50 transition-all shadow-xl group">
                {{ $slot }}

</a>