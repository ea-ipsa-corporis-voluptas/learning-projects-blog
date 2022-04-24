@props([
    'name',
    'heading' => '',
    'required' => true
])
<x-input-label :name="$name" :padding="'mt-3 mb-2'">{{ $heading }}</x-input-label>
@if($required)
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="w-min p-1 rounded-2xl bg-white text-black"
        style="height: 50px; font-family: monospace, cursive; font-weight: 500;"
        required
    >
@else
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="w-min p-1 rounded-2xl bg-white text-black"
        style="height: 50px; font-family: monospace, cursive; font-weight: 500;"
    >
@endif
{{ $slot }}
</select>
@error($name)
    <x-error-message>{{ $message }}</x-error-message>
@enderror
