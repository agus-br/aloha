document.addEventListener("DOMContentLoaded", () => {
    
    document.getElementById("txtNombre").addEventListener("keyup", (e) => {
         if (e.code == 'Tab') return;
        let nombre = document.getElementById("txtNombre");
        nombre.parentElement.classList.remove("validado");
        let errorNombre = document.getElementById("error-nombre");
        errorNombre.classList.remove("show");
    });

    document.getElementById("txtTelefono").addEventListener("keyup", (e) => {
        if (e.code == 'Tab') return;
        let telefono = document.getElementById("txtTelefono");
        telefono.parentElement.classList.remove("validado");
        let errorTelefono = document.getElementById("error-telefono");
        errorTelefono.classList.remove("show");
    });

    document.getElementById("txtPrecio").addEventListener("keyup", (e) => {
        let precio = document.getElementById("txtPrecio");
        precio.parentElement.classList.remove("validado");
        let errorPrecio = document.getElementById("error-precio");
        errorPrecio.classList.remove("show");
    });

    var radiobuttons = document.getElementsByName('rbtnEstatus');
    
    // Asignar un evento 'change' a cada radiobutton
    radiobuttons.forEach(function(radiobutton) {
        radiobutton.addEventListener('change', function() {
            let errorEstatus = document.getElementById("error-estatus");
            errorEstatus.classList.remove("show");
        });
    });

    document.getElementById("txtaDescripcion").addEventListener("keyup", (e) => {
       
        let descripcion = document.getElementById("txtaDescripcion");
        descripcion.parentElement.classList.remove("validado");
        let errorDescripcion = document.getElementById("error-descripcion");
        errorDescripcion.classList.remove("show");
    });

    document.getElementById("txtEstado").addEventListener("keyup", (e) => {
        document.getElementById("txtEstado").parentElement.classList.remove("validado");
        document.getElementById("error-estado").classList.remove("show");
    });

    document.getElementById("txtMunicipio").addEventListener("keyup", (e) => {
        document.getElementById("txtMunicipio").parentElement.classList.remove("validado");
        document.getElementById("error-municipio").classList.remove("show");
    });

    document.getElementById("txtColonia").addEventListener("keyup", (e) => {
        document.getElementById("txtColonia").parentElement.classList.remove("validado");
        document.getElementById("error-colonia").classList.remove("show");
    });

    document.getElementById("txtDireccion").addEventListener("keyup", (e) => {
        document.getElementById("txtDireccion").parentElement.classList.remove("validado");
        document.getElementById("error-direccion").classList.remove("show");
    });

    document.getElementById("txtLatitud").addEventListener("keyup", (e) => {
        document.getElementById("txtLatitud").parentElement.classList.remove("validado");
        document.getElementById("error-latitud").classList.remove("show");
    });

    document.getElementById("txtLongitud").addEventListener("keyup", (e) => {
        document.getElementById("txtLongitud").parentElement.classList.remove("validado");
        document.getElementById("error-longitud").classList.remove("show");
    });

    document.getElementById("txtPrecio").addEventListener("input", (e) => {
        let input = e.target.value;
        // Expresión regular para permitir números y el signo "-"
        let regex = /^\d*\.?\d*$/;
        if (!regex.test(input)) {
            // Si el valor no coincide con la expresión regular, eliminar el último carácter ingresado
            e.target.value = input.slice(0, -1);
        }
    });

    document.getElementById("txtTelefono").addEventListener("input", (e) => {
        let input = e.target.value;
        // Expresión regular para permitir números y el signo "-"
        let regex = /^\d*$/;
        if (!regex.test(input)) {
            // Si el valor no coincide con la expresión regular, eliminar el último carácter ingresado
            e.target.value = input.slice(0, -1);
        }
    });

    
    document.getElementById("btn-guardar").addEventListener("click", (e) => {
        let form = document.querySelector("form");
        
        let nombre = document.getElementById("txtNombre");
        nombre.parentElement.classList.add("validado");
        let errorNombre = document.getElementById("error-nombre");
        errorNombre.classList.remove("show");

        let telefono = document.getElementById("txtTelefono");
        telefono.parentElement.classList.add("validado");
        let errorTelefono = document.getElementById("error-telefono");
        errorTelefono.classList.remove("show");

        let precio = document.getElementById("txtPrecio");
        precio.parentElement.classList.add("validado");
        let errorPrecio = document.getElementById("error-precio");
        errorPrecio.classList.remove("show");

        let descripcion = document.getElementById("txtaDescripcion");
        descripcion.parentElement.classList.add("validado");
        let errorDescripcion = document.getElementById("error-descripcion");
        errorDescripcion.classList.remove("show");

        let estado = document.getElementById("txtEstado");
        estado.parentElement.classList.add("validado");
        let errorEstado = document.getElementById("error-estado");
        errorEstado.classList.remove("show");

        let municipio = document.getElementById("txtMunicipio");
        municipio.parentElement.classList.add("validado");
        let errorMunicipio = document.getElementById("error-municipio");
        errorMunicipio.classList.remove("show");

        let colonia = document.getElementById("txtColonia");
        colonia.parentElement.classList.add("validado");
        let errorColonia = document.getElementById("error-colonia");
        errorColonia.classList.remove("show");

        let direccion = document.getElementById("txtDireccion");
        direccion.parentElement.classList.add("validado");
        let errorDireccion = document.getElementById("error-direccion");
        errorDireccion.classList.remove("show");

        let latitud = document.getElementById("txtLatitud");
        latitud.parentElement.classList.add("validado");
        let errorLatitud = document.getElementById("error-latitud");
        errorLatitud.classList.remove("show");

        let longitud = document.getElementById("txtLongitud");
        longitud.parentElement.classList.add("validado");
        let errorLongitud = document.getElementById("error-longitud");
        errorLongitud.classList.remove("show");
        
        nombre.setCustomValidity("");
        telefono.setCustomValidity("");
        precio.setCustomValidity("");
        descripcion.setCustomValidity("");
        estado.setCustomValidity("");
        municipio.setCustomValidity("");
        colonia.setCustomValidity("");
        direccion.setCustomValidity("");
        latitud.setCustomValidity("");
        longitud.setCustomValidity("");
        
        // Validación de la nombre
        if (nombre.value.length === 0) {
            nombre.setCustomValidity("El nombre es un campo obligatorio");
            errorNombre.innerText = "El nombre es un campo obligatorio"
            errorNombre.classList.add("show");
            
        } else if (nombre.value.length > 50) {
            nombre.setCustomValidity("El nombre no puede tener más de 50 caracteres");
            errorNombre.innerText = "El nombre no puede tener más de 50 caracteres"
            errorNombre.classList.add("show");
            console.log("Error de validación de nombre");
        }

       if (telefono.value.length === 0) {
            telefono.setCustomValidity("El telefono es un campo obligatorio");
            errorTelefono.innerText = "El telefono es un campo obligatorio"
            errorTelefono.classList.add("show");
            
        } else if (telefono.value.length > 10) {
            telefono.setCustomValidity("El telefono no puede tener más de 10 dígitos");
            errorTelefono.innerText = "El telefono no puede tener más de 10 dígitos"
            errorTelefono.classList.add("show");
            console.log("Error de validación de telefono");
        } else if (!esNumeroDeTelefono(telefono.value.trim())) {
            telefono.setCustomValidity("El telefono no cumple con el formato");
            errorTelefono.innerText = "El telefono no cumple con el formato"
            errorTelefono.classList.add("show");
            console.log("Error de validación de telefono");
        }

        if (precio.value.length === 0) {
            precio.setCustomValidity("El precio es un campo obligatorio");
            errorPrecio.innerText = "El precio es un campo obligatorio"
            errorPrecio.classList.add("show");
            
        } else if (!esPrecio(precio.value.trim())) {
            precio.setCustomValidity("El precio no cumple con el formato XX.XX");
            errorPrecio.innerText = "El precio no cumple con el formato XX.XX"
            errorPrecio.classList.add("show");
            console.log("Error de validación de precio");
        } else if (parseFloat(precio.value) > 50000) {
            precio.setCustomValidity("El precio no puede ser mayor a 50000");
            errorPrecio.innerText = "El precio no puede ser mayor a 50000"
            errorPrecio.classList.add("show");
            console.log("Error de validación de precio");
        }

        if (descripcion.value.length > 500) {
            descripcion.setCustomValidity("La descripción no puede tener más de 500 caracteres");
            errorDescripcion.innerText = "La descripción no puede tener más de 500 caracteres"
            errorDescripcion.classList.add("show");
        }

        if (estado.value.length === 0) {
            estado.setCustomValidity("El estado es un campo obligatorio");
            errorEstado.innerText = "El estado es un campo obligatorio"
            errorEstado.classList.add("show");
            
        } else if (estado.value.length > 50) {
            estado.setCustomValidity("El estado no puede tener más de 50 caracteres");
            errorEstado.innerText = "El estado no puede tener más de 50 caracteres"
            errorEstado.classList.add("show");
            console.log("Error de validación de Estado");
        }

        if (estado.value.length === 0) {
            estado.setCustomValidity("El estado es un campo obligatorio");
            errorEstado.innerText = "El estado es un campo obligatorio"
            errorEstado.classList.add("show");
            
        } else if (estado.value.length > 50) {
            estado.setCustomValidity("El estado no puede tener más de 50 caracteres");
            errorEstado.innerText = "El estado no puede tener más de 50 caracteres"
            errorEstado.classList.add("show");
            console.log("Error de validación de Estado");
        }

        if (municipio.value.length === 0) {
            municipio.setCustomValidity("El municipio es un campo obligatorio");
            errorMunicipio.innerText = "El municipio es un campo obligatorio"
            errorMunicipio.classList.add("show");
            
        } else if (municipio.value.length > 50) {
            municipio.setCustomValidity("El municipio no puede tener más de 50 caracteres");
            errorMunicipio.innerText = "El municipio no puede tener más de 50 caracteres"
            errorMunicipio.classList.add("show");
            console.log("Error de validación de municipio");
        }    

        if (colonia.value.length === 0) {
            colonia.setCustomValidity("El colonia es un campo obligatorio");
            errorColonia.innerText = "El colonia es un campo obligatorio"
            errorColonia.classList.add("show");
            
        } else if (colonia.value.length > 50) {
            colonia.setCustomValidity("El colonia no puede tener más de 50 caracteres");
            errorColonia.innerText = "El colonia no puede tener más de 50 caracteres"
            errorColonia.classList.add("show");
            console.log("Error de validación de colonia");
        }   

        if (direccion.value.length === 0) {
            direccion.setCustomValidity("El direccion es un campo obligatorio");
            errorDireccion.innerText = "El direccion es un campo obligatorio"
            errorDireccion.classList.add("show");
            
        } else if (direccion.value.length > 50) {
            direccion.setCustomValidity("El direccion no puede tener más de 50 caracteres");
            errorDireccion.innerText = "El direccion no puede tener más de 50 caracteres"
            errorDireccion.classList.add("show");
            console.log("Error de validación de direccion");
        }  
        
        if (latitud.value.length === 0) {
            latitud.setCustomValidity("El latitud es un campo obligatorio");
            errorLatitud.innerText = "El latitud es un campo obligatorio"
            errorLatitud.classList.add("show");
        } else if (!esCoordenada(latitud.value.trim())) {
                latitud.setCustomValidity("La latitud no cumple con el formato de coordenada");
                errorLatitud.innerText = "La latitud no cumple con el formato de coordenada"
                errorLatitud.classList.add("show");
                console.log("Error de validación de latitud");
        } else if (parseFloat(latitud.value.trim()) > 90) {
                latitud.setCustomValidity("La latitud no puede ser mayor a 90");
                errorLatitud.innerText = "La latitud no puede ser mayor a 90"
                errorLatitud.classList.add("show");
                console.log("Error de validación de latitud");
        } else if (latitud.value.length > 50) {
            latitud.setCustomValidity("El latitud no puede tener más de 50 caracteres");
            errorLatitud.innerText = "El latitud no puede tener más de 50 caracteres"
            errorLatitud.classList.add("show");
            console.log("Error de validación de latitud");
        }  

        if (longitud.value.length === 0) {
            longitud.setCustomValidity("El longitud es un campo obligatorio");
            errorLongitud.innerText = "El longitud es un campo obligatorio"
            errorLongitud.classList.add("show");
            
        } else if (!esCoordenada(longitud.value.trim())) {
            longitud.setCustomValidity("La longitud no cumple con el formato de coordenada");
            errorLongitud.innerText = "La longitud no cumple con el formato de coordenada"
            errorLongitud.classList.add("show");
            console.log("Error de validación de longitud");
        } else if (parseFloat(longitud.value.trim()) > 90) { 
            longitud.setCustomValidity("La longitud no puede ser mayor a 90");
            errorLongitud.innerText = "La longitud no puede ser mayor a 90"
            errorLongitud.classList.add("show");
            console.log("Error de validación de longitud");
        }else if (longitud.value.length > 50) {
            longitud.setCustomValidity("El longitud no puede tener más de 50 caracteres");
            errorLongitud.innerText = "El longitud no puede tener más de 50 caracteres"
            errorLongitud.classList.add("show");
            console.log("Error de validación de longitud");
        } 

        let radiobuttons = document.getElementsByName('rbtnEstatus');
        var seleccionado = false;

        // Iterar sobre los radiobuttons y verificar si alguno está seleccionado
        for (var i = 0; i < radiobuttons.length; i++) {
            if (radiobuttons[i].checked) {
                seleccionado = true;
                break; // Se encontró al menos uno seleccionado, salir del bucle
            }
        }
        // Mostrar mensaje de validación
        if (!seleccionado) {
            let errorEstatus = document.getElementById("error-estatus");
            errorEstatus.innerText = "El estatus es un campo obligatorio"
            errorEstatus.classList.add("show");
        }

        if (form.checkValidity()) {
            console.log("Todo bien");
        } else {
            console.log("Hubo un error de validación");
            e.preventDefault();
            return
        }    
        //e.preventDefault();
    });

});

function esNumeroDeTelefono(cadena) {
  // Expresión regular para verificar si la cadena contiene exactamente 10 dígitos
  var expresionRegular = /^\d{10}$/;
  // Verificar si la cadena coincide con la expresión regular
  return expresionRegular.test(cadena);
}

function esPrecio(cadena) {
  // Expresión regular para verificar si la cadena sigue el formato  XX.XX
  var expresionRegular = /^\d+(\.\d{1,2})?$/;
  // Verificar si la cadena coincide con la expresión regular
  return expresionRegular.test(cadena);
}

function esCoordenada(cadena) {
  // Expresión regular para verificar si la cadena sigue el formato  XX.XX
  var expresionRegular = /^-?\d+(\.\d+)?$/;
  // Verificar si la cadena coincide con la expresión regular
  return expresionRegular.test(cadena);
}