@props(['comment'])
@if(isset($comment))
    <x-panel>
        <article class="flex space-x-4">
            <div style="flex-shrink: 0;">
                <img src="/images/iconRobot.png" alt="" width="60" height="60" class="rounded-xl">
            </div>
            <div>
                <header class="mb-4">
                    <h3 class="font-bold" style="font-family: Brush Script MT;">
                        {{ $comment->author->userName }}
                    </h3>
                    <p class="text-xs" style="font-family: Courier New;">
                        Posted <time>{{ $comment->created_at->diffForHumans() }}</time>
                    </p>
                </header>
                <p style="font-size: 18px; font-weight: 500; font-family: Lucida Handwriting;">{{ $comment->body }}</p>
            </div>
        </article>
    </x-panel>
@endif