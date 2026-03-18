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

});