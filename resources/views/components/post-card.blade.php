@props(['post'])
<article
    {{ $attributes->merge(['class',
    'transition-colors duration-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}
>
    <div class="py-6 px-5">


        <div>

            <!-- POST ILLUSTRATION -->
            <a href="/posts/{{ $post->slug }}">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl"></a>

            <!-- VIEWS COUNT -->
            <div class="mt-2 ml-8 font-mono bold">
                {{ $post->total_views == 1 ? $post->total_views . ' view' : $post->total_views . ' views' }}
            </div>

        </div> 


        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2 text-center flex">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4 max-w-sm mx-auto text-xs text-center">
                    <a href="/{{ $post->customAsset() }}" style="font-family: Helvetica; text-shadow: 1px 1px;">
                        <x-panel :padding="'p-2'">
                            <h1 class="text-3xl text-center">
                                {{ $post->title }}
                            </h1>
                        </x-panel>
                    </a>

                    <span class="mt-2 block text-xs" style="font-family: Courier New;">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p style="font-size: 20px; font-family: Brush Script MT, cursive;">
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <x-panel :padding="'p-1'">
                    <a href="/?author={{ $post->author->userName }}" class="text-sm">
                        <div class="flex w-fit items-center">
                            <img src="/images/iconRobot.png" alt="Lary avatar" class="rounded-2xl" width="50">
                            <div class="ml-1 text-center">
                                    <h5 class="font-bold" style="font-family: Brush Script MT;">{{ $post->author->name }}</h5>
                            </div>
                        </div>
                    </a>
                </x-panel>

                <div class="ml-3 text-center">
                    <a href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 font-semibold text-sm"
                    >
                        <x-panel :padding="'w-max p-1'">
                            <span>Read More</span>
                        </x-panel>
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>