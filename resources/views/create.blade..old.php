<form class="form-horizontal" method="POST" v-on:submit.prevent="createOffer" data-toggle="validator" role="form">
<div class="modal fade" id="create">
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
          <h2>Alta Oferta</h2>
        </legend>
      </div>
      <div class="panel-body">
        <div class='row'>
        <div class='col-sm-8 col-sm-offset-2'>
            <div class="text-alert text-center" role="alert">
              <h4>Por favor, rellene los siguientes campos correctamente para proceder al alta de la oferta en la base de datos.</h4>
            </div>
            <br>  
          </div>   
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="estado">CANDIDATURA</label>
              <select id="estado" name="estado" class="form-control" v-model="estado" required="true" value="{{ old('estado') }}">
                <option value="1">Abierta</option>
                <option value="0">Cerrada</option>
              </select>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-5'>
            <div class='form-group'>
              <label for="fecha">FECHA INSCRIPCIÓN</label>
              <input type="date" name="fecha" id="fecha" class="form-control" required="true" data-required-error="El campo Fecha no puede estar vacío." v-model="fecha" value="{{ old('fecha') }}">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <!-- Título de la oferta-->
          <div class='col-sm-8 col-sm-offset-2'>
            <div class='form-group'>
              <label for="titulo">TÍTULO OFERTA</label>
              <input class="form-control" id="titulo" v-model="titulo" name="titulo" minlength=6 maxlength=30 required="true" data-error="El campo Título ha de estar comprendido entre 6 y 30 carácteres."
                data-required-error="El campo Título no puede estar vacío." type="text" />
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <!-- Descripción de la oferta-->
          <div class='col-sm-10 col-sm-offset-1'>
            <div class='form-group'>
              <label for="descripcion">DESCRIPCIÓN</label>
              <textarea name="descripcion" id="descripcion" v-model="descripcion" class="form-control" required="true" minlength=100 maxlength=600 data-error="El campo Descripción ha de contener en 100 y 600 carácteres."
                data-required-error="El campo Descripción no puede estar vacío."></textarea>
              <span class="help-block with-errors"></span>
            </div>
            <!-- Grupo Select 1  DEPARTAMENTO // ESTUDIOS // EXPERIENCIA -->
          </div>
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="departamento">DEPARTAMENTO</label>
              <select id="departamento" name="departamento" v-model="departamento" class="form-control">
                <option value="Recursos Humanos">Recursos Humanos</option>
                <option value="Tecnología">Tecnología</option>
                <option value="Administración">Administración</option>
                <option value="Dirección">Dirección</option>
                <option value="Económico - Financiero">Económico - Financiero</option>
              </select>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="estudios">ESTUDIOS MÍNIMOS</label>
              <select id="estudios" name="estudios" class="form-control"v-model="estudios">
                <option value="Sin Estudios">Sin Estudios</option>
                <option value="Educación Secundaria Obligatoria">Educación Secundaria Obligatoria</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Ciclo Formativo Grado Medio">Ciclo Formativo Grado Medio</option>
                <option value="Ciclo Formativo Grado Superior">Ciclo Formativo Grado Superior</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Diplomatura">Diplomatura</option>
                <option value="Doctorado">Doctorado</option>
              </select>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="experiencia">EXPERIENCIA</label>
              <select id="experiencia" name="experiencia" class="form-control" v-model="experiencia">
                <option value="NNEC">No necesaria</option>
                <option value="6M">6 Meses</option>
                <option value="1A">1 año</option>
                <option value="2A">2 años</option>
                <option value="5A">5 años</option>
                <option value="10A">Mas de 10 años</option>
              </select>
            </div>
          </div>
          <!-- Grupo Select 1  CONTRATO // DURACION // JORNADA -->
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="contrato">CONTRATO</label>
              <select id="contrato" name="contrato" class="form-control" v-model="contrato">
                <option value="De duración determinada">De duración determinada</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Otros Contratos">Otros Contratos</option>
                <option value="A tiempo parcial">A tiempo parcial</option>
                <option value="Autónomo">Autónomo</option>
                <option value="Fijo Discontinuo">Fijo Discontinuo</option>
                <option value="Formativo">Formativo</option>
                <option value="De relevo">De relevo</option>
              </select>
            </div>
          </div>
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="estudiomin">DURACIÓN</label>
              <div class="input-group">
              <input v-if="contrato != 'Indefinido'" id="duracion" name="duracion" class="form-control input-md" required="true" type="text"
                pattern="[0-9]{1,2}" data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener digitos." v-model="duracion">
                <input v-else id="duracion" name="duracion" class="form-control input-md" type="text" v-model="duracion" disabled>
                <span class="input-group-addon"><strong>MESES</strong></span> 
              </div>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="jornada">JORNADA LABORAL</label>
              <select id="jornada" name="jornada" class="form-control" v-model="jornada">
                <option value="Completa">Completa</option>
                <option value="Parcial">Parcial</option>
                <option value="Intensiva">Intensiva</option>
              </select>
            </div>
          </div>
          <div class='col-sm-12'>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="bandamin">BANDA MÍNIMA</label>
                <div class="input-group">
                <input type="text" name="bandamin" id="bandamin" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}"
                data-required-error="El campo no puede estar vacío." v-model="bandamin" data-pattern-error="El campo solo puede contener entre 4 y 5 digitos.">
               <span class="input-group-addon"><strong>€ ANUAL</strong></span>  
              </div>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group' id="bandamaxdiv">
              <label for="bandamax">BANDA MÁXIMA</label>
              <div class="input-group">
              <input type="text" name="bandamax" id="bandamax" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}"
                data-required-error="El campo no puede estar vacío." v-model="bandamax" data-pattern-error="El campo solo puede contener entre 4 y 5 digitos." v-on:change="comprobarBandaSalarial()">
               <span class="input-group-addon"><strong>€ ANUAL</strong></span>  
              </div>
              <span class="help-block with-errors error"></span>
            </div>
          </div>
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="vacante">VACANTES</label>
              <div class="input-group">
              <input type="text" name="vacante" id="vacante" class="form-control" required="true" placeholder="0" pattern="[0-9]{1,2}"
                data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener digitos." v-model="vacante">
                <span v-if="vacante != 1"class="input-group-addon"><strong>VACANTES</strong></span> 
                <span v-else class="input-group-addon"><strong>VACANTE</strong></span> 
              </div>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-12'>
          </div>
          <div class='col-sm-5 col-sm-offset-1'>
            <div class='form-group'>
              <button type="reset" class="btn btn-warning"><i class="fa fa-repeat" aria-hidden="true"></i> Limpiar Formulario</button>
            </div>
          </div>
          <div class='col-sm-5'>
            <div class='form-group'>
              <button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta"><i class="fa fa-floppy-o" aria-hidden="true"> </i>  Crear Oferta</button>
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