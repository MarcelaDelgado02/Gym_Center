document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("formTipo");

    if (!form) {
        console.error("No existe el formulario");
        return;
    }

    form.addEventListener("submit", function (e) {

        e.preventDefault();

        const formData = new FormData(form);
        formData.append("accion", "crear");

        fetch("../../app/controllers/tipoMembresiaC.php", { 
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {

            if (data.success) {
                alert(" Guardado");
                location.reload();
            } else {
                alert("Error");
            }

        })
        .catch(err => {
            console.error(err);
        });

    });
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("btnEditar")) {

            const id = e.target.dataset.id;
            const fila = e.target.closest("tr");

            document.getElementById("editarId").value = id;
            document.getElementById("editarNombre").value = fila.children[1].innerText;
            document.getElementById("editarBeneficios").value = fila.children[2].innerText;
            document.getElementById("editarPrecio").value = fila.children[3].innerText.replace("₡", "");
            document.getElementById("editarDuracion").value = fila.children[4].innerText.replace(" días", "");
            document.getElementById("editarRecordatorio").value = fila.children[5].innerText;
            document.getElementById("editarEstado").value = fila.children[6].innerText.trim() === "Activo" ? 1 : 2;

            
            const modal = new bootstrap.Modal(document.getElementById("modalEditar"));
            modal.show();
        }
    });

     const formEditar = document.getElementById("formEditar");

    if (formEditar) {
        formEditar.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(formEditar);
            formData.append("accion", "editar");

            fetch("../../app/controllers/tipoMembresiaC.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("Cambios guardados");
                    location.reload(); 
                } else {
                    alert(" Error al editar");
                }
            })
            .catch(err => console.error(err));
        });

    }
        
    const inputBuscar = document.getElementById("buscarNombre");

if (inputBuscar) {
    inputBuscar.addEventListener("input", function () {
        const nombre = inputBuscar.value.trim();
        const formData = new FormData();
        formData.append("accion", "buscarTiposMembresia");
        formData.append("nombre", nombre);

        fetch("../../app/controllers/tipoMembresiaC.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            // Llamaremos a una función para actualizar la tabla con los resultados
            actualizarTabla(data);
        })
        .catch(err => console.error(err));
    });
}

function actualizarTabla(tipos) {
    const tbody = document.querySelector("table tbody");
    if (!tbody) return;

    // Limpiar la tabla
    tbody.innerHTML = "";

    if (tipos.length === 0) {
        tbody.innerHTML = `<tr>
            <td colspan="8" class="text-center text-danger">No se encontraron tipos de membresía</td>
        </tr>`;
        return;
    }

    // Rellenar con los resultados
    tipos.forEach(tipo => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${tipo.idTipoMembresia}</td>
            <td>${tipo.nombre}</td>
            <td>${tipo.beneficios}</td>
            <td>₡${tipo.precio}</td>
            <td>${tipo.duracionDias} días</td>
            <td>${tipo.diasAntesRecordatorio}</td>
            <td>${tipo.estado == 1 ? 'Activo' : 'Inactivo'}</td>
            <td>
                <button type="button" class="btn btn-danger btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-warning btnEditar" data-id="${tipo.idTipoMembresia}">Editar</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}


document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btnEliminar")) {

        if (!confirm("¿Seguro que deseas eliminar esta membresía?")) return;

        const id = e.target.dataset.id;

        const formData = new FormData();
        formData.append("accion", "eliminar");
        formData.append("idTipoMembresia", id);

        fetch("../../app/controllers/tipoMembresiaC.php", {
            method: "POST",
            body: formData
        })
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
    }
});
});