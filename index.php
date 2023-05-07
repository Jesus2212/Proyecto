<html>
<head>
  <title>Control de inventarios</title>
  <link rel="stylesheet"  href="estilos.css">
</head>
<body>
  <header>
    <h1>INVENTARIMAX</h1>
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

    <nav>
      <ul>
        <li><a href="proveedores.php">Proveedores</a></li>
        <li><a href="producto.php">Productos</a></li>
        <li><a href="almacen.php">Almacen</a></li>
        <li><a href="#">Ventas</a></li>
        <li><a href="#">Facturas</a></li>
      </ul>
    </nav>
  </header>
  <main>
 

  </main>
</body>
</html>