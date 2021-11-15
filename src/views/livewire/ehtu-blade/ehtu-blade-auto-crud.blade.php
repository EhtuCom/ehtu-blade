<?php
/* @var $preuVariacio \App\Models\Tepeuve\PreuVariacio */
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col flex  align-items-center">
            <span class="p-2 flex-grow"><h1>{{ $tableTitle ?? "Edició" }}</h1></span>
            <span class="p-2"><button class="btn btn-success" wire:click="create"><i class="bi bi-plus"></i> Add new preus variacions</button></span>
        </div>
    </div>
    <div class="row flex">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    @include('EhtuBlade::components.ehtuLWCrud.eLWCVisibleColumnsHeaders')

                </tr>
                <tr>
                    @include('EhtuBlade::components.ehtuLWCrud.eLVCVisibleColumnsHeadersSearch')
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        @include('EhtuBlade::components.ehtuLWCrud.eLWCVisilbleColumns')
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        @include('EhtuBlade::components.ehtuLWCrud.eLWCBottomPaginationResults')
    </div>

{{--    <!--  MODAL  -->--}}
{{--    <div>--}}
{{--        <x-modals.edit title="Edició de la variació de preu">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <x-input.group label="Nom" for="name">--}}
{{--                        <x-EhtuBlade::input.text wire:model.lazy="preuVariacio.nom" name="nom" errorTarget="preuVariacio.nom"/>--}}
{{--                        --}}{{--                        <x-input.text wire:model.lazy="preuVariacio.nom" name="nom" errorTarget="preuVariacio.nom"/>--}}
{{--                    </x-input.group>--}}
{{--                </div>--}}

{{--                <div class="col-12">--}}
{{--                    <x-input.group label="Tipus" for="tipus">--}}

{{--                        <x-EhtuBlade::input.select wire:model.lazy="preuVariacio.tipus" name="tipus" :keyValues="$preuVariacio::PREU_VARIACIONS_TIPUS" errorTarget="preuVariacio.tipus" />--}}
{{--                    </x-input.group>--}}
{{--                </div>--}}

{{--                <div class="col-12">--}}
{{--                    <x-input.group label="Zona" for="zona">--}}
{{--                        <x-EhtuBlade::input.select wire:model.lazy="preuVariacio.zona" name="zona" :keyValues="$preuVariacio::PREU_VARIACIONS_ZONES" errorTarget="preuVariacio.zona" />--}}

{{--                    </x-input.group>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <x-slot name="modalFooter">--}}
{{--                <x-modals.notify-saved />--}}
{{--                <button type="button" class="btn btn-sm btn-secondary" wire:click="modalClose()">{{ _('Close')}}</button>--}}
{{--                <button type="button" class="btn btn-sm btn-primary" wire:click="save()">{{ _('Save') }}</button>--}}
{{--            </x-slot>--}}
{{--        </x-modals.edit>--}}
{{--    </div>--}}
{{--    <!--  MODAL  ...END-->--}}
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // this.livewire.on('askdelete', idPreuVariacio => {
        //     bootbox.confirm("Esteus segurs de voler eliminar el registre?", (result) => {
        //         if (result) {
        //             this.livewire.emit('delete', idPreuVariacio)
        //         }
        //     });
        // });
        this.livewire.on('modalOpen', () => {
                $('#staticBackdrop').modal('show');
            }
        );
        this.livewire.on('modalClose', () => {
                $('#staticBackdrop').modal('hide');
            }
        );
    });
</script>
