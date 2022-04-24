@props([
    'name' => '',
    'padding' => 'mb-8 mt-16',
    'heading' => '',
    'sizing' => '',
    'class' => '',
    'type' => 'text',
    'value' => '',
    'required' => true,
    'autocomplete' => ''
])
@php
    if(!$heading) $heading = $name;
    if(!$value && $name != 'password') $value = old($name);
@endphp
<x-input-label :name="$name" :padding="$padding" :class="$class">{{ ucwords($heading) }}</x-input-label>
<x-input-field :type="$type" :name="$name" :sizing="$sizing" :value="$value" :required="$required" :autocomplete="$autocomplete" />
@error($name)
    <x-error-message>{{ $message }}</x-error-message>
@enderror