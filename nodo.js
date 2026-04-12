class Nodo {
    constructor(data) {
        this.data = data;
        this.next = null;
        this.prev = null; // 🔥 doble enlace (mejor UX)
    }
}

function crearListaCircular(ordenes) {

    if (ordenes.length === 0) return null;

    let head = new Nodo(ordenes[0]);
    let actual = head;

    for (let i = 1; i < ordenes.length; i++) {
        let nuevo = new Nodo(ordenes[i]);

        actual.next = nuevo;
        nuevo.prev = actual;

        actual = nuevo;
    }

    actual.next = head;
    head.prev = actual;

    return head;
}

let actual = null;

function mostrarOrden(){
    if(!actual) return;

    let o = actual.data;

    document.getElementById("tablaOrden").innerHTML = `
        <tr>
            <td>${o.id_OrdenTrabajo}</td>
            <td>${o.estado}</td>
            <td>${o.Valor_Total}</td>
            <td>${formatearFecha(o.Hora_Inicio)}</td>
            <td>${formatearFecha(o.Hora_finalizacion)}</td>
            <td>${o.Trabajador_Responsable}</td>
        </tr>
        `;
}

    function formatearFecha(fecha) {
        if (!fecha) return "";
        return fecha.date ? fecha.date.split(".")[0].replace("T", " ") : fecha;
    }

    function siguiente() {
        if (!actual) return;
        actual = actual.next;
        mostrarOrden();
    }

    function anterior() {
        if (!actual) return;
        actual = actual.prev;
        mostrarOrden();
    }

    fetch("api/obtenerOrdenes.php")
        .then(res => res.json())
        .then(data => {

            let lista = crearListaCircular(data);
            actual = lista;

            mostrarOrden();
        })
        .catch(err => console.error(err));

    // 🔥 AUTO CARRUSEL (opcional)
    setInterval(() => {
        siguiente();
    }, 5000);
