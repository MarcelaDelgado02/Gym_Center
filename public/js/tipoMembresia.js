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
        


});