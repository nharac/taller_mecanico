
document.getElementById("btnBuscar").addEventListener("click", function() {

    let cedula = document.getElementById("numDocumento").value;

    fetch("api/comprobarCliente.php?numDocumento=" + cedula)
    .then(response => response.json())
    .then(data => {


        if (data && !data.error) {
            document.getElementById("id_cliente").value = data.id_cliente;

            cargarVehiculos(data.id_cliente);


        } else {
            // No encontrado
            document.getElementById("id_cliente").value = "";
        }
    })
    .catch(error => {
        console.error(error);
    });

});
