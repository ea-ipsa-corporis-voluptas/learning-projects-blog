@props([
    'sizing' => 'p-2 w-full',
    'type' => 'text',
    'name' => '',
    'value' => '',
    'required' => true,
    'autocomplete' => ''
])
@if($required && $autocomplete)
    <input
        class="p-1 border {{ $sizing }} border-gray-400 text-black"
        style="font-size: 20px; font-weight: 500; font-family: Helvetica, monospace;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        required
        autocomplete="{{ $autocomplete }}"
    >
@elseif($required && !$autocomplete)
    <input
        class="p-1 border {{ $sizing }} border-gray-400 text-black"
        style="font-size: 20px; font-weight: 500; font-family: Helvetica, monospace;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        required
    >
@elseif(!$required && $autocomplete)
    <input
        class="p-1 border {{ $sizing }} border-gray-400 text-black"
        style="font-size: 20px; font-weight: 500; font-family: Helvetica, monospace;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        autocomplete="{{ $autocomplete }}"
    >
@elseif(!$required && !$autocomplete)
    <input
        class="p-1 border {{ $sizing }} border-gray-400 text-black"
        style="font-size: 20px; font-weight: 500; font-family: Helvetica, monospace;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
    >
@endif