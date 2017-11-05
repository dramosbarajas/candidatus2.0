@extends('app') @section('content')
<div id="app" class="row">
    <div class="col-sm-12">
        <button type="button" class="btn btn-info" @click="showmodalcandidacy">
            <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
            Nueva Candidatura</button>
    </div>
    @include('createCandidacy');
</div>
@stop