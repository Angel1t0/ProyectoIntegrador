<?php
include("../conexion.php");

$id = $_POST["id_pro"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$estado = $_POST["estado"];


$actualizar = "UPDATE producto SET nompro='$nombre', despro='$descripcion', prepo=$precio, estado=$estado WHERE codpro=$id";

$resultado = mysqli_query($conexion, $actualizar);

if($resultado) {
    echo "<script>alert('Se ha actualizado el producto correctamente');</script>";
    header("location: edicion.php");

} else {
    echo "<script>alert('No se pudo modificar los datos'); window.history.go(-1);</script>";
}