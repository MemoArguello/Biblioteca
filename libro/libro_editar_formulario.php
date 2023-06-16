<?php
    if(!isset($_GET["id"])) exit();
    $id = $_GET["id"];
    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
    $sentencia = $conexion->prepare("SELECT libro.id, libro.nombre, genero.nombre AS nombre_genero, autor.nombre AS nombre_autor FROM libro JOIN genero ON genero.id = libro.genero_id JOIN autor ON autor.id = libro.autor_id WHERE libro.id=?;");
    $sentencia->execute([$id]);
    $libro = $sentencia->fetch(PDO::FETCH_OBJ);
    if($libro === FALSE){
        echo "¡No existe un autor con ese ID!";
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">-

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
        <h2>Editar Libro</h2>
        <form action="libro_editar.php" method="post">
            <!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
		    <input type="hidden" name="id" value="<?php echo $libro->id; ?>">

            <div class="mb-3 mt-3 col-5">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control mayuscula" value="<?php echo $libro->nombre;?>" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3 mt-3 col-3">
                <label for="genero">Genero:</label>
                <select class="form-select" name="genero_id" id="genero_id" required>
                    <option value=''>-- Seleccione un Genero Literario --</option>
                    <?php
                    //include_once "base_de_datos.php";
                    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
                    $sentencia = $conexion->query("SELECT * FROM genero ORDER BY nombre ASC;");
                    $generos = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    foreach ($generos as $genero) {
                        echo "<option value='" . $genero->id . "'>" . $genero->nombre . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="mb-3 mt-3 col-3">
                <label for="autor">Autor:</label>
                <select class="form-select" name="autor_id" id="autor_id" required>
                    <option value=''>-- Seleccione un Autor --</option>
                    <?php
                    //include_once "base_de_datos.php";
                    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
                    $sentencia = $conexion->query("SELECT * FROM autor ORDER BY nombre ASC;");
                    $autores = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    foreach ($autores as $autor) {
                        echo "<option value='" . $autor->id . "'>" . $autor->nombre . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</body>

</html>
