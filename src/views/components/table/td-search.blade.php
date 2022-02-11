@props(
    [
        'column' => '',
    ]
)
<?
/* @var $column Ehtu\EhtuBlade\Libs\LiveWire\Tables\EhtuLiveWireTableColumn */
?>
<td>
    <input
        type="text"
        wire:model.debounce.700ms="search.{{ $column->name }}"
        placeholder="{{ $column->displayName }}"
        class="form-control"
    >
</td>
