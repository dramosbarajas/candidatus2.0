<form class="form-horizontal" method="POST" v-on:submit.prevent="createOffer" data-toggle="validator" role="form">
<div class="modal fade" id="create">
	<!--div class="modal-dialog modal-lg"-->
  <div class="contenedor-crear-candidatura">
		<!--div class="modal-content"-->
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
        <!-- Nombre Formulario-->
          <div class='formulario-flex texto'>
            <div class="text-alert text-center" role="alert">
              <h4>Por favor, rellene los siguientes campos correctamente para proceder al alta de la oferta en la base de datos.</h4>
            </div>
            <br>  
          </div> 
          <div class='formulario-flex'>  
            <div class='grupo-formulario'>
              <label for="estado">CANDIDATURA</label>
              <select id="estado" name="estado" class="form-control" v-model="estado" required="true" value="{{ old('estado') }}">
                <option value="1">Abierta</option>
                <option value="0">Cerrada</option>
              </select>
            </div>
            <div class='grupo-formulario'>
              <label for="fecha">FECHA INSCRIPCIÓN</label>
              <input type="date" name="fecha" id="fecha" class="form-control" required="true" data-required-error="El campo Fecha no puede estar vacío." v-model="fecha" value="{{ old('fecha') }}">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='formulario-flex'>
            <!-- Título de la oferta-->
            <div class='grupo-formulario ancho-completo'>
              <label for="titulo">TÍTULO OFERTA</label>
              <input class="form-control" id="titulo" v-model="titulo" name="titulo" minlength=6 maxlength=30 required="true" data-error="El campo Título ha de estar comprendido entre 6 y 30 carácteres."
                    data-required-error="El campo Título no puede estar vacío." type="text" />
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='formulario-flex'>
            <!-- Descripción de la oferta-->
            <div class='grupo-formulario ancho-completo'>
              <label for="descripcion">DESCRIPCIÓN</label>
              <textarea name="descripcion" id="descripcion" v-model="descripcion" class="form-control" required="true" minlength=100 maxlength=600 data-error="El campo Descripción ha de contener en 100 y 600 carácteres."
                    data-required-error="El campo Descripción no puede estar vacío."></textarea>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='formulario-flex'>
            <!-- Grupo Select 1  DEPARTAMENTO // ESTUDIOS // EXPERIENCIA -->
            <div class='grupo-formulario'>
              <label for="departamento">DEPARTAMENTO</label>
              <select id="departamento" name="departamento" v-model="departamento" class="form-control">
                <option value="Recursos Humanos">Recursos Humanos</option>
                <option value="Tecnología">Tecnología</option>
                <option value="Administración">Administración</option>
                <option value="Dirección">Dirección</option>
                <option value="Económico - Financiero">Económico - Financiero</option>
              </select>
            </div>
            <div class='grupo-formulario'>
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
            <div class='grupo-formulario'>
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
          <div class='formulario-flex'>
          <!-- Grupo Select 1  CONTRATO // DURACION // JORNADA -->
            <div class='grupo-formulario'>
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
            <div class='grupo-formulario'>
              <label for="estudiomin">DURACIÓN</label>
              <div class="input-group">
                <input v-if="contrato != 'Indefinido'" id="duracion" name="duracion" class="form-control input-md" required="true" type="text"
                    pattern="[0-9]{1,2}" data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener digitos." v-model="duracion">
                <input v-else id="duracion" name="duracion" class="form-control input-md" type="text" v-model="duracion" disabled>
                <span class="input-group-addon"><strong>MESES</strong></span> 
              </div>
              <span class="help-block with-errors"></span>
            </div>
            <div class='grupo-formulario'>
              <label for="jornada">JORNADA LABORAL</label>
              <select id="jornada" name="jornada" class="form-control" v-model="jornada">
                <option value="Completa">Completa</option>
                <option value="Parcial">Parcial</option>
                <option value="Intensiva">Intensiva</option>
              </select>
            </div>
          </div>
          <div class='formulario-flex'>
            <div class='grupo-formulario'>
              <label for="bandamin">BANDA MÍNIMA</label>
                <div class="input-group">
                <input type="text" name="bandamin" id="bandamin" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}"
                    data-required-error="El campo no puede estar vacío." v-model="bandamin" data-pattern-error="El campo solo puede contener entre 4 y 5 digitos.">
                <span class="input-group-addon"><strong>€ ANUAL</strong></span>  
              </div>
              <span class="help-block with-errors"></span>
            </div>
            <div class='grupo-formulario' id="bandamaxdiv">
              <label for="bandamax">BANDA MÁXIMA</label>
              <div class="input-group">
                <input type="text" name="bandamax" id="bandamax" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}"
                    data-required-error="El campo no puede estar vacío." v-model="bandamax" data-pattern-error="El campo solo puede contener entre 4 y 5 digitos." v-on:change="comprobarBandaSalarial()">
                <span class="input-group-addon"><strong>€ ANUAL</strong></span>  
              </div>
              <span class="help-block with-errors error"></span>
            </div>
            <div class='grupo-formulario'>
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
          <div class="controles-contenedor">
              <!--div class='col-sm-5 col-sm-offset-1'>
                <div class='grupo-formulario'-->
            <button type="reset" id="enviarAltaOferta" class="boton limpiar esquinas hover" >
              <span class="icono">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" /></svg>
              </span>
              <span class="accion">Limpiar Formulario</span>
            </button>
                  <!--button type="reset" class="btn btn-warning"><i class="fa fa-repeat" aria-hidden="true"></i> Limpiar Formulario</button-->
                <!--/div>
              </div>
              <div class='col-sm-5'>
                <div class='grupo-formulario'-->
            <button type="submit" id="enviarAltaOferta" class="boton crear esquinas hover" >
              <span class="icono">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" /></svg>
              </span>
              <span class="accion">Crear Oferta</span>
            </button>
                  <!--button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta"><i class="fa fa-floppy-o" aria-hidden="true"> </i>  Crear Oferta</button-->
                <!--/div>
              </div-->
          </div>
            <!--/div-->
          <!--/div-->
        </fieldset>
    </div>
		<div class="contenedor-pie">
			<h6>Candidatus 2.0 - Gestión RR.HH.</h6>
		</div>
	</div>
</div>
</form>