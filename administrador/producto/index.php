<?php
include("../conexion.php");
$productos = "SELECT * FROM producto";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<?php include("layout.php"); ?>

    <h2 class="container_title">Registrar producto</h2>
    <form action="insertar.php" method="post" class="container_form">
        <label for="" class="container_label">Nombre</label>
        <input name="nombre" type="text" class="container_input">
        <label for="" class="container_label">Descripcion</label>
        <input name="descripcion" type="text" class="container_input">
        <label for="" class="container_label">Precio</label>
        <input name="precio" type="number" class="container_input">
        <label for="" class="container_label">Estado</label>
        <input name="estado" type="number" class="container_input">
        <label for="" class="container_label">Imagen</label>
        <input name="imagen" type="file" class="container_input">
        <input class="container_submit" type="submit" value="Registrar">
    </form>
    </div>

    <div class="container-table">
        <div class="table_title">Datos del producto<a href="edicion.php" class="title_edit">Edicion</a></div>

        <div class="table_header">Codigo</div>
        <div class="table_header">Nombre</div>
        <div class="table_header">Descripcion</div>
        <div class="table_header">Precio</div>
        <div class="table_header">Estado</div>

        <?php $resultado = mysqli_query($conexion, $productos);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="table_item"><?php echo $row["codpro"]; ?></div>
            <div class="table_item"><?php echo $row["nompro"]; ?></div>
            <div class="table_item"><?php echo $row["despro"]; ?></div>
            <div class="table_item"><?php echo $row["prepo"]; ?></div>
            <div class="table_item"><?php echo $row["estado"]; ?></div>

        <?php }
        mysqli_free_result($resultado); ?>
    </div>
</body>

</html>