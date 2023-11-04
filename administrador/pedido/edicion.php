<?php
include("../conexion.php");
$productos = "SELECT * FROM pedido";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de edicion</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
<?php include("layout.php"); ?>
    <div class="container-table container-table-edit">
        <div class="table_title table_title_edit">Datos de usuario</div>

        <div class="table_header">Direccion</div>
        <div class="table_header">Telefono</div>
        <div class="table_header">Opciones</div>

        <?php $resultado = mysqli_query($conexion, $productos);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="table_item"><?php echo $row["dirusuped"]; ?></div>
            <div class="table_item"><?php echo $row["telusuped"]; ?></div>
            <div class="table_item">
                <a href="actualizar.php?id=<?php echo $row["codpro"]; ?>" class="table_item_link">Editar</a> |
                <a href="procesar_eliminar.php?id=<?php echo $row["codpro"]; ?>" class="table_item_link">Eliminar</a>
            </div>
        <?php }
        mysqli_free_result($resultado); ?>
        <script src="confirmacion.js"></script>
    </div>
</body>

</html>