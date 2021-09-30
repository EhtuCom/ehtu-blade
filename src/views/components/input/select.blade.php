@props([
    'errorTarget' => null,
    'keyValues' => null,
])
<select  {{ $attributes }} class="form-control">
    <option value="" >{{ __('Select an option') }}</option>
    @foreach($keyValues as $k => $v)
        <option value="{{ $k }}">{{ $v }}</option>
    @endforeach
</select>
<x-jetstream::input-error for="{{ $errorTarget }}"/>
