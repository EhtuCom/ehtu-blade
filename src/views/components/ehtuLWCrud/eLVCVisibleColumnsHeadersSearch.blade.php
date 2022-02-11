<?
/* @var $ehtuTable \App\Libs\Ehtu\EhtuLiveWireTable */
/* @var $column \App\Libs\Ehtu\EhtuLiveWireTableColumn */
/* @var $column Ehtu\EhtuBlade\Libs\LiveWire\Tables\EhtuLiveWireTableColumn */
?>

@foreach($ehtuTable->columns as $column)
    @if($column->type == 'dbField' && $column->isSearchable == 'true')
        <x-EhtuBlade::table.td-search :column="$column"/>
    @elseif($column->type == 'actions')
        <td class="text-right">
            <span class="btn-group">
                <button class="btn btn-warning btn-sm" wire:click="clearAll()"><i class="bi bi-arrow-clockwise"></i></button>
                <button class="btn btn-success btn-sm" wire:click="create()"><i class="bi bi-plus"></i></button>
            </span>
        </td>
    @else
        <td>&nbsp;</td>
    @endif
@endforeach
@if($ehtuTable->actionsShowColumn)
    <td class="text-right">
        <span class="btn-group">
            <button class="btn btn-warning btn-sm" wire:click="clearAll()"><i class="bi bi-arrow-clockwise"></i></button>
            <button class="btn btn-success btn-sm" wire:click="create()"><i class="bi bi-plus"></i></button>
        </span>
    </td>
@endif
