var ruta = document.querySelector("[name=route]").value;
var urlEmpeños = ruta + '/apiempe';
var urlMutuarios = ruta + '/apimutu';

new Vue({
http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	
	el:"#Empeños", //zona del vue
	created:function(){
		this.getEmpeños();
		this.getBuscar();
		this.getMutuarios();
	},
	data:{
		saludo:'Hola mundo',
		empeños:[],
		mutuarios:[],
		id_empenio:'',
		nombre_articulo:'',
		fecha_empenio:'',
		status:'',
		descripcion:'',
		limite:'',
		capital:'',
		id_mutuario:'',
		editando:false,
		auxEmpeño:'',
		buscar:''
	},

	methods:
		{
			getEmpeños:function()
		    {
				this.$http.get(urlEmpeños).then(
					function(response)
				{
					this.empeños=response.data;
				}
				).catch(function(response){
					console.log(response);
				});
			},
			getMutuarios:function(){
				this.$http.get(urlMutuarios).then(
					function(response){
						this.mutuarios=response.data;
					}).catch(function(response){
						console.log(response);
					});
			},

			getBuscar:function(){
				this.$http.get(urlEmpeños)
				.then(function(json){
					this.empeños=json.data;
				}).catch(function(json){
					console.log(json);
				})
			},

			/*showModal:function(){
			$('#add_empleado').modal('show');
			},*/

			agregarEmpeño:function() {
				//Construyendo un objeto de tipo Json para enviar a la Api
				var empeño={id_empenio:this.id_empenio,nombre_articulo:this.nombre_articulo,id_mutuario:this.id_mutuario, 
					capital:this.capital,status:this.status, fecha_empenio:this.fecha_empenio, descripcion:this.descripcion, limite:this.limite};
				//limpiar campos
				this.id_empenio='';
				this.nombre_articulo='';
				this.id_mutuario='';
				this.capital='';
				this.fecha_empenio='';
				this.descripcion='';
				this.limite='';
				this.status='';
				//para poder entrar al método store necesitamos de un post y se evia el json
				this.$http.post(urlEmpeños,empeño)
				.then(function(response) {
                    	this.getEmpeños();
                    	//$('#add_empleado').modal('hide');
                    });
			},
		
			eliminarEmpeño:function(id){
				var resp = confirm("Esta seguro de eliminar el Empeño: " + id)
				if(resp==true)
				{
					this.$http.delete(urlEmpeños + '/' + id)
					.then(function(json){
						this.getEmpeños();
					});
				}
			},

			editEmpeño:function(id){
				this.editando=true;
				//alert(id);
				//$('#add_empleado').modal('show');
				//peticion al servidor
				this.$http.get(urlEmpeños + '/' + id)
				.then(function(response){
					this.id_empenio = response.data.id_empenio;
					this.nombre_articulo = response.data.nombre_articulo;
					this.descripcion= response.data.descripcion;
					this.limite= response.data.limite;
					this.id_mutuario = response.data.id_mutuario;
					this.status= response.data.status;
					this.fecha_empenio = response.data.fecha_empenio;
					this.capital = response.data.capital;
					this.auxEmpeño = response.data.id_empenio;
				});
			},

			updateEmpeño:function(id){
				var empeño={id_empenio:this.id_empenio,nombre_articulo:this.nombre_articulo,id_mutuario:this.id_mutuario, 
					fecha_empenio:this.fecha_empenio,status:this.status, capital:this.capital, descripcion:this.descripcion,limite:this.limite};

				this.$http.put(urlEmpeños + '/' + this.id_empenio,empeño)
				.then(function(response){
					this.getEmpeños();
					this.editando=false;
					this.auxEmpeño;
					
					this.id_empenio='';
					this.nombre_articulo='';
					this.descripcion='';
					this.limite='';
					this.id_mutuario='';
					this.fecha_empenio='';
					this.capital='';
					this.status='';
				});
			},

			cancelarEdit:function(){
				this.editando=false;
				this.id_empenio='';
				this.nombre_articulo='';
				this.descripcion='';
				this.limite='';
				this.id_mutuario='';
				this.fecha_empenio='';
				this.capital='';
				this.status='';
			},

	},

	computed:{
		filtroEmpeños:function(){
			return this.empeños.filter((empeño)=>{
	return empeño.nombre_articulo.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		},
	},
});