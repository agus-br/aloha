let map;
let latitud = null;
let longitud = null;
let marker = null;

document.addEventListener("DOMContentLoaded", () => { 


    // Crear el mapa inicialmente
    map = L.map('mapaAlquileres').setView([20.1417, -101.1788], 15);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var botones = document.querySelectorAll('.short-list-inmuebles');

    // Iterar sobre los botones y agregar un evento de clic a cada uno
    botones.forEach(function(boton) {
        boton.addEventListener('click', function() {
            // Obtener el valor de la propiedad value del botón clicado
            var valor = this.value;

            // Dividir el valor en tres partes utilizando la coma como separador
            var partes = valor.split(',');

            // Acceder a cada parte por separado
            var nombre = partes[0]; // Nombre del inmueble
            var latitud = parseFloat(partes[1]); // Latitud
            var longitud = parseFloat(partes[2]); // Longitud

            actualizarMapa(nombre, latitud, longitud);

        });
    });

});

function actualizarMapa(nombre, latitud, longitud) {
    // Verificar que los valores de latitud y longitud sean válidos
    if (!isNaN(latitud) && !isNaN(longitud)) {
        if (!marker) {
            // Si no existe el marcador, crearlo y añadirlo al mapa
            marker = L.marker([latitud, longitud]).addTo(map)
                .bindPopup(nombre)
                .openPopup();
        } else {
            // Si ya existe el marcador, actualizar su posición en el mapa y el contenido del popup
            marker.setLatLng([latitud, longitud])
                .setPopupContent(nombre)
                .openPopup();
        }
        // Centrar el mapa en la nueva posición
        map.setView([latitud, longitud]);
    }
}
