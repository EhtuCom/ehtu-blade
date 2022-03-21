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
            <th class="text-right">{{ $column->displayName ??  __('Actions') }}</th>
            @break
    @endswitch
@endforeach
@if($ehtuTable->actionsShowColumn)
    <th class="text-right">{{ __( $ehtuTable->actionsColumnDisplayName) }}</th>
@endif
