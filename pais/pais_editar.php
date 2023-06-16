<?php
    #Salir si alguno de los datos no está presente
    if(!isset($_POST["nombre"]) || !isset($_POST["id"])) exit();

    #Si todo va bien, se ejecuta esta parte del código...

    include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
    $id = $_POST["id"];
    $nombre = strtoupper($_POST["nombre"]);

    $sentencia = $conexion->prepare("UPDATE pais SET nombre = ? WHERE id = ?;");
    $resultado = $sentencia->execute([$nombre, $id]); # Pasar en el mismo orden de los ?
    if($resultado === TRUE) {
        echo "Datos Actualizados!";
        echo "<br>";
        echo "<a href='/biblioteca/pais/pais_listar.php'>Atras </a>";
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario"; 
    }
?>