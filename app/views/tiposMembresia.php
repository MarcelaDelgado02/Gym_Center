<?php
require_once('../controllers/tipoMembresiaC.php');

$controller = new tipoMembresiaC();
$tipos = $controller->listar();
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Tipos de Membresía</title>

<link rel="stylesheet" href="../css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

<div class="container mt-4">

<h3>
<i class="fa-solid fa-dumbbell"></i> Tipos de Membresía
</h3>

<hr>

<?php if(empty($tipos)){ ?>

<div class="text-center mt-5">

<i class="fa-solid fa-circle-xmark fa-4x text-danger"></i>

<h5 class="mt-3">No hay tipos de membresía registrados</h5>

</div>

<?php } else { ?>

<div class="table-responsive">

<table class="table table-striped table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Beneficios</th>
<th>Precio</th>
<th>Duración</th>
<th>Días Recordatorio</th>

</tr>

</thead>

<tbody>

<?php foreach($tipos as $tipo){ ?>

<tr>

<td><?= $tipo->getIdTipoMembresia(); ?></td>

<td><?= $tipo->getNombre(); ?></td>

<td><?= $tipo->getBeneficios(); ?></td>

<td>₡<?= $tipo->getPrecio(); ?></td>

<td><?= $tipo->getDuracionDias(); ?> días</td>

<td><?= $tipo->getDiasAntesRecordatorio(); ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php } ?>

</div>

</body>
</html>