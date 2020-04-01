<?php
if(
        !isset($_POST["autor"]) ||
        !isset($_POST["nombre"]) ||
        !isset($_POST["foto"]) ||
        !isset($_POST["descripcion"]) ||
        !isset($_POST["tipo"]) ||
        !isset($_POST["id"])
) exit();

/* Si todo va bien se ejecuta esta parte del codigo*/

include_once "conexionbasededatos.php";

$id = $_POST["id"];
$autor = $_POST["autor"];
$nombre = $_POST["nombre"];
$foto = $_POST["foto"];
$descripcion = $_POST["descripcion"];
$tipo = $_POST["tipo"];

/*Se pasan cada uno de los parametros parametrizados */

$sentencia = $base_de_datos->prepare("UPDATE galeri SET autor= ?, nombre = ?, foto = ?, descripcion = ?, tipo = ?  WHERE id = ?;");
$resultado = $sentencia->execute([$autor, $nombre, $foto, $descripcion, $tipo, $id]);

/*Si el resultado es bueno se devuelve a la pagina con los cambios realizados */

if($resultado === TRUE) 
        header("Location: listarimagenes.php");
else 
        echo "Algo salió mal. Por favor, verifica los datos";
?>