<?php
include("../conexion.php");
$id = $_GET["id"];
$productos = "SELECT * FROM producto WHERE codpro = '$id'";
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
        <div class="table_header">Descripcion</div>
        <div class="table_header">Precio</div>
        <div class="table_header">Estado</div>
        <div class="table_header"></div>

        <?php $resultado = mysqli_query($conexion, $productos);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <input type="hidden" class="table_input" value="<?php echo $row["codpro"]; ?>" name="id_pro">
            <input type="text" class="table_input" value="<?php echo $row["nompro"]; ?>" name="nombre">
            <input type="text" class="table_input" value="<?php echo $row["despro"]; ?>" name="descripcion">
            <input type="number" class="table_input" value="<?php echo $row["prepo"]; ?>" name="precio">
            <input type="number" class="table_input" value="<?php echo $row["estado"]; ?>" name="estado">

        <?php }
        mysqli_free_result($resultado); ?>
        <input type="submit" value="Actualizar" class="container_submit container_submit_actualizar">
    </form>
</body>

</html>