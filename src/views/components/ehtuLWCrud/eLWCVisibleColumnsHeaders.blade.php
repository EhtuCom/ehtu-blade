<?php
/* @var $ehtuTable \App\Libs\Ehtu\EhtuLiveWireTable */
/* @var $column \App\Libs\Ehtu\EhtuLiveWireTableColumn */
?>

@foreach($ehtuTable->columns as $column)
    @switch($column->type)
        @case('dbField')
            <?php


            ?>
            <th wire:click="sortBy('{{ $column->name }}')">{{ ucwords($column->displayName ?? $column->name) }}</th>
            @break
        @case('actions')
            <th>{{ $column->displayName ??  __('Actions') }}</th>
            @break
    @endswitch
@endforeach
@if($ehtuTable->actionsShowColumn)
    <th>{{ __( $ehtuTable->actionsColumnDisplayName) }}</th>
@endif
