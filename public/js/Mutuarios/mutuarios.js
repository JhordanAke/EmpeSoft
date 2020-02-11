var ruta = document.querySelector("[name=route]").value;
var urlMutuarios= ruta + '/apimutu';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#mutuarios",
	created:function(){
		this.getMutuarios();
		this.getBuscar();
	},
	data:{
		saludo:'Heyyyyy',
		mutuarios:[],
		id_mutuario:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		telefono:'',
		direccion:'',
		localidad:'',
		editando:false,
		auxMutuario:'',
		buscar:''
	},
	methods:
	{
		getMutuarios:function()
		{
			this.$http.get(urlMutuarios).then(
				function(response)
			{
				this.mutuarios=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		getBuscar:function(){
				this.$http.get(urlMutuarios)
				.then(function(json){
					this.empeños=json.data;
				}).catch(function(json){
					console.log(json);
				})
			},
			
		showModal:function(){
			$('#add_mutuarios').modal('show');
		},
		agregarMutuario:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var mutuarios={nombre:this.nombre,apellido_p:this.apellido_p,apellido_m:this.apellido_m,
				telefono:this.telefono, direccion:this.direccion, localidad:this.localidad};
				//limpiar campos
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.telefono='';
			this.direccion='';
			this.localidad='';
			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlMutuarios,mutuarios).then(function(response){
				this.getMutuarios();
				$('#add_mutuarios').modal('hide');
			}
			)
		},
		salir:function(){
			this.editando=false;
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.telefono='';
				this.direccion='';
				this.localidad='';
				
		},
		updateMutuario:function(id){
			this.editando=false;
			var mutuario={nombre:this.nombre,apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,telefono:this.telefono,direccion:this.direccion, localidad:this.localidad};

				console.log(mutuario);
			this.$http.put(urlMutuarios + '/' + id,mutuario).then(function(json){
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.telefono='';
				this.direccion='';
				this.localidad='';
				this.getMutuarios();
				$('#add_mutuarios').modal('hide');
			});
		},

		editMutuario:function(id){
			this.editando=true;

			$('#add_mutuarios').modal('show');
			this.$http.get(urlMutuarios + '/' + id).then(function(response){
				this.nombre= response.data.nombre;
				this.apellido_p=response.data.apellido_p;
				this.apellido_m= response.data.apellido_m;
				this.telefono= response.data.telefono;
				this.direccion= response.data.direccion;
				this.localidad= response.data.localidad;
				this.auxMutuario= response.data.id_mutuario;
			});

		},



		eliminarMutuario:function(id){
			var resp=confirm("Está seguro de eliminar al mutuario: "+id)
			if (resp==true)
			{
			this.$http.delete(urlMutuarios + '/' + id)
			.then(function(json){
				this.getMutuarios();
			});
			}
		},
	},

	computed:{
  	filtroMutuario:function(){
  		return this.mutuarios.filter((mutuario)=>{
  			return mutuario.nombre.toLowerCase().match(this.buscar.trim()) ||
  			mutuario.apellido_p.toLowerCase().match(this.buscar.trim().toLowerCase());
  			//trim es una funcion que elimina los espacios al momento de buscar
  		});
  	}
  }
});