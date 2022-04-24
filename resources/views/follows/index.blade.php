<x-layout>
    <x-setting :heading="'Manage Follows'">
        <div class="p-6 mx-auto max-w-9xl rounded-2xl">
            @if($follows->count())
                <x-follows.grid :follows="$follows" />
                {{ $follows->links() }}
            @else
                <p class="text-center">No follows yet.</p>
            @endif
        </div>
    </x-setting>
</x-layout>