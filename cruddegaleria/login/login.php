<?php 

session_start(); 

require '../administracion/conexionbasededatos.php';


if (!empty($_POST['email']) && !empty($_POST['contrasena'])) {
$records = $base_de_datos->prepare("SELECT id, email, contrasena FROM usuarios WHERE email= :email");
$records->bindParam(':email',$_POST['email']);
$records->execute();
$results= $records->fetch(PDO::FETCH_ASSOC);

$message = '';

if(count($results)>0 && password_verify($_POST['contrasena'], $results['contrasena'])){
    $_SESSION['user_id'] = $results['id'];
    header('Location: ../index.php');
}else{
    $message='Lo siento, las credenciales no coinciden';
}
}

?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>

<h1>Login</h1>
o <span><a href="registrarse.php">Registro</a></span>

<?php if(!empty($message)):?>
<p><?php $message ?></p>
<?php endif; ?>

    <form action="login.php" method="POST">
        <input type="text" name="email" placeholder="Ingresa tu email">
        <input type="text" name="contrasena" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Ingresar">    
    </form>
</body>
</html>