@props(['for'])

    <div class="input-error" data-for="{{ $for }}">
        @if (isset($errors) && $errors->has($for))
            @foreach($errors->get($for) as $error)
                <div {{ $attributes->merge(['class' => 'text-sm text-red-600'] }}>{{ $error }}xxx</div>
            @endforeach
        @endif
    </div>
{{--@if(isset($errors) && $errors->has($for))--}}
{{--    --}}{{-- TODO: show all related errors not only first with ul li?--}}
{{--    --}}
{{--    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $errors->first($for) }}</p>--}}
{{--@endif--}}

{{--@error($for)--}}
{{--<p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>--}}
{{--@enderror--}}
