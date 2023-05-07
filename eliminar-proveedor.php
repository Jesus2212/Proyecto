<?php
 $conexion = mysqli_connect("localhost", "root", "", "inventario");


if (isset($_GET['rfc'])) {
  $rfc = $_GET['rfc'];
  
  $sql = "DELETE FROM proveedor WHERE rfc = '$rfc'";
  
  if (mysqli_query($conexion, $sql)) {
    header("Location: proveedores.php");
    exit();
  } else {
    echo "Error al eliminar el proveedor: " . mysqli_error($conexion);
  }
} else {
  header("Location: proveedores.php");
  exit();
}
?>

 <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>


 
