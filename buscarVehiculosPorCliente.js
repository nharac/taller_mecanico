function cargarVehiculos(id_cliente) {

    fetch("http://localhost/TallerMecanica/api/obtenerVehiculosCliente.php?id_cliente=" + id_cliente)
    .then(res => res.json())
    .then(data => {

        let select = document.getElementById("vehiculo_input");

        select.innerHTML = '<option value="">Selecciona...</option>';

        data.forEach(v => {
            let option = document.createElement("option");
            option.value = v.id_vehiculo;
            option.textContent = v.Placa;

            select.appendChild(option);
        });

    });

}