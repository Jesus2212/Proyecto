<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario");

// Verificar la conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión: " . mysqli_connect_error();
  exit();
}

// Obtener los datos del formulario
$rfc = $_POST['rfc'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$empresa = $_POST['empresa'];

// Procesar la imagen
$foto = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];
$tamano = $_FILES['foto']['size'];
$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/imagenes/';
$ruta_destino = $carpeta_destino . $foto;
move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino);


// Insertar los datos en la base de datos
$sql = "INSERT INTO proveedor (rfc, nombre, telefono, empresa, foto) VALUES ('$rfc', '$nombre', '$telefono', '$empresa', '$foto')";


if (mysqli_query($conexion, $sql)) {
  header("Location: proveedores.php");
  exit; 
} else {
  echo "Error al agregar el proveedor: " . mysqli_error($conexion);
}

// Consulta para obtener los datos de la tabla de proveedores
$sql = "SELECT * FROM proveedor";
$result = mysqli_query($conexion, $sql);

// Cerrar conexión
$conexion->close();
?>