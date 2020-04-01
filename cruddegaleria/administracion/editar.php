<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "conexionbasededatos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM galeri WHERE id = ?;"); //sentencia que se usara para sacar todos los datos de la imagen que cojamos
$sentencia->execute([$id]);
$imagen = $sentencia->fetch(PDO::FETCH_OBJ);
if($imagen === FALSE){
    #No existe
    echo "¡No existe ninguna foto con ese ID!";
    exit();
}
?>

<!--Se crea el formulario para editar-->

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Añadir Fotos </title>
<link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
<form class="form-horizontal" method="post" action="editafoto.php"> <!-- Fichero que se usara para procesar los datos que se le manden de este formulario -->
    <input type="hidden" name="id" value="<?php echo $imagen->id; ?>"/>
    <fieldset>
    
    <!-- Nombre del Autor -->
    <legend>Formulario de Imagen</legend>
    
    <!-- Nombre del Autor -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="autor">Autor</label>  
      <div class="col-md-4">
      <input value="<?php echo $imagen->autor ?>" id="autor" name="autor" type="text" placeholder="" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Nombre de la Foto-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="nombre">Nombre de la Foto</label>  
      <div class="col-md-4">
      <input value="<?php echo $imagen->nombre ?>" id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Boton del Archivo --> 
    <div class="form-group">
      <label class="col-md-4 control-label" for="foto">Archivo</label>
      <div class="col-md-4">
        <input value="<?php echo $imagen->foto ?>" id="foto" name="foto" class="input-file" type="file" required='required'>
      </div>
    </div>
    
    <!-- Descripcion de la Foto -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="descripcion">Descripcion de la Foto</label>
      <div class="col-md-4">                     
        <textarea value="<?php echo $imagen->descripcion ?>" class="form-control" id="descripcion" name="descripcion"></textarea>
      </div>
    </div>
    
    <!-- Activado o Desactivado -->
    <label for="sexo">Género</label>
    <select name="tipo" required name="tipo" id="tipo">
      <option <?php echo $imagen->tipo === 'activado' ? "selected='selected'": "" ?> value="activado"> Activado </option>
      <option <?php echo $imagen->tipo === 'desactivado' ? "selected='selected'": "" ?> value="desactivado"> Desactivado </option>
    </select>
    
    <br></br><input type="submit" name="submit" value="Guardar Cambios">
    <input type="reset" name="delete" value="Eliminar">
    </fieldset>
    </form>
    </body>
    </html>