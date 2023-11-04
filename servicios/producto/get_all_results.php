<?php
include('../_conexion.php'); //Usamos la funcion include, para utilizar el directorio de la conexion*/
$response=new stdClass(); //Para tomar como respuesta y usarlo, creamos variable response

$datos=[]; //Creamos un array para guardar los registros de la BD
$i=0; //Creamos una variable para la posicion del array
$text=$_POST['text'];
/*Creamos un Query*/
$sql="select * from producto where estado=1 and nompro LIKE '%$text%'"; //Que busque un producto parecido
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result)){ /*Para ver todos los registros de nuestra BD, recorriendo 
    todos los valores de la consulta en la variable row, iterandolos uno a uno*/
    $obj=new stdClass(); //Creamos un objeto

    /*Llenamos el campo del objeto, igual a los campos de la tabla de la BD*/
    $obj->codpro=$row['codpro']; 
    $obj->nompro=$row['nompro']; 
    $obj->despro=$row['despro'];
    $obj->prepo=$row['prepo'];
    $obj->imgpro=$row['imgpro'];
    $datos[$i]=$obj; //Guardamos los datos en la posicion i, se le agrega el objeto
    $i++; //Saltamos hasta completar los datos de la consulta
}
$response->datos=$datos; //Guardar los registros en la variable datos

mysqli_close($con); //Para terminar la conexion con MySQL
/*Para que me indique el tipo de resultado en formato json y poder utilizar la variable response en JavaScript*/
header('Content-Type: application/json'); 
echo json_encode($response); 