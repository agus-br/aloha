
document.addEventListener("DOMContentLoaded", () => {
    
    document.getElementById("txtCorreo").addEventListener("keyup", (e) => {
        let correo = document.getElementById("txtCorreo");
        correo.parentElement.classList.remove("validado");
        let errorCorreo = document.getElementById("error-correo");
        errorCorreo.classList.remove("show");
    });

    document.getElementById("txtPassword").addEventListener("keyup", (e) => {
        let password = document.getElementById("txtPassword");
        password.parentElement.classList.remove("validado");
        let errorPassword = document.getElementById("error-password");
        errorPassword.classList.remove("show");
    });

    document.getElementById("btn-login").addEventListener("click", (e) => {
        let form = document.querySelector("form");
        
        let correo = document.getElementById("txtCorreo");
        correo.parentElement.classList.add("validado");
        let errorCorreo = document.getElementById("error-correo");
        errorCorreo.classList.remove("show");

        let password = document.getElementById("txtPassword");
        password.parentElement.classList.add("validado");
        let errorPassword = document.getElementById("error-password");
        errorPassword.classList.remove("show");

        correo.setCustomValidity("");
        password.setCustomValidity("");
        
        // Validación de la correo
        if (correo.value.length === 0) {
            correo.setCustomValidity("El correo está vacío");
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
    const emailRegex = /^[a-zA-Z._]?[a-zA-Z0-9._]+@[a-zA-Z.]*[a-zA-Z]+\.[a-zA-Z]{2,}$/;
    
    return emailRegex.test(email);
}
