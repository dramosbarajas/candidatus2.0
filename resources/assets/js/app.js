
var app = new Vue({
	el: '#app',
	/************************  VARIABLES  ***********************/
	data: {
		ofertas: '',
		estado: "",
		fecha: "",
		titulo: "",
		descripcion: "",
		departamento: "",
		estudios: "",
		experiencia: "",
		contrato: "",
		duracion: "",
		jornada: "",
		bandamin: "",
		bandamax: "",
		vacante: "",
		errors: [],
		editOferta: {
			'id': '',
			'estado': '',
			'titulo': ''
		},
		showOffer: {
			'id': '',
			'estado': '',
			'fecha:': '',
			'titulo': '',
			'descripcion': '',
			'estudios': "",
			'experiencia': "",
			'contrato': "",
			'duracion': "",
			'jornada': "",
			'bandamin': "",
			'bandamax': "",
			'vacante': "",
		},
		'candidatesfromoffer':"",
		ofertaById: '',
		countOffers: '',
		createCandidate: {
			'tipo_id': 'DNI',
			'id': '',
			'fecha_nac': '',
			'genero': '',
			'nombre': '',
			'apellido1': '',
			'apellido2': '',
			'email': '',
			'tel': '',
			'nacionalidad': '',
			'provincia': '',
			'poblacion': '',
			'cv': '',
			'cvfile': '',
			'notas': '',
		},
		viewCandidate: {
			'tipo_id': 'DNI',
			'id': '',
			'fecha_nac': '',
			'edad': '',
			'genero': '',
			'nombre': '',
			'apellido1': '',
			'apellido2': '',
			'email': '',
			'tel': '',
			'nacionalidad': '',
			'provincia': '',
			'poblacion': '',
			'cv': '',
			'cvfile': '',
			'notas': '',
		},
		countries: '',
		provinces: '',
		towns: '',
		busquedacandidato: {
			'identidad': '',
			'infocandidatos': '',
		},
		candidatescandidacy: '',
		offerscandidacy: '',
		candidacy: {
			'offerid': '',
			'candidateid': '',
			'estado': '',
			'entrevista': '',
			'fecha_entrevista': '',
			'observaciones': ''
		},
		flagcheckpar: 0,
		candidatesfromoffer:'',
		flagshowcandidates:0,
		fnow:'',


	},
	filters: {
		moment: function (date) {
			return moment(date).format('DD/MM/YYYY');
		}
	},
	/************************  ESTADO CREATED  ***********************/
	created: function () {
		this.getCountActive();
		this.getOffer();
		this.getcountries();
		this.getprovinces();
	},
	/************************  METODOS  *****************************/
	methods: {
		getoffer:function(){
			console.log('tocate un pie');
		},
		getOffer: function () 
		{
			let configAxios = {
				url:'/offer',
				method:'get',
				reponseType:'json',
				data:{},
				headers:{
					'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
					'Content-Type': 'application/json'
				}
			}
			axios.request(configAxios).then(response => {
				this.ofertas = response.data
			});

		},
		getCountActive: function () {
			let configAxios = {
				url:'/countOffers',
				method:'get',
				reponseType:'json',
				data:{},
				headers:{
					'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
					'Content-Type': 'application/json'
				}
			}
			axios.request(configAxios).then(response => {
				this.countOffers = response.data
			});

		},

		editOffer: function (oferta) {
			this.editOferta.id = oferta.id;
			this.editOferta.estado = oferta.estado;
			this.editOferta.titulo = oferta.titulo;
			$('#edit').modal('show');

		},

		viewOffer: function (oferta) {
			//seteo de variables que va recibir el modal

			this.showOffer.id = oferta.id;
			this.showOffer.estado = oferta.estado;
			this.showOffer.fecha = moment(oferta.fecha).format('DD/MM/YYYY');
			this.showOffer.titulo = oferta.titulo;
			this.showOffer.descripcion = oferta.descripcion;
			this.showOffer.estudios = oferta.estudios;
			this.showOffer.experiencia = oferta.experiencia;
			this.showOffer.contrato = oferta.contrato;
			this.showOffer.duracion = oferta.duracion;
			this.showOffer.jornada = oferta.jornada;
			this.showOffer.bandamin = oferta.bandamin;
			this.showOffer.bandamax = oferta.bandamax;
			this.showOffer.vacante = oferta.vacante;
			this.candidatesfromoffer = oferta.candidates;
			//Apertura del Modal 
			$('#show').modal('show');
		},
	
		updateOffer: function (id) {
			let configAxios = {
				url:'offer/' + id,
				method:'put',
				reponseType:'json',
				data:{
					'estado':this.editOferta.estado},
				headers:{
					'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
					'Content-Type': 'application/json'
				}
			}
			axios.request(configAxios).then(response => {
				this.getOffer();
				this.editOferta = {
					'id': '',
					'estado': '',
					'titulo': ''
				};
				this.errors = [];
				$('#edit').modal('hide');
				swal(
					'OFERTA EDITADA CORRECTAMENTE.',
					'La oferta ha sido editada correctamente.',
					'success',

				)
			}).catch(error => {
				swal(
					'Opss!',
					'Vaya algo ha salido mal!',
					'error'
				)
				this.errors = error.response.data
			});
			this.getCountActive();
		},

		deleteOffer: function (id) {
			/*let configAxios = {
				url:'offer/' + id,
				method:'delete',
				reponseType:'json',
				data:{},
				headers:{
					'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
					'Content-Type': 'application/json'
				}
			}
			axios.request(configAxios).then(response => { //eliminamos
				$('#edit').modal('hide');
				this.getOffer();
				this.getCountActive();
	
			})*/
			swal({
				title: 'Are you sure?',
				text: "It will be deleted permanently!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!',
				showLoaderOnConfirm: true,
				  
				preConfirm: function() {
				  return new Promise(function(resolve) {
					   
					 $.ajax({
						   url: 'offer/' + id,
						   type: 'DELETE',
						  
						   dataType: 'json',
						   headers:{
							'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
							'Content-Type': 'application/json'
						},
					 })
					 .done(function(response){
						 swal('Deleted!', response.message, response.status);
						
					 })
					 .fail(function(){
						 swal('Oops...', 'Something went wrong with ajax !', 'error');
					 });
				  });
				},
				allowOutsideClick: false			  
			});	

		},
		
		comprobarBandaSalarial: function () {
			if (this.bandamin <= this.bandamax) {
				$("#enviarAltaOferta").prop("disabled", false);
			} else {
				swal(
					'ERROR.',
					'El importe no puede ser menor que el campo banda mínima.',
					'warning'
				)
				$("#enviarAltaOferta").prop("disabled", true);
			}
			
		},
		createOffer: function () {
			if(this.duracion == ''){
				this.duracion = 0;
			}
			let configAxios = {
				url:'offer',
				method:'post',
				reponseType:'json',
				data:{
					estado: this.estado,
					fecha: this.fecha,
					titulo: this.titulo,
					descripcion: this.descripcion,
					departamento: this.departamento,
					estudios: this.estudios,
					experiencia: this.experiencia,
					contrato: this.contrato,
					duracion: this.duracion,
					jornada: this.jornada,
					bandamin: this.bandamin,
					bandamax: this.bandamax,
					vacante: this.vacante
				},
				headers:{
					'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
					'Content-Type': 'application/json'
				}
			}
			axios.request(configAxios).then(response => {
				this.estado = '';
				this.fecha = '';
				this.titulo = '';
				this.descripcion = '';
				this.departamento = " ";
				this.estudios = " ";
				this.experiencia = " ";
				this.contrato = "";
				this.duracion = " ";
				this.jornada = " ";
				this.bandamin = " ";
				this.bandamax = " ";
				this.vacante = " ";
				this.errors = [];
				$('#create').modal('hide');
				this.getOffer();
				this.getCountActive();
				swal(
					'OFERTA CREADA',
					'La oferta se ha creado correctamente.',
					'success'
				)
			}).catch(error => {
				swal(
					'OPSS!!.',
					'Vaya algo ha fallado...',
					'warning'
				)
				this.errors = error.response.data
			});
		},
		generateOfferPDF: function (id) {
			console.log('generar PDF del ID ////  ' + id);
		},
		uploadCV: function (e) {
			e.preventDefault();
			console.log("entrando")
			var formData = new FormData($('#uploadcvform')[0]);
			$.ajax({
				url: '/uploadCV',
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				success: function (result) {
					swal(
						'Fichero subido con exito.',
						'Pulsa el botón para cerrar esta ventana!',
						'success'
					)
				},
				error: function (result) {
					swal(
						'Oops...',
						'La identidad introducida ya se encuentra en nuestra base de datos.',
						'error'
					)
				}
			});
		},
		checkidentity: function () {
			var url = "/checkidentity/" + this.createCandidate.id;
			if (this.createCandidate.id != '') {
				axios.get(url).then(response => {
					if (response.data != 0) {
						swal(
							'Oops...',
							'La identidad introducida ya se encuentra en nuestra base de datos.',
							'error'
						)
					}
					this.createCandidate.id = '';
				});
			};
		},
		createcandidate: function () {
			var url = 'candidate';
			console.log(url);
			console.log("llamada desde el formulario")
			axios.post(url, {
				tipo_id: this.createCandidate.tipo_id,
				id: this.createCandidate.id,
				fecha_nac: this.createCandidate.fecha_nac,
				genero: this.createCandidate.genero,
				nombre: this.createCandidate.nombre,
				apellido1: this.createCandidate.apellido1,
				apellido2: this.createCandidate.apellido2,
				email: this.createCandidate.email,
				tel: this.createCandidate.tel,
				nacionalidad: this.createCandidate.nacionalidad,
				provincia: this.createCandidate.provincia,
				poblacion: this.createCandidate.poblacion,
				notas: this.createCandidate.notas,
			}).then(response => {
				this.createCandidate.tipo_id = '';
				this.createCandidate.id = '';
				this.createCandidate.fecha_nac = '';
				this.createCandidate.genero = '';
				this.createCandidate.nombre = " ";
				this.createCandidate.apellido1 = " ";
				this.createCandidate.apellido2 = " ";
				this.createCandidate.email = "";
				this.createCandidate.tel = " ";
				this.createCandidate.nacionalidad = " ";
				this.createCandidate.provincia = " ";
				this.createCandidate.poblacion = " ";
				this.createCandidate.notas = " ";
				this.errors = [];
				$('#createCandidate').modal('hide');
				//toastr.success('Nueva candidato creado con éxito');
				swal(
					'Nuevo candidato creado con éxito!',
					'Pulsa el botón para cerrar esta ventana!',
					'success',
				)
			}).catch(error => {
				this.errors = error.response.data
				swal(
					'Oops...',
					'Algo ha salido mal, por favor vuelve a intentarlo!',
					'error'
				)
			});
		},
		findcandidate: function () {
			var url = 'findcandidate';
			axios.post(url, {
				id: this.busquedacandidato.id
			}).then(response => {
				if(response.data != 0 ){
					this.busquedacandidato.infocandidatos = response.data
					}else{
					swal(
						'Oops...',
						'No hemos encontrado ningún registro con los datos introducidos.',
						'info'
						)
				}
			});

		},
		getcountries: function () {
			var url = 'countries';
			axios.get(url).then(response => {
				this.countries = response.data
			});
		},
		getprovinces: function () {
			var url = 'provinces';
			axios.get(url).then(response => {
				this.provinces = response.data
			});
		},
		gettowns: function () {
			var url = 'provinces/' + this.createCandidate.provincia;
			axios.get(url).then(response => {
				this.towns = response.data
			});
		},
		viewcandidate: function (candidato) {
			console.log(candidato);
			console.log(candidato.nombre);
			this.viewCandidate.tipo_id = candidato.tipo_id;
			this.viewCandidate.id = candidato.id;
			this.viewCandidate.fecha_nac = moment(candidato.fecha_nac).format('DD/MM/YYYY');
			this.viewCandidate.edad = this.ages(candidato.fecha_nac);
			this.viewCandidate.genero = candidato.genero;
			this.viewCandidate.nombre = candidato.nombre;
			this.viewCandidate.apellido1 = candidato.apellido1;
			this.viewCandidate.apellido2 = candidato.apellido2;
			this.viewCandidate.email = candidato.email;
			this.viewCandidate.tel = candidato.tel;
			this.viewCandidate.nacionalidad = candidato.nacionalidad;
			this.viewCandidate.provincia = candidato.provincia;
			this.viewCandidate.poblacion = candidato.poblacion;
			this.viewCandidate.notas = candidato.notas;
			this.viewCandidate.cv = candidato.cv;
			$('#show').modal('hide');
			$('#viewCandidate').modal('show');
		},
		ages: function (borndate) {
			var hoy = moment();
			var nacimiento = borndate;
			return anios = hoy.diff(nacimiento, 'years');
		},

		showmodalcandidacy: function () {
			$('#createCandidacy').modal('show');
		},
		getofferscandidacy: function () {
			let url = "/oget";
			if (this.offerscandidacy == 0) {
				axios.get(url).then(response => {
					this.offerscandidacy = response.data;
				});

				swal({
					title: 'CARGANDO',
					text: '',
					timer: 2000,
					allowOutsideClick: false,
					allowEscapeKey: false,
					allowEnterKey: false,
					onOpen: function () {
						swal.showLoading()
					}
				}).then(
					function () {},
					// handling the promise rejection
					function (dismiss) {
						if (dismiss === 'timer') {
							console.log('I was closed by the timer')
						}
					}
				)

			};


		},
		getcandidatescandidacy: function () {
			let url = "/cget";
			if (this.candidatescandidacy == 0) {
				axios.get(url).then(response => {
					this.candidatescandidacy = response.data;
				});
			}
		},
		checkvalidapar: function () {
			let url = "/chkvpar";
			if (this.flagcheckpar === 0 && this.candidacy.offerid != '' && this.candidacy.candidateid != '') {
				axios.post(url, {
					offer_id: this.candidacy.offerid,
					candidate_id: this.candidacy.candidateid,
				}).then(response => {
					if (response.data != 0) {
						swal(
							'Oops...',
							'El candidato ya tiene una oferta con los mismos parámetros en la base de datos.',
							'error'
						)
					} else {
						this.flagcheckpar = 1;
						$('#candidatos').prop("disabled", true);
						$('#ofertas').prop("disabled", true);
					}
				});

			}
		},
		createcandidacy: function () {
			console.log("llamada axios");
			let url = "candidacy";
			axios.post(url, {
				offer_id: this.candidacy.offerid,
				candidate_id: this.candidacy.candidateid,
				estado: this.candidacy.estado,
				entrevista: this.candidacy.entrevista,
				fecha_entrevista: this.candidacy.fecha_entrevista,
				observaciones: this.candidacy.observaciones,
			}).then(response => {
				$('#createCandidacy').modal('hide');
				this.candidacy.offerid = '';
				this.candidacy.candidateid = '';
				this.candidacy.estado = '';
				this.candidacy.entrevista = '';
				this.candidacy.fecha_entrevista = '';
				this.candidacy.observaciones = '';
				swal(
					'Nuevo candidatura creada con éxito!',
					'Pulsa el botón para cerrar esta ventana!',
					'success',
				)
			}).catch(error => {
				this.errors = error.response.data
				swal(
					'Oops...',
					'Algo ha salido mal, por favor vuelve a intentarlo!',
					'error'
				)
			});
		},
		getCandidatesfromOffer: function(id){
			let url = 'cfromo';
			if (this.candidatesfromoffer == 0) {
				axios.get(url).then(response => {
					this.candidatesfromoffer = response.data;
				});
			}
		}
	},


})