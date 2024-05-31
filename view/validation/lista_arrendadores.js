document.addEventListener("DOMContentLoaded", () => {
    new DataTable('#tblUsuarios');

    document.getElementById("mdlEliminar").addEventListener('shown.bs.modal', (e) => {
        let alert = document.querySelector(".alert");
        if (alert) {
            alert.remove();
        }
        let id = e.relatedTarget.value;
        let nombre=e.relatedTarget.getAttribute("nombre");
        document.getElementById("btnEliminar").value=id;
        document.getElementById("UsuarioEliminar").innerText=nombre;
    });

    document.getElementById("mdlVerificar").addEventListener('shown.bs.modal', (e) => {
        let alert = document.querySelector(".alert");
        if (alert) {
            alert.remove();
        }
        let id = e.relatedTarget.value;
        let nombre=e.relatedTarget.getAttribute("nombre");
        document.getElementById("btnVerificar").value=id;
        document.getElementById("verificarUsuario").innerText=nombre;
    });
});

