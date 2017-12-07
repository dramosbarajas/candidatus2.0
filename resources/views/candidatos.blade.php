@extends('app') @section('content')
<div id="app" class="row" v-cloak>
  <div class="col-sm-12">
    <div class="gestion-candidatos">
      <span class="boton pequeno esquinas nueva-oferta hover" data-toggle="modal" data-target="#createCandidate">
        <span class="icono">
          <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
        </span>
        <span class="accion">Nuevo Candidato</span>
      </span>
      <button type="button" class="boton pequeno esquinas actualizar hover" @click="getOffer">
          <span class="icono">
            <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" /></svg>
          </span>
        <span class="accion">Actualizar</span>
      </button>
      <button type="button" class="boton pequeno esquinas visualizar hover" @click="getcandidatesall">
          <span class="icono">
            <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M15.5,14L20.5,19L19,20.5L14,15.5V14.71L13.73,14.43C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.43,13.73L14.71,14H15.5M9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14M12,10H10V12H9V10H7V9H9V7H10V9H12V10Z" /></svg>
          </span>
        <span class="accion">Mostrar Todos</span>
      </button>
    </div>
    <div>
      <h3 class="titulo">Búsqueda de Candidatos.</h3>
        <div>
          <form class="form-horizontal" method="POST" v-on:submit.prevent="findcandidate" data-toggle="validator" role="form">
            <div class="col-sm-12">
              <div class='form-group buscador'>
                <!--label for="busqueda">Introduce la identidad del candidato.</label-->
                <input type="string" name="busqueda" id="busqueda" class="form-control" required="true" data-required-error="El campo busqueda no puede estar vacío."
                              value="{{ old('busqueda') }}" v-model="busquedacandidato.id" placeholder="Introduce la identidad del candidato...">
                <!--button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta">
                  <i class="fa fa-search" aria-hidden="true"> </i> Buscar Candidato
                </button-->
                <button type="submit" class="boton pequeno esquinas visualizar hover" id="enviarAltaOferta">
                  <span class="icono tablet-mas">
                    <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
                  </span>
                <span class="accion">Buscar<span class="tablet-mas"> Candidato</span></span>
              </button>
                <span class="help-block with-errors"></span>
              </div>
            </div>
          </form>
          <div v-show="candidatesall != 0" class="contenedor-candidatos">
            <div class="card" v-for="candidate in candidatesall">
              <img v-if="candidate.genero == 'Hombre'"class="card-img-top" src="{{ asset('img/008-man-2.png') }}" alt="Card image cap">
              <img v-else class="card-img-top" src="{{ asset('img/007-girl.png') }}" alt="Card image cap">
              <div class="card-block">
                <h4 class="card-title">@{{candidate.nombre}}</h4>
                <h4 class="card-title">@{{candidate.apellido1}}</h4>
                <h4 class="card-title">@{{candidate.apellido2}}</h4>
                <h6 class="card-text">@{{candidate.tipo_id}} - @{{candidate.id}}</h6>
                <span class="boton pequeno esquinas limpiar hover" @click="viewcandidate(candidate)">
                  <span class="accion">Más Información</span>
                </span>
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

                    <span class="boton pequeno esquinas nueva-oferta hover" v-on:click.prevent="viewcandidate(infocandidato)">
                      <span class="icono">
                        <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
                      </span>
                      <span class="accion">Nuevo Candidato</span>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
        @include('viewCandidate') @include('createCandidate') @include('show')
    </div>
</div>
@stop