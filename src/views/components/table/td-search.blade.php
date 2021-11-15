@props(
    [
        'targetField' => ''
    ]
)
<td><input type="text" wire:model.debounce.300ms="search.{{ $targetField }}" placeholder="{{ $targetField }}" class="form-control"></td>
