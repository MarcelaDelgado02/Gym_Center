<?php
include('../app/config/conexion.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prueba de conexión</title>
</head>
<body>

<h2>Prueba de conexión a la base de datos</h2>

<?php
if ($conn) {
    echo "<p style='color:green;'>Conexión exitosa a bd_gymcenter</p>";
} else {
    echo "<p style='color:red;'>Error en la conexión</p>";
}
?>

<button>
    <a href = "../app/views/tiposMembresia.php" class="btn">ir a sitio</a>
</button>
</body>
</html>
