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
    <?php include("layouts/_main-header.php");?> <!--Mandamos a llamar a la clase main header para la parte de busqueda-->
    <!--Para acentos, usa &oacute-->
    <div class="main-content"> <!--Contenedor de la pagina-->
        <div class="content-page">
			<h3>Mis pedidos</h3>
			<div class="body-pedidos" id="space-list">
            </div>
            <h3>Datos de pago</h3>
            <div class="p-line"><div>MONTO TOTAL:</div>$. &nbsp;<span id="montototal"></span></div>
			<div class="p-line"><div>Banco:</div>BVBA</div>
			<div class="p-line"><div>N° de Cuenta:</div>191-45678945-006</div>
			<div class="p-line"><div>Representante:</div>Encargado de ventas</div>
			<p><b>NOTA:</b> Para confirmar la compra debe realizar el deposito por le monto total, y enviar el comprobante al siguiente correo example@example.com o al número de whatsapp 999 666 333</p>
        </div> 
    </div>
    <script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){ /* Cuando la panatalla esta lista (document.ready) mandamos a llamar la funcion de ajax(JQuery)*/
            $.ajax({
                url:'servicios/pedido/get_procesados.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{}, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
                    let html=''; /*Variable html*/
                    let monto=0; /*Variable para guardar el total de los pedidos */
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
								'<p><b>Estado:</b> '+data.datos[i].estadotex+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Teléfono:</b> '+data.datos[i].telusuped+'</p>'+
							'</div>'+
						'</div>';
                        if (data.datos[i].estado==2) {
                            monto+=parseFloat(data.datos[i].prepo);
                        }
                    }
                    document.getElementById("montototal").innerHTML=monto; 
                    document.getElementById("space-list").innerHTML=html; 
                },
                error:function(err){  /*Muestra erroes si falla*/
                    console.error(err);
                }
            });
        });
	</script>
</body>
</html>