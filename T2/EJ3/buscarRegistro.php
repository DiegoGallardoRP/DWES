<?php
session_start();
if (!isset($_SESSION['loggeado'])) {
	header('location: login.php');
	exit;
}

try {
	$conexion = new PDO('mysql:host=localhost;dbname=ej3t2;charset=utf8', 'root', '');

	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (isset($_REQUEST['enviar'])) {
		//Saneamiento de datos
		$nombre = htmlspecialchars(trim(strip_tags($_REQUEST['nombre'])), ENT_QUOTES, 'UTF-8');
		$apellidos = htmlspecialchars(trim(strip_tags($_REQUEST['apellidos'])), ENT_QUOTES, 'UTF-8');

		if ($nombre != "" && $apellidos != "") {
			$resultado = $conexion->prepare('SELECT * FROM personas WHERE nombre=:nombre AND apellidos=:apellidos');
			$resultado->execute([":nombre" => $nombre, ":apellidos" => $apellidos]);

		} elseif ($nombre != "") {
			$resultado = $conexion->prepare('SELECT * FROM personas WHERE nombre=:nombre');
			$resultado->execute([":nombre" => $nombre]);

		} elseif ($apellidos != "") {
			$resultado = $conexion->prepare('SELECT * FROM personas WHERE apellidos=:apellidos');
			$resultado->execute([":apellidos" => $apellidos]);

		} else {
			$resultado = $conexion->prepare('SELECT * FROM personas');
		}

		if ($resultado->rowCount() == 0) {
			print 'No se encontraron registros';
		} else {
			print '<table style="border: 2px solid black"><thead>
						<tr>
						<th style="border: 2px solid black">Id</th>
						<th style="border: 2px solid black">Nombre</th>
						<th style="border: 2px solid black">Apellidos</th>
						<th style="border: 2px solid black">Dirección</th>
						<th style="border: 2px solid black">Teléfono</th>
						</tr>
						</thead><tbody>';
			foreach ($resultado as $valor) {
				print "<tr>
					<td style='border: 2px solid black'>$valor[id]</td>
					<td style='border: 2px solid black'>$valor[nombre]</td>
					<td style='border: 2px solid black'>$valor[apellidos]</td>
					<td style='border: 2px solid black'>$valor[direccion]</td>
					<td style='border: 2px solid black'>$valor[telefono]</td>
				</tr>";
			}
		}

	} else {
		?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Buscar</title>
		</head>

		<body>
			<form action="buscarRegistro.php" method="post">
				<p>Nombre: <input type="text" name="nombre"></p>
				<p>Apellidos: <input type="text" name="apellidos"></p>
				<p><input type="submit" name="enviar" value="Buscar"><input type="reset" value="Resetear"></p>
			</form>
		</body>

		</html>
		<?php
	}
} catch (Exception $e) {
	print '<p>Error no se puede conectar con la BBDD por \n' . $e->getMessage() . '</p>';
}
?>