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
				<span>
					<strong>ESTADO</strong>
				</span>
				<span v-if="showOffer.estado != 0" class="activa">
					<strong>ACTIVA</strong>
				</span>
				<span v-else class="cerrada">
					<strong>CERRADA</strong>
				</span>
				<br>
				<div class="pull-right">

					<span>
						<strong>FECHA</strong>
					</span>
					<span>@{{showOffer.fecha | moment}}</span>

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


				<pre v-show="ofertaById">@{{ofertaById}}</pre>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Actualizar">
				<h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>