<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario");

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
  exit();
}

// Obtener los datos del formulario
$lote = $_POST['lote'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];

$rfc = $_POST['rfc'];


$sql = "INSERT INTO producto (lote, nombre, tipo, precio, fechacaducidad, rfc) VALUES ('$lote', '$nombre', '$tipo', '$precio', '$fecha', '$rfc')";
mysqli_query($conexion, $sql);




if (mysqli_query($conexion, $sql)) {
  header("Location: producto.php");
  exit; 
} else {
  header("Location: producto.php");
}

// Consulta para obtener los datos de la tabla de proveedores
$sql = "SELECT * FROM producto";
$result = mysqli_query($conexion, $sql);

// Cerrar conexión
$conexion->close();
?>