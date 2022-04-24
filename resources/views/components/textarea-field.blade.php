@props([
    'sizing' => 'p-2 w-full',
    'type' => 'text',
    'name' => '',
    'value' => '',
    'required' => true,
    'rows' => '',
    'cols' => ''
])
@if($required)
    <textarea
        class="p-1 border {{ $sizing }} border-gray-400 text-black"
        style="font-size: 20px; font-weight: 500; font-family: Helvetica, monospace;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        rows="{{ $rows }}"
        cols="{{ $cols }}"
        required
    >{{ $value }}</textarea>
@else
    <textarea
        class="p-1 border {{ $sizing }} border-gray-400 text-black"
        style="font-size: 20px; font-weight: 500; font-family: Helvetica, monospace;"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ $value }}"
        rows="{{ $rows }}"
        cols="{{ $cols }}"
    >{{ $value }}</textarea>
@endif