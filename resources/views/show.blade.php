<div class="modal fade" id="show">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Visualizar Oferta</h4>
			</div>
			<div class="modal-body">
				<h5>ID OFERTA @{{showOffer.id}}</h5>
				<span>
					<strong>ESTADO</strong>
				</span>
				<span v-if="showOffer.estado != 0" class="activa">
					<strong>ACTIVA</strong>
				</span>
				<span v-else class="cerrada">
					<strong>CERRADA</strong>
				</span>
				<div class="pull-right">


					<span>
						<strong>FECHA</strong>
					</span>
					<span>@{{showOffer.fecha}}</span>

				</div>
				<hr>
				<span>
					<strong>TÍTULO</strong>
				<P>@{{showOffer.titulo}}</P>
				</span>
				<span>
					<strong>DESCRIPCIÓN</strong>
				<P>@{{showOffer.descripcion}}</P>
				</span>
				<span>
					<strong>ESTUDIOS</strong>
				<P>@{{showOffer.estudios}}</P>
				</span>
				<span>
					<strong>EXPERIENCIA</strong>

					<P v-if="showOffer.experiencia =='NNEC'">No Requerida</P>
					<P v-else-if="showOffer.experiencia == '6M'">6 Meses</P>
					<P v-else-if="showOffer.experiencia == '1A'">1 Año</P>
					<P v-else-if="showOffer.experiencia == '2A'">2 Años</P>
					<P v-else-if="showOffer.experiencia == '5A'">5 Años</P>
					<P v-else>Mas de 10 años</P>
					
			
				</span>
				<span>
					<strong>CONTRATO</strong>
				<P>@{{showOffer.contrato}}</P>
				</span>
				<span v-show="showOffer.contrato != 'Indefinido'">
					<strong>DURACIÓN</strong>
				<P>@{{showOffer.duracion}} Meses</P>
				</span>
				<span>
					<strong>JORNADA</strong>
				<P>@{{showOffer.jornada}}</P>
				</span>
				<span>
					<strong>BANDA SALARIAL MINIMA</strong>
				<P>@{{showOffer.bandamin}} €uros</P>
				</span>
				<span>
					<strong>BANDA SALARIAL MÁXIMA</strong>
				<P>@{{showOffer.bandamax}} €uros</P>
				</span>
				<span>
					<strong>VACANTES</strong>
					<P v-if="showOffer.vacante == 1">@{{showOffer.vacante}} Vacante</P>
					<P v-else >@{{showOffer.vacante}} Vacantes</P>

				</span>
			<div v-show="flagshowcandidates != 0" class="container">
				<div v-if="candidatesfromoffer != 0" class="container">
				<h3>Candidatos en esta oferta</h3>
				<table class="table table-hover table-striped" style="width:150px">
					<thead>
						<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Ver Candidato</th>
						<th>Ver Candidatura</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="candidate in candidatesfromoffer">
						<td>@{{candidate.id}}</td>
						<td>@{{candidate.nombre}}</td>
						<td>@{{candidate.apellido1}} @{{candidate.apellido2}}</td>
						<td><button>
						<i class="fa fa-users fa-1x" aria-hidden="true" @click="viewcandidate(candidate)"></i>
						</button>
						</td>
						<td><button>
						<i class="fa fa-users fa-1x" aria-hidden="true" @click="$('#viewCandidacy').modal('show');"></i>
						</button>
						</td>
					</tbody>
				</table>
				</div>
				<div v-else>
				<h3>Esta oferta aún no dispone de candidatos.</h3>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<div class="pull-left">
					<a href="#" class="btn btn-outline-primary" v-on:click.prevent="generateOfferPDF(showOffer.id)">
						<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
						</i> Exportar PDF</a>
				</div>
				<div class="pull-left">
					<a v-show="flagshowcandidates == 0" href="#" class="btn btn-outline-info" v-on:click="flagshowcandidates = 1">
						<i class="fa fa-users fa-2x" aria-hidden="true"></i>
						Ver Candidatos
						<i class="fa fa-chevron-down" aria-hidden="true"></i>
					</a>
					<a v-show="flagshowcandidates == 1" href="#" class="btn btn-outline-info" v-on:click="flagshowcandidates = 0">
						<i class="fa fa-chevron-up fa-2x" aria-hidden="true"></i>
						Cerrar Candidatos
						<i class="fa fa-users fa-1x" aria-hidden="true"></i>
					</a>
				</div>
				<div>
					<button type="button" class="btn btn-info" data-dismiss="modal" value="Cerrar">
						Cerrar
					</button>
				</div>
				<h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>