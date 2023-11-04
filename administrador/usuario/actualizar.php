<?php
include("../conexion.php");
$id = $_GET["id"];
$productos = "SELECT * FROM usuario WHERE codusu = '$id'";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <form class="container-table container-table-edit" action="procesar_actualizar.php" method="post">
        <div class="table_title table_title_edit">Datos de usuario</div>

        <div class="table_header">Nombre</div>
        <div class="table_header">Apellido</div>
        <div class="table_header">Correo</div>
        <div class="table_header">Contraseña</div>
        <div class="table_header"></div>

        <?php $resultado = mysqli_query($conexion, $productos);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <input type="hidden" class="table_input" value="<?php echo $row["codusu"]; ?>" name="id_pro">
            <input type="text" class="table_input" value="<?php echo $row["nomusu"]; ?>" name="nombre">
            <input type="text" class="table_input" value="<?php echo $row["apeusu"]; ?>" name="apellido">
            <input type="text" class="table_input" value="<?php echo $row["emausu"]; ?>" name="correo">
            <input type="text" class="table_input" value="<?php echo $row["pasusu"]; ?>" name="contraseña">

        <?php }
        mysqli_free_result($resultado); ?>
        <input type="submit" value="Actualizar" class="container_submit container_submit_actualizar">
    </form>
</body>

</html>