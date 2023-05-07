<?php
  $conexion = mysqli_connect("localhost", "root", "", "inventario");

if (isset($_GET['lote'])) {
    $lote = $_GET['lote'];
    
    // Consulta para obtener los datos del producto correspondiente

    $consulta = "SELECT * FROM producto WHERE lote = 'lote'";
    $resultado = mysqli_query($conexion, $consulta);
    $producto = mysqli_fetch_assoc($resultado);
}
else {
    header('Location: producto.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validación de campos
    // ...

    // Actualización de datos del producto
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
     $fecha = $_POST['fecha'];

    $consulta = "UPDATE producto SET nombre = '$nombre', tipo = '$tipo', precio = '$precio' , fecha = '$fechacaducidad 'WHERE lote = '$lote'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        header('Location: producto.php');
        exit();
    }
    else {
        $error = 'Error al actualizar los datos del proveedor';
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Editar producto</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">

    <script>
function mostrarAlerta() {
  alert("Cambios exitosos.");
}
</script>

</head>
<body>


    <h1>Editar producto</h1>
    
    <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    
    <form method="post">
        <label for="lote">Lote:</label>
        <input type="text" name="lote" id="lote" value="<?php echo $producto['lote']?>" disabled>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo $producto['tipo']; ?>">

        <label for="precio">Precio:</label>
          <input type="text" name="precio" id="precio" value="<?php echo $producto['precio']; ?>">

        <label for="fecha">Fecha:</label>
          <input type="text" name="fecha" id="fecha" value="<?php echo $producto['fecha']; ?>">

          <button type="submit" class="btn btn-primary" name="guardar_cambios" onclick="mostrarAlerta()">Guardar cambios</button>
          <a href="index.php" class="boton-regresar">Regresar al inicio</a>