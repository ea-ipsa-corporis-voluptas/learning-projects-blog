@props([
    'post',
    'class' => ''
])
<x-div-wrapper :class="'mt-4 text-right'">
    <form method="POST" action="/admin/posts/{{ $post->slug }}">
        @csrf
        @method("DELETE")
        <button
            type="submit"
            class="w-fit p-1 mr-52 w-fit rounded-xl bg-gray-500 text-white"
            style="font-size: 12px; font-style: monospace;"
        >Delete</button>
    </form>
    <x-div-wrapper :class="'mx-auto flex max-w-lg rounded-full bg-gray-800'">
        <main class="w-min flex-1">
            <a href="{{ asset('storage/' . $post->thumbnail) }}">
                @if($class === 'animate-spin')
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Illustration"
                        class="{{ $class ? $class . ' rounded-full' : 'rounded-full' }}"
                        style="animation-duration: 16s;"
                    >
                @else
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Illustration"
                        class="{{ $class ? $class . ' rounded-full' : 'rounded-full' }}"
                        style="animation-duration: 4s;"
                    >
                @endif
            </a>
        </main>
        <aside class="w-96">
            <a href="/{{ $post->customAsset() }}" style="font-family: Lucida Console;">
                <x-div-wrapper :class="'ml-2 truncate p-1 mx-auto rounded-full text-center bg-gray-500 text-white'">
                    {{ $post->title }}
                </x-div-wrapper>
            </a>
            <p class="text-center text-white" style="font-size: 11px; font-family: Courier New;">{{ $post->created_at->diffForHumans() }}</p>
            <x-div-wrapper :class="'text-left ml-2 max-w-xs w-fit p-1 text-xs'">
                <a
                    href="/?author={{ $post->author->userName }}"
                    class="w-fit rounded-xl bg-gray-500 text-white"
                    style="font-family: monospace;"
                >{{ $post->author->userName }}</a>
                <a
                    href="/?category={{ $post->category->slug }}"
                    class="w-fit rounded-xl bg-gray-500 text-white"
                    style="font-family: monospace;"
                >{{ ucwords($post->category->name) }}</a>
            </x-div-wrapper>
        </aside>
    </x-div-wrapper>
    <a
        href="/admin/posts/{{ $post->slug }}/edit"
        class="p-1 mr-72 w-fit rounded-xl bg-gray-500 text-white animate-pulse"
        style="font-size: 12px; font-family: cursive;"
    >Edit</a>
</x-div-wrapper>