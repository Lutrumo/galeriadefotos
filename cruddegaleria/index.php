<?php
    session_start();

    /*Incluimos la conexio a la base de datos*/
    include_once "administracion/conexionbasededatos.php";
    $sentencia = $base_de_datos->query("SELECT * FROM galeri where tipo='activado'"); //la sentencia esta vez seria que nos saque todos los datos de todas la imagenes que esten el tipo activado
    $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);

    if (isset($_SESSION['user_id'])) {
        $records = $base_de_datos->prepare("SELECT id, email, contrasena from usuarios WHERE id=:id");
        $records->bindParam(':id',$_SESSION['user_id']);
        $records->execute();
        $results=$records->fetch(PDO::FETCH_ASSOC);
        $user = null;

        if (count($results) > 0){
            $user=$results;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>galeria</title>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
<h1>Galeria de Fotos</h1>

<!-- Barra de Menu De Arriba -->
<header>
    <nav class="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="administracion/listarimagenes.php">Administracion</a></li>
            <li><a href="administracion/formulario.html">Nueva Imagen</a></li>
        </ul>
    </nav>
</header>
<?php

if (!empty($user)):?>
</br> Bienvenido. <?=$user['email']; ?>
</br>Te has logueado
<a href="login/logout.php">
    Salir
</a>
<?php else: ?>
Por favor
<a href="login/login.php">Logueese</a> o   
<a href="login/registrarse.php">Registrese</a> 
<?php endif; ?>

<!-- Codigo para que saque las imagenes por pantalla -->
<?php

          foreach ( $imagenes as $imagen) //recorre las imagenes  
          {
            echo '<br></br><img src="imagenes/'.$imagen->foto.'"/ height="200" width="300">'.$imagen->nombre; //saca las imagenes y el nombre  
          }

        ?>

</body>
</html>