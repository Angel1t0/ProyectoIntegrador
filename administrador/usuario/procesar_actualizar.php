<?php
include("../conexion.php");

$id = $_POST["id_pro"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

$actualizar = "UPDATE usuario SET nomusu='$nombre', apeusu='$apellido', emausu='$correo', pasusu='$contraseña' WHERE codusu=$id";

$resultado = mysqli_query($conexion, $actualizar);

if($resultado) {
    echo "<script>alert('Se ha actualizado el producto correctamente');</script>";
    header("location: edicion.php");
} else {
    echo "<script>alert('No se pudo modificar los datos'); window.history.go(-1);</script>";
}