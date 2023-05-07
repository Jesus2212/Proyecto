
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Productos</title>

    <link rel="stylesheet" href="estilos.css">

  </head>
  <body>

    <header>
      <h1>Productos</h1>
        <p id="fecha-hora"></p>
    <script>
      function actualizarFechaHora() {
        var ahora = new Date();
        var dia = ahora.getDate();
        var mes = ahora.getMonth() + 1;
        var anio = ahora.getFullYear();
        var hora = ahora.getHours();
        var minutos = ahora.getMinutes();
        var segundos = ahora.getSeconds();
        var fechaHora = dia + "/" + mes + "/" + anio + " " + hora + ":" + minutos + ":" + segundos;
        document.getElementById("fecha-hora").innerHTML = fechaHora;
      }
      setInterval(actualizarFechaHora, 1000);
    </script>
     <script>
function mostrarAlerta() {
  alert("Registro Exitoso.");
}
</script>
    </header>
    <main>

    <form action="registro-producto.php" method="POST">
  <label for="lote">Lote:</label>
  <input type="text" name="lote" id="lote" required>
  
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" id="nombre" required>
  
  <label for="tipo">Tipo:</label>
  <input type="text" name="tipo" id="tipo" required>
  
  <label for="precio">Precio:</label>
  <input type="number" name="precio" id="precio" required>
  
  <label for="fecha">Fecha:</label>
  <input type="date" name="fecha" id="fecha" required>
  
  <label for="rfc">RFC del proveedor:</label>
  <select name="rfc" id="rfc">
    <?php
      $conexion = mysqli_connect("localhost", "root", "", "inventario");
      // Obtener los RFC de los proveedores de la base de datos
      $query = "SELECT rfc FROM proveedor";
      $result = mysqli_query($conexion, $query);
      
      // Iterar sobre los resultados y crear una opción para cada RFC
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"" . $row['rfc'] . "\">" . $row['rfc'] . "</option>";
      }
    ?>
  </select>
 
 <input type="submit" class="btn btn-primary"  onclick="mostrarAlerta()"></input>
  <input type="reset" value="Limpiar">
</form>


  <h1>Productos Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Lote</th>
                    <th>Nombre del Producto</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Fecha de Caducidad</th>
                    <th>RFC del proveedor</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    // Conexión a la base de datos
                    $conexion = mysqli_connect("localhost", "root", "", "inventario");

                     // Consulta a la base de datos para obtener los productos
                     $sql = "SELECT * FROM producto";
                     $result = mysqli_query($conexion, $sql);

                     // Iterar por cada producto
                     while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['lote'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['tipo'] . "</td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "<td>" . $row['fechacaducidad'] . "</td>";
                        echo "<td>" . $row['rfc'] . "</td>";
                        echo '<td><a href="editar-producto.php?lote=' . $row['lote'] . '">Cambiar</a> <a href="eliminar-producto.php?lote=' . $row['lote'] . '">Eliminar</a></td>'; // botones de acciones

                        echo "</td>";
                        echo "</tr>";
                    }

                    // Cerrar la conexión a la base de datos
                    mysqli_close($conexion);
                ?>
            </tbody>


        </table>
        <a href="producto.php">Actualizar tabla</a>
        <a href="index.php">Regresar al inicio</a>
    </main>
</body>
</html>

  <td>

  </a>
</td>
