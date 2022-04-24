@props([
    'padding' => 'p-6',
    'autoMargin' => true,
    'rounded' => 'rounded-xl',
    'reverse' => false,
    'background' => '',
    'ei' => false,
    'span' => false,
    'class' => ''
])
@if(!$span)
    <div
        class="{{ $autoMargin ? 'ml-3 mt-3 mr-3 mb-3' : '' }} {{ $padding . ' ' . $class }} font-sans text-sm border border-black {{ $rounded }}
            {{ $background ? $background : (
                $reverse ? (
                    $ei ? 'bg-gray-800 text-white hover:bg-gray-100 hover:text-black'
                        :
                    'bg-gray-600 text-white hover:bg-gray-200 hover:text-black'
                )
                    :
                'bg-gray-200 hover:bg-gray-600 text-black hover:text-white'
            ) }}"
    >{{ $slot }}</div>
@else
    <span
        class="{{ $autoMargin ? 'ml-3 mt-3 mr-3 mb-3' : '' }} {{ $padding . ' ' . $class }} font-sans text-sm border border-black {{ $rounded }}
            {{ $background ? $background : (
                $reverse ? (
                    $ei ? 'bg-gray-800 text-white hover:bg-gray-100 hover:text-black'
                        :
                    'bg-gray-600 text-white hover:bg-gray-200 hover:text-black'
                )
                    :
                'bg-gray-200 hover:bg-gray-600 text-black hover:text-white'
            ) }}"
    >{{ $slot }}</span>
@endif