<?php
session_start();
if (!isset($_SESSION['loggeado'])) {
    header('location: login.php');
    exit;
}
$campo='apellidos';
$orden='ASC';
if(isset($_REQUEST['ASCnom'])){
    $campo='nombre';
    $orden='ASC';
}
if(isset($_REQUEST['DESCnom'])){
    $campo='nombre';
    $orden='DESC';
}

if(isset($_REQUEST['ASCap'])){
    $campo='apellidos';
    $orden='ASC';
}
if(isset($_REQUEST['DESCap'])){
    $campo='apellidos';
    $orden='DESC';
}

if(isset($_REQUEST['ASCdir'])){
    $campo='direccion';
    $orden='ASC';
}
if(isset($_REQUEST['DESCdir'])){
    $campo='direccion';
    $orden='DESC';
}

if(isset($_REQUEST['ASCtel'])){
    $campo='telefono';
    $orden='ASC';
}
if(isset($_REQUEST['DESCtel'])){
    $campo='telefono';
    $orden='DESC';
}
try {
    $conexion = new PDO('mysql:host=localhost;dbname=ej3t2;charset=utf8', 'root', '');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_REQUEST['enviar'])) {
        if (isset($_REQUEST['borrar'])) {
            $ids = $_REQUEST['borrar'];
            foreach ($ids as $valor) {
                $borrarRegistro = $conexion->prepare("DELETE FROM personas WHERE id=:id");
                $borrarRegistro->execute([":id" => $valor]);
            }
        } else {
            $error1 = true;
        }
    }
    $resultado = $conexion->prepare("SELECT * FROM personas ORDER BY $campo $orden");
    $resultado->setFetchMode(PDO::FETCH_ASSOC);
    $resultado->execute();
    print '<a href="opciones.php">Menú principal</a>';
    if ($resultado->rowCount() == 0) {
        print '<p>No hay registros existentes</p>';
    } else {
        print '<form action="borrarRegistro.php">
        <table style="border: 2px solid black"><thead>
        <tr>
        <th style="border: 2px solid black">Borrar</th>
        <th style="border: 2px solid black"><input type="submit" name="ASCnom" value="ASC">Nombre<input type="submit" name="DESCnom" value="DESC"></th>
        <th style="border: 2px solid black"><input type="submit" name="ASCap" value="ASC">Apellidos<input type="submit" name="DESCap" value="DESC"></th>
        <th style="border: 2px solid black"><input type="submit" name="ASCdir" value="ASC">Dirección<input type="submit" name="DESCdir" value="DESC"></th>
        <th style="border: 2px solid black"><input type="submit" name="ASCtel" value="ASC">Teléfono<input type="submit" name="DESCtel" value="DESC"></th>
        </tr>
        </thead><tbody>';
        while ($row = $resultado->fetch()) {
            print "<tr>
            <td style='border: 2px solid black'><input type='checkbox' name='borrar[]' value='$row[id]'></td>
            <td style='border: 2px solid black'>$row[nombre]</td>
            <td style='border: 2px solid black'>$row[apellidos]</td>
            <td style='border: 2px solid black'>$row[direccion]</td>
            <td style='border: 2px solid black'>$row[telefono]</td>
            </tr>";
        }
        if (isset($error1)) {
            print '<p style="color: red">No se ha seleccionado ningún registro</p>';
        }
        print '</tbody></table><input type="submit" name="enviar" value="Enviar"><input type="reset" value="Reiniciar formulario"></form>';
    }

} catch (Exception $e) {
    print '<p>Error no se puede conectar con la BBDD por \n' . $e->getMessage() . '</p>';
}
?>