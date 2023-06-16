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
		<h1>Listado de Libros</h1>

		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Genero</th>
					<th>Autor</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//include_once "base_de_datos.php";
				include($_SERVER['DOCUMENT_ROOT'] . '/biblioteca/base_de_datos.php');
				$sentencia = $conexion->query("SELECT libro.id, libro.nombre, genero.nombre AS nombre_genero, autor.nombre AS nombre_autor FROM libro JOIN genero ON genero.id = libro.genero_id JOIN autor ON autor.id = libro.autor_id;");
				//$sentencia = $conexion->query("SELECT cliente.id, cliente.nombre, cliente.ruc, ciudad.nombre AS nombre_ciudad FROM cliente, ciudad WHERE ciudad.id = cliente.id_ciudad;");
				$libros = $sentencia->fetchAll(PDO::FETCH_OBJ);


				// Ciclo para imprimir cada fila de la tabla
				if ($libros) {
					foreach($libros as $libro) {
						echo "<tr>";
						echo "<td>" .  $libro->id . "</td>";
						echo "<td>" .  $libro->nombre . "</td>";
						echo "<td>" .  $libro->nombre_genero . "</td>";
						echo "<td>" .  $libro->nombre_autor . "</td>";
						echo "<td><a href='libro_editar_formulario.php?id=" . $libro->id ."'>Editar</a></td>";
						echo "<td><a href='libro_eliminar.php?id=" . $libro->id ."'>Eliminar</a></td>";
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