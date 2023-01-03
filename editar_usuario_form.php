<?php

$usuario_id = $_GET["ID"];

if (isset($usuario_id)) {
    $mysqli = new mysqli("localhost", "root", "", "usuarios");


    // Revisar conexion
    if ($mysqli->connect_errno) {
        die("Conexion fallida: ".$mysqli->connect_error);
    }

    $user_query = "SELECT u.id, u.nombres, u.apellidos, d.nombre AS departamento, u.fecha_de_nacimiento, u.fecha_de_creacion, u.estado FROM usuarios u INNER JOIN departamentos d ON u.departamento_id = d.id WHERE u.id = " . $usuario_id ."";
    $usuario = $mysqli->query($user_query);
    
    $departamentos_query = "SELECT * FROM departamentos";
    $departamentos = $mysqli->query($departamentos_query);
    
    // Cierra la conexión
    mysqli_close($mysqli);
}

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
    <h1>Formulario de edicion de usuarios</h1>
    <form method="post" action="editar_usuario.php">
        <label for="nombres">Nombres:</label><br>
        <input type="text" id="nombres" name="nombres" value="<?php echo $usuario[0]["nombre"] ?>"><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario[0]["apellidos"] ?>"><br>
        <label for="departamento_id">Departamento:</label><br>
        <select id="departamento_id" name="departamento_id">
            <?php 
            while($row = mysqli_fetch_assoc($departamentos)) {
                echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
              }
            ?>
        </select><br>
        <label for="fecha_de_nacimiento">Fecha de nacimiento:</label><br>
        <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento" value="<?php echo $usuario[0]["fecha_de_nacimiento"] ?>"><br><br>
        <input type="submit" value="Editar usuario">
    </form>
</body>
</html>