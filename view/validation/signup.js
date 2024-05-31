
document.addEventListener("DOMContentLoaded", () => {
    
    document.getElementById("txtCorreo").addEventListener("keyup", (e) => {
        let correo = document.getElementById("txtCorreo");
        correo.parentElement.classList.remove("validado");
        let errorCorreo = document.getElementById("error-correo");
        errorCorreo.classList.remove("show");
    });

    document.getElementById("txtNombre").addEventListener("keyup", (e) => {
        let correo = document.getElementById("txtNombre");
        correo.parentElement.classList.remove("validado");
        let errorCorreo = document.getElementById("error-nombre");
        errorCorreo.classList.remove("show");
    });

    document.getElementById("txtApellidoPaterno").addEventListener("keyup", (e) => {
        let correo = document.getElementById("txtApellidoPaterno");
        correo.parentElement.classList.remove("validado");
        let errorCorreo = document.getElementById("error-apellido-paterno");
        errorCorreo.classList.remove("show");
    });

    document.getElementById("txtApellidoMaterno").addEventListener("keyup", (e) => {
        let correo = document.getElementById("txtApellidoMaterno");
        correo.parentElement.classList.remove("validado");
        let errorCorreo = document.getElementById("error-apellido-materno");
        errorCorreo.classList.remove("show");
    });

    document.getElementById("txtPassword").addEventListener("keyup", (e) => {
        let password = document.getElementById("txtPassword");
        password.parentElement.classList.remove("validado");
        let errorPassword = document.getElementById("error-password");
        errorPassword.classList.remove("show");
    });

    document.getElementById("txtPasswordConfirm").addEventListener("keyup", (e) => {
        let password = document.getElementById("txtPasswordConfirm");
        password.parentElement.classList.remove("validado");
        let errorPassword = document.getElementById("error-password-confirmation");
        errorPassword.classList.remove("show");
    });

    document.getElementById("btn-signup").addEventListener("click", (e) => {
        let form = document.querySelector("form");

        let nombre = document.getElementById("txtNombre");
        nombre.parentElement.classList.add("validado");
        let errorNombre = document.getElementById("error-nombre");
        errorNombre.classList.remove("show");

        let apellidoPaterno = document.getElementById("txtApellidoPaterno");
        apellidoPaterno.parentElement.classList.add("validado");
        let errorApellidoPaterno = document.getElementById("error-apellido-paterno");
        errorApellidoPaterno.classList.remove("show");

        let apellidoMaterno = document.getElementById("txtApellidoMaterno");
        apellidoMaterno.parentElement.classList.add("validado");
        let errorApellidoMaterno = document.getElementById("error-apellido-materno");
        errorApellidoMaterno.classList.remove("show");
        
        let correo = document.getElementById("txtCorreo");
        correo.parentElement.classList.add("validado");
        let errorCorreo = document.getElementById("error-correo");
        errorCorreo.classList.remove("show");

        let password = document.getElementById("txtPassword");
        password.parentElement.classList.add("validado");
        let errorPassword = document.getElementById("error-password");
        errorPassword.classList.remove("show");

        let passwordConfirmation = document.getElementById("txtPasswordConfirm");
        password.parentElement.classList.add("validado");
        let errorPasswordConfirmation = document.getElementById("error-password-confirmation");
        errorPassword.classList.remove("show");

        
        nombre.setCustomValidity("");
        apellidoPaterno.setCustomValidity("");
        apellidoMaterno.setCustomValidity("");
        correo.setCustomValidity("");
        password.setCustomValidity("");
        passwordConfirmation.setCustomValidity("");
        
        //Validación del nombre
        if (nombre.value.length === 0) {
            nombre.setCustomValidity("El nombre es un campo obligatorio");
            errorNombre.innerText = "El nombre es un campo obligatorio"
            errorNombre.classList.add("show");
            
        } else if (!validarNombre(nombre.value.trim())) {
            nombre.setCustomValidity("El nombre no cumple con el formato");
            errorNombre.innerText = "El nombre no cumple con el formato"
            errorNombre.classList.add("show");
            console.log("Error de validación del nombre");
        }

        //Validación del apellido paterno
        if (apellidoPaterno.value.length === 0) {
            apellidoPaterno.setCustomValidity("El apellido paterno es un campo obligatorio");
            errorApellidoPaterno.innerText = "El apellido paterno es un campo obligatorio"
            errorApellidoPaterno.classList.add("show");
            
        } else if (!validarNombre(apellidoPaterno.value.trim())) {
            apellidoPaterno.setCustomValidity("El apellido paterno no cumple con el formato");
            errorApellidoPaterno.innerText = "El apellido paterno no cumple con el formato"
            errorApellidoPaterno.classList.add("show");
            console.log("Error de validación del apellido paterno");
        }

        //Validación del apellido paterno
        if (apellidoMaterno.value.length === 0) {
            apellidoMaterno.setCustomValidity("El apellido materno es un campo obligatorio");
            errorApellidoMaterno.innerText = "El apellido materno es un campo obligatorio"
            errorApellidoMaterno.classList.add("show");
            
        } else if (!validarNombre(apellidoMaterno.value.trim())) {
            apellidoMaterno.setCustomValidity("El apellido materno no cumple con el formato");
            errorApellidoMaterno.innerText = "El apellido materno no cumple con el formato"
            errorApellidoMaterno.classList.add("show");
            console.log("Error de validación del apellido materno");
        }

        // Validación de la correo
        if (correo.value.length === 0) {
            correo.setCustomValidity("El correo es un campo obligatorio");
            errorCorreo.innerText = "El correo es un campo obligatorio"
            errorCorreo.classList.add("show");
            
        } else if (!validarCorreo(correo.value)) {
            correo.setCustomValidity("El correo no cumple con el formato");
            errorCorreo.innerText = "El correo no cumple con el formato"
            errorCorreo.classList.add("show");
            console.log("Error de validación de correo");
        }

       if (password.value.length === 0) {
            password.setCustomValidity("La contraseña está vacía");
            errorPassword.innerText = "La contraseña es un campo obligatorio"
            errorPassword.classList.add("show");
        }

        if (!validarContrasena(password.value, passwordConfirmation.value) || password.value.trim().length == 0) {
            passwordConfirmation.setCustomValidity("Las contraseñas no coinciden");
            errorPasswordConfirmation.innerText = "Las contraseñas no coinciden"
            errorPasswordConfirmation.classList.add("show");
        }

        if (form.checkValidity()) {
            console.log("Todo bien");
        } else {
            console.log("Hubo un error de validación");
            e.preventDefault();
            return
        }    
    });

});

function validarCorreo(email) {
    const emailRegex = /^[a-zA-Z0-9._]*[a-zA-Z.]+@[a-zA-Z.]*[a-zA-Z]+\.[a-zA-Z]{2,}$/;
    
    return emailRegex.test(email);
}

function validarContrasena(pass1, pass2) {
   return  pass1==pass2
}

function validarNombre(cadena) {
    // Expresión regular para verificar el formato del nombre o apellido
    const regex = /^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]*(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]*)*$/;
    // Verifica si la cadena coincide con el formato
    return regex.test(cadena);
}