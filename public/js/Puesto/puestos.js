var ruta = document.querySelector("[name=route]").value;
var urlPuesto = ruta + '/apipues';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#Puesto",
	created:function(){
		this.getPuesto();
	},
	data:{
		saludo:'Heyyyyy',
		puestos:[],
		id_puesto:'',
		nombre:'',
		editando:false,
		auxPuesto:''
	},
	methods:
	{
		getPuesto:function()
		{
			this.$http.get(urlPuesto).then(
				function(response)
			{
				this.puestos=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
			
		showModal:function(){
			$('#add_puestos').modal('show');
		},
		agregarPuesto:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var puestos={nombre:this.nombre};
				//limpiar campos
			this.nombre='';
			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlPuesto,puestos).then(function(response){
				this.getPuesto();
				$('#add_puestos').modal('hide');
			}
			)
		},
		salir:function(){
			this.editando=false;
				this.nombre='';
				this.id_puesto='';
				
		},
		updatePuesto:function(id){
			this.editando=false;
			var puesto={id_puesto:this.id_puesto,nombre:this.nombre};

				console.log(puesto);
			this.$http.put(urlPuesto + '/' + id,puesto).then(function(json){
				this.id_puesto='';
				this.nombre='';
				this.getPuesto();
				$('#add_puestos').modal('hide');
			});
		},

		editPuesto:function(id){
			this.editando=true;

			$('#add_puestos').modal('show');
			this.$http.get(urlPuesto + '/' + id).then(function(response){
				this.id_puesto= response.data.id_puesto;
				this.nombre= response.data.nombre;
				this.auxPuesto= response.data.id_puesto;
			});

		},



		eliminarPuesto:function(id){
			var resp=confirm("Está seguro de eliminar este puesto: "+id)
			if (resp==true)
			{
			this.$http.delete(urlPuesto + '/' + id)
			.then(function(json){
				this.getPuesto();
			});
			}
		},
	}
})