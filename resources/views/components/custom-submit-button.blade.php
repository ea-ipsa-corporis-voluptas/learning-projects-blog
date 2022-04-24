@props([
    'color' => 'gray',
    'opacity' => '900',
    'class' => ''
])
<div class="flex">
    <x-custom-panel :color="$color" :opacity="$opacity" :padding="'p-1'" :class="$class">
        <button
            type="submit"
            class="uppercase font-semibold text-xs py-2 px-10 rounded-2xl"
            style="font-size: 15px; font-weight: normal; font-family: monospace;"
        >{{ $slot }}</button>
    </x-custom-panel>
</div>