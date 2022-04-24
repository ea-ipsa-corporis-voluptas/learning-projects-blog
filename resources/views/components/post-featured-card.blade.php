@props(['post'])

<article class="bg-gray-100 text-black hover:bg-gray-800 hover:text-white">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">

            
            <!-- POST ILLUSTRATION -->
            <a href="/posts/{{ $post->slug }}">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl"></a>

            <!-- VIEWS COUNT -->
            <div class="mt-2 ml-8 font-mono bold">
                {{ $post->total_views == 1 ? $post->total_views . ' view' : $post->total_views . ' views' }}
            </div>
            
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2 text-center flex">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4 max-w-sm mx-auto text-xs text-center">
                    <a href="/{{ $post->customAsset() }}" style="font-family: Arial; text-shadow: 1px 1px; letter-spacing: 0px;">
                        <x-panel :padding="'p-2'">
                            <h1 class="text-3xl">
                                {{ $post->title }}
                            </h1>
                        </x-panel>
                    </a>

                    <span class="mt-2 block text-xs" style="font-family: Courier New;">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p style="font-family: monospace; font-size: 25px; line-height: 30px; letter-spacing: -2.2px;" class="mt-3">
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <x-panel :padding="'p-1'">
                    <a href="/?author={{ $post->author->userName }}" class="text-sm">
                        <div class="flex items-center text-sm">
                            <img src="/images/iconRobot.png" alt="Lary avatar" class="rounded-2xl" width="50">
                            <div class="ml-1">
                                <h5 class="font-bold" style="font-family: Brush Script MT;">{{ $post->author->name }}</h5>
                            </div>
                        </div>
                    </a>
                </x-panel>

                <div class="ml-3 text-center">
                    <a  
                        href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 text-sm font-semibold"
                    >
                        <div class="hidden lg:block">
                            <x-panel :padding="'p-1'">Read More</x-panel>
                        </div>
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>