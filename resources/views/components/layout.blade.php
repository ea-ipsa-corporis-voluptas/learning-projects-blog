<!doctype html>

<title>Earum facilis asperiores corporis explicabo rerum voluptatibus. Laboriosam et deleniti maiores ea non aperiam.</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
    div {
        transition: 0.3s;
    }
    article {
        transition: 0.5s;
    }
</style>

<body style="font-family: Open Sans, sans-serif; background: rgba(10, 20, 10, 0.5); color: black; font-weight: bold;" id="aTheme">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <a href="/">
            <img src="{{ asset('storage/' . 'logos/aLogo.png') }}" alt="Logo" width="495" class="rounded-2xl animate-pulse duration-1000"></a>

            <div class="mt-8 md:mt-0 flex max-w-lg items-center">
                @guest
                    <a href="/register" class="font-bold uppercase text-center">
                        <x-panel :padding="'p-2'" :reverse="true" :rounded="'rounded-full'" :autoMargin="false">
                        Register</x-panel>
                    </a>
                    <a href="/login" class="ml-1 font-bold uppercase text-center">
                        <x-panel :padding="'p-2'" :reverse="true" :rounded="'rounded-full'" :autoMargin="false">
                        Log In</x-panel>
                    </a>
                @else
                    <x-dropdown :class="'relative'" :color="'gray'">
                        <x-slot name="trigger">
                        <button class="p-1 text-sm">Welcome, {{ auth()->user()->name }}!</button></x-slot>
                        @admin
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')" :class="'text-xs text-center'">
                            New Post</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')" :class="'text-xs text-center'">
                            All Posts</x-dropdown-item>
                        @endadmin
                        <x-dropdown-item href="/bookmarks" :active="request()->routeIs('bookmarks')" :class="'text-xs text-center'">
                        Bookmarks</x-dropdown-item>
                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                            :background="'bg-gray-700 hover:bg-gray-600 text-white font-mono tracking-widest text-xs'"
                        >Log Out</x-dropdown-item>
                        <form method="POST" action="/logout" class="hidden" id="logout-form">
                            @csrf
                        </form>
                    </x-dropdown>
                @endguest

                <a href="#email" class="ml-3 font-semibold uppercase text-center">
                    <x-panel :padding="'p-2'" :reverse="true" :ei="true" :rounded="'rounded-full'" :autoMargin="false">
                        Subscribe for Updates
                    </x-panel>
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer
            id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
        >
            <img src="/images/iconRobot.png" alt="Icon" class="mb-5 rounded-3xl mx-auto" style="width: 145px;">
            <h5 class="text-3xl">Subscribe to our newsletter.</h5>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <x-form.input :name="'email'" :padding="'mr-2'" :heading="'Email'" :sizing="'p-2'" :type="'email'" />
                        </div>
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <x-form.input :name="'name'" :padding="'ml-2 mr-2'" :heading="'Name'" :sizing="'p-2'" />
                        </div>

                        <button
                            type="submit"
                            class="transition-colors duration-300 bg-gray-800 hover:bg-gray-400 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white hover:text-black uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <x-flash :related="'success'" />
</body>
