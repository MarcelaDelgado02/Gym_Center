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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body class="p-4">

<div class="container">

    <h1 class="mb-4">Tipos de Membresía</h1>

    <!-- Botón para mostrar/ocultar formulario -->
    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse" aria-expanded="false" aria-controls="formCollapse">
        <i class="fas fa-plus"></i> Nueva Membresía
    </button>

    <!-- Formulario colapsable -->
    <div class="collapse" id="formCollapse">
        <div class="card card-body mb-4">
            <form id="formTipo">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="beneficios" class="form-label">Beneficios</label>
                    <textarea class="form-control" id="beneficios" name="beneficios" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
                </div>

                <div class="mb-3">
                    <label for="duracionDias" class="form-label">Duración (días)</label>
                    <input type="number" class="form-control" id="duracionDias" name="duracionDias" required>
                </div>

                <div class="mb-3">
                    <label for="diasAntesRecord" class="form-label">Días antes de recordatorio</label>
                    <input type="number" class="form-control" id="diasAntesRecord" name="diasAntesRecord" required>
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            </form>
        </div>
    </div>

    <!-- Lista de tipos de membresía -->
    <?php if (!empty($tipos)) : ?>
        <table class="table table-striped">
            <thead>
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
                <?php foreach ($tipos as $tipo) : ?>
                    <tr>
                        <td><?= htmlspecialchars($tipo['idTipoMembresia']) ?></td>
                        <td><?= htmlspecialchars($tipo['nombre']) ?></td>
                        <td><?= htmlspecialchars($tipo['beneficios']) ?></td>
                        <td><?= htmlspecialchars($tipo['precio']) ?></td>
                        <td><?= htmlspecialchars($tipo['duracionDias']) ?></td>
                        <td><?= htmlspecialchars($tipo['diasAntesRecord']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
 <div class="text-center mt-5">
            <i class="fa-solid fa-circle-xmark fa-4x text-danger"></i>
            <h5 class="mt-3">No hay tipos de membresía registrados</h5>
        </div>
            <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="tipoMembresia.js"></script>
</body>
</html>