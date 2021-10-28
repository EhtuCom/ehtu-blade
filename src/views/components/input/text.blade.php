@props([
    'errorTarget' => null
])

<input type="text" {{ $attributes }} class='form-control'>

<x-EhtuBlade::input.input-error for="{{ $errorTarget }}" />
{{--<x-jetstream::input-error for="{{ $errorTarget }}"/>--}}
