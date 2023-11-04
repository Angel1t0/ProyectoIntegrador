<?php
include("../conexion.php");

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$estado = $_POST["estado"];
$imagen = $_POST["imagen"];

$insertar = "INSERT INTO producto (nompro, despro, prepo, estado, imgpro) VALUES ('$nombre','$descripcion',$precio,$estado,'$imagen')";

$resultado = mysqli_query($conexion, $insertar);
if($resultado) {
        echo "<script>alert('Se ha registrado el producto con exito'); window.location='/ProyectoIntegrador/administrador/producto/index.php'</script>";
    } else {
        echo "<script>alert('No se pudo registrar'); window.history.go(-1);</script>";    
}
