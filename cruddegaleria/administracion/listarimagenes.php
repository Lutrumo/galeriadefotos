
<?php
/* Se abre la conexion a la base de datos y se escribe una sentencia de lo que nos devolvera la tabla */
    include_once "conexionbasededatos.php";
    $sentencia = $base_de_datos->query("SELECT * FROM galeri;"); 
    $imagenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Imagenes</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <style>
    table, th, td {
        border: 1px solid black;
        background-color: white;
    }
    </style>
</head>

<body>
    <h1> Administracion de Fotos </h1>   
    <header>
    <nav class="menu">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="formulario.html">Nueva Imagen</a></li>
        </ul>
    </nav>
</header>
    <table>
    <!--  Aqui empieza el codigo usado para la tabla y los campos que la componen  -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Autor</th>
                    <th>Nombre de la Imagen</th>
                    <th>Archivo</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($imagenes as $imagen){ ?>
                <!-- se recorre el array poniendo los datos en el orden asignado en la tabla-->
                <tr>
                    <td><?php echo $imagen->id ?></td>
                    <td><?php echo $imagen->autor ?></td>
                    <td><?php echo $imagen->nombre ?></td>
                    <td><?php echo $imagen->foto ?></td>
                    <td><?php echo $imagen->descripcion ?></td>
                    <td><?php echo $imagen->tipo ?></td>
                    <td><a href="<?php echo "editar.php?id=" . $imagen->id?>">Editar</a></td>
                    <td><a href="<?php echo "eliminar.php?id=" . $imagen->id?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table> 
            <a href="formulario.html">Nueva Imagen</a></li>
</body>
</html>