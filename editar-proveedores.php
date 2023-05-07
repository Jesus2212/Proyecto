<?php
  $conexion = mysqli_connect("localhost", "root", "", "inventario");

if (isset($_GET['rfc'])) {
    $rfc = $_GET['rfc'];
    
    // Consulta para obtener los datos del proveedor correspondiente

    $consulta = "SELECT * FROM proveedor WHERE rfc = '$rfc'";
    $resultado = mysqli_query($conexion, $consulta);
    $proveedor = mysqli_fetch_assoc($resultado);
}
else {
    header('Location: proveedores.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validación de campos
    // ...

    // Actualización de datos del proveedor
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];

    $consulta = "UPDATE proveedor SET nombre = '$nombre', telefono = '$telefono', empresa = '$empresa' WHERE rfc = '$rfc'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        header('Location: proveedores.php');
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

    <title>Editar proveedor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">

    <script>
function mostrarAlerta() {
  alert("Cambios exitosos.");
}
</script>

</head>
<body>


    <h1>Editar proveedor</h1>
    
    <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    
    <form method="post">
        <label for="rfc">RFC:</label>
        <input type="text" name="rfc" id="rfc" value="<?php echo $proveedor['rfc']; ?>" disabled>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $proveedor['nombre']; ?>">

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $proveedor['telefono']; ?>">

        <label for="empresa">Empresa:</label>
          <input type="text" name="empresa" id="empresa" value="<?php echo $proveedor['empresa']; ?>">

          <button type="submit" class="btn btn-primary" name="guardar_cambios" onclick="mostrarAlerta()">Guardar cambios</button>
          <a href="index.php" class="boton-regresar">Regresar al inicio</a>

      </form>

  </body>


