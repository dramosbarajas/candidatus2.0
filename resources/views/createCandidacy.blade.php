<form class="form-horizontal" method="POST" v-on:submit.prevent="createcandidacy" data-toggle="validator" role="form">
  <div class="modal fade" id="createCandidacy">
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
                  <h2>Crear Candidatura</h2>
                </legend>
              </div>
              <div class="panel-body">
                <h4>Por favor, presione los botones para cargar los datos.</h4>
                <div class="col-sm-12">
                  <br>
                  <button type="button" class="btn btn-info" @click="getofferscandidacy">
                    <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
                    Cargar Ofertas
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
                  <div v-show="offerscandidacy != 0" class='form-group'>
                    <br>
                    <label for="ofertas">Ofertas</label>
                    <select name="ofertas" id="ofertas" class="form-control" required data-required-error="Selecciona un elemento de la lista"
                      v-model="candidacy.offerid">
                      <option v-for="offer in offerscandidacy" :value="offer.id">@{{offer.titulo}}</option>
                    </select>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class="col-sm-12" v-show="offerscandidacy != 0">
                  <br>
                  <button type="button" class="btn btn-info" @click="getcandidatescandidacy">
                    <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
                    Cargar Candidatos
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
                  <div v-show="candidatescandidacy != 0" class='form-group'>
                    <br>
                    <label for="candidatos">Candidatos</label>
                    <select name="candidatos" id="candidatos" class="form-control" required="true" data-required-error="Selecciona un elemento de la lista"
                      v-model="candidacy.candidateid">
                      <option v-for="candidate in candidatescandidacy" :value="candidate.id">@{{candidate.id}} - @{{candidate.nombre}} @{{candidate.apellido1}} @{{candidate.apellido2}}</option>
                    </select>
                    <span class="help-block with-errors"></span>
                  <button type="button" class="btn btn-warning" @click="checkvalidapar">
                    <i class="fa fa-refresh fa-1x" aria-hidden="true"></i>
                    Verificar Datos
                  </button>
                  </div>
                  <div v-show="flagcheckpar === 1">
                    <h3>Datos Candidatura</h3>
                    <div class="col-sm-12">
                      <div class='form-group'>
                        <label for="estado">Estado Candidatura</label>
                        <select name="" id="" class="form-control" v-model="candidacy.estado" required="true" data-required-error="Selecciona un elemento de la lista">
                          <option value="Inscrito">Inscrito</option>
                          <option value="Seleccionado">Seleccionado</option>
                          <option value="Descartado">Descartado</option>
                        </select>
                        <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class='form-group'>
                        <label for="estado">Entrevista</label>
                        <select name="estado" id="estado" class="form-control" v-model="candidacy.entrevista" required="true" data-required-error="Selecciona un elemento de la lista">
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                        </select>
                        <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class='form-group' v-if="candidacy.entrevista == 1">
                        <label for="fecha_entrevista">Fecha Entrevista</label>
                        <input type="date" name="fecha_entrevista" id="fecha_entrevista" class="form-control" v-model="candidacy.fecha_entrevista"
                          required data-required-error="El campo fecha no puede estar vacío">
                        <span class="help-block with-errors"></span>
                      </div>
                      <div v-else class='form-group'>
                        <label for="fecha_entrevista">Fecha Entrevista</label>
                        <input type="date" name="fecha_entrevista" id="fecha_entrevista" class="form-control" v-model="candidacy.fecha_entrevista"
                          disabled>
                        <span class="help-block with-errors"></span>
                      </div>

                    </div>
                    <div class="col-sm-12">
                      <div class='form-group'>
                        <label for="observaciones">Observaciones</label>
                        <textarea name="observaciones" id="" cols="30" rows="10" class="form-control" v-model="candidacy.observaciones"></textarea>
                        <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class='col-sm-5 col-sm-offset-1' v-show="candidatescandidacy != 0">
                      <br>
                      <div class='form-group'>
                        <button type="reset" class="btn btn-warning">
                          <i class="fa fa-repeat" aria-hidden="true"></i> Limpiar Formulario</button>
                      </div>
                    </div>
                    <div class='col-sm-5' v-show="candidatescandidacy != 0">
                      <br>
                      <div class='form-group'>
                        <button type="submit" class="btn btn-primary btn-block" id="enviarAltaOferta">
                          <i class="fa fa-floppy-o" aria-hidden="true"> </i> Crear Candidatura</button>
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