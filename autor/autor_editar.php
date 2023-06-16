<?php
    #Salir si alguno de los datos no está presente
	if(!isset($_POST["nombre"]) || !isset($_POST["sexo"]) || !isset($_POST["pais_id"])) exit("mal");

	#Si todo va bien, se ejecuta esta parte del código...

	//include_once "base_de_datos.php";
	include($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
	$nombre = strtoupper($_POST["nombre"]);
    $sexo = strtoupper($_POST["sexo"]);
    $pais_id = $_POST["pais_id"];
    $id = $_POST["id"];

    $sentencia = $conexion->prepare("UPDATE autor SET nombre = ?, sexo = ?, pais_id=? WHERE id = ?;");
    $resultado = $sentencia->execute([$nombre, $sexo, $pais_id, $id]); # Pasar en el mismo orden de los ?
    if($resultado === TRUE) {
        echo "Datos Actualizados!";
        echo "<br>";
        echo "<a href='/biblioteca/autor/autor_listar.php'>Atras </a>";
    } else {
        echo "Algo salió mal"; 
    }
?>