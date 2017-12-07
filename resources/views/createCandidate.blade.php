<form class="form-horizontal" method="POST" v-on:submit.prevent="createcandidate" data-toggle="validator" role="form">
  <div class="modal fade" id="createCandidate">
    <!--div class="modal-dialog modal-lg"-->
    <div class="contenedor-crear-candidatura">
      <div class="contenedor-cabecera">
        <legend>
          <h2>Alta Oferta</h2>
        </legend>
        <span class="icono" data-dismiss="modal">
          <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
        </span>
      </div>
      <div class="contenedor-cuerpo">
        <fieldset>
          <!--div class="panel-body"-->
            <div class='formulario-flex cuatro'>
              <div class='grupo-formulario'>
                <label for="tipo_id">Tipo Documento</label>
                <select id="tipo_id" name="tipo_id" class="form-control" required="true" value="{{ old('tipo_id') }}" v-model="createCandidate.tipo_id">
                  <option value="DNI">DNI</option>
                  <option value="NIE">NIE</option>
                </select>
              </div>
              <div class='grupo-formulario' v-if="createCandidate.tipo_id === 'DNI'">
                <label for="id">Nº Identidad</label>
                <input type="string" name="id" id="id" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío." value="{{ old('id') }}" v-model="createCandidate.id" pattern="[0-9]{8}[A-Z]{1}" data-pattern-error="El DNI tiene que tener la siguiente estructura 00000000X" @blur="checkidentity">
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario' v-else class=''>
                <label for="identidad">Nº Identidad</label>
                <input type="string" name="id" id="id" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío." value="{{ old('id') }}" v-model="createCandidate.id" pattern="[A-Z]{1}[0-9]{7}[A-Z]{1}" data-pattern-error="El NIE tiene que tener la siguiente estructura X0000000X" @blur="checkidentity">
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="fecha_nac">Fecha Nacimiento</label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required="true" data-required-error="El campo fechanac no puede estar vacío." value="{{ old('fechanac') }}" placeholder="dd/mm/aaaa" v-model="createCandidate.fecha_nac">
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="genero">Género</label>
                <select id="genero" name="genero" class="form-control" required="true" value="{{ old('genero') }}" v-model="createCandidate.genero">
                  <option value="Hombre">Hombre</option>
                  <option value="Mujer">Mujer</option>
                </select>
                <span class="help-block with-errors"></span>
              </div>
            </div>  
            <!-- Grupo Nombre y apellidos -->
            <div class='formulario-flex'>
              <div class='grupo-formulario'>
                <label for="nombre">Nombre</label>
                <input type="string" name="nombre" id="nombre" class="form-control" required="true" data-required-error="El campo nombre no puede estar vacío." value="{{ old('nombre') }}" v-model="createCandidate.nombre">
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="apellido1">Primer Apellido</label>
                <input type="string" name="apellido1" id="apellido1" class="form-control" required="true" data-required-error="El campo primer apellido no puede estar vacío." value="{{ old('apellido1') }}" v-model="createCandidate.apellido1">
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="apellido2">Segundo Apellido</label>
                <input type="string" name="apellido2" id="apellido2" class="form-control" required="true" data-required-error="El campo segundo apellido no puede estar vacío." value="{{ old('apellido2') }}" v-model="createCandidate.apellido2">
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <!-- Grupo Select 1  CONTRATO // DURACION // JORNADA -->
            <div class='formulario-flex'>
              <div class='grupo-formulario ancho-completo'>
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required="true" data-required-error="El campo correo electrónico no puede estar vacío." value="{{ old('email') }}" v-model="createCandidate.email">
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="tel">Teléfono</label>
                <input type="tel" name="tel" id="email" class="form-control" required="true" data-required-error="El campo teléfono no puede estar vacío." value="{{ old('tel') }}" pattern="[0-9]{9}" data-pattern-error="El campo teléfono solo puede contener 9 digitos." v-model="createCandidate.tel">
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <div class='formulario-flex'>
              <div class='grupo-formulario'>
                <label for="nacionalidad">Nacionalidad</label>
                <select id="nacionalidad" name="nacionalidad" class="form-control" required="true" value="{{ old('nacionalidad') }}" data-required-error="Selecciona un elemento de la lista." v-model="createCandidate.nacionalidad">
                  <option v-for="country in countries" :value="country">@{{country}}</option>
                </select>
                <span class="help-block with-errors"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="provincia">Provincia</label>
                <select id="provincia" name="provincia" class="form-control" required="true" value="{{ old('provincia') }}" data-required-error="Selecciona un elemento de la lista." v-model="createCandidate.provincia" v-on:change="gettowns">
                  <option v-for="province in provinces" :value="province.provinceid">@{{province.provincename}}</option>
                </select> 
                <span class="help-block with-errors error"></span>
              </div>
              <div class='grupo-formulario'>
                <label for="poblacion">Población</label>
                <select id="poblacion" name="poblacion" class="form-control" required="true" value="{{ old('poblacion') }}" data-required-error="Selecciona un elemento de la lista." v-model="createCandidate.poblacion">
                  <option v-for="town in towns" :value="town">@{{town}}</option>
                </select> 
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <div class='formulario-flex'>
              <div class='grupo-formulario ancho-completo'>
                <label for="notas">Notas</label>
                <textarea name="notas" id="notas" class="form-control" v-model="createCandidate.notas"></textarea>
                <span class="help-block with-errors"></span>
              </div>
            </div>
            <div class="controles-contenedor">
              <!--div class='col-sm-5 col-sm-offset-1'>
                <div class='grupo-formulario'-->
              <button type="reset" id="enviarAltaOferta" class="boton limpiar esquinas hover" >
                <span class="icono">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" /></svg>
                </span>
                <span class="accion">Limpiar Formulario</span>
              </button>
              <button type="submit" id="enviarAltaOferta" class="boton crear esquinas hover" >
                <span class="icono">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" /></svg>
                </span>
                <span class="accion">Crear Oferta</span>
              </button>
            </div>
        </fieldset>
      </div>
    <div class="contenedor-pie">
      <h6>Candidatus 2.0 - Gestión RR.HH.</h6>
    </div>
    <!--/div-->
  </div>
</form>