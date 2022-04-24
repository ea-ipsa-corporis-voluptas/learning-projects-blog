<div class="flex text-center">
    <x-panel :padding="'p-1'" :reverse="true" :ei="true">
        <button
            type="submit"
            class="uppercase font-semibold text-xs py-2 rounded-2xl"
            style="font-size: 15px; font-weight: normal; font-family: monospace;"
        >{{ $slot }}</button>
    </x-panel>
</div>