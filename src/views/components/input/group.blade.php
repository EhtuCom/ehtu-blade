@props([
    'label' => '',
    'for' => '',
])
<div class="form-group">
    <label for="{{ $for }}" class="col-lg-2 col-md-2 control-label">{{ $label }}</label>
    <div class="col-lg-10 col-md-7">
        {{ $slot }}
    </div>
</div>
