@extends('app')
@section('content')
<br>
<form class="form-horizontal" method="POST" action="/offer" data-toggle="validator" role="form">
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
          <!-- Título de la oferta-->
          <div class='col-sm-8 col-sm-offset-2'>
            <div class='form-group'>
              <label for="titoferta">Título Oferta</label>
              <input class="form-control" id="titoferta" name="titoferta" size="30" minlength=6 maxlength=40 required="true" data-error="El campo Título ha de estar comprendido entre 6 y 30 carácteres."
                data-required-error="El campo Título no puede estar vacío." type="text" />
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <!-- Descripción de la oferta-->
          <div class='col-sm-10 col-sm-offset-1'>
            <div class='form-group'>
              <label for="descripcion">Descripción</label>
              <textarea name="descripcion" id="descripcion" class="form-control" required="" minlength=100 maxlength=600 data-error="El campo Descripción ha de contener en 100 y 600 carácteres."
                data-required-error="El campo Descripción no puede estar vacío."></textarea>
              <span class="help-block with-errors"></span>
            </div>
            <!-- Grupo Select 1  DEPARTAMENTO // ESTUDIOS // EXPERIENCIA -->
          </div>
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="departamento">DEPARTAMENTO</label>
              <select id="departamento" name="departamento" class="form-control">
                <option value="RH">Recursos Humanos</option>
                <option value="TEC">Tecnología</option>
                <option value="ADM">Administración</option>
                <option value="DIR">Dirección</option>
                <option value="ECO">Económico - Financiero</option>
              </select>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="estudiomin">ESTUDIOS MÍNIMOS</label>
              <select id="estudiomin" name="estudiomin" class="form-control">
                <option value="Sin Estudios">Sin Estudios</option>
                <option value="ESO">Educación Secundaria Obligatoria</option>
                <option value="BACH">Bachillerato</option>
                <option value="2">Ciclo Formativo Grado Medio</option>
                <option value="3">Ciclo Formativo Grado Superior</option>
                <option value="">Licenciatura</option>
                <option value="4">Diplomatura</option>
                <option value="5">Doctorado</option>
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
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="contrato">CONTRATO</label>
              <select id="contrato" name="contrato" class="form-control">
                <option value="RH">Indefinido</option>
                <option value="TEC">De duración determinada</option>
                <option value="ADM">Otros Contratos</option>
                <option value="DIR">A tiempo parcial</option>
                <option value="ECO">Autónomo</option>
                <option value="ECO">Fijo Discontinuo</option>
                <option value="ECO">Formativo</option>
                <option value="ECO">De relevo</option>
              </select>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="estudiomin">DURACIÓN</label>
              <input id="duracion" name="duracion" placeholder="Duración Contrato." class="form-control input-md" required="" type="text"
                value=0 pattern="[0-9]" data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener digitos.">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="jornada">JORNADA LABORAL</label>
              <select id="jornada" name="jornada" class="form-control">
                <option value="NNEC">Completa</option>
                <option value="6M">Parcial</option>
                <option value="1A">Intensiva</option>
              </select>
            </div>
          </div>
          <div class='col-sm-12'>
          </div>
          <div class='col-sm-2 col-sm-offset-1'>
            <div class='form-group'>
              <label for="bandamin">BANDA SALARIAL MÍNIMA</label>
              <input type="text" name="bandamin" id="bandamin" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}"
                data-required-error="El campo no puede estar vacío." data-pattern-error="El campo solo puede contener entre 4 y 5 digitos.">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="jornada">BANDA SALARIAL MÁXIMA</label>
              <input type="text" name="" id="" class="form-control" required="true" placeholder="00000" pattern="[0-9]{4,5}" data-required-error="El campo no puede estar vacío."
                data-pattern-error="El campo solo puede contener entre 4 y 5 digitos.">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-3 col-sm-offset-1'>
            <div class='form-group'>
              <label for="jornada">NÚMERO VACANTES</label>
              <input type="text" name="" id="" class="form-control" required="true" placeholder="0" pattern="[0-9]{1,2}" data-required-error="El campo no puede estar vacío."
                data-pattern-error="El campo solo puede contener digitos.">
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class='col-sm-12'>
          </div>
          <div class='col-sm-5 col-sm-offset-1'>
            <div class='form-group'>
              <button type="reset" id="send" name="send" class="btn btn-warning">Limpiar Formulario</button>
            </div>
          </div>
          <div class='col-sm-5'>
            <div class='form-group'>
              <button type="submit" id="send" name="send" class="btn btn-primary btn-block">Crear Oferta</button>
            </div>
          </div>
        </div>
      </div>
  </fieldset>
</form>

@stop