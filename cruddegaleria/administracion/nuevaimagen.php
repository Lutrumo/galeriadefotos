<?php

/* Se cogen los datos pasados del formulario */

if(!isset($_POST["autor"]) || !isset($_POST["nombre"]) || !isset($_POST["foto"]) || !isset($_POST["descripcion"]) 
|| !isset($_POST["tipo"])) exit();

#Si todo funciona, se ejecuta lo siguiente
include_once "conexionbasededatos.php"; 

$autor = $_POST["autor"];
$nombre = $_POST["nombre"];
$foto = $_POST["foto"];
$descripcion = $_POST["descripcion"];
$tipo = $_POST["tipo"];

/* Se insertan los datos del formulario en la tabla */

$sentencia = $base_de_datos->prepare("INSERT INTO galeri(autor, nombre, foto, descripcion, tipo) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$autor, $nombre, $foto, $descripcion, $tipo]);

/* Si el resultado es bueno se va a una pagina, si no da un error */

if($resultado === TRUE) 
    header("Location: listarimagenes.php");
else 
    echo "Algo pasa con la tabla, por favor, revisela";
?>
<li><a href="../index.php">Inicio</li>