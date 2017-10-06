@extends('app')
@section('content')

<form class="form-horizontal" method="POST" action="/offer">
<fieldset>

<!-- Nombre Formulario-->
<div class="panel panel-default">
<div class="panel-heading fixed">
    <legend><h2>Alta Oferta</h2></legend>

</div>
<div class="panel-body">

<div class="form-group has-error">
  <label class="col-md-1 control-label" for="titulo">Título</label>
  <div class="col-md-11">
    <input id="titulo" name="titulo" placeholder="Título de la oferta." class="form-control input-md" required="" type="text">
    <span class="help-block">Prueba Span</span>
  </div>
</div>

<!-- Descripción de la oferta-->
<div class="form-group">
  <label class="col-md-1 control-label" for="descripcion">Descripción</label>  
  <div class="col-md-11">
    <textarea name="descripcion" id="descripcion" class="form-control" required=""></textarea>
    <span class="help-block"></span>
  </div>
</div>

<!-- Grupo Select 1  DEPARTAMENTO // ESTUDIOS // EXPERIENCIA -->
<div class="form-group">
  <label class="col-md-1 control-label" for="departamento">Dpto</label>  
 <div class="col-md-3">
    <select id="departamento" name="departamento" class="form-control">
      <option value="RH">Recursos Humanos</option>
      <option value="TEC">Tecnología</option>
      <option value="ADM">Administración</option>
      <option value="DIR">Dirección</option>
      <option value="ECO">Económico - Financiero</option>
    </select>
  </div>
  <label class="col-md-2 control-label" for="estudiomin">Estudios Mínimos</label>  
  <div class="col-md-2">
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
   <label class="col-md-2 control-label" for="experiencia">Experiencia</label>  
  <div class="col-md-2">
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

<!-- Grupo Select 2 Contrato Estudios Jornada -->
<div class="form-group">
  <label class="col-md-1 control-label" for="contrato">Contrato</label>  
 <div class="col-md-3">
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
  <label class="col-md-1 control-label" for="estudiomin"> Duración</label>  
  <div class="col-md-3">
       <input id="duracion" name="duracion" placeholder="Duración Contrato" class="form-control input-md" required="" type="text">
        <span class="help-block">Dejar en blanco si es indefinido.</span>
  </div>
   <label class="col-md-2 control-label" for="jornada">Jornada Laboral</label>  
  <div class="col-md-2">
    <select id="jornada" name="jornada" class="form-control">
      <option value="NNEC">Completa</option>
      <option value="6M">Parcial</option>
      <option value="1A">Intensiva</option>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-1 control-label" for="salario">Salario Minimo</label>  
  <div class="col-md-3">
    <input id="salmin" name="min" class="form-control input-md" required="" type="text">
    <span class="help-block">format :JJ/MM/YYYY</span>  
  </div>
<label class="col-md-1 control-label" for="salario">Salario Máximo</label>  
  <div class="col-md-3">
    <input id="salmin" name="min" class="form-control input-md" required="" type="text">
    <span class="help-block">format :JJ/MM/YYYY</span>  
  </div>
  <label class="col-md-1 control-label" for="vacantes">Vacantes</label>  
  <div class="col-md-3">
    <input id="vacante" name="min" class="form-control input-md" required="" type="number">
    <span class="help-block">format :JJ/MM/YYYY</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group form-actions">
  <div class="col-md-4">
    <button type="reset" id="send" name="send" class="btn btn-info btn-block">Limpiar Formulario</button>
  </div>
  <div class="col-md-8">
    <button id="send" name="send" class="btn btn-success btn-block"s>Crear Oferta</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div>

@stop