<?php
/* @var $ehtuTable \App\Libs\Ehtu\EhtuLiveWireTable */
/* @var $column \App\Libs\Ehtu\EhtuLiveWireTableColumn */
?>

@foreach($ehtuTable->columns as $column)
    @if(!$column->hidden)
        <td class="">
            <?php
                $fieldName = $column->name;
                $relationName = $column->relationName;
                $fieldValue = $column->isRelation == false ? $row->$fieldName : $row->$relationName->$fieldName;
            ?>
            @switch($column->type)
                @case('dbField')
                @case('string')
                    {{ $fieldValue }}
                @break
                @case('dbFieldWithLink')
                    <a href="{{ $fieldValue }}">{{ $fieldValue }}</a>
                @break
                @case('date')
                    {{ $fieldValue->format('d.m.Y') }}
                @break
                @case('dateTime')
                    {{ $fieldValue->format('d.m.Y H:i:s') }}
                @break
                @case('select')
                    {{ $fieldValue }}
            @endswitch
        </td>
    @endif
@endforeach
{{-- ACTIONS!! --}}
@if($ehtuTable->actionsShowColumn)
    <td class="text-right ">
        <span class="btn-group">
            @if( count($column->actionsDefaultEnbled) > 0 )
                @if(in_array('delete', $column->actionsDefaultEnbled))
                    <button wire:click="delete({{ $row->getKey() }})"
                            onclick="confirm('Segur que voleu eliminar {{ $row->getKey() }}?') || event.stopImmediatePropagation()"
                            class="btn btn-secondary btn-sm"
                            title="{{ __('Delete') }}">
                                <i class="bi bi-trash"> </i>
                    </button>
                @endif
                @if(in_array('edit', $column->actionsDefaultEnbled))
                    <button wire:click="edit( {{ $row->getKey() }} )"
                        class="btn btn-warning btn-sm"
                        title=" {{ __('Edit') }}"
                        >
                            <i class="bi bi-pencil-square "></i>
                    </button>
                @endif
            @endif
        </span>
    </td>
@endif
{{-- ACTIONS!! ende --}}
