<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Tabla de ejemplo</title>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
		}
	</style>
</head>

<body>

	<?php
	include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/menu.php');
	?>


	<div class="container">
		<h1>Listado de Autores</h1>

		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Sexo</th>
					<th>Pais</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//include_once "base_de_datos.php";
				include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
				$sentencia = $conexion->query("SELECT autor.id, autor.nombre, autor.sexo, pais.nombre AS nombre_pais FROM autor JOIN pais ON pais.id = autor.pais_id;");
				//$sentencia = $conexion->query("SELECT cliente.id, cliente.nombre, cliente.ruc, ciudad.nombre AS nombre_ciudad FROM cliente, ciudad WHERE ciudad.id = cliente.id_ciudad;");
				$autores = $sentencia->fetchAll(PDO::FETCH_OBJ);


				// Ciclo para imprimir cada fila de la tabla
				if ($autores) {
					foreach($autores as $autor) {
						echo "<tr>";
						echo "<td>" .  $autor->id . "</td>";
						echo "<td>" .  $autor->nombre . "</td>";
						echo "<td>" .  $autor->sexo . "</td>";
						echo "<td>" .  $autor->nombre_pais . "</td>";
						echo "<td><a href='autor_editar_formulario.php?id=" . $autor->id ."'>Editar</a></td>";
						echo "<td><a href='autor_eliminar.php?id=" . $autor->id ."'>Eliminar</a></td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>





</body>

</html>