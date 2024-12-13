<?php
session_start();
if (!isset($_SESSION['loggeado'])) {
    header('location: login.php');
    exit;
}

try {
    $conexion = new PDO('mysql:host=localhost;dbname=ej3t2;charset=utf8', 'root', '');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultado = $conexion->prepare('SELECT * FROM personas');
    $resultado->setFetchMode(PDO::FETCH_ASSOC);
    $resultado->execute();

    print '<a href="opciones.php">Menú principal</a>';

    if ($resultado->rowCount() == 0) {
        print '<p>No hay registros existentes</p>';
    } else {
        print '<form action="modificarRegistros2.php" method="post">
            <table style="border: 2px solid black"><thead>
            <tr>
            <th style="border: 2px solid black">Editar</th>
            <th style="border: 2px solid black">Nombre</th>
            <th style="border: 2px solid black">Apellidos</th>
            <th style="border: 2px solid black">Dirección</th>
            <th style="border: 2px solid black">Teléfono</th>
            </tr>
            </thead><tbody>';
        while ($row = $resultado->fetch()) {
            print "<tr>
                <td style='border: 2px solid black'><input type='radio' name='id' value='$row[id]'></td>
                <td style='border: 2px solid black'>$row[nombre]</td>
                <td style='border: 2px solid black'>$row[apellidos]</td>
                <td style='border: 2px solid black'>$row[direccion]</td>
                <td style='border: 2px solid black'>$row[telefono]</td>
                </tr>";
        }
        print '</tbody></table>
            <p><input type="submit" name="enviar" value="modificar"><input type="reset" value="Reiniciar formulario"></p>
            </form>';
    }
} catch (Exception $e) {
    print '<p>Error no se puede conectar con la BBDD por \n' . $e->getMessage() . '</p>';
}
?>