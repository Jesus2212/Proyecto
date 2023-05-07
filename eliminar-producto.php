<?php
 $conexion = mysqli_connect("localhost", "root", "", "inventario");


if (isset($_GET['lote'])) {
  $lote = $_GET['lote'];
  
  $sql = "DELETE FROM producto WHERE lote = '$lote'";
  
  if (mysqli_query($conexion, $sql)) {
    header("Location: producto.php");
    exit();
  } else {
    echo "Error al eliminar el producto: " . mysqli_error($conexion);
  }
} else {
  header("Location: producto.php");
  exit();
}
?>

 <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>


 
