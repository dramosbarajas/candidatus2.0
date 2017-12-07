<form class="form-horizontal" method="POST" v-on:submit.prevent="createcandidacy" data-toggle="validator" role="form">
  <div class="modal fade" id="createCandidacy">
    <div class="contenedor-crear-candidatura">
      <div class="contenedor-cabecera">
        <legend>
          <h2>Crear Candidatura</h2>
        </legend>
        <span class="icono" data-dismiss="modal">
          <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
        </span>
      </div>
      <div class="contenedor-cuerpo">
        <fieldset>
          <div class="formulario">
            <h4 class="titulo">Por favor, presione los botones para cargar los datos.</h4>
            <button type="button" class="boton pequeno esquinas actualizar hover" v-show="offerscandidacy == 0" @click="getofferscandidacy">
              <span class="icono">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" /></svg>
              </span>
              <span class="accion">Cargar Ofertas</span>
            </button>
            <div class="sk-cube-grid" v-show="offerscandidacy == 0">
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
            <div v-show="offerscandidacy != 0" class=''>
              <label for="ofertas">Ofertas</label>
              <select name="ofertas" id="ofertas" class="form-control" required data-required-error="Selecciona un elemento de la lista"
                        v-model="candidacy.offerid">
                <option v-for="offer in offerscandidacy" :value="offer.id">@{{offer.titulo}}</option>
              </select>
              <span class="help-block with-errors"></span>
            </div>
            <div class="" v-show="offerscandidacy != 0">
              <button type="button" class="boton pequeno esquinas actualizar hover" v-show="candidatescandidacy == 0" @click="getcandidatescandidacy">
                <span class="icono">
                  <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" /></svg>
                </span>
                <span class="accion">Cargar Ofertas</span>
              </button>
              <div class="sk-cube-grid" v-show="candidatescandidacy == 0">
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
              <div v-show="candidatescandidacy != 0">
                <label for="candidatos">Candidatos</label>
                <select name="candidatos" id="candidatos" class="form-control" required="true" data-required-error="Selecciona un elemento de la lista" v-model="candidacy.candidateid">
                  <option v-for="candidate in candidatescandidacy" :value="candidate.id">@{{candidate.id}} - @{{candidate.nombre}} @{{candidate.apellido1}} @{{candidate.apellido2}}</option>
                </select>
                <span class="help-block with-errors"></span>
                <button type="button" class="boton pequeno esquinas limpiar hover" @click="checkvalidapar">
                  <span class="icono">
                    <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M12,6V9L16,5L12,1V4A8,8 0 0,0 4,12C4,13.57 4.46,15.03 5.24,16.26L6.7,14.8C6.25,13.97 6,13 6,12A6,6 0 0,1 12,6M18.76,7.74L17.3,9.2C17.74,10.04 18,11 18,12A6,6 0 0,1 12,18V15L8,19L12,23V20A8,8 0 0,0 20,12C20,10.43 19.54,8.97 18.76,7.74Z" /></svg>
                  </span>
                  <span class="accion">Verificar Datos</span>
                </button>
              </div>
            </div>
          </div>
          <div class="panel-oculto" v-show="flagcheckpar === 1">
            <div class="formulario">
              <h3 class="titulo">Datos Candidatura</h3>
            </div>
            <div class="formulario-flex">
              <div class='grupo-formulario ancho-completo'>
                <label for="estado">Estado Candidatura</label>
                <select name="" id="" class="form-control" v-model="candidacy.estado" required="true" data-required-error="Selecciona un elemento de la lista">
                  <option value="Inscrito">Inscrito</option>
                  <option value="Seleccionado">Seleccionado</option>
                  <option value="Descartado">Descartado</option>
                </select>
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <div class="formulario-flex">
              <div class='grupo-formulario'>
                <label for="estado">Entrevista</label>
                <select name="estado" id="estado" class="form-control" v-model="candidacy.entrevista" required="true" data-required-error="Selecciona un elemento de la lista">
                  <option value="1">SI</option>
                  <option value="0">NO</option>
                </select>
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario' v-if="candidacy.entrevista == 1">
                <label for="fecha_entrevista">Fecha Entrevista</label>
                <input type="date" name="fecha_entrevista" id="fecha_entrevista" class="form-control" v-model="candidacy.fecha_entrevista"
                        required data-required-error="El campo fecha no puede estar vacío">
                <span class="help-block with-errors"></span>
              </div>
              <div v-else class='grupo-formulario'>
                <label for="fecha_entrevista">Fecha Entrevista</label>
                <input type="date" name="fecha_entrevista" id="fecha_entrevista" class="form-control" v-model="candidacy.fecha_entrevista"
                        disabled>
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <div class="formulario-flex">
              <div class='grupo-formulario ancho-completo'>
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="" cols="30" rows="10" class="form-control" v-model="candidacy.observaciones"></textarea>
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <div class='controles-contenedor' v-show="candidatescandidacy != 0">
              <button type="reset" class="boton limpiar esquinas hover" >
                <span class="icono">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" /></svg>
                </span>
                <span class="accion">Limpiar Formulario</span>
              </button>
              <div class='' v-show="candidatescandidacy != 0">
                <button type="submit" class="boton crear esquinas hover" >
                  <span class="icono">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" /></svg>
                  </span>
                  <span class="accion">Crear Candidatura</span>
                </button>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <div class="contenedor-pie">
        <h6>Candidatus 2.0 - Gestión RR.HH.</h6>
      </div>
    </div>
  </div>
</form>