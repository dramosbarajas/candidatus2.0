@extends('app')
@section('content')
        <div class="flex-center position-ref full-height">
            <h1>Index CANDIDATUS 2.O</h1>
            <h3>Versión inicial</h3>
            <ul>
            <li><a href="altaOferta">Crear Oferta</a></li>
            </ul>
                <div id="app">
                    <h3>@{{ mensaje }}</h3>
                    <button type="button" v-on:click="mostrarOfertas" class="btn btn-primary">
                    <span class="glyphicon glyphicon-refresh"></span>
                    Mostrar ofertas</button>
                    <div v-if="ofertas">
                        <ul>
                            <li v-for="oferta in ofertas"> @{{ oferta.titulo }}</li>
                         </ul>
                    <pre>@{{ofertas}}</pre>
                    </div>
                </div>
        </div>
@stop