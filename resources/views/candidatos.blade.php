@extends('app') 
@section('content')
<div id="app" class="row">
    <div class="col-sm-12">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createCandidate">
        <i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i>
            Nueva Candidato
        </a>
        <button type="button"  class="btn btn-info">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Actualizar</button>
            <button type="button"  class="btn btn-info" @click="createcandidate">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Probar</button>
        @include('createCandidate')
    </div>
</div>
@stop