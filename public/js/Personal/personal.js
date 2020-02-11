var ruta = document.querySelector("[name=route]").value;

var urlPersonal = ruta + '/apiperso';
var urlPuesto = ruta + '/apipues';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#Personal",
	created:function(){
		this.getPersonal();
		this.getPuesto();
	},
	data:{
		saludo:'Heyyyyy',
		personal:[],
		puestos:[],
		id_personal:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		contrasenia:'',
		id_puesto:'',
		editando:false,
		auxPersonal:'',
		buscar:''
	},
	methods:
	{
		getPersonal:function()
		{
			this.$http.get(urlPersonal).then(
				function(response)
			{
				this.personal=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		getPuesto:function()
		{
			this.$http.get(urlPuesto).then(
				function(response)
				{
					this.puestos=response.data;
				}). catch(function(response){
					console.log(response);
				});
		},
			
		showModal:function(){
			$('#add_personal').modal('show');
		},
		agregarPersonal:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var personales={nombre:this.nombre,apellido_p:this.apellido_p,apellido_m:this.apellido_m,contrasenia:this.contrasenia,
				id_puesto:this.id_puesto};
				//limpiar campos
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.contrasenia='';
			this.id_puesto='';
			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlPersonal,personales).then(function(response){
				this.getPersonal();
				$('#add_personal').modal('hide');
			}
			)
		},
		salir:function(){
			this.editando=false;
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.contrasenia='';
				this.id_puesto='';
				
		},
		updatePersonal:function(id){
			this.editando=false;
			var personal={id_personal:this.id_personal,id_puesto:this.id_puesto,nombre:this.nombre,apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,contrasenia:this.contrasenia};

				console.log(personal);
			this.$http.put(urlPersonal + '/' + id,personal).then(function(json){
				this.id_personal='';
				this.id_puesto='';
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.contrasenia='';
				this.getPersonal();
				$('#add_personal').modal('hide');
			});
		},

		editPersonal:function(id){
			this.editando=true;

			$('#add_personal').modal('show');
			this.$http.get(urlPersonal + '/' + id).then(function(response){
				this.id_personal= response.data.id_personal;
				this.id_puesto= response.data.id_puesto;
				this.nombre= response.data.nombre;
				this.apellido_p= response.data.apellido_p;
				this.apellido_m= response.data.apellido_m;
				this.contrasenia= response.data.contrasenia;
				this.auxPersonal= response.data.id_personal;
			});

		},



		eliminarPersonal:function(id){
			var resp=confirm("Está seguro de eliminar al personal: "+id)
			if (resp==true)
			{
			this.$http.delete(urlPersonal + '/' + id)
			.then(function(json){
				this.getPersonal();
			});
			}
		},
	},

	computed:{
  	filtroPersonal:function(){
  		return this.personal.filter((personal)=>{
  			return personal.nombre.toLowerCase().match(this.buscar.trim()) ||
  			personal.apellido_p.toLowerCase().match(this.buscar.trim().toLowerCase());
  			//trim es una funcion que elimina los espacios al momento de buscar
  		});
  	}
  }
})