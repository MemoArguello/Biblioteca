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
        <h2>Registrar Autor</h2>
        <form action="autor_guardar.php" method="post">
            <div class="mb-3 mt-3 col-5">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control mayuscula" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3 mt-3 col-3">
                <label for="sexo">Genero:</label>
                <select type="text" class="form-control mayuscula" name="sexo" id="sexo" required>
                    <option value="">--Selecione un Genero--</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
            </select>
            </div>
            
            <div class="mb-3 mt-3 col-3">
                <label for="pais">Pais:</label>
                <select class="form-select" name="pais_id" id="pais_id" required>
                    <option value=''>-- Seleccione un Pais --</option>
                    <?php
                    //include_once "base_de_datos.php";
                    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
                    $sentencia = $conexion->query("SELECT * FROM pais ORDER BY nombre ASC;");
                    $paises = $sentencia->fetchAll(PDO::FETCH_OBJ);
                    foreach ($paises as $pais) {
                        echo "<option value='" . $pais->id . "'>" . $pais->nombre . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</body>

</html>