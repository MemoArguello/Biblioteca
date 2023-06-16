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
		<h1>Generos Literarios</h1>

		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//include_once "base_de_datos.php";
				include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
				$sentencia = $conexion->query("SELECT id, nombre from genero order by nombre ASC;");
				$generos = $sentencia->fetchAll(PDO::FETCH_OBJ);


				// Ciclo para imprimir cada fila de la tabla
				if ($generos) {
					foreach($generos as $genero) {
						echo "<tr>";
						echo "<td>" .  $genero->id . "</td>";
						echo "<td>" .  $genero->nombre . "</td>";
						echo "<td><a href='genero_editar_formulario.php?id=" . $genero->id ."'>Editar</a></td>";
						echo "<td><a href='genero_eliminar.php?id=" . $genero->id ."'>Eliminar</a></td>";
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