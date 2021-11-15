<?php
/* @var $ehtuTable \App\Libs\Ehtu\EhtuLiveWireTable */
/* @var $column \App\Libs\Ehtu\EhtuLiveWireTableColumn */
?>

@foreach($ehtuTable->columns as $column)
    @switch($column->type)
        @case('dbField')
            <?php
                $fieldName = $column->name;
            ?>
            <td>{{ $row->$fieldName }}</td>
        @break
        @case('actions')
            <td class="text-right ">
                <span class="btn-group">
                    @if( count($column->actionsDefaultEnbled) > 0 )
                        @if(in_array('delete', $column->actionsDefaultEnbled))
                            <button wire:click="delete({{ $row->getKey() }})" onclick="confirm('Segur que voleu eliminar {{ $row->getKey() }}?') || event.stopImmediatePropagation()"
                                    class="btn btn-secondary btn-sm"><i class="bi bi-trash"></i></button>
                        @endif
                        @if(in_array('edit', $column->actionsDefaultEnbled))
                                <button wire:click="edit( {{ $row->getKey() }} )" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square "> Editar</i></button>
                        @endif
                    @endif
                </span>
            </td>
        @break
    @endswitch
@endforeach
