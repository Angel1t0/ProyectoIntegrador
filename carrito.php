<?php
    session_start();
	if (!isset($_SESSION['codusu'])) { /*Si no existe una sesion iniciada*/
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Clemezon</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet"> <!--Mandamos a llamar algunas fuentes de google fonts-->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!--Mandamos a llamar la carpeta de fuentes que vamos a utilizar-->
    <link rel="stylesheet" type="text/css" href="css/index.css?1.0" media="all">
</head>
<body>
    <!--Gaspak-->
    <?php include("layouts/_main-header.php"); ?>
    <!--Para acentos, usa &oacute-->
    <div class="main-content"> <!--Contenedor de la pagina-->
        <div class="content-page">
			<h3>Mi carrito</h3>
			<div class="body-pedidos" id="space-list">
            </div>
			<input class="ipt-procom" type="text" id="dirusu" placeholder="Dirección">
			<br>
			<input class="ipt-procom" type="text" id="telusu" placeholder="Teléfono">
			<br>
			<button onclick="procesar_compra()">Procesar compra</button>
        </div> 
    </div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){ /* Cuando la panatalla esta lista (document.ready) mandamos a llamar la funcion de ajax(JQuery)*/
            $.ajax({
                url:'servicios/pedido/get_porprocesar.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{}, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
                    let html=''; /*Variable html*/
                    for (var i = 0; i < data.datos.length; i++) { /*Con un bucle, rellenaremos los datos que introduzcamos en la BD*/
                        html+= /*Concatena los resultados que introduzcamos*/
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="img/products/'+data.datos[i].imgpro+'">'+ 
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nompro+'</h3>'+
								'<p><b>Precio:</b> $ '+data.datos[i].prepo+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estado+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Teléfono:</b> '+data.datos[i].telusuped+'</p>'+
                                '<button class="btn-delete-cart" onclick="delete_product('+data.datos[i].codped+')">Eliminar pedido</button>'+
							'</div>'+
						'</div>';
                    }
                    document.getElementById("space-list").innerHTML=html; 
                    if(data.length==0){
                        alert('No hay productos en el carrito');
                        window.history.back();
                    }
                },
                error:function(err){  /*Muestra erroes si falla*/
                    console.error(err);
                }
            });
        });
        function delete_product(codped){
            $.ajax({
                url:'servicios/pedido/delete_pedido.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{
					codped:codped,
				}, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
					if (data.state) {
						window.location.reload();
					} else{
                        alert(data.detail);
                    }
                },
                error:function(err){  /*Muestra erroes si falla*/
                    console.error(err);
                }
            });
        }
		function procesar_compra(){
			let dirusu=document.getElementById("dirusu").value;
			let telusu=$("#telusu").val();
			if (dirusu=="" || telusu=="") {
				alert("Complete los campos");
			} else{
				$.ajax({
                url:'servicios/pedido/confirm.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{
					dirusu:dirusu,
					telusu:telusu
				}, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
					if (data.state) {
						window.location.href="pedido.php";
					} else{
                        alert(data.detail);
                    }
                },
                error:function(err){  /*Muestra erroes si falla*/
                    console.error(err);
                }
            });
			}
		}
	</script>
</body>
</html>