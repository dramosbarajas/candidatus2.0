<div class="modal fade" id="viewCandidate">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h2>Visualizar Candidato</h2>
			</div>
			<div class="modal-body">
				<div>
					<h3>Datos Personales</h3>
					<div class="container">
						<h4>@{{viewCandidate.nombre}} @{{viewCandidate.apellido1}} @{{viewCandidate.apellido2}}</h4>
						<h5>@{{viewCandidate.tipo_id}} - @{{viewCandidate.id}}</h5>
						<h5>Fecha Nacimiento: @{{viewCandidate.fecha_nac}} Edad @{{viewCandidate.edad}} años. </h5>
						<h5 v-if="viewCandidate.genero == 'Hombre'">Genero Masculino</h5>
						<h5 v-else>Genero Femenino</h5>
						<h5>Nacionalidad: @{{viewCandidate.nacionalidad}}</h5>
						<h5>Provincia: @{{viewCandidate.provincia}}</h5>
						<h5>Población: @{{viewCandidate.poblacion}}</h5>
					</div>
					<hr>
				</div>
				<div>
					<h3>Datos Contacto</h3>
					<div class="container">
						<h5>
							<strong class="text-uppercase">Correo Electrónico:</strong> @{{viewCandidate.email}}</h5>
						<a type="button" class="btn btn-outline-primary">
							<span>Enviar Correo Electrónico </span>
							<i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
						</a>
						<h5>
							<strong class="text-uppercase">Teléfono:</strong> @{{viewCandidate.tel}}</h5>
						<a type="button" class="btn btn-outline-primary">
							<span>Enviar SMS </span>
							<i class="fa fa-commenting-o fa-2x" aria-hidden="true"></i>
						</a>
					</div>
				</div>
				<hr>


				<div>
					<h3>Curriculum Vitae</h3>
					<div class="container">
						<div v-if="viewCandidate.cv == null">
							<h4>Por favor Adjunte el Curriculum Vitae a la ficha del candidato.</h4>
							<form id="uploadcvform" class="form-inline" method="POST" enctype="multipart/form-data">
								<label for="cv">Presione y seleccione un archivo.</label>
								<input type="file" name="cv" id="cv" />
								<input type="hidden" name="id" :value="viewCandidate.id" />
								<br>
								<button type="submit" class="btn btn-success" @click="uploadCV">Upload CV</button>
							</form>
						</div>
						<div v-else>
							<h4>Presiona sobre el icono para ver el documento.</h4>
							<a type="button" :href="viewCandidate.cv" target="_blank" class="btn btn-outline-primary">Visualizar Curriculum Vitae
								<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
				<hr>
				<div>
					<h3>Notas</h3>
					<div class="container">
						<p>@{{viewCandidate.notas}}</p>
					</div>
				</div>
				<div>
					<h3>Estado Candidaturas</h3>
					<div class="container">
						<div v-if="offersfromcandidate != 0">
							<pre>@{{offersfromcandidate}}</pre>
						</div>
						<div v-else>
							<h4>El candidato no dispone de Candidaturas</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<a href="#" type="button" class="btn btn-outline-danger pull-left" v-on:click.prevent="deleteOffer(editOferta.id)">
                            <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </i> Eliminar</a>
				<h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>