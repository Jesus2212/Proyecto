<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario");

if (isset($_GET['lote'])) {
  $loteSeleccionado = $_GET['lote'];
  }

  // Realizar la consulta SQL para obtener los datos del proveedor según el RFC
$query = "SELECT nombre, tipo FROM producto WHERE lote = '$loteSeleccionado'";
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontraron resultados
if ($resultado && mysqli_num_rows($resultado) > 0) {
    
    // Obtener los datos del proveedor en un array asociativo
    $datosProducto = mysqli_fetch_assoc($resultado);
 // Devolver los datos del producto en formato JSON
    echo json_encode($datosProducto);
} else {
    // No se encontraron resultados, devolver un objeto vacío en formato JSON
    echo json_encode([]);
}
?>