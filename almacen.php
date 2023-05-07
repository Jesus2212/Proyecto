<!DOCTYPE html>
<html>
<head>
  <title>Agregar cantidad a productos</title>
  <link rel="stylesheet"  href="estilos.css">
</head>
<body>
  <h1>Agregar cantidad a productos</h1>
  <form action="procesar-almacen.php" method="POST">


      <label for="lote">Lote del producto:</label>
     <select name="lote" id="lote">  
    <?php
      $conexion = mysqli_connect("localhost", "root", "", "inventario");
      // Obtener los RFC de los proveedores de la base de datos
      $query = "SELECT lote FROM producto";
      $result = mysqli_query($conexion, $query);
      

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"" . $row['lote'] . "\">" . $row['lote'] . "</option>";
      }
    ?>
  </select>
    </select>
    <br>
    <label for="cantidad">Cantidad a agregar:</label>
    <input type="number" name="cantidad" id="cantidad">
    <br>
    <input type="submit" value="Agregar cantidad">
  </form>
</body>
</html>

