<?php

	#Salir si alguno de los datos no está presente
	if(!isset($_POST["nombre"])) exit();

	#Si todo va bien, se ejecuta esta parte del código...

	//include_once "base_de_datos.php";
	include_once($_SERVER['DOCUMENT_ROOT'].'/biblioteca/base_de_datos.php');
	$nombre = strtoupper($_POST["nombre"]);

	/*
		Al incluir el archivo "base_de_datos.php", todas sus variables están
		a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
		copiado y pegado el código
	*/
	$sentencia = $conexion->prepare("INSERT INTO genero(nombre) VALUES (?);");
	$resultado = $sentencia->execute([$nombre]); # Pasar en el mismo orden de los ?

	#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
	#Con eso podemos evaluar

	if($resultado === TRUE) {
        echo "Insertado correctamente";
        echo "<br>";
        echo "<a href='/biblioteca/genero/genero_formulario.php'>Atras </a>";
    } else {
        echo "Algo salió mal. Por favor verifica que la tabla exista";
    }
?>