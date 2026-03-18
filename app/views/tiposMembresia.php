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

    <h3>
        <i class="fa-solid fa-dumbbell"></i> Tipos de Membresía
    </h3>
    <button 
    class="btn btn-primary mb-3" 
    type="button" 
    data-bs-toggle="collapse" 
    data-bs-target="#formCollapse"
>
    <i class="fa-solid fa-plus"></i> Crear Membresía
</button>

<hr>
<!-- Form-->
<div class="collapse" id="formCollapse">

    <div class="card mb-4 shadow">

        <div class="card-header bg-primary text-white">
            <i class="fa-solid fa-plus"></i> Crear Tipo de Membresía
        </div>

        <div class="card-body">

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

                </div>

            </form>


        </div>

    </div>

</div>
   

   
    

    <!--  TABLA -->
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
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Beneficios</th>
                        <th>Precio</th>
                        <th>Duración</th>
                        <th>Días Recordatorio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
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
                        <td><?= $tipo->getEstado() == 1 ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                             <button type="button" class="btn btn-danger btnEliminar"data-id="<?= $tipo->getIdTipoMembresia(); ?>">Eliminar</button>
                            <button type="button" class="btn btn-warning btnEditar" data-id="<?= $tipo->getIdTipoMembresia(); ?>">Editar</button>  
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>

    <?php } ?>

    <!-- Modal Editar Membresía -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="modalEditarLabel"><i class="fa-solid fa-pen"></i> Editar Membresía</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <form id="formEditar">
          <input type="hidden" name="idTipoMembresia" id="editarId">

          <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" id="editarNombre" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Beneficios</label>
            <textarea name="beneficios" id="editarBeneficios" class="form-control" rows="2" required></textarea>
          </div>

          <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precio" id="editarPrecio" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Duración (días)</label>
            <input type="number" name="duracionDias" id="editarDuracion" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Días recordatorio</label>
            <input type="number" name="diasAntesRecordatorio" id="editarRecordatorio" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Estado</label>
            <select name="estado" id="editarEstado" class="form-control">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
        </div>
          <button type="submit" class="btn btn-success w-100">
            <i class="fa-solid fa-save"></i> Guardar cambios
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/js/tipoMembresia.js" ></script>
</body>
</html>