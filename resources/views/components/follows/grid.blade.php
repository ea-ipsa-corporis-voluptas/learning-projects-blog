@props(['follows'])
@foreach($follows as $author)
    @if(!$loop->last)
        <div class="mt-5 border-b border-black box-shadow-2xl flex">
    @else
        <div class="mt-5 box-shadow-2xl flex">
    @endif
    <div class="flex-1 ml-10 mx-auto p-1 font-extrabold font-mono">{{ $author-> userName }}</div>
    <form method="POST" action="/profiles/{{ $author->userName }}/follow">
        @csrf
        @method('DELETE')
        <button
            type="submit"
            class="mr-10 mb-5 rounded-full mx-auto p-2 font-bold bg-gray-900 text-white hover:bg-gray-200 hover:text-black"
        >
            Unfollow
        </button>
    </form>
</div>
@endforeach