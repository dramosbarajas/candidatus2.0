@extends('app') 
@section('content')
<div id="app" class="row" v-cloak>
    <div class="col-sm-12">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create">
        <i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>
            Nueva Oferta
        </a>
        <button type="button" @click="getOffer" class="btn btn-info">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Actualizar</button>
            <div class="pull-right">
            <span>Estado Candidaturas: </span>
            <button type="button" class="btn btn-success">Activas <span class="badge">@{{countOffers.actives}}</span></button>
            <button type="button" class="btn btn-danger">Cerradas <span class="badge">@{{countOffers.closed}}</span></button>
            </div>
            <hr>
            <div class="sk-cube-grid" v-show="ofertas == 0">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div>
        <table class="table table-hover table-striped" v-show="ofertas != 0">
            <thead>
                <tr>
                    <th>Candidatura</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="oferta in ofertas">
                    <td v-if="oferta.estado != 0 && new Date(oferta.fecha) < new Date()" class="fueraplazo">
                        <strong>FUERA DE PLAZO</strong>
                    </td>
                    <td v-else-if="oferta.estado == 0"class="cerrada">
                        <strong>CERRADA</strong>
                    </td>
                    <td v-else class="activa">
                        <strong>ACTIVA</strong>
                    </td>
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
            </tbody>
        </table>
        @include('show')
        @include('email')
        @include('viewCandidate')
        @include('viewCandidacy')
        @include('edit')
        @include('create')
    </div>
    
</div>
@stop