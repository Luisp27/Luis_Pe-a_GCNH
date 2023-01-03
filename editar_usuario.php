<?php

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "usuarios");

// Comprueba la conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Recoge los datos del formulario
$id = $_POST["id"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$departamento_id = $_POST["departamento_id"];
$fecha_de_nacimiento = $_POST["fecha_de_nacimiento"];

// Crea la consulta SQL
$sql = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', departamento_id='$departamento_id', fecha_de_nacimiento='$fecha_de_nacimiento' WHERE id=$id";

// Ejecuta la consulta y comprueba si ha habido un error
if (mysqli_query($conn, $sql)) {
  echo "Usuario editado correctamente.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cierra la conexión
mysqli_close($conn);

?>