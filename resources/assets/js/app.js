axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
		getOffer: function () {
			console.log("VOY A  MOSTRARTE LAS OFERTAS")
			var urlGetOffer = "http://127.0.0.1:8000/offer"
			axios.get(urlGetOffer).then(response => {
				this.ofertas = response.data
			});

		},
		getCountActive: function () {
			var urlCountOffers = "http://127.0.0.1:8000/countOffers"
			axios.get(urlCountOffers).then(response => {
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
			console.log("MOSTRANDO OFERTAS ");
			console.log(oferta)
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

			console.log(this.showOffer.titulo)
			$('#show').modal('show');
		},
		viewOfferID: function (oferta) {
			console.log("MOSTRANDO OFERTAS POR ID ");
			var urlGetOffer = "/offer" + this.editOferta.id
			axios.get(urlGetOffer).then(response => {
				this.ofertaById = response.data
			});
			this.showOffer.id = ofertaById.id;
			this.showOffer.estado = ofertaById.estado;
			this.showOffer.fecha = ofertaById.fecha;
			this.showOffer.titulo = ofertaById.titulo;
			this.showOffer.descripcion = ofertaById.descripcion;
			this.showOffer.estudios = ofertaById.estudios;
			this.showOffer.experiencia = ofertaById.experiencia;
			this.showOffer.contrato = ofertaById.contrato;
			this.showOffer.duracion = ofertaById.duracion;
			this.showOffer.jornada = ofertaById.jornada;
			this.showOffer.bandamin = ofertaById.bandamin;
			this.showOffer.bandamax = ofertaById.bandamax;
			this.showOffer.vacante = ofertaById.vacante;
			$('#edit').modal('hide');
			$('#show').modal('show');
		},
		updateOffer: function (id) {
			console.log("listo para actualizar ");
			console.log(id)
			console.log(this.editOferta.estado)
			var url = 'offer/' + id;
			axios.put(url, this.editOferta).then(response => {
				this.getOffer();
				this.editOferta = {
					'id': '',
					'estado': '',
					'titulo': ''
				};
				this.errors = [];
				$('#edit').modal('hide');
				toastr.success('Tarea actualizada con éxito');
			}).catch(error => {
				toastr.error('Vaya algo ha salido mal.');
				this.errors = error.response.data
			});
			this.getCountActive();
		},

		deleteOffer: function (id) {
			var url = 'offer/' + id;
			axios.delete(url).then(response => { //eliminamos
				this.getOffer(); //listamos
				this.getCountActive();
				toastr.success('Eliminado correctamente'); //mensaje
			});
		},
		comprobarIndefinido: function () {
			if (this.contrato != "Indefinido") {
				$("#duracion").prop("disabled", false);
			} else {
				$("#duracion").prop("disabled", true);
				$("#duracion").text = 0;
				this.duracion = 0;
			}
		},
		comprobarBandaSalarial: function () {
			if (this.bandamin < this.bandamax) {
				$("#enviarAltaOferta").prop("disabled", false);
			} else {
				alert("El importe de máximo ha de ser mayor que el importe mínimo.");
				$("#enviarAltaOferta").prop("disabled", true);
			}

		},
		createOffer: function () {
			var url = 'offer';
			axios.post(url, {
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
			}).then(response => {
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
				toastr.success('Nueva oferta creada con éxito');
			}).catch(error => {
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
				this.busquedacandidato.infocandidatos = response.data
			});
			if (this.busquedacandidato.infocandidatos == 0) {
				swal(
					'Oops...',
					'No hemos encontrado ningún registro con los datos introducidos.',
					'info'
				)
			}


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
			if (this.flagcheckpar === 0) {
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