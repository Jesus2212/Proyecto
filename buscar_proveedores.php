<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
     <link rel="stylesheet" href="estilos.css">

     <div class="sidebar">
        <img src="images.png" alt="Logo">

        <ul class="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="proveedores.php">Proveedores</a></li>
            <li><a href="producto.php">Productos</a></li>
            <li><a href="almacen.php">Almacén</a></li>
            <li><a href="ventas.php">Ventas</a></li>
            <li><a href="facturas.php">Factura</a></li>
        </ul>
      </div>
</head>
<body>
    <div class="content">

<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inventario");

// Obtener el término de búsqueda del formulario
if(isset($_GET['query'])){
    $query = $_GET['query'];
} else {
    $query = "";
}

// Consulta a la base de datos para buscar proveedores que coincidan con el término de búsqueda
$sql = "SELECT * FROM proveedor WHERE nombre LIKE '%$query%' OR rfc LIKE '%$query%' OR telefono LIKE '%$query%' OR empresa LIKE '%$query%'";
$result = mysqli_query($conexion, $sql);

// Verificar si se encontraron resultados
if(mysqli_num_rows($result) > 0) {
    // Mostrar los resultados en una tabla
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>RFC</th>";
    echo "<th>Nombre</th>";
    echo "<th>Teléfono</th>";
    echo "<th>Empresa</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['rfc']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['empresa']."</td>";
        echo "<td><a href='editar-proveedores.php?rfc=".$row['rfc']."'>Cambiar</a> <a href='eliminar-proveedor.php?rfc=".$row['rfc']."'>Eliminar</a></td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
 <a href="proveedores.php">Regresar a proveedores</a>
  <a href="index.php">Regresar a inicio</a>
</div>
</body>
</html>