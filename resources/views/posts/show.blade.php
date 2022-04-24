<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    @include('posts._subscribe-form')
                    <a href="{{ asset('storage/' . $post->thumbnail) }}">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
                    </a>
                    <x-panel :padding="'p-2'">
                        <div class="flex items-center lg:justify-center text-sm rounded-2xl p-1 mb-1">
                            <img src="/images/iconRobot.png" alt="Lary avatar" class="rounded-2xl" width="50">
                            <div class="ml-3 text-left">
                                <h5 class="font-bold" style="font-family: Lucida Console;">
                                    {{ $post->author->name }}
                                </h5>
                            </div>
                        </div>
                        <p
                            class="pt-1 block text-sm border-t border-black"
                            style="font-family: 'Brush Script MT', cursive;"
                        >
                            Published <time>{{ $post->created_at->diffForHumans() }}</time>
                        </p>
                    </x-panel>
                </div>

                <div class="col-span-8 p-6 rounded-xl" style="background-color: rgba(0, 50, 20, 0.25);">
                    <div class="hidden lg:flex justify-between mb-6">
                        <x-panel :padding="'p-1'" :reverse="true">
                            <a
                                href="/"
                                class="transition-colors duration-300 relative inline-flex items-center text-lg rounded-xl p-2"
                                style="font-family: monospace; text-shadow: 2px 2px darkred;"
                            >
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                        <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                                Back to Posts
                            </a>
                        </x-panel>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category" />
                        </div>
                    </div>

                    <x-panel :padding="'p-1'" :reverse="true">
                        <h1
                            class="font-bold text-3xl lg:text-4xl text-center"
                            style="font-family: Brush Script MT; text-shadow: 2px 2px green;"
                        >
                            {{ $post->title }}
                        </h1>   
                    </x-panel>
                    <!-- notice space-y-4 (adds margin top or bottom for all childs) -->
                    <x-panel>
                        <div class="space-y-4 lg:text-lg leading-loose" style="font-family: sans-serif;">
                            {{ $post->body }}
                        </div>
                    </x-panel>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @include('posts._add-comment-form')
                    @foreach($post->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach
                </section>
            </article>
        </main>
    </section>
    <x-flash :related="'success'" />
</x-layout>