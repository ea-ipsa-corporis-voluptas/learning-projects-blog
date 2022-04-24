@props([
    'name' => '',
    'padding' => 'mb-8 mt-16',
    'heading' => '',
    'sizing' => '',
    'class' => '',
    'type' => 'text',
    'value' => '',
    'required' => true,
    'rows' => '',
    'cols' => ''
])
@php
    if(!$heading) $heading = $name;
    if(!$value && $name != 'password') $value = old($name);
@endphp
<x-input-label :name="$name" :padding="$padding" :class="$class">{{ ucwords($name) }}</x-input-label>
<x-textarea-field :type="$type" :name="$name" :sizing="$sizing" :value="$value" :required="$required" :rows="$rows" :cols="$cols" />
@error($name)
    <x-error-message>{{ $message }}</x-error-message>
@enderror