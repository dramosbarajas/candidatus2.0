@extends('app') @section('content')
<div class="flex-center position-ref full-height">
    <h1>Index CANDIDATUS 2.O</h1>
    <h3>Versión inicial</h3>
    <div id="app" class="editor">
        <h3>@{{ mensaje }}</h3>
        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create"> Nueva Oferta
        </a>
        <button type="button" v-on:click="mostrarOfertas" class="btn btn-primary">
            <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
            Mostrar ofertas</button>

        <div v-if="ofertas">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                </tr>
                <tr v-for="oferta in ofertas">
                    <td>@{{oferta.id}}</td>
                    <td>@{{oferta.titulo}}</td>
                    <td>@{{oferta.fecha}}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editarOferta(oferta)">Editar</a>
                    </td>
                </tr>
            </table>
            @include('edit')
        </div>
        @include('create')
        <pre>@{{ofertas}}</pre>
    </div>
</div>
@stop