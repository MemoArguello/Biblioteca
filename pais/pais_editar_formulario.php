<?php
    if(!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
    $sentencia = $conexion->prepare("SELECT id, nombre FROM pais WHERE id = ?;");
    $sentencia->execute([$id]);
    $pais = $sentencia->fetch(PDO::FETCH_OBJ);
    if($pais === FALSE){
        echo "¡No existe un Pais con ese ID!";
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
    ?>

    <div class="container mt-3">
        <h2>Editar Pais</h2>
        <form action="pais_editar.php" method="post">
            <!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
		    <input type="hidden" name="id" value="<?php echo $pais->id; ?>">
            <div class="mb-3 mt-3 col-5">
                <label for="nombre">Nombre de la Ciudad:</label>
                <input type="text" value="<?php echo $pais->nombre ?>" class="form-control mayuscula" name="nombre" id="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>

</html>
