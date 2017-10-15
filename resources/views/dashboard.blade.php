@extends('app') @section('content')
<div class="flex-center position-ref full-height">
    <h1>Index CANDIDATUS 2.O</h1>
    <h3>Versión inicial</h3>
    <div id="app">
        <h3>@{{ mensaje }}</h3>
        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create"> Nueva Oferta
        </a>
        <button type="button" v-on:click="getOffer" class="btn btn-primary">
            <i class="fa fa-eye fa-1x" aria-hidden="true"></i>
            Mostrar ofertas</button>

        <div v-if="ofertas">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Candidatura</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                </tr>

                <tr v-for="oferta in ofertas">
                    <td>@{{oferta.id}}</td>
                    <td v-if="oferta.estado != 0" class="activa"><strong>ACTIVA</strong></td>
                    <td v-else class="cerrada"><strong>CERRADA</strong></td>
                    <td>@{{oferta.titulo}}</td>
                    <td>@{{oferta.fecha | moment}}</td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm" v-on:click.prevent="viewOffer(oferta)">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                            </i> Visualizar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editOffer(oferta)">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                    </td>
                </tr>
            </table>
                            @include('show') 
        @include('edit') 
        @include('create')
        </div>
        <pre>@{{ofertas}}</pre>
    </div>
</div>
@stop