<div class="modal fade" id="viewCandidate">
	<div class="modal-dialog">
		<div class="contenedor-crear-candidatura">
			<div class="contenedor-cabecera">
				<h2>Visualizar Candidato</h2>
				<!--button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button-->
				<span class="icono" data-dismiss="modal">
			      	<svg style="width:24px;height:24px" viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
			    </span>
			</div>
			<div class="contenedor-cuerpo">
				<div>
					<h3 class="titulo">Datos Personales</h3>
					<div class="datos-personales">
						<h4 class="nombre-candidato">@{{viewCandidate.nombre}} @{{viewCandidate.apellido1}} @{{viewCandidate.apellido2}}</h4>
						<h5><span class="dato-personal">@{{viewCandidate.tipo_id}}:</span> @{{viewCandidate.id}}</h5>
						<h5><span class="dato-personal">Fecha Nacimiento:</span> @{{viewCandidate.fecha_nac}}</h5>
						<h5><span class="dato-personal">Edad:</span> @{{viewCandidate.edad}} años. </h5>
						<h5 v-if="viewCandidate.genero == 'Hombre'">Genero Masculino</h5>
						<h5 v-else>Genero Femenino</h5>
						<h5><span class="dato-personal">Nacionalidad:</span> @{{viewCandidate.nacionalidad}}</h5>
						<h5><span class="dato-personal">Provincia:</span> @{{viewCandidate.provincia}}</h5>
						<h5><span class="dato-personal">Población:</span> @{{viewCandidate.poblacion}}</h5>
					</div>
					<hr>
				</div>
				<div>
					<h3 class="titulo">Datos Contacto</h3>
					<div class="datos-personales">
						<h5><span class="dato-personal">Correo Electrónico:</span> @{{viewCandidate.email}}</h5>
						<span class="boton pequeno esquinas gris hover" @click="viewemail = 1">
	        		<span class="accion">Enviar Correo Electrónico</span>
	        		<span class="icono">
	          		<svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
	        		</span>
	     		 	</span>
						<!--a type="button" class="btn btn-outline-primary" @click="viewemail = 1">
							<span>Enviar Correo Electrónico </span>
							<i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
						</a-->
						<div v-show="viewemail == 1">
							<label for="emailcandidato">Destinatario</label>
               				 <h4>@{{viewCandidate.nombre}} @{{viewCandidate.apellido1}} @{{viewCandidate.apellido2}}</h4>
							<textarea name="emailtext" id="emailtext" cols="30" rows="10"></textarea>
               				 <button type="submit" @click="sendemail">Enviar Correo</button>
							<button @click="viewemail = 0">Ocultar</button>
						</div>
						<h5><span class="dato-personal">Teléfono:</span> @{{viewCandidate.tel}}</h5>
						<span class="boton pequeno esquinas gris hover">
	        		<span class="accion">Enviar SMS</span>
	        		<span class="icono">
	          		<svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M6,9H18V11H6M14,14H6V12H14M18,8H6V6H18" /></svg>
	        		</span>
	     		 	</span>
					</div>
				</div>
				<hr>
				<div>
					<h3 class="titulo">Curriculum Vitae</h3>
					<div class="datos-personales" v-if="viewCandidate.cv == null">
						<!--div v-if="viewCandidate.cv == null"-->
							<h4>Por favor Adjunte el Curriculum Vitae a la ficha del candidato.</h4>
							<form id="uploadcvform" class="form-inline" method="POST" enctype="multipart/form-data">
								<label for="cv">Presione y seleccione un archivo.</label>
								<input type="file" name="cv" id="cv"/>
								<input type="hidden" name="id" :value="viewCandidate.id" />
								<br>
								<button type="submit" class="boton pequeno esquinas nueva-oferta hover" @click="uploadCV">
		       				<span class="accion">Subir CV</span>
		        			<span class="icono">
		          			<svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="#fff" d="M9,16V10H5L12,3L19,10H15V16H9M5,20V18H19V20H5Z" /></svg>
		        			</span>
		     		 		</span>
								<!--button type="submit" class="btn btn-success" @click="uploadCV">Upload CV</button-->
							</form>
						</div>
						<div class="datos-personales" v-else>
							<h4>Presiona sobre el icono para ver el documento.</h4>
							<a class="boton pequeno esquinas gris hover" :href="viewCandidate.cv" target="_blank">
	        			<span class="accion">Visualizar Curriculum Vitae</span>
	        			<span class="icono mini">
	          			<svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" /></svg>
	        			</span>
	     		 		</a>
							<!--a type="button" :href="viewCandidate.cv" target="_blank" class="btn btn-outline-primary">Visualizar Curriculum Vitae
								<i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
							</a-->
							<a class="boton pequeno esquinas gris hover" href="#"@click="viewCandidate.cv = null">
	        			<span class="accion">Subir de nuevo el fichero</span>
	        			<span class="icono">
	          			<svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M11,15V12H9V15H6V17H9V20H11V17H14V15H11Z" /></svg>
	        			</span>
	     		 		</a>
							<!--a href="#"@click="viewCandidate.cv = null"><p>Pulsa aqui para subir de nuevo el fichero.</p></a-->
						</div>
					<!--/div-->
				</div>
				<hr>
				<!--div>
					<h3 class="titulo">Notas</h3>
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
				</div-->
					<span class="boton pequeno esquinas gris hover" v-show="viewCandidate.back == 1" @click="backviewcandidate">
		        <span class="icono">
		          <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" /></svg>
		        </span>
		        <span class="accion">Atras</span>
		      </span>
					<!--a v-show="viewCandidate.back == 1" href="#" type="button" class="btn btn-outline-danger pull-left" @click="backviewcandidate">
                            <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
                            </i> Atras</a-->
          <span class="boton pequeno esquinas gris hover" v-on:click.prevent="deleteOffer(editOferta.id)">
		        <span class="icono">
		          <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" /></svg>
		        </span>
		        <span class="accion">Eliminar</span>
		      </span>
					<!--a href="#" type="button" class="btn btn-outline-danger pull-left" v-on:click.prevent="deleteOffer(editOferta.id)">
                            <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </i> Eliminar</a-->
			</div>
			<div class="contenedor-pie">
				<h6>Candidatus 2.0 - Gestión RRHH</h6>
			</div>
		</div>
	</div>
</div>