const boton = document.querySelector("#btn-tema");
const icono = document.querySelector("#icono-tema");

if (boton) {
    boton.addEventListener("click", function () {

        document.body.classList.toggle("oscuro");

        if (document.body.classList.contains("oscuro")) {
            icono.className = "fa-solid fa-sun";
        } else {
            icono.className = "fa-solid fa-moon";
        }

    });
}


const formulario = document.querySelector("#form-contacto");
const aviso = document.querySelector("#error-formulario");

function revisarFormulario(event) {

    const nombre = document.querySelector("#nombre").value;
    const email = document.querySelector("#email").value;

    if (nombre === "") {

        aviso.textContent = "Debes escribir tu nombre.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
        event.preventDefault();

    } else if (email.includes("@") === false) {

        aviso.textContent = "El correo no es válido.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
        event.preventDefault();

    }
    // Si todo está bien, se deja pasar el submit normal:
    // el formulario viaja de verdad a Laravel (ruta POST /contacto).

}

// Este formulario solo existe en la vista contacto.blade.php,
// por eso se valida que exista antes de engancharle el evento
// (script.js es compartido por todas las páginas del layout).
if (formulario) {
    formulario.addEventListener("submit", revisarFormulario);
}