<?php
include("../conexion.php");

$id = $_GET["id"];
$eliminar = "DELETE FROM usuario WHERE codusu = $id";

$resultado = mysqli_query($conexion, $eliminar);

if($resultado) {
    header("location: edicion.php");
} else {
    echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
}