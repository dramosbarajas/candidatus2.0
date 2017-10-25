<form class="form-horizontal" method="POST" v-on:submit.prevent="" data-toggle="validator" role="form">
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
                      <label for="tipo_id">TIPO IDENTIDAD</label>
                      <select id="tipo_id" name="tipo_id" class="form-control" required="true" value="{{ old('tipo_id') }}">
                        <option value="DNI">DNI</option>
                        <option value="NIE">NIE</option>
                      </select>
                    </div>
                  </div>
                  <!-- <div class='col-sm-2 col-sm-offset-1'>
                    <div class='form-group'>
                      <div class="input-group input-group-date js-input-group-date">
                        <div>
                          <input type="number" placeholder="DD" maxlength="2" oninput="maxLengthCheck(this)" id="idbirthDateday" class="js-required"
                            data-vars="{&quot;next&quot;:&quot;idbirthDatemonth&quot;,&quot;numdigits&quot;:&quot;2&quot;,&quot;regexp&quot;:&quot;[0-9]{2}$&quot;}"
                            name="birthDateday">
                        </div>
                        <div>
                          <input type="number" placeholder="MM" maxlength="2" oninput="maxLengthCheck(this)" id="idbirthDatemonth" data-vars="{&quot;next&quot;:&quot;idbirthDateyear&quot;,&quot;numdigits&quot;:&quot;2&quot;,&quot;regexp&quot;:&quot;[0-9]{2}$&quot;}"
                            name="birthDatemonth">
                        </div>
                        <div>
                          <input type="number" placeholder="AAAA" maxlength="4" oninput="maxLengthCheck(this)" id="idbirthDateyear" data-vars="{&quot;numdigits&quot;:&quot;4&quot;,&quot;regexp&quot;:&quot;[0-9]{4}$&quot;}"
                            name="birthDateyear">
                        </div>
                      </div>
                    </div>
                  </div> -->

                  <div class='col-sm-3 col-sm-offset-'>
                    <div class='form-group'>
                      <label for="identidad">Nº IDENTIDAD</label>
                      <input type="string" name="identidad" id="identidad" class="form-control" required="true" data-required-error="El campo Fecha no puede estar vacío."
                        value="{{ old('identidad') }}">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <!-- Título de la oferta-->
                  <div class='col-sm-8 col-sm-offset-2'>
                    <div class='form-group'>
                      <label for="titulo">TÍTULO OFERTA</label>
                      <input class="form-control" id="titulo" name="titulo" minlength=6 maxlength=30 required="true" data-error="El campo Título ha de estar comprendido entre 6 y 30 carácteres."
                        data-required-error="El campo Título no puede estar vacío." type="text" />
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <!-- Descripción de la oferta-->
                  <div class='col-sm-10 col-sm-offset-1'>
                    <div class='form-group'>
                      <label for="descripcion">DESCRIPCIÓN</label>
                      <textarea name="descripcion" id="descripcion" class="form-control" required="true" minlength=100 maxlength=600 data-error="El campo Descripción ha de contener en 100 y 600 carácteres."
                        data-required-error="El campo Descripción no puede estar vacío."></textarea>
                      <span class="help-block with-errors"></span>
                    </div>
                    <!-- Grupo Select 1  DEPARTAMENTO // ESTUDIOS // EXPERIENCIA -->
                  </div>
                  <div class='col-sm-2 col-sm-offset-1'>
                    <div class='form-group'>
                      <label for="departamento">DEPARTAMENTO</label>
                      <select id="departamento" name="departamento" class="form-control">
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
                      <select id="estudios" name="estudios" class="form-control">
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
                      <select id="experiencia" name="experiencia" class="form-control">
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
                      <select id="contrato" name="contrato" class="form-control">
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
                        <input id="duracion" name="duracion" class="form-control input-md" required="true" type="text" pattern="[0-9]{1,2}" data-required-error="El campo no puede estar vacío."
                          data-pattern-error="El campo solo puede contener digitos.">
                        <span class="input-group-addon">
                          <strong>MESES</strong>
                        </span>
                      </div>
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class='col-sm-3 col-sm-offset-1'>
                    <div class='form-group'>
                      <label for="jornada">JORNADA LABORAL</label>
                      <select id="jornada" name="jornada" class="form-control">
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
                          data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener entre 4 y 5 digitos.">
                        <span class="input-group-addon">
                          <strong>€ ANUAL</strong>
                        </span>
                      </div>
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class='col-sm-3 col-sm-offset-1'>
                    <div class='form-group' id="bandamaxdiv">
                      <label for="bandamax">BANDA MÁXIMA</label>
                      <div class="input-group">
                        <input type="text" name="bandamax" id="bandamax" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}"
                          data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener entre 4 y 5 digitos.">
                        <span class="input-group-addon">
                          <strong>€ ANUAL</strong>
                        </span>
                      </div>
                      <span class="help-block with-errors error"></span>
                    </div>
                  </div>
                  <div class='col-sm-2 col-sm-offset-1'>
                    <div class='form-group'>
                      <label for="vacante">VACANTES</label>
                      <div class="input-group">
                        <input type="text" name="vacante" id="vacante" class="form-control" required="true" placeholder="0" pattern="[0-9]{1,2}"
                          data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener digitos.">
                        <span class="input-group-addon">USU</span>
                      </div>
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class='col-sm-12'>
                  </div>
                  <div class='col-sm-5 col-sm-offset-1'>
                    <div class='form-group'>
                      <button type="reset" class="btn btn-warning">
                        <i class="fa fa-repeat" aria-hidden="true"></i> Limpiar Formulario</button>
                    </div>
                  </div>
                  <div class='col-sm-5'>
                    <div class='form-group'>
                      <button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta">
                        <i class="fa fa-floppy-o" aria-hidden="true"> </i> Crear Oferta</button>
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