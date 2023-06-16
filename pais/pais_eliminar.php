<?php
    try {
        if(!isset($_GET["id"])) exit();
        $id = $_GET["id"];
        include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
        $sentencia = $conexion->prepare("DELETE FROM pais WHERE id = ?;");
        $resultado = $sentencia->execute([$id]);
        if($resultado === TRUE) {
            echo "Registro eliminado correctamente";
            echo "<br>";
            echo "<a href='/biblioteca/pais/pais_listar.php'>Atras </a>";
        }
    } catch (Exception $e) {
        if ($e) {
            echo "Error: No se puede eliminar!";
        }
    }
?>