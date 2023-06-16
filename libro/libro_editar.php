<?php
	#Salir si alguno de los datos no está presente
	if(!isset($_POST["nombre"]) || !isset($_POST["autor_id"]) || !isset($_POST["genero_id"])) exit("mal");

	#Si todo va bien, se ejecuta esta parte del código...

	//include_once "base_de_datos.php";
	include($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
	$nombre = strtoupper($_POST["nombre"]);
    $autor_id = strtoupper($_POST["autor_id"]);
    $genero_id = strtoupper($_POST["genero_id"]);
    $id = $_POST["id"];

    $sentencia = $conexion->prepare("UPDATE libro SET nombre = ?, autor_id = ?, genero_id=? WHERE id = ?;");
    $resultado = $sentencia->execute([$nombre, $autor_id, $genero_id, $id]); # Pasar en el mismo orden de los ?
    if($resultado === TRUE) {
        echo "Datos Actualizados!";
        echo "<br>";
        echo "<a href='/biblioteca/libro/libro_listar.php'>Atras </a>";
    } else {
        echo "Algo salió mal"; 
    }
?>