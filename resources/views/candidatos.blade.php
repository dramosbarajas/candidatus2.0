@extends('app') 
@section('content')
<div id=" " class="row">
    <div class="col-sm-12">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createCandidate">
        <i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>
            Nueva Candidato
        </a>
        <button type="button"  class="btn btn-info">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Actualizar</button>
            <div id="app-other">
            <h3>@{{info}}</h3>
            </div>
        @include('createCandidate')
    </div>
</div>
@stop