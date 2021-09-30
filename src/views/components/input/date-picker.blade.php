<input
    class="form-control"
    x-data
    x-ref="input"
    x-init="new Pikaday({ field: $refs.input, format:'YYYY-MM-DD' })"
    @change="$dispatch('input', $event.target.value)"
    type="text"
    {{ $attributes }}
>
