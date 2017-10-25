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
				</span>
				<P>@{{showOffer.titulo}}</P>
				<span>
					<strong>DESCRIPCIÓN</strong>
				</span>
				<P>@{{showOffer.descripcion}}</P>
				<span>
					<strong>ESTUDIOS</strong>
				</span>
				<P>@{{showOffer.estudios}}</P>
				<span>
					<strong>EXPERIENCIA</strong>
				</span>
				<P>@{{showOffer.experiencia}}</P>
				<span>
					<strong>CONTRATO</strong>
				</span>
				<P>@{{showOffer.contrato}}</P>
				<span>
					<strong>DURACIÓN</strong>
				</span>
				<P>@{{showOffer.duracion}}</P>
				<span>
					<strong>JORNADA</strong>
				</span>
				<P>@{{showOffer.jornada}}</P>
				<span>
					<strong>BANDA SALARIAL MINIMA</strong>
				</span>
				<P>@{{showOffer.bandamin}}</P>
				<span>
					<strong>BANDA SALARIAL MÁXIMA</strong>
				</span>
				<P>@{{showOffer.bandamax}}</P>
				<span>
					<strong>VACANTES</strong>
				</span>
				<P>@{{showOffer.vacante}}</P>
			</div>
			<div class="modal-footer">
				<div class="pull-left">
				<a href="#" class="btn btn-primary" v-on:click.prevent="generateOfferPDF(showOffer.id)">
                            <i class="fa fa-file-pdf-o 2x" aria-hidden="true"></i>
                            </i> Exportar PDF</a>
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