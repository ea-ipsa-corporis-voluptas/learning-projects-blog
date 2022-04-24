@props(['posts'])
<x-post-featured-card :post="$posts[0]" />
@if($posts->count() > 1)
    <div x-data="{ showPost: true }">
        <button
            @click="showPost = !showPost"
        ><x-panel :padding="'mb-1 p-3 rounded-2xl w-max h-13 text-4xl text-bold text-cursive'" :autoMargin="false">show</x-panel></button>
        <div class="lg:grid lg:grid-cols-6" x-show="showPost">
            @foreach($posts->skip(1) as $post)
                <x-post-card
                    :post="$post"
                    class="{{ $loop->iteration < 3 ? 'col-span-3 bg-gray-100 text-black hover:bg-gray-900 hover:text-white' :
                    'col-span-2 bg-gray-100 text-black hover:bg-gray-800 hover:text-white' }}"
                />
            @endforeach
        </div>
    </div>
@endif