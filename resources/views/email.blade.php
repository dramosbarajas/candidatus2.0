
<div class="modal fade" id="emailmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
                <h4>Enviar Correo Electrónico</h4>
			</div>
			<div class="modal-body">
                <label for="emailcandidato">Destinatario</label>
                <h4>@{{viewCandidate.nombre}} @{{viewCandidate.apellido1}} @{{viewCandidate.apellido2}}</h4>
				<textarea name="emailtext" id="emailtext" cols="30" rows="10"></textarea>
                <button type="submit">Enviar Correo</button>
			</div>
			<div class="modal-footer">
                <h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>
