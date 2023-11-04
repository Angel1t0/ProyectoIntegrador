<?php
session_start();
$response=new stdClass();
if (!isset($_SESSION['codusu'])) { /* */
    $response->state=false; //Guardar los registros en la variable datos
    $response->detail="No esta logeado";
    $response->open_login=true;
} else{
    include_once('../_conexion.php'); /*Importar variable de conexion*/
    $codusu=$_SESSION['codusu']; /*Obtenemos la sesion*/
	$codpro=$_POST['codpro']; /*Capturamos la variable de codpro*/
	$sql="INSERT INTO pedido /*Logica de inserción para el producto*/
	(codusu,codpro,fecped,estado,dirusuped,telusuped)
	VALUES
	($codusu,$codpro,now(),1,'','')"; /*Valores a insertar, now() momento actual de la BD*/
    $result=mysqli_query($con,$sql);
    if ($result) { /*Si inserto todo correctamente*/
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar producto. Intente más tarde";
	}
	mysqli_close($con); //Para terminar conexion
}
/*Para que me indique el tipo de resultado en formato json y poder utilizar la variable response en JavaScript*/
header('Content-Type: application/json'); 
echo json_encode($response); 