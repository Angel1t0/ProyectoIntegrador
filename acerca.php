<?php
    session_start();
?>
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<?php include("layouts/_main-header.php"); ?> <!--Mandamos a llamar a la clase main header para la parte de busqueda-->
<body>
<div class="wrapper">
  <h1>Integrantes</h1>
  <div class="team">
    <div class="team_member">
      <div class="team_img">
        <img src="img/inte1.jpg" alt="Team_image">
      </div>
      <h3>Gustavo Alonso Pascual Andrade</h3>
      <p class="role">Administrador y diseñador</p>
      <p>
          Responsable del diseño y programador activo en el ámbito gráfico dando estilos, 
          así como, ser el encargado del control externo y diseño de la página de manera interna así como la responsabilidad del ambito administrativo.
      </p>
    </div>
    <div class="team_member">
      <div class="team_img">
        <img src="img/inte2.jpg" alt="Team_image">
      </div>
      <h3>Axel Rubén Palacios García</h3>
      <p class="role">Administrador de bases de datos</p>
      <p>
        Responsable de la creación de un entorno gráfico sobre el manejo de la mercancia y los pedidos realizados, 
        haciendo uso de las bases de datos y teniendo control sobre ellas y los admnistradores de la página web.
      </p></div>
    <div class="team_member">
      <div class="team_img">
        <img src="img/inte3.jpg" alt="Team_image">
      </div>
      <h3>Gustavo Ángel Martínez Zuñiga</h3>
      <p class="role">Desarrolador</p>
      <p>
          Encargado de la creación y forma de la página web, dando forma al diseño y la lógica aplicada en las condicionales, 
          así como la solución de errores y codificación de los objetos dentro de la página web.
      </p>
    </div>
  </div>
</div>	
</body>
</html>