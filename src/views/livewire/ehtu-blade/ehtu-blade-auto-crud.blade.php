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
    <div>
        <span class="p-2">{!! $debug !!}</span><br>
        <span class="p-2">id comanda: {!! $comanda->nom !!}</span>
        <input type="text" wire:model="comanda.nom" name="nom" class='form-control'>
        <input type="text" wire:model.lazy="debug">
    </div>
    <!--  MODAL  -->
    <div>
        <x-EhtuBlade::modals.edit title="Edició de la variació de preu">
            <div class="row">
                <div class="col-12">
                    <x-EhtuBlade::input.group label="Nom" for="name">
                        <div >comanda: {{ $comanda->nom }}</div>
                        <input type="text" wire:model="comanda.nom" name="nom" class='form-control'>
                        <x-EhtuBlade::input.text wire:model="comanda.nom" name="nom" errorTarget="comanda.nom"/>
                        {{--                        <x-input.text wire:model.lazy="preuVariacio.nom" name="nom" errorTarget="preuVariacio.nom"/>--}}
                    </x-EhtuBlade::input.group>
                </div>
            </div>

            <x-slot name="modalFooter">
                <x-EhtuBlade::modals.notify-saved/>

                <span class="btn-group">
                    <button type="button" class="btn btn-secondary" wire:click="modalClose()">{{ _('Close')}}</button>
                    <button type="button" class="btn btn-primary" wire:click="save()">{{ _('Save') }}</button>
                </span>
            </x-slot>
        </x-EhtuBlade::modals.edit>
    </div>
    <!--  MODAL  ...END-->
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
                    $('#EhtuModalEditor').modal('show');
                }
            );
            this.livewire.on('modalClose', () => {
                    $('#EhtuModalEditor').modal('hide');
                }
            );
        });
    </script>

</div>
j
