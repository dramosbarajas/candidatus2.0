<div class="modal fade" id="show">
	<div class="modal-dialog modal-lg">
		<div class="contenedor-crear-candidatura">
			<div class="contenedor-cabecera">
				<h2>Visualizar Oferta</h2>
				<span class="icono" data-dismiss="modal">
			     <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
			  </span>
			</div>
			<div class="contenedor-cuerpo">
				<h5 class="titulo">ID OFERTA @{{showOffer.id}}</h5>
				<span class="dato-personal">ESTADO</span>
				<span v-if="showOffer.estado != 0" class="activa">
					<strong>ACTIVA</strong>
				</span>
				<span v-else class="cerrada">
					<strong>CERRADA</strong>
				</span>
				<div class="pull-right">
					<span class="dato-personal">FECHA</span>
					<span>@{{showOffer.fecha}}</span>
				</div>
				<hr>
				<span class="dato-personal">TÍTULO</span>
				<P>@{{showOffer.titulo}}</P>

				<span class="dato-personal">DESCRIPCIÓN</span>
				<P>@{{showOffer.descripcion}}</P>

				<span class="dato-personal">ESTUDIOS</span>
				<P>@{{showOffer.estudios}}</P>

				<span class="dato-personal">EXPERIENCIA</span>
				<P v-if="showOffer.experiencia =='NNEC'">No Requerida</P>
				<P v-else-if="showOffer.experiencia == '6M'">6 Meses</P>
				<P v-else-if="showOffer.experiencia == '1A'">1 Año</P>
				<P v-else-if="showOffer.experiencia == '2A'">2 Años</P>
				<P v-else-if="showOffer.experiencia == '5A'">5 Años</P>
				<P v-else>Mas de 10 años</P>
					
				<span class="dato-personal">CONTRATO</span>
				<P>@{{showOffer.contrato}}</P>

				<span v-show="showOffer.contrato != 'Indefinido'" class="dato-personal">DURACIÓN</span>
				<P v-show="showOffer.contrato != 'Indefinido'">@{{showOffer.duracion}} Meses</P>

				<span class="dato-personal">JORNADA</span>
				<P>@{{showOffer.jornada}}</P>

				<span class="dato-personal">BANDA SALARIAL MINIMA</span>
				<P>@{{showOffer.bandamin}} €uros</P>

				<span class="dato-personal">BANDA SALARIAL MÁXIMA</span>
				<P>@{{showOffer.bandamax}} €uros</P>

				<span class="dato-personal">VACANTES</span>
				<P v-if="showOffer.vacante == 1">@{{showOffer.vacante}} Vacante</P>
				<P v-else >@{{showOffer.vacante}} Vacantes</P>

				<div v-show="flagshowcandidates != 0" class="container-fluid">
				 	<div v-if="candidatesfromoffer != 0" class="contenedor-candidatos oferta">
						<h3 class="titulo">Candidatos en esta oferta</h3>
							<div class="card" v-for="candidate in candidatesfromoffer">
								<div class="card-header">
									<img v-if="candidate.genero == 'Hombre'" src="{{ asset('img/008-man-2.png') }}" alt="Card image cap">
									<img v-else src="{{ asset('img/007-girl.png') }}" alt="Card image cap">
									<h3 class="card-title titulo">@{{candidate.nombre}} @{{candidate.apellido1}} @{{candidate.apellido2}}</h3>	
								</div>
								<div class="card-block">
									<h5 class="card-title"><span class="candidato-oferta">@{{candidate.tipo_id}} -</span> @{{candidate.id}}</h5>
									<h5><span class="candidato-oferta">Estado Candidatura: </span><span>@{{candidate.pivot.estado}}</span></h5>
									<h5><span class="candidato-oferta">Entrevista:</span><span v-show="candidate.pivot.entrevista == 1"> SI || Fecha @{{ candidate.pivot.fecha_entrevista | moment}}</span>
									<span v-show="candidate.pivot.entrevista == 0"> NO</span></h5>
									<h5><span class="candidato-oferta">Observaciones: </span><span>@{{candidate.pivot.observaciones}}</span></h5>
								</div>
								<div class="card-footer">	
									<span class="boton pequeno esquinas limpiar hover" @click="viewcandidate(candidate,'back')">
		                  				<span class="accion">Info Candidato</span>
		                			</span>
		                			<!-- Falta la funcion click de este boton -->
									<span class="boton pequeno esquinas visualizar hover" @click="">
		                  				<span class="accion">Info Candidatura</span>
		                			</span>
								</div>
							</div>
						</div>
						<div v-else>
							<h3>Esta oferta aún no dispone de candidatos.</h3>
						</div>
					</div>
					<hr>
					<div class="controles-contenedor">
						<span class="boton gris pequeño esquinas hover" v-on:click.prevent="generateOfferPDF(showOffer.id)">
              <span class="icono">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M14,9H19.5L14,3.5V9M7,2H15L21,8V20A2,2 0 0,1 19,22H7C5.89,22 5,21.1 5,20V4A2,2 0 0,1 7,2M11.93,12.44C12.34,13.34 12.86,14.08 13.46,14.59L13.87,14.91C13,15.07 11.8,15.35 10.53,15.84V15.84L10.42,15.88L10.92,14.84C11.37,13.97 11.7,13.18 11.93,12.44M18.41,16.25C18.59,16.07 18.68,15.84 18.69,15.59C18.72,15.39 18.67,15.2 18.57,15.04C18.28,14.57 17.53,14.35 16.29,14.35L15,14.42L14.13,13.84C13.5,13.32 12.93,12.41 12.53,11.28L12.57,11.14C12.9,9.81 13.21,8.2 12.55,7.54C12.39,7.38 12.17,7.3 11.94,7.3H11.7C11.33,7.3 11,7.69 10.91,8.07C10.54,9.4 10.76,10.13 11.13,11.34V11.35C10.88,12.23 10.56,13.25 10.05,14.28L9.09,16.08L8.2,16.57C7,17.32 6.43,18.16 6.32,18.69C6.28,18.88 6.3,19.05 6.37,19.23L6.4,19.28L6.88,19.59L7.32,19.7C8.13,19.7 9.05,18.75 10.29,16.63L10.47,16.56C11.5,16.23 12.78,16 14.5,15.81C15.53,16.32 16.74,16.55 17.5,16.55C17.94,16.55 18.24,16.44 18.41,16.25M18,15.54L18.09,15.65C18.08,15.75 18.05,15.76 18,15.78H17.96L17.77,15.8C17.31,15.8 16.6,15.61 15.87,15.29C15.96,15.19 16,15.19 16.1,15.19C17.5,15.19 17.9,15.44 18,15.54M8.83,17C8.18,18.19 7.59,18.85 7.14,19C7.19,18.62 7.64,17.96 8.35,17.31L8.83,17M11.85,10.09C11.62,9.19 11.61,8.46 11.78,8.04L11.85,7.92L12,7.97C12.17,8.21 12.19,8.53 12.09,9.07L12.06,9.23L11.9,10.05L11.85,10.09Z" /></svg>
               </span>
             	<span class="accion">Exportar PDF</span>
            </span>
						<a class="boton gris pequeño esquinas hover" v-show="flagshowcandidates == 0" v-on:click="flagshowcandidates = 1">
              <span class="icono">
                 <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg>
              </span>
              <span class="accion">Ver Candidatos</span>
              <span class="icono">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
              </span>
            </a>
            <a class="boton gris pequeño esquinas hover" v-show="flagshowcandidates == 1" v-on:click="flagshowcandidates = 0">
              <span class="icono">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg>
              </span>
              <span class="accion">Ver Candidatos</span>
              <span class="icono">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" /></svg>
             	</span>
            </a>
						<span class="boton gris pequeño esquinas hover" data-dismiss="modal">
              <span class="icono">
                <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z" /></svg>
              </span>
              <span class="accion">Cerrar</span>
            </span>
					</div>
					<!--div>
						<button type="button" class="btn btn-info" data-dismiss="modal" value="Cerrar">
							Cerrar
						</button-->
				</div>
			<div class="contenedor-pie">
				<h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>