<x-layout>
    <x-setting :heading="'Manage Posts'">
        <x-header-search :includeHeading="false" :requestPrefix="'admin/posts/'" />
        <x-panel :padding="'p-6 mx-auto max-w-9xl'" :reverse="true">
            @if($posts->count())
                @foreach($posts as $post)
                    <x-admin.post-card :post="$post" :class="$loop->iteration % 2 == 0 ? 'animate-bounce' : 'animate-spin'" />
                @endforeach
                {{ $posts->links() }}
            @else
                <p class="text-center">No posts yet. Please check back later.</p>
            @endif
        </x-panel>
    </x-setting>
</x-layout>