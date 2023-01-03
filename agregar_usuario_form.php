<?php

$mysqli = new mysqli("localhost", "root", "", "usuarios");

// Revisar conexion
if ($mysqli->connect_errno) {
    die("Conexion fallida: ".$mysqli->connect_error);
}

$departamentos_query = "SELECT * FROM departamentos";
$departamentos = $mysqli->query($departamentos_query);

// Cierra la conexión
mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de usuarios</title>
</head>
<body>
    <a href="index.php">Ir hacia atras</a>
    <h1>Formulario de creacion de usuarios</h1>
    <form method="post" action="agregar_usuario.php">
        <label for="nombres">Nombres:</label><br>
        <input type="text" id="nombres" name="nombres"><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos"><br>
        <label for="departamento_id">Departamento:</label><br>
        <select id="departamento_id" name="departamento_id">
            <?php 
            while($row = mysqli_fetch_assoc($departamentos)) {
                echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
              }
            ?>
        </select><br>
        <label for="fecha_de_nacimiento">Fecha de nacimiento:</label><br>
        <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento"><br><br>
        <input type="submit" value="Agregar usuario">
    </form>
</body>
</html>