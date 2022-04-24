@props([
    'name' => '',
    'padding' => 'mb-8 mt-16',
    'class' => ''
])
<label
    class="block {{ $class }} {{ $padding }} uppercase font-bold text-xs"
    style="font-size: 15px; font-weight: 600; font-family: Lucida Handwriting, monospace;"
    for="{{ $name }}"
>{{ $slot }}</label>