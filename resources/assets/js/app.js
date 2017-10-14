
	var app = new Vue({
		el: '#app',
		data: {
		mensaje: 'Funcionando Vue!',
		ofertas: '',
		},
		methods:{
			mostrarOfertas: function() {
			var urlGetOffer = "http://127.0.0.1:8000/offer"
			axios.get(urlGetOffer).then(response => {
			this.ofertas = response.data
		});
		}
		}
	})
	
    var formaAltaOferta = new Vue({
		el: '#formAltaOferta',
		data: {
		estado: "",        
        fecha:"",
        titulo:"",
        descripcion:"",
        departamento:"",
        estudios:"",
        experiencia:"",
        contrato:"",
        duracion:"",
        jornada:"",
        bandamin:"",
        bandamax:"",
		vacante:"",
		errors:[]
		},
		methods:{
			comprobarIndefinido: function(){
				if (this.contrato != "Indefinido"){
					$("#duracion").prop("disabled",false);
				} else {
					$("#duracion").prop("disabled",true);
					$("#duracion").value=0;
					this.duracion = 0;
					
				}
			},
			comprobarBandaSalarial: function(){
				if(this.bandamin < this.bandamax ){
					$("#enviarAltaOferta").prop("disabled",false);
				} else {
					alert("El importe de máximo ha de ser mayor que el importe mínimo.");
					$("#enviarAltaOferta").prop("disabled",true);
				}
				
			},
			createOffer: function() {
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
					this.estado ='';        
					this.fecha = '';
					this.titulo = '';
					this.descripcion = '';
					this.departamento=" ";
					this.estudios=" ";
					this.experiencia=" ";
					this.contrato="";
					this.duracion=" ";
					this.jornada=" ";
					this.bandamin=" ";
					this.bandamax=" ";
					this.vacante=" ";
					this.errors = [];
					$('#eventos').modal('hide');
					toastr.success('Nueva Oferta creada con éxito');
				}).catch(error => {
					this.errors = error.response.data
				});
			}
		}
	})