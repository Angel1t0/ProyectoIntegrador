<?php
include("../conexion.php");

$id = $_POST["id_pro"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

$actualizar = "UPDATE pedido SET dirusuped='$direccion', telusuped='$telefono' WHERE codpro=$id";

$resultado = mysqli_query($conexion, $actualizar);

if($resultado) {
    echo "<script>alert('Se ha actualizado el producto correctamente');</script>";
    header("location: edicion.php");
} else {
    echo "<script>alert('No se pudo modificar los datos'); window.history.go(-1);</script>";
}