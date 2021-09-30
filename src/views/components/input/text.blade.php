@props([
    'errorTarget' => null
])

<input type="text" {{ $attributes }} class='form-control'>
<x-jetstream::input-error for="{{ $errorTarget }}"/>
