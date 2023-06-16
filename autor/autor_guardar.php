<?php

	#Salir si alguno de los datos no está presente
	if(!isset($_POST["nombre"]) || !isset($_POST["sexo"]) || !isset($_POST["pais_id"])) exit("mal");

	#Si todo va bien, se ejecuta esta parte del código...

	//include_once "base_de_datos.php";
	include($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
	$nombre = strtoupper($_POST["nombre"]);
    $sexo = strtoupper($_POST["sexo"]);
    $pais_id = $_POST["pais_id"];

	/*
		Al incluir el archivo "base_de_datos.php", todas sus variables están
		a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
		copiado y pegado el código
	*/
	$sentencia = $conexion->prepare("INSERT INTO autor(sexo, nombre, pais_id) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$sexo, $nombre, $pais_id]); # Pasar en el mismo orden de los ?

	#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
	#Con eso podemos evaluar

	if($resultado === TRUE) {
        echo "Insertado correctamente";
        echo "<br>";
        echo "<a href='/biblioteca/autor/autor_formulario.php'>Atras </a>";
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista";
    }
?>