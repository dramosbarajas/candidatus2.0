<form class="form-horizontal" method="POST" v-on:submit.prevent="createcandidate" data-toggle="validator" role="form">
  <div class="modal fade" id="createCandidate">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>

        </div>
        <div class="modal-body">
          <fieldset>
            <!-- Nombre Formulario-->
            <div class="panel panel-default">
              <div class="panel-heading">
                <legend>
                  <h2>Alta Candidato</h2>
                </legend>
              </div>
              <div class="panel-body">
                <div class='row'>
                  <div class='col-sm-8 col-sm-offset-2'>
                  </div>
                  <div class='col-sm-2 col-sm-offset-1'>
                    <div class='form-group'>
                      <label for="tipo_id">Tipo Documento</label>
                      <select id="tipo_id" name="tipo_id" class="form-control" required="true" value="{{ old('tipo_id') }}" v-model="createCandidate.tipo_id">
                        <option value="DNI">DNI</option>
                        <option value="NIE">NIE</option>
                      </select>
                    </div>
                  </div>
                  <div v-if="createCandidate.tipo_id === 'DNI'" class='col-sm-2'>
                    <div class='form-group'>
                      <label for="identidad">Nº Identidad</label>
                      <input type="string" name="identidad" id="identidad" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío."
                        value="{{ old('identidad') }}" v-model="createCandidate.identidad" pattern="[0-9]{8}[A-Z]{1}" data-pattern-error="El DNI tiene que tener la siguiente estructura 00000000X" @blur="checkidentity">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div v-else class='col-sm-2'>
                    <div class='form-group'>
                      <label for="identidad">Nº Identidad</label>
                      <input type="string" name="identidad" id="identidad" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío."
                        value="{{ old('identidad') }}" v-model="createCandidate.identidad" pattern="[A-Z]{1}[0-9]{7}[A-Z]{1}" data-pattern-error="El NIE tiene que tener la siguiente estructura X0000000X" @blur="checkidentity">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                <div class='col-sm-3 col-sm-offset-2'>
                    <div class='form-group'>
                      <label for="fecha_nac">Fecha Nacimiento</label>
                      <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required="true" data-required-error="El campo fechanac no puede estar vacío."
                      value="{{ old('fechanac') }}" placeholder="dd/mm/aaaa" v-model="createCandidate.fecha_nac">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class='col-sm-2 col-sm-offset-0'>
                  <div class='form-group'>
                    <label for="genero">Género</label>
                    <select id="genero" name="genero" class="form-control" required="true" value="{{ old('genero') }}" v-model="createCandidate.genero">
                      <option value="Hombre">Hombre</option>
                      <option value="Mujer">Mujer</option>
                    </select>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                  <!-- Grupo Nombre y apellidos -->
                </div>
                <div class='col-sm-8 col-sm-offset-2'>
                  <div class='form-group'>
                    <label for="nombre">Nombre</label>
                    <input type="string" name="nombre" id="nombre" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío."
                      value="{{ old('nombre') }}" v-model="createCandidate.nombre">
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class='col-sm-8 col-sm-offset-2'>
                  <div class='form-group'>
                    <label for="apellido1">Primer Apellido</label>
                    <input type="string" name="apellido1" id="apellido1" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío."
                      value="{{ old('apellido1') }}" v-model="createCandidate.apellido1">
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class='col-sm-8 col-sm-offset-2'>
                  <div class='form-group'>
                    <label for="apellido2">Segundo Apellido</label>
                    <input type="string" name="apellido2" id="apellido2" class="form-control" required="true" data-required-error="El campo identidad no puede estar vacío."
                      value="{{ old('apellido2') }}" v-model="createCandidate.apellido2">
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <!-- Grupo Select 1  CONTRATO // DURACION // JORNADA -->
                <div class='col-sm-5 col-sm-offset-1'>
                  <div class='form-group'>
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" required="true" data-required-error="El campo correo electrónico no puede estar vacío."
                      value="{{ old('email') }}" v-model="createCandidate.email">
                      <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class='col-sm-3 col-sm-offset-1'>
                  <div class='form-group'>
                    <label for="tel">Teléfono</label>
                    <input type="tel" name="tel" id="email" class="form-control" required="true" data-required-error="El campo teléfono no puede estar vacío."
                      value="{{ old('tel') }}" pattern="[0-9]{9}" data-pattern-error="El campo teléfono solo puede contener 9 digitos." v-model="createCandidate.tel">
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                
                <div class='col-sm-12'>
                </div>
                <div class='col-sm-4 col-sm-offset-0'>
                  <div class='form-group'>
                    <label for="nacionalidad">Nacionalidad</label>
                    <select id="nacionalidad" name="nacionalidad" class="form-control" required="true" value="{{ old('nacionalidad') }}" data-required-error="Selecciona un elemento de la lista." v-model="createCandidate.nacionalidad">
                      <option v-for="country in countries" :value="country">@{{country}}</option>
                      </select>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class='col-sm-3 col-sm-offset-1'>
                  <div class='form-group'>
                    <label for="provincia">Provincia</label>
                    <select id="provincia" name="provincia" class="form-control" required="true" value="{{ old('provincia') }}" data-required-error="Selecciona un elemento de la lista." v-model="createCandidate.provincia" v-on:change="gettowns">
                    <option v-for="province in provinces" :value="province.provinceid">@{{province.provincename}}</option>
                      </select> 
                    <span class="help-block with-errors error"></span>
                  </div>
                </div>
                <div class='col-sm-3 col-sm-offset-1'>
                  <div class='form-group'>
                    <label for="poblacion">Población</label>
                    <select id="poblacion" name="poblacion" class="form-control" required="true" value="{{ old('poblacion') }}" data-required-error="Selecciona un elemento de la lista." v-model="createCandidate.poblacion">
                    <option v-for="town in towns" :value="town">@{{town}}</option>
                      </select> 
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class='col-sm-8 col-sm-offset-2'>
                <div class='form-group'>
                    <label for="notas">Notas</label>
                    <textarea name="notas" id="notas" class="form-control" v-model="createCandidate.notas"></textarea>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class='col-sm-5 col-sm-offset-1'>
                  <div class='form-group'>
                    <button type="button" class="btn btn-warning">
                      <i class="fa fa-repeat" aria-hidden="true"></i> Limpiar Formulario</button>
                  </div>
                </div>
                <div class='col-sm-5'>
                  <div class='form-group'>
                    <button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta">
                      <i class="fa fa-floppy-o" aria-hidden="true"> </i> Crear Candidato</button>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="modal-footer">
            <h6>Candidatus 2.0 - Gestión RR.HH.</h6>
          </div>
        </div>
      </div>
    </div>
</form>