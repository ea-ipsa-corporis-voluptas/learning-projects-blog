@props([
    'requestPrefix' => ''
])
<x-dropdown :class="'w-min'">
    <x-slot name="trigger">
        <button type="button" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <!-- <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 20px;" /> -->
        </button>
    </x-slot>
    <x-dropdown-item
        href="/{{ $requestPrefix }}?{{ http_build_query(request()->except('category', 'author', 'page')) }}"
        :active="request()->routeIs('home')"
        :class="'text-xs text-center'"
    >All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            href="/{{ $requestPrefix }}?category={{ request()->except('category') ?
            $category->slug . '&' . http_build_query(request()->except('category', 'page'))
                :
            $category->slug }}"
            :active='request()->is("categories/{$category->slug}")'
            :class="'text-xs text-center'"
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>