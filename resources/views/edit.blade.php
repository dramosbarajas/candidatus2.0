<form method="POST" v-on:submit.prevent="updateOffer(oferta.id)">
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
                <h4>Editar Oferta</h4>
			</div>
			<div class="modal-body">
				<label for="id">ID OFERTA</label>
				<input type="text" name="id" class="form-control" v-model="editOferta.id" disabled>
                <label for="titulo">TÍTULO</label>
				<input type="text" name="titulo" class="form-control" v-model="editOferta.titulo" disabled="true">
                <label for="estado">ESTADO</label>
                <select id="estado" name="estado" class="form-control" v-model="editOferta.estado" required="true">
                    <option value="1">Abierta</option>
                    <option value="0">Cerrada</option>
                 </select>
                </select>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Actualizar">
                <h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>
</form>
