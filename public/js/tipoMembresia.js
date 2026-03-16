fetch('../app/controllers/tipoMembresiaC.php', {

    method: 'POST',

    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },

    body: 'accion=listar'

})

.then(response => response.json())

.then(data => {

    let tabla = document.getElementById("tablaTipos");

    data.forEach(tipo => {

        tabla.innerHTML += `
        <tr>
            <td>${tipo.nombre}</td>
            <td>${tipo.precio}</td>
            <td>${tipo.duracionDias}</td>
        </tr>
        `;

    });

});