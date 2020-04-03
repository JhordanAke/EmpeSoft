var urlProd='http://localhost/DemoSari/public/apiProducto';
var urlVenta='http://localhost/DemoSari/public/apiVenta';

function init()
{
new Vue({
	http: {
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#ventas',

	created:function(){

		this.foliarVenta();

	},

	data:{
		nombre:'Hola',
		ventas:[],
		tot:0,
		folio:'',
		abono:'',
		id_empenio:'',

		fecha_venta:moment().format('YYYY-MM-DD'),
	},

	methods:{ 
		agregarAbono:function() {
				//Construyendo un objeto de tipo Json para enviar a la Api
				var abono={folio:this.folio,abono:this.abono,id_empenio:this.id_empenio};
				//limpiar campos
				this.folio=this.folio;
				this.abono='';
				this.id_empenio='';
				//para poder entrar al método store necesitamos de un post y se evia el json
				this.$http.post(urlEmpeños,empeño)
				.then(function(response) {
                    	this.getEmpeños();
                    	//$('#add_empleado').modal('hide');
                    });
			},

		foliarVenta:function(){
			this.folio='VTA-' + moment().format('YYMMDDhmmss');
		},

		vender:function(){

			var detalles2=[];
			for (var i = 0; i < this.ventas.length; i++) {
				detalles2.push({
					sku:this.ventas[i].sku,
					precio:this.ventas[i].precio,
					cantidad:this.cantidades[i],
					total:this.ventas[i].precio * this.cantidades[i]
				})
			}

			//console.log(detalles2);

			var unaVenta = {
				folio:this.folio,
				id_vendedor:1,
				id_tienda:1,
				tipo:'EF',
				fecha_venta:this.fecha_venta,
				total:this.tot,
				detalles:detalles2
			}

			console.log(unaVenta);

			this.$http.post(urlVenta,unaVenta)
			.then(function(json){
				console.log(json.data);
			}).catch(function(j){
				console.log(j.data);
			});

			alert("La venta se a guardado")

			this.foliarVenta();
			this.ventas=[];
			this.cantidades=[1,1,1,1,1,1,1,1];
		}
		//fin de vender
	},
	//fin de methosd

	computed:{
		total:function(){

			var sum=0;
			for (var i = 0; i < this.ventas.length; i++) {
				sum=sum + (this.cantidades[i]*this.ventas[i].precio);
		}
		this.tot=sum;
		return sum;
		},
		cambio:function(){
			return this.pago - this.tot;
		},

		totalProd(){
			return (id)=>{
				var total=0;
				if (this.cantidades[id]!=null)
					total=this.cantidades[id]*this.ventas[id].precio;
				return total.toFixed(1);
			}
		}
	}

});

}

window.onload=init;
