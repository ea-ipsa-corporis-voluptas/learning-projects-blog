@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="POST">
            @csrf
            <header class="flex items-center">
                <img src="/images/iconRobot.png" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full focus:outline-none focus:ring rounded-3xl p-6 bg-gray-200 font-semibold text-black"
                    rows="5"
                    placeholder="Quick, think of something to say!"
                    style="font-size: 20px; font-weight: 500; font-family: monospace;"
                    required
                ></textarea>
                @error('body')
                    <div
                        class="max-w-xs mx-auto text-xs text-center p-3 mt-3 rounded-2xl mt-6"
                        style="font-size: 15px; font-family: Lucida Console; color: rgba(220, 50, 0, 1.0);"
                    >{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end mt-10 border-t border-black pt-6 hover:border-white">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <div class="flex max-w-xl mx-auto mt-10 text-xl text-center">
        <x-panel :padding="'p-2'" :reverse="true" :ei="true">
            <x-panel :padding="'p-1'" :span="true">
                <a href="/register" style="font-family: monospace;">Register</a>
            </x-panel>or
            <x-panel :padding="'p-1'" :span="true">
                <a href="/login" style="font-family: monospace;">Log in</a>
            </x-panel>to leave a comment.
        </x-panel>
    </div>
@endauth