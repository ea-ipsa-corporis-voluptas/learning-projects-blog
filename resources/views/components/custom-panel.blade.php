@props([
    'padding' => 'p-6',
    'rounded' => 'rounded-xl',
    'opacity' => '900',
    'color' => 'gray',
    'class' => ''
])
<div
    style="font-family: sans-serif; font-size: 20px;"
    class="ml-3 mt-3 mr-3 mb-3 {{ $class . ' ' . $padding }} border border-black {{ $rounded }}
    bg-{{ $color }}-{{ $opacity }} text-{{ intval($opacity) < 500 ? 'black' : 'white' }} }}
    hover:bg-{{ $color }}-{{ strval(1000 - intval($opacity)) }} hover:text-{{ (1000 - intval($opacity)) < 500 ? 'black' : 'white' }}"
>{{ $slot }}</div>