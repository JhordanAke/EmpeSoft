var ruta = document.querySelector("[name=route]").value;
var urlCategoria = ruta + '/apicate';

new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

	el:"#Categoria",
	created:function(){
		this.getCategoria();
	},
	data:{
		saludo:'Heyyyyy',
		categorias:[],
		id_categoria:'',
		nombre:'',
		tasa_interes:'',
		editando:false,
		auxCategoria:'',
		buscar:''
	},
	methods:
	{
		getCategoria:function()
		{
			this.$http.get(urlCategoria).then(
				function(response)
			{
				this.categorias=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
			
		showModal:function(){
			$('#add_categorias').modal('show');
		},
		agregarCategoria:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var categorias={nombre:this.nombre,tasa_interes:this.tasa_interes};
				//limpiar campos
			this.nombre='';
			this.tasa_interes='';
			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlCategoria,categorias).then(function(response){
				this.getCategoria();
				$('#add_categorias').modal('hide');
			}
			)
		},
		salir:function(){
			this.editando=false;
				this.nombre='';
				this.id_categoria='';
				this.tasa_interes='';
				
		},
		updateCategoria:function(id){
			this.editando=false;
			var categoria={id_categoria:this.id_categoria,nombre:this.nombre,tasa_interes:this.tasa_interes};

				console.log(categoria);
			this.$http.put(urlCategoria + '/' + id,categoria).then(function(json){
				this.id_categoria='';
				this.nombre='';
				this.tasa_interes='';
				this.getCategoria();
				$('#add_categorias').modal('hide');
			});
		},

		editCategoria:function(id){
			this.editando=true;

			$('#add_categorias').modal('show');
			this.$http.get(urlCategoria + '/' + id).then(function(response){
				this.id_categoria= response.data.id_categoria;
				this.nombre= response.data.nombre;
				this.tasa_interes= response.data.tasa_interes;
				this.auxCategoria= response.data.id_puesto;
			});

		},



		eliminarCategoria:function(id){
			var resp=confirm("Está seguro de eliminar esta categoria: "+id)
			if (resp==true)
			{
			this.$http.delete(urlCategoria + '/' + id)
			.then(function(json){
				this.getCategoria();
			});
			}
		},
	},

	computed:{
		filtroCategorias:function(){
			return this.categorias.filter((categoria)=>{
	return categoria.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		},
	},
})