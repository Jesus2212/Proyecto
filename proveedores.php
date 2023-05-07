
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Proveedores</title>

    <link rel="stylesheet" href="estilos.css">

  </head>
  <body>

    <header>
      <h1>Proveedores</h1>
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

    <form action="procesar-registro.php" method="POST">
       <label for="RFC">RFC:</label>
  <input type="text" id="rfc" name="rfc" required>

  <label for="Nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="Telefono">Teléfono:</label>
  <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" required>

  <label for="Empresa">Empresa:</label>
  <input type="text" id="empresa" name="empresa" required>

  <label for="Foto">Foto:</label>
  <input type="file" id="foto" name="foto" accept="image/*">

 <input type="submit" class="btn btn-primary"  onclick="mostrarAlerta()"></input>
  <input type="reset" value="Limpiar">
</form>

    <h1>Proveedores Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>RFC</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Empresa</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Conexión a la base de datos
                    $conexion = mysqli_connect("localhost", "root", "", "inventario");

                     // Consulta a la base de datos para obtener los proveedores
                     $sql = "SELECT * FROM proveedor";
                     $result = mysqli_query($conexion, $sql);

                     // Iterar por cada proveedor
                     while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['rfc'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td>" . $row['empresa'] . "</td>";
                        echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['foto']) . '" width="100"/></td>';
                        echo '<td><a href="editar-proveedores.php?rfc=' . $row['rfc'] . '">Cambiar</a> <a href="eliminar-proveedor.php?rfc=' . $row['rfc'] . '">Eliminar</a></td>'; // botones de acciones

                        echo "</td>";
                        echo "</tr>";
                    }

                    // Cerrar la conexión a la base de datos
                    mysqli_close($conexion);
                ?>
            </tbody>


        </table>
        <a href="proveedores.php">Actualizar tabla</a>
        <a href="index.php">Regresar al inicio</a>
    </main>
</body>
</html>

  <td>

  </a>
</td>
