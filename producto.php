<?php
    session_start();
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
    <?php include("layouts/_main-header.php"); ?> <!--Mandamos a llamar a la clase main header para la parte de busqueda-->
    <!--Para acentos, usa &oacute-->
    <div class="main-content"> <!--Contenedor de la pagina-->
        <div class="content-page">
            <section>
                <!--Parte izquierda de imagen-->
                <div class="parte1">
                    <img id="idimg" src="img/products/ejemplo.jpg">
                </div>
                <!--Parte derecha, descripcion-->
                <div class="parte2">
                    <h2 id="idtitle">NOMBRE PRINCIPAL</h2>
                    <h1 id="idprecio">$ 10.<span>99</span></h1>
                    <h3 id="iddescri">Descripción del producto</h3>
                    <button onclick="iniciar_compra()">Comprar</button> <!--Boton de comprar-->
                </div>
            </section>
            <!--Division de las secciones-->
            <div class="title-section">Productos destacados</div>
            <div class="product-list" id="space-list"><!--Lista de productos-->
            </div> 
        </div> 
    </div>
    <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
        var p='<?php echo $_GET["p"]; ?>'; /*Creamos una variable para recibir los parametros de la pagina al seleccionar un producto*/
    </script>
    <script type="text/javascript"> /*Prueba para utilizar JQuery*/
        $(document).ready(function(){ /* Cuando la panatalla esta lista (document.ready) mandamos a llamar la funcion de ajax(JQuery)*/
            $.ajax({
                url:'servicios/producto/get_all_products.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{}, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
                    let html=''; /*Variable html*/
                    for (var i = 0; i < data.datos.length; i++) { /*Con un bucle, rellenaremos los datos que introduzcamos en la BD*/
                        if (data.datos[i].codpro==p){ /*Si el codigo del producto es igual a p, que llene lo que hay en la pantalla*/
                            document.getElementById('idimg').src="img/products/"+data.datos[i].imgpro; /*Esto pone la imagen del producto*/
                            document.getElementById('idtitle').innerHTML=data.datos[i].nompro; /*Llena el titulo con el nombre*/
                            document.getElementById('idprecio').innerHTML=formato_precio(data.datos[i].prepo); /*Llena el precio*/
                            document.getElementById('iddescri').innerHTML=data.datos[i].despro; /*Llena la descripcion*/
                        }
                        html+= /*Concatena los resultados que introduzcamos*/
                        '<div class="product-box">' + 
                        '<a href="producto.php?p='+data.datos[i].codpro+'">'+/*Al dar click sobre algun producto, nos mandara a otra pagina*/
                                '<div class="product">'+
                                    /*Utilizamos como datos de relleno, los datos de consulta del objeto en la clase de all products*/
                                    '<img src="img/products/'+data.datos[i].imgpro+'">'+ 
                                    '<div class="detail-title">'+data.datos[i].nompro+'</div>'+
                                    '<div class="detail-description">'+data.datos[i].despro+'</div>'+
                                    '<div class="detail-precio">'+formato_precio(data.datos[i].prepo)+'</div>'+ /*Daremos formato al valor dentro de la funcion*/
                                '</div>'+
                            '</a>'+
                        '</div>'; 
                    }
                    document.getElementById("space-list").innerHTML=html; /*Tomamos el objeto de html space-list y le pegamos los datos obtenidos*/
                },
                error:function(err){  /*Muestra erroes si falla*/
                    console.error(err);
                }
            });
        });
        /*Funcion para darle formato al precio que se muestra en pantalla*/
        function formato_precio(valor){
            let svalor=valor.toString(); /*Convertimos a string variable valor*/
            let array=svalor.split("."); /*Split sepera el texto dependiendo de que aparece en el parentesis*/
            return "$"+array[0]+".<span>"+array[1]+"</span>"; /*Retornamos el signo de peso, concatenado con el array y un punto*/
        }
        function iniciar_compra(){
            $.ajax({
                url:'servicios/compra/validar_inicio_compra.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{
                    codpro:p
                }, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
                    if (data.state) {
                        alert(data.detail); /*Cuando el estado es true, aparece mensaje de producto agregao*/
                    }else{
                        alert(data.detail); /*Si no es agregado, muestra formulario de inicio de sesion*/
                        if (data.open_login) {
                            open_login(); 
                        }
                    }
                },
                error:function(err){  /*Muestra erroes si falla*/
                    console.error(err);
                }
            });
        }
        function open_login(){
            window.location.href="login.php"; /*Aabrir ventana despues de presionar comprar*/
        }
    </script>
</body>
</html>