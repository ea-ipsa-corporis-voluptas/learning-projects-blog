@props([
    'trigger',
    'color' => 'gray',
    'class' => ''
])
<div
    x-data="{ show: false }"
    @click.away="show = false"
    class="{{ $class }}"
><!-- trigger -->
    <div @click="show = !show">
        <x-custom-panel :color="$color" :opacity="'700'" :padding="''" :reverse="true" :rounded="'rounded-full'" :autoMargin="false">
        {{ $trigger }}</x-custom-panel>
    </div>
    <!-- dropdownLinks -->
    <div
        x-show="show"
        class="absolute p-0 bg-gray-900 hover:bg-gray-800 rounded-3xl z-50 overflow-auto max-h-52"
        style="display: none;"
    >{{ $slot }}</div>
</div>