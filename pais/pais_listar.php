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
		<h1>Listado de Paises</h1>

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
				$sentencia = $conexion->query("SELECT id, nombre from pais order by nombre ASC;");
				$paises = $sentencia->fetchAll(PDO::FETCH_OBJ);


				// Ciclo para imprimir cada fila de la tabla
				if ($paises) {
					foreach($paises as $pais) {
						echo "<tr>";
						echo "<td>" .  $pais->id . "</td>";
						echo "<td>" .  $pais->nombre . "</td>";
						echo "<td><a href='pais_editar_formulario.php?id=" . $pais->id ."'>Editar</a></td>";
						echo "<td><a href='pais_eliminar.php?id=" . $pais->id ."'>Eliminar</a></td>";
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