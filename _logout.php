<?php
	session_start(); //Verifica si hay alguna sesion
	session_destroy(); //Lo que esta guardado en sesion se elimina
	header("location: index.php"); //Nos redirecciona a nuestro archivo index