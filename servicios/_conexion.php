<?php /*Archivo de conexion con mysql*/
    $con=mysqli_connect("localhost","root","","proyectointegrador"); /*Ingresamos los parametros, que son cuatro*/
    /*El primer parametro indica la direccion url del servidor, al ser local la BD, se indica localhost*/ 
    /*El segundo parametro es el usuario que conecta la base de datos, en este caso es el por defecto 'root'*/
    /*El tercer parametro, es la contrasenia del usuario*/
    /*El cuarto parametro, es el nombre de la BD*/
    
    mysqli_set_charset($con, "utf8"); 
    