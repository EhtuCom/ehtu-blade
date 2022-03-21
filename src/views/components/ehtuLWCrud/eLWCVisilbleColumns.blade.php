<?php
/* @var $ehtuTable \App\Libs\Ehtu\EhtuLiveWireTable */
/* @var $column \App\Libs\Ehtu\EhtuLiveWireTableColumn */
?>
{{ $ehtuTable->sayHello() }}

@foreach($ehtuTable->columns as $column)
    @switch($column->type)
        @case('dbField')
        @case('string')
            <?php
                $fieldName = $column->name;
            ?>
            <td>
                {{ $row->distribuidora->nom }}
                {{ $row->$fieldName }} xx
            </td>
        @break
        @case('dbFieldWithLink')
            <?php
                $fieldName = $column->name;
            ?>
            <td>
                <a href="{{ $row->$fieldName }}">{{ $row->$fieldName }}</a>
            </td>
        @break
        @case('date')
            <?php
                $fieldName = $column->name;
            ?>
            <td>{{ $row->$fieldName->format('d.m.Y') }}</td>
        @break
        @case('dateTime')
            <?php
                $fieldName = $column->name;
            ?>
            <td>{{ $row->$fieldName->format('d.m.Y H:i:s') }}</td>
        @break
        @case('select')
            <?php
                $fieldName = $column->name;
            ?>
            <td>
                {{ $row->$fieldName->name }}
            </td>

    @endswitch
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
