const URL = "/area";

document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("btnRegistrar").addEventListener("click", registrar);
    document.getElementById("btnListar").addEventListener("click", listar);

    listar(); // carga inicial
});

function registrar() {
    let area_nombre = document.getElementById("nombre").value;

    fetch(URL + "/registrar", {
        method: "POST",
        credentials: "same-origin", // 🔥 SOLUCIÓN 1 (evita 302 por sesión)
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ area_nombre })
    })
    .then(async res => {
        const text = await res.text();

        try {
            return JSON.parse(text);
        } catch (e) {
            console.error("Respuesta no JSON (registrar):", text);
            throw e;
        }
    })
    .then(data => {
        alert(data.mensaje);
        listar();
    })
    .catch(err => console.error(err));
}

function listar() {
    fetch(URL + "/listar", {
        method: "POST",
        credentials: "same-origin", // 🔥 SOLUCIÓN 1 aplicada también aquí
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(async res => {
        const text = await res.text();

        try {
            return JSON.parse(text);
        } catch (e) {
            console.error("Respuesta no JSON (listar):", text);
            throw e;
        }
    })
    .then(data => {

        let tabla = document.getElementById("tablaAreas");
        tabla.innerHTML = "";

        let areas = Array.isArray(data.mensaje) ? data.mensaje : [];

        areas.forEach(area => {
            tabla.innerHTML += `
                <tr>
                    <td>${area.area_codigo}</td>
                    <td>${area.nombre}</td>
                    <td>
                        <button onclick="eliminar('${area.area_codigo}')">Eliminar</button>
                    </td>
                </tr>
            `;
        });
    })
    .catch(err => console.error(err));
}

function eliminar(id) {
    fetch(URL + "/eliminar", {
        method: "POST",
        credentials: "same-origin", // 🔥
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ area_codigo: id })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.mensaje);
        listar();
    })
    .catch(err => console.error(err));
}

function recuperar(id) {
    fetch(URL + "/recuperar", {
        method: "POST",
        credentials: "same-origin", // 🔥
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ area_codigo: id })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.mensaje);
        listar();
    })
    .catch(err => console.error(err));
}

function listarEliminado() {
    fetch(URL + "/listarEliminado", {
        method: "POST",
        credentials: "same-origin", // 🔥
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(data => {

        let tabla = document.getElementById("tablaAreas");
        tabla.innerHTML = "";

        let areas = Array.isArray(data.mensaje) ? data.mensaje : [];

        areas.forEach(area => {
            tabla.innerHTML += `
                <tr>
                    <td>${area.area_codigo}</td>
                    <td>${area.nombre}</td>
                    <td>
                        <button onclick="recuperar('${area.area_codigo}')">Recuperar</button>
                    </td>
                </tr>
            `;
        });
    })
    .catch(err => console.error(err));
}