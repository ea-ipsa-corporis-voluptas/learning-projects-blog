@props(['class' => ''])
<div
    class="text-center{{ $class ? (' ' . $class) : '' }} font-bold text-xl"
    style="font-size: 35px; font-family: Monaco, monospace;"
>{{ $slot }}</div>