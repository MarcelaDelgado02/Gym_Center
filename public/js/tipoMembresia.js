/// <summary>
/// JavaScript para la pantalla de Tipos de Membresía
/// </summary>
/// <createdate>18-03-2026</createdate>
/// <author>Marcela Abarca Delgado</author>
/// <lastmodificationdate></lastmodificationdate>
/// <lastmodificationdescription></lastmodificationdescription>
/// <lastmodifierauthor></lastmodifierauthor>

jsTipoMembresia = {

    objetos: {
        formCrear: "#formTipo",
        formEditar: "#formEditar",
        inputBuscar: "#buscarNombre",
        tbodyTabla: "table tbody",
        modalEditar: "#modalEditar"
    },

    metodos: {

        crear: function (event) {
            event.preventDefault();
            const form = document.querySelector(jsTipoMembresia.objetos.formCrear);
            const formData = new FormData(form);
            formData.append("accion", "crear");

            fetch("../../app/controllers/tipoMembresiaC.php", { method: "POST", body: formData })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Guardado correctamente");
                        location.reload();
                    } else {
                        alert("Error al guardar");
                    }
                })
                .catch(err => console.error(err));
        },

        editar: function (event) {
            event.preventDefault();
            const form = document.querySelector(jsTipoMembresia.objetos.formEditar);
            const formData = new FormData(form);
            formData.append("accion", "editar");

            fetch("../../app/controllers/tipoMembresiaC.php", { method: "POST", body: formData })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Cambios guardados");
                        location.reload();
                    } else {
                        alert("Error al editar");
                    }
                })
                .catch(err => console.error(err));
        },

        abrirModalEditar: function (fila, id) {
            document.getElementById("editarId").value = id;
            document.getElementById("editarNombre").value = fila.children[1].innerText;
            document.getElementById("editarBeneficios").value = fila.children[2].innerText;
            document.getElementById("editarPrecio").value = fila.children[3].innerText.replace("₡", "");
            document.getElementById("editarDuracion").value = fila.children[4].innerText.replace(" días", "");
            document.getElementById("editarRecordatorio").value = fila.children[5].innerText;
            document.getElementById("editarEstado").value = fila.children[6].innerText.trim() === "Activo" ? 1 : 2;

            const modal = new bootstrap.Modal(document.querySelector(jsTipoMembresia.objetos.modalEditar));
            modal.show();
        },

        eliminar: function (id) {
            if (!confirm("¿Seguro que deseas eliminar esta membresía?")) return;

            const formData = new FormData();
            formData.append("accion", "eliminar");
            formData.append("idTipoMembresia", id);

            fetch("../../app/controllers/tipoMembresiaC.php", { method: "POST", body: formData })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("Eliminado correctamente");
                        location.reload();
                    } else {
                        alert("Error al eliminar");
                    }
                })
                .catch(err => console.error(err));
        },

        buscar: function (nombre) {
            const formData = new FormData();
            formData.append("accion", "buscarTiposMembresia");
            formData.append("nombre", nombre);

            fetch("../../app/controllers/tipoMembresiaC.php", { method: "POST", body: formData })
                .then(res => res.json())
                .then(data => jsTipoMembresia.metodos.actualizarTabla(data))
                .catch(err => console.error(err));
        },

        actualizarTabla: function (tipos) {
            const tbody = document.querySelector(jsTipoMembresia.objetos.tbodyTabla);
            if (!tbody) return;

            tbody.innerHTML = "";

            if (tipos.length === 0) {
                tbody.innerHTML = `<tr>
                    <td colspan="8" class="text-center text-danger">No se encontraron tipos de membresía</td>
                </tr>`;
                return;
            }

            tipos.forEach(tipo => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td class="d-none">${tipo.idTipoMembresia}</td>
                    <td>${tipo.nombre}</td>
                    <td>${tipo.beneficios}</td>
                    <td>₡${tipo.precio}</td>
                    <td>${tipo.duracionDias} días</td>
                    <td>${tipo.diasAntesRecordatorio}</td>
                    <td>${tipo.estado == 1 ? 'Activo' : 'Inactivo'}</td>
                    <td>
                        <button type="button" class="btn btn-danger btnEliminar" data-id="${tipo.idTipoMembresia}">Eliminar</button>
                        <button type="button" class="btn btn-warning btnEditar" data-id="${tipo.idTipoMembresia}">Editar</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

    },

    eventos: function () {
        // Crear
        const formCrear = document.querySelector(jsTipoMembresia.objetos.formCrear);
        if (formCrear) formCrear.addEventListener("submit", jsTipoMembresia.metodos.crear);

        // Editar
        const formEditar = document.querySelector(jsTipoMembresia.objetos.formEditar);
        if (formEditar) formEditar.addEventListener("submit", jsTipoMembresia.metodos.editar);

        // Buscar
        const inputBuscar = document.querySelector(jsTipoMembresia.objetos.inputBuscar);
        if (inputBuscar) inputBuscar.addEventListener("input", e => {
            const nombre = e.target.value.trim();
            jsTipoMembresia.metodos.buscar(nombre);
        });

        // Click en tabla (delegación)
        document.addEventListener("click", function (e) {
            const target = e.target;

            if (target.classList.contains("btnEditar")) {
                const id = target.dataset.id;
                const fila = target.closest("tr");
                jsTipoMembresia.metodos.abrirModalEditar(fila, id);
            }

            if (target.classList.contains("btnEliminar")) {
                const id = target.dataset.id;
                jsTipoMembresia.metodos.eliminar(id);
            }
        });
    }
};

// Inicializar
document.addEventListener("DOMContentLoaded", jsTipoMembresia.eventos);