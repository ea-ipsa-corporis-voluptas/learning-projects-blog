@props(['category'])

<div class="ml-3 text-center">
    <a
        href="/?category={{ $category->slug }}"
        style="font-family: Lucida Console; text-shadow: 2px 2px darkred;"
    >
        <x-panel :padding="'p-1'" reverse="true">
            {{ $category->name }}
        </x-panel>
    </a>
</div>