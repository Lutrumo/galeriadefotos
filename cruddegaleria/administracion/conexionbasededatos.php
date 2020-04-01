<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "galeria";

/* Codigo para la conexion con la base de datos */

try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' .
	$nombre_base_de_datos, $usuario, $contraseña);
	  }catch(PDOException $e){
			 echo "La Conexion Con La Base de Datos Falló: " . $e->getMessage(); // si falla da el error
				 }
?>