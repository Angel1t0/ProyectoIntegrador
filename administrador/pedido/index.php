<?php
include("../conexion.php");
$productos = "SELECT * FROM pedido";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <?php include("layout.php"); ?>

    <div class="container-table">
        <div class="table_title">Datos del pedido<a href="edicion.php" class="title_edit">Edicion</a></div>

        <div class="table_header">Direccion</div>
        <div class="table_header">Telefono</div>

        <?php $resultado = mysqli_query($conexion, $productos);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="table_item"><?php echo $row["dirusuped"]; ?></div>
            <div class="table_item"><?php echo $row["telusuped"]; ?></div>

        <?php }
        mysqli_free_result($resultado); ?>
    </div>
</body>

</html>