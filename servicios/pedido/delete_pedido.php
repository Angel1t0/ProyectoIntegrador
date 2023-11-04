<?php
	include_once('../_conexion.php');
	$response=new stdClass(); //Devolver datos y conexion
	$codped=$_POST['codped'];
	$sql="delete from pedido where codped=$codped"; //Borramos el registro
	$result=mysqli_query($con,$sql); //Resultado de la consulta hecha con parametros de la conexion y el query sql
	if ($result) {
		$response->state=true;
	}else{
		$response->state=false;
		$response->detail="No se pudo eliminar el pedido";
	}

	mysqli_close($con); //Cierra conexion
	header('Content-Type: application/json');
	echo json_encode($response);