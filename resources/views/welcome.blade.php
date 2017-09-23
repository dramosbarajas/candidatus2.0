<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <h1>Index CANDIDATUS 2.O</h1>
            <h3>Versión inicial</h3>
                <div id="app">
                    <h3>@{{ mensaje }}</h3>
                    <button type="button" v-on:click="mostrarOfertas">Mostrar ofertas</button>
                    <div v-if="ofertas">
                        <ul>
                            <li v-for="oferta in ofertas"> @{{ oferta.titulo }}</li>
                         </ul>
                    <pre>@{{ofertas}}</pre>
                    </div>
                </div>
        </div>
        <!-- scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>   
        <script>
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
        </script>
       
    </body>
</html>
