<form method="POST" v-on:submit.prevent="updateOffer(editOferta.id)">
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
				<input type="text" name="id" class="form-control" v-model="editOferta.id" readonly>
                <label for="titulo">TÍTULO</label>
				<input type="text" name="titulo" class="form-control" v-model="editOferta.titulo" readonly>
                <label for="estado">ESTADO</label>
                <select id="estado" name="estado" class="form-control" v-model="editOferta.estado">
                    <option value="1">Abierta</option>
                    <option value="0">Cerrada</option>
                 </select>
                </select>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Actualizar">
				<a href="#" class="btn btn-danger pull-left" v-on:click.prevent="deleteOffer(editOferta.id)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </i> Eliminar</a>
                <h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>
</form>
