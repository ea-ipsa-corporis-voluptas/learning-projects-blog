@auth
    @follow($post->author)
    @else
        <form method="POST" action="/profiles/{{ $post->author->userName }}/follow">
            @csrf
            <button type="submit" class="mb-3 rounded-full p-3 mx-auto bg-gray-800 text-white hover:bg-gray-200 hover:text-black">
                Follow
                <span class="font-bold font-mono">{{ $post->author->userName }}</span>
            </button>
        </form>
    @endfollow
@endauth