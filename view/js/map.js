document.addEventListener("DOMContentLoaded", () => { 

    let latitud = null;
    let longitud = null;
    let map;
    let nombre =  document.getElementById("txtNombre").value? document.getElementById("txtNombre").value:"Nueva ubicación";
    let marker = null;

    // Crear el mapa inicialmente
    map = L.map('previewMap').setView([20.1417, -101.1788], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Event listener para el cambio de latitud
    document.getElementById("txtLatitud").addEventListener("input", (e) => {
        let input = e.target.value;
        // Expresión regular para permitir números y el signo "-"
        let regex = /^-?\d*\.?\d*$/;
        if (!regex.test(input)) {
            // Si el valor no coincide con la expresión regular, eliminar el último carácter ingresado
            e.target.value = input.slice(0, -1);
        }
        latitud = parseFloat(document.getElementById("txtLatitud").value);
        if (!isNaN(latitud) && !isNaN(longitud)) {
            if (!marker) {
                // Si no existe el marcador, crearlo y añadirlo al mapa
                marker = L.marker([latitud, longitud]).addTo(map)
                    .bindPopup(nombre)
                    .openPopup();
            } else {
                // Si ya existe el marcador, actualizar su posición en el mapa
                marker.setLatLng([latitud, longitud]);
            }
            map.setView([latitud, longitud]);
        }
    });

    // Event listener para el cambio de longitud
    document.getElementById("txtLongitud").addEventListener("input", (e) => {
        let input = e.target.value;
        // Expresión regular para permitir números y el signo "-"
        let regex = /^-?\d*\.?\d*$/;
        if (!regex.test(input)) {
            // Si el valor no coincide con la expresión regular, eliminar el último carácter ingresado
            e.target.value = input.slice(0, -1);
        }
        longitud = parseFloat(document.getElementById("txtLongitud").value);
        if (!isNaN(latitud) && !isNaN(longitud)) {
            if (!marker) {
                // Si no existe el marcador, crearlo y añadirlo al mapa
                marker = L.marker([latitud, longitud]).addTo(map)
                    .bindPopup(nombre)
                    .openPopup();
            } else {
                // Si ya existe el marcador, actualizar su posición en el mapa
                marker.setLatLng([latitud, longitud]);
            }
            map.setView([latitud, longitud]);
        }
    });

    // Event listener para el cambio de nombre
    document.getElementById("txtNombre").addEventListener("input", (e) => {
        nombre = e.target.value;
        if (marker) {
            // Si existe el marcador, actualizar el contenido del popup con el nuevo nombre
            marker.setPopupContent(nombre);
        }
    });

});
