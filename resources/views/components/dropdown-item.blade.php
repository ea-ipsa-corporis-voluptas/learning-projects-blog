@props([
    'active' => false,
    'reverse' => false,
    'ei' => false,
    'class' => '',
    'background' => ''
])
@php
    $classes = 'block text-left px-3 text-sm leading-6 rounded-full';
    if($active) {
        if(!$reverse)
            $background = ' bg-gray-600 text-white ';
        else
            $background = ' bg-gray-400 text-black ';
    }
@endphp
<a {{ $attributes(['class' => $classes]) }}>
    <x-panel :padding="'p-1'" :automargin="false" :reverse="$reverse" :ei="$ei" :background="$background" :class="$class">
    {{ $slot }}</x-panel>
</a>