<?php

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "usuarios");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Datos del formulario
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$departamento_id = $_POST["departamento_id"];
$fecha_de_nacimiento = $_POST["fecha_de_nacimiento"];

// Consulta para insertar
$sql = "INSERT INTO usuarios (nombres, apellidos, departamento_id, fecha_de_nacimiento, fecha_de_creacion, estado) VALUES ('$nombres', '$apellidos', '$departamento_id', '$fecha_de_nacimiento', NOW(), 1)";

if (mysqli_query($conn, $sql)) {
  echo "Usuario agregado correctamente.";
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cierra la conexión
mysqli_close($conn);

?>
