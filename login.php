<!DOCTYPE html>
<html>
<head>
    <title>Clemezon</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet"> <!--Mandamos a llamar algunas fuentes de google fonts-->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!--Mandamos a llamar la carpeta de fuentes que vamos a utilizar-->
    <link rel="stylesheet" type="text/css" href="css/index.css?1.0" media="all">
    <style type="text/css">
		form{
			max-width: 460px;
			width: calc(100% - 40px);
			padding: 20px;
			background: #fff;
			border-radius: 5px;
			margin: auto;
		}
		form h3{
			margin: 5px 0;
		}
		form input{
			padding: 7px 10px;
			width: calc(100% - 22px);
			margin-bottom: 10px;
		}
		form button{
			padding: 10px 15px;
			width: calc(100%);
			background: var(--main-red);
			border: none;
			color: #fff;
		}
		form p{
			margin: 0;
			margin-bottom: 5px;
			color: var(--main-red);
			font-size: 14px;
		}
        form a{
			margin: 0;
			margin-bottom: 5px;
			color: #000000;
			font-size: 14px;
            float: right;
		}
	</style>
</head>
<body>
    <!--Gaspak-->
    <?php include("layouts/_main-header.php"); ?> <!--Mandamos a llamar a la clase main header para la parte de busqueda-->
    <!--Para acentos, usa &oacute-->
    <div class="main-content"> <!--Contenedor de la pagina-->
        <div class="content-page">
            <div>
                <form action="servicios/login.php" method="POST">
                 <h3>Iniciar sesión</h3>
                 <input type="text" name="emausu" placeholder="Correo">
                 <input type="password" name="pasusu" placeholder="Contraseña">
                 <?php
                        if (isset($_GET['e'])) {
                            switch ($_GET['e']) {
                                case '1':
                                    echo '<p>Error de conexión</p>';
                                    break;
                                case '2':
                                    echo '<p>Email inválido</p>';
                                    break;
                                case '3':
                                    echo '<p>Contraseña inválida</p>';
                                    break;
                                default:
                                    
                                    break;
                            }
                        }
                    ?>
                <button type="submit">Ingresar</button>
                <a href="register.php"><p style="color:#000000;">Registrar</p></a>
                </form>
        </div>
        </div> 
    </div>
</body>
</html>