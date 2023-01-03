<?php

$mysqli = new mysqli("localhost", "root", "", "usuarios");

// Revisar conexion
if ($mysqli->connect_errno) {
    die("Conexion fallida: ".$mysqli->connect_error);
}

$departamentos_query = "SELECT * FROM departamentos";
$departamentos = $mysqli->query($departamentos_query);

$user_query = "SELECT u.id, u.nombres, u.apellidos, d.nombre AS departamento, u.fecha_de_nacimiento, u.fecha_de_creacion, u.estado FROM usuarios u INNER JOIN departamentos d ON u.departamento_id = d.id";
$usuarios = $mysqli->query($user_query);

// Cierra la conexión
mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <h1>Lista de usuarios</h1>

    <a href="agregar_usuario_form.php">Crear usuarios</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Departamento</th>
            <th>Fecha de nacimiento</th>
            <th>Fecha de creación</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($usuarios)) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["nombres"] . '</td>';
                echo '<td>' . $row["apellidos"] . '</td>';
                echo '<td>' . $row["departamento"] . '</td>';
                echo '<td>' . $row["fecha_de_nacimiento"] . '</td>';
                echo '<td>' . $row["fecha_de_creacion"] . '</td>';
                echo '<td>' . $row["estado"] . '</td>';
                echo '<td><a href="editar_usuario_form.php?ID=' . $row["id"] . '">Editar usuario</a></td>';
                echo '<td><a href="eliminar_usuario.php?ID=' . $row["id"] . '">Eliminar usuario</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>