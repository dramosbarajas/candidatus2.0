
var app = new Vue({
	el: '#app',
	data: {
		ofertas:'',
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
			'descripcion':'',
			'estudios': "",
			'experiencia': "",
			'contrato': "",
			'duracion': "",
			'jornada': "",
			'bandamin': "",
			'bandamax': "",
			'vacante': "",
		},
		ofertaById:'',
		countOffers:'',
		
		
	},
	created:function() {
		this.getCountActive();
		this.getOffer();
	
	},
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

		viewOffer: function(oferta){
			console.log("MOSTRANDO OFERTAS ");
			console.log(oferta)
			this.showOffer.id = oferta.id;
			this.showOffer.estado = oferta.estado;
			this.showOffer.fecha = oferta.fecha;
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
			
			console.log(this.showOffer.titulo)
			$('#show').modal('show');
		},
		viewOfferID: function(oferta){
			console.log("MOSTRANDO OFERTAS POR ID ");
			var urlGetOffer = "http://127.0.0.1:8000/offer/" + this.editOferta.id
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
		updateOffer: function(id){
			console.log("listo para actualizar ");
			console.log(id)
			console.log(this.editOferta.estado)
			var url = 'offer/' + id;
			axios.put(url, this.editOferta).then(response => {
				this.getOffer();
				this.editOferta = {'id': '', 'estado': '','titulo':''};
				this.errors	  = [];
				$('#edit').modal('hide');
				toastr.success('Tarea actualizada con éxito');
			}).catch(error => {
				toastr.error('Vaya algo ha salido mal.');
				this.errors = error.response.data
			});
			this.getCountActive();
		},

		deleteOffer: function(id) {
			var url = 'offer/' + id;
			axios.delete(url).then(response => { //eliminamos
				this.getOffer();//listamos
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
			console.log('generar PDF del ID ////  ' + id );
		}
	},
	filters: {
		moment: function (date) {
		  return moment(date).format('DD/MM/YYYY');
		}
	  },
	
})
var app2= new Vue({
	el: '#app-other',
	data: {
		info:'trhufhasjkfhdkfj',
	
		
	},
	
})
