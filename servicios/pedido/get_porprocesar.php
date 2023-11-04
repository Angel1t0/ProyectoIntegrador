<?php
include('../_conexion.php');
$response=new stdClass();

function estado2texto($id){
    switch ($id) {
        case '1':
            return 'Por procesar';
            break;
        case '2':
            return 'Por pagar';
            break;
        default:
            # code...
            break;
    }
}

//$datos=array();
$datos=[];
$i=0;
$sql="select *, ped.estado estadoped from pedido ped inner join 
producto pro on ped.codpro=pro.codpro
where ped.estado=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
    $obj->codped=$row['codped'];
    $obj->codpro=$row['codpro'];
	$obj->nompro=utf8_encode($row['nompro']);
    $obj->prepo=$row['prepo'];
    $obj->imgpro=$row['imgpro'];
	$obj->fecped=$row['fecped'];
	$obj->dirusuped=utf8_encode($row['dirusuped']); /*Agregamos utf8 para poder agregar caracteres especiales*/
    $obj->telusuped=$row['telusuped'];
    $obj->estado=estado2texto($row['estadoped']);
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
