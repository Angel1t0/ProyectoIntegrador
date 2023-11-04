<?php
session_start();
$response=new stdClass();
include_once('../_conexion.php'); /*Importar variable de conexion*/

    $codusu=$_SESSION['codusu']; /*Obtenemos la sesion*/
	$dirusu=$_POST['dirusu']; /*Mandamos a llamar las variables del carrito*/
	$telusu=$_POST['telusu'];
	$sql="UPDATE pedido SET dirusuped='$dirusu',telusuped='$telusu', estado=2 /*Logica de inserción para el producto*/
	where estado=1";
    $result=mysqli_query($con,$sql);
    if ($result) { /*Si inserto todo correctamente*/
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo actualizar el pedido. Intente más tarde";
	}
mysqli_close($con); //Para terminar conexion
/*Para que me indique el tipo de resultado en formato json y poder utilizar la variable response en JavaScript*/
header('Content-Type: application/json'); 
echo json_encode($response); 