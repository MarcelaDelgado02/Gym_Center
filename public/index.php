<?php
include('../app/config/conexion.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prueba de conexión</title>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">

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
    <a href = "../app/views/tiposMembresia.php" class="btn btn-primary">ir a sitio tipos membresias</a>
</button>
<button>
    <a href = "../app/views/usuarios.php" class="btn btn-primary">ir a sitio Usuarios</a>
</button>
</body>
</html>
