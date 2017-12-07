@extends('app') 
@section('content')
<div id="app" v-cloak>
  <div class="contenedor-candidaturas">
    <div class="gestion-candidaturas">
      <span class="boton pequeno esquinas nueva-oferta hover" data-toggle="modal" data-target="#create">
          <span class="icono">
            <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
          </span>
        <span class="accion">Nueva Oferta</span>
      </span>
      <button type="button" class="boton pequeno esquinas actualizar hover" @click="getOffer">
      <!--span class="boton pequeno esquinas actualizar" @click="getOffer"-->
          <span class="icono">
            <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" /></svg>
          </span>
        <span class="accion">Actualizar</span>
      <!--/span-->
      </button>
    </div>
    <div class="candidaturas">
      <span class="titulo">Estado Candidaturas: </span>
      <span class="boton gris pequeno esquinas activa">
        <span class="icono">
          <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z" /></svg>
        </span>
        <span class="accion">Activas</span>
        <span class="cantidad">@{{countOffers.actives}}</span>
      </span>
      <span class="boton gris pequeno esquinas fuera-plazo">
        <span class="icono">
          <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
        </span>
        <span class="accion">Fuera plazo</span>
        <span class="cantidad">@{{countOffers.actives}}</span>
      </span>
      <span class="boton gris pequeno esquinas cerrada">
        <span class="icono">
         <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg>
        </span>
        <span class="accion">Cerradas</span>
         <span class="cantidad">@{{countOffers.closed}}</span>
      </span>
    </div>
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
    <table class="table table-striped" v-show="ofertas != 0">
      <thead>
        <tr>
          <th><span class="mobile-"><span><span class="tablet-mas">Candidatura</span></th>
          <th>Oferta</th>
          <th>Fecha</th>
          <th><span class="tablet-mas">Visualizar</span></th>
          <th><span class="tablet-mas">Editar</span></th>
        </tr>
      </thead>
        <tbody>
          <tr v-for="oferta in ofertas">
            <td v-if="oferta.estado != 0 && new Date(oferta.fecha) < new Date()" class="fueraplazo">
              <span class="mobile-menos">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="orange" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
              </span>
              <span class="tablet-mas"><strong>FUERA DE PLAZO</strong></span>
            </td>
            <td v-else-if="oferta.estado == 0" class="cerrada">
              <span class="mobile-menos">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#d32f2f" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg>
              </span>
              <span class="tablet-mas"><strong>CERRADA</strong></span>
            </td>
            <td v-else class="activa">
              <span class="mobile-menos">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#689f38" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M11,16.5L18,9.5L16.59,8.09L11,13.67L7.91,10.59L6.5,12L11,16.5Z" /></svg>
              </span>
              <span class="tablet-mas"><strong>ACTIVA</strong></span>
            </td>
            <td class="titulo-oferta">@{{oferta.titulo}}</td>
            <td class="fecha-oferta">@{{oferta.fecha | moment}}</td>
            <td>
              <span class="boton esquinas visualizar hover" v-on:click.prevent="viewOffer(oferta)">
                <span class="icono">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M15.5,14L20.5,19L19,20.5L14,15.5V14.71L13.73,14.43C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.43,13.73L14.71,14H15.5M9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14M12,10H10V12H9V10H7V9H9V7H10V9H12V10Z" /></svg>
                </span>
                <span class="accion tablet-mas">Visualizar</span>
              </span>
            </td>
            <td>
              <span class="boton esquinas editar hover" v-on:click.prevent="editOffer(oferta)">
                <span class="icono">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.08 20.21,11.08 20.42,11.3L21.7,12.58C21.92,12.79 21.92,13.14 21.7,13.35M12,18.94L18.07,12.88L20.12,14.93L14.06,21H12V18.94M4,2H18A2,2 0 0,1 20,4V8.17L16.17,12H12V16.17L10.17,18H4A2,2 0 0,1 2,16V4A2,2 0 0,1 4,2M4,6V10H10V6H4M12,6V10H18V6H12M4,12V16H10V12H4Z" /></svg>
                </span>
                <span class="accion tablet-mas">Editar</span>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
      @include('show')
      @include('viewCandidate')
      @include('viewCandidacy')
      @include('edit')
      @include('create')
  </div>   
</div>
@stop