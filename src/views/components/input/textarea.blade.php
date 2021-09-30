@props([
'errorTarget' => null
])

<textarea {{ $attributes }} class="form-control">

</textarea>

@isset($errorTarget)
    @error($errorTarget) <span class="error">{{ $message }}</span> @enderror
@endisset
