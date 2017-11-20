@extends('app') @section('content')
<div id="app" class="row" v-cloak>
    <div class="col-sm-12">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createCandidate">
            <i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>
            Nueva Candidato
        </a>
        <button type="button" class="btn btn-info">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Actualizar</button>
        <button type="button" class="btn btn-info" @click="getcandidatesall">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Mostrar Todos</button>
        <div>
            <h3>Búsqueda de Candidatos.</h3>
            <div>
                <form class="form-horizontal" method="POST" v-on:submit.prevent="findcandidate" data-toggle="validator" role="form">
                    <div class="col-sm-12">
                        <div class='form-group'>
                            <label for="busqueda">Introduce la identidad del candidato.</label>

                            <input type="string" name="busqueda" id="busqueda" class="form-control" required="true" data-required-error="El campo busqueda no puede estar vacío."
                                value="{{ old('busqueda') }}" v-model="busquedacandidato.id">
                            <button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta">
                                <i class="fa fa-search" aria-hidden="true"> </i> Buscar Candidato</button>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </form>
                    <div v-show="candidatesall != 0" class="container-fluid">
                        <div class="card" v-for="candidate in candidatesall" style="display:inline-block;width: 18rem;margin-bottom:1rem;">
                        <img v-if="candidate.genero == 'Hombre'"class="card-img-top" src="{{ asset('img/008-man-2.png') }}" alt="Card image cap">
                            <img v-else class="card-img-top" src="{{ asset('img/007-girl.png') }}" alt="Card image cap">
                            <div class="card-block">
                                <h4 class="card-title">@{{candidate.nombre}}</h4>
                                <h4 class="card-title">@{{candidate.apellido1}}</h4>
                                <h4 class="card-title">@{{candidate.apellido2}}</h4>
                                <h6 class="card-text">@{{candidate.tipo_id}} - @{{candidate.id}}</h6>
                                <a href="#" class="btn btn-primary" @click="viewcandidate(candidate)">Mas información</a>
                            </div>
                        </div>
                    </div>
                    <div v-if="busquedacandidato.infocandidatos != 0">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr v-for="infocandidato in busquedacandidato.infocandidatos">
                                    <th>@{{infocandidato.tipo_id}}</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Visualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="infocandidato in busquedacandidato.infocandidatos">
                                    <td>@{{infocandidato.identidad}}</td>
                                    <td>@{{infocandidato.nombre}}</td>
                                    <td>@{{infocandidato.apellido1}} @{{infocandidato.apellido2}}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm" v-on:click.prevent="viewcandidate(infocandidato)">
                                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </i> Visualizar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        @include('viewCandidate') @include('createCandidate') @include('show')  @include('email')

    </div>
</div>
@stop