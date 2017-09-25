
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