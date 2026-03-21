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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">

    
</head>

<body>

<div class="container mt-4">

    <h1 class="mb-4">Tipos de Membresía</h1>

    <!-- Botón para mostrar/ocultar formulario -->
    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse" aria-expanded="false" aria-controls="formCollapse">
        <i class="fas fa-plus"></i> Nueva Membresía
    </button>

            <form id="formTipo">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="beneficios" class="form-control" placeholder="Beneficios" required>
                    </div>

                    <div class="col-md-4">
                        <input type="number" name="precio" class="form-control" placeholder="Precio" required>
                    </div>

                </div>

                <div class="row mt-3">

                    <div class="col-md-4">
                        <input type="number" name="duracionDias" class="form-control" placeholder="Duración (días)" required>
                    </div>

<<<<<<< Updated upstream
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
=======
                    <div class="col-md-4">
                        <input type="number" name="diasAntesRecordatorio" class="form-control" placeholder="Días recordatorio" required>
                    </div>
                    <div class="col-md-4">
                        <select name="estado" class="form-control">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success w-100">
                            <i class="fa-solid fa-save"></i> Guardar
                        </button>
                    </div>

>>>>>>> Stashed changes
                </div>

            </form>
<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            <?php endif; ?>
=======

    <?php } else { ?>
       <!-- Input de búsqueda -->
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" id="buscarNombre" class="form-control" placeholder="Buscar por nombre...">
            </div>
        </div>
        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead class="table-dark">
                    <tr>
                        <th class="d-none d-table-cell">id</th>
                        <th>Nombre</th>
                        <th>Beneficios</th>
                        <th>Precio</th>
                        <th>Duración</th>
                        <th>Días Recordatorio</th>
                        <th class="d-none d-table-cell">Estado</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>

                <tbody>
                <?php foreach($tipos as $tipo){ ?>
                    <tr>
                        <td class="d-none d-table-cell"><?= $tipo->getIdTipoMembresia(); ?></td>
                        <td><?= $tipo->getNombre(); ?></td>
                        <td><?= $tipo->getBeneficios(); ?></td>
                        <td>₡<?= $tipo->getPrecio(); ?></td>
                        <td><?= $tipo->getDuracionDias(); ?> días</td>
                        <td><?= $tipo->getDiasAntesRecordatorio(); ?></td>
                        <td class="d-none d-table-cell"><?= $tipo->getEstado() == 1 ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                            <button type="button" 
                                class="btn btn-danger btnEliminar"
                                data-id="<?= $tipo->getIdTipoMembresia(); ?>">
                                Eliminar
                            </button>                            
                            <button type="button" 
                                class="btn btn-warning btnEditar" 
                                data-id="<?= $tipo->getIdTipoMembresia(); ?>">
                                Editar</button>  
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>

    <?php } ?>
>>>>>>> Stashed changes

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="tipoMembresia.js"></script>
</body>
</html>