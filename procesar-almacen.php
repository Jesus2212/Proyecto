<?php
// Capturar datos del formulario
$lote = $_POST['lote'];
$cantidad = $_POST['cantidad'];

// Actualizar base de datos con nueva cantidad
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}

// Actualizar cantidad en la tabla 'productos'
$sql = "UPDATE producto SET cantidad = cantidad + '$cantidad' WHERE lote = '$lote'";

if ($conexion->query($sql) === TRUE) {
  header("Location: almacen.php");
} else {
  echo "Error al actualizar cantidad: " . $conexion->error;
}

$conexion->close();
?>

