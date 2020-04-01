<?php

require '../administracion/conexionbasededatos.php';

$message='';

if (!empty($_POST['email']) && !empty($_POST['contrasena'])){
    $stmt = $base_de_datos->prepare("INSERT INTO usuarios(email,contrasena) VALUES (:email, :contrasena)");
    $stmt->bindParam(':email',$_POST['email']);
    $contrasena= password_hash($_POST['contrasena'],PASSWORD_BCRYPT);
    $stmt->bindParam(':contrasena',$contrasena);

    if ($stmt->execute()){
        $message = 'Creado Correctamente';
    }else{
        $message = 'Ha ocurrido un error creando su contraseña';
    }
}

?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
</head>
<body>

<?php if(!empty($message)):?>
<p><?php $message ?></p>
<?php endif; ?>

<h1>Registro</h1>
<span><a href="login.php">Login</a></span> o <a href="../index.php">Inicio</a></span>
    <form action="registrarse.php" method="POST">
        <input type="text" name="email" placeholder="Ingresa tu email">
        <input type="text" name="contrasena" placeholder="Ingresa tu contraseña">
        <input type="text" name="confirmcontrasena" placeholder="Confirma tu contraseña de nuevo">
        <input type="submit" value="Ingresar">    
    </form>
</body>
</html>