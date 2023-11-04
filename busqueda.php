<?php
    session_start();/*Para controlar variables de sesion*/
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
            <!--Division de las secciones-->
            <div class="title-section">Resultados para <strong>"<?php echo $_GET["text"]; ?>"</strong></div>
            <div class="product-list" id="space-list"><!--Lista de productos-->
            </div> 
        </div> 
    </div>
    <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript"> /*Prueba para utilizar JQuery*/
    var text="<?php echo $_GET["text"]; ?>"; //Creamos una variable para guardar los datos que mandemos a llamar de php
        $(document).ready(function(){ /* Cuando la panatalla esta lista (document.ready) mandamos a llamar la funcion de ajax(JQuery)*/
            $.ajax({
                url:'servicios/producto/get_all_results.php',/*A donde voy a consultar*/
                type:'POST', /*Tipo de peticion, en este caso un post*/
                data:{
                    text:text
                }, /*Parametros que enviamos*/
                success:function(data){ /*Cuando la consulta ha sido correcta me devuelve lo que haya dentro*/
                    console.log(data);
                    let html=''; /*Variable html*/
                    for (var i = 0; i < data.datos.length; i++) { /*Con un bucle, rellenaremos los datos que introduzcamos en la BD*/
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
                    if (html=='') {
                        document.getElementById("space-list").innerHTML="No hay resultados"; //Si al buscar no encuentra resultados
                    } else{
                        document.getElementById("space-list").innerHTML=html; /*Tomamos el objeto de html space-list y le pegamos los datos obtenidos*/
                    }
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
    </script>
</body>
</html>