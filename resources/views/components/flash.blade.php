@props(['related'])
@if(session()->has($related))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="fixed bg-gray-800 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
    ><p>{{ session($related) }}</p>
    </div>
@endif