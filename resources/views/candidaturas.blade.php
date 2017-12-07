@extends('app') @section('content')
<div id="app" class="row">
    <div class="col-sm-12">
    	<button type="submit" class="boton crear esquinas hover" @click="showmodalcandidacy">
          <span class="icono">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" /></svg>
          </span>
          <span class="accion">Crear Candidatura</span>
        </button>
    </div>
    @include('createCandidacy')
</div>
@stop