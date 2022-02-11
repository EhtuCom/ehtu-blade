@props(['for'])

@error($for)
<p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>
@enderror


{{--@props(['for'])--}}

{{--    <div class="input-error" data-for="{{ $for }}">--}}
{{--        @if (isset($errors) && $errors->has($for))--}}
{{--            @foreach($errors->get($for) as $error)--}}
{{--                <div {{ $attributes->merge(['class' => 'text-sm text-red-600'] }}>{{ $error }}>xxx</div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}
