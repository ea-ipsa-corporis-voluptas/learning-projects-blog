@props([
    'class' => 'pt-32 max-w-7xl mx-auto',
    'heading' => '',
    'headerWidth' => '',
    'edit' => false
])
<section class="{{ $class }}">
    <x-panel :padding="'p-1 mx-auto'" :autoMargin="false" :class="$headerWidth ? $headerWidth : 'max-w-xs'">
        <x-form-header>{{ $heading }}</x-form-header>
        @if($edit)
            <x-panel :padding="'p-2 w-fit'" :reverse="true" :ei="true">
                <x-form-header :class="'italic tracking-tighter'">{{ $edit }}</x-form-header>
            </x-panel>
        @endif
    </x-panel>
    <div class="flex">
        <aside class="w-fit flex-shrink-0">
            <x-panel :padding="'p-2 mr-10 w-max mx-auto'" :reverse="true" :ei="true" :autoMargin="false">
                <x-form-header>Links</x-form-header>
            </x-panel>
            <x-div-wrapper :class="'w-max p-1 mt-10 mr-10 rounded-3xl bg-gray-900 text-center hover:bg-gray-800'">
                <ul>
                    @admin
                        <li>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                            New Post</x-dropdown-item>
                        </li>
                        <li>
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">
                            All Posts</x-dropdown-item>
                        </li>
                    @endadmin
                    <x-dropdown-item href="/bookmarks" :active="request()->routeIs('bookmarks')">
                        <li>Bookmarks</li>
                    </x-dropdown-item>
                </ul>
            </x-div-wrapper>
        </aside>
        <main class="mx-auto flex-1 max-w-9xl">
            <x-custom-panel :padding="'p-6 w-fit'" :opacity="'200'" :class="'mx-auto'">
                {{ $slot }}
            </x-custom-panel>
        </main>
    </div>
</section>