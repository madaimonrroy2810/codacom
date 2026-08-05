

const boton = document.querySelector("#btn-tema");
const icono = document.querySelector("#icono-tema");

boton.addEventListener("click", function () {

    document.body.classList.toggle("oscuro");

    if (document.body.classList.contains("oscuro")) {
        icono.className = "fa-solid fa-sun";
    } else {
        icono.className = "fa-solid fa-moon";
    }

});



const formulario = document.querySelector("#form-contacto");
const aviso = document.querySelector("#error-formulario");

function revisarFormulario(event) {

    event.preventDefault();

    const nombre = document.querySelector("#nombre").value;
    const email = document.querySelector("#email").value;

    if (nombre === "") {

        aviso.textContent = "Debes escribir tu nombre.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else if (email.includes("@") === false) {

        aviso.textContent = "El correo no es válido.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else {

        aviso.textContent = "¡Mensaje enviado correctamente!";
        aviso.classList.add("exito");
        aviso.classList.remove("error");

    }

}

formulario.addEventListener("submit", revisarFormulario);

