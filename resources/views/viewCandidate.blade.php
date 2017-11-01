<div class="modal fade" id="viewCandidate">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Visualizar Candidato</h4>
			</div>
			<div class="modal-body">
                <h4>@{{viewCandidate.nombre}} @{{viewCandidate.apellido1}} @{{viewCandidate.apellido2}}</h4>
				<hr>
				<h5>Fecha Nacimiento: @{{viewCandidate.fecha_nac}}  Edad @{{viewCandidate.edad}} años. </h5>
				<h5 v-if="viewCandidate.genero == 'Hombre'">Genero Masculino</h5>
				<h5 v-else>Genero Femenino</h5>
				<hr>
				<h5>Nacionalidad: @{{viewCandidate.nacionalidad}}</h5>
				<h5>Provincia: @{{viewCandidate.provincia}}</h5>
				<h5>Población: @{{viewCandidate.poblacion}}</h5>
				<hr>
				<h5><strong class="text-uppercase">Correo Electrónico:</strong> @{{viewCandidate.email}}</h5>
				<h5><strong class="text-uppercase">Teléfono:</strong> @{{viewCandidate.tel}}</h5>
				<hr>
				<h5><strong class="text-uppercase">Notas:</strong> <p>@{{viewCandidate.notas}}</p></h5>
				<h5>Curriculum Vitae: @{{viewCandidate.cv}}</h5>
				<div>
					<h4>Adjuntar CV</h4>
					<!--<form action="{{route('uploadCV')}}" method="post" enctype="multipart/form-data">
						<label for="cv"> Subir Curriculum Vitae</label>
						<input type="file" name="cv" id="cv">
						<input type="hidden" name="identidad" :value="viewCandidate.identidad">
						<br>
					<button type="submit" class="btn btn-success">Upload CV</button>
					</form>-->
					<form id="uploadcvform" class="form-inline" method="POST" enctype="multipart/form-data">
						<label for="cv"> Subir Curriculum Vitae</label>
						<input type="file" name="cv" id="cv"/>
						<input type="hidden" name="identidad" :value="viewCandidate.identidad"/>
						<br>
					<button type="submit" class="btn btn-success" @click="uploadCV">Upload CV</button>
					</form>
						<a :href="viewCandidate.cv" target="_blank">Ver CV</a>
				</div>
				<hr>
				<h4>Comunicación con el candidato</h4>
				<p>Enviar Correo Electrónico</p><button type="button" class="btn btn-info"><i class="fa fa-envelope-o 2x" aria-hidden="true"></i></button>
				<p>Enviar SMS</p><button type="button" class="btn btn-info"><i class="fa fa-commenting-o 2x" aria-hidden="true"></i></button>
			</div>
			<div class="modal-footer">
				
				<h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>