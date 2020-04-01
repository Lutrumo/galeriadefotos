<?php
    if(!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    include_once "conexionbasededatos.php";
    $sentencia = $base_de_datos->prepare("DELETE FROM galeri WHERE id = ?;"); //Se pasa un id que se usara para eliminar el registro o en este caso la imagen
    $resultado = $sentencia->execute([$id]); // Se ejecuta
    
    // Si el resultado es bueno le manda a la pagina de listar imagenes, si es malo, se advierte con un mensaje de error

    if($resultado === TRUE)
        header("Location: listarimagenes.php"); 
    else echo "Algo salió mal";     
?>