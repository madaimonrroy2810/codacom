const formulario = document.querySelector("#form-cita");
const aviso = document.querySelector("#aviso-cita");

function revisarFormularioCita(event) {

    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;

    if (nombre === "" || correo === "") {

        aviso.textContent = "Completa tu nombre y tu correo para reservar la cita.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
        event.preventDefault();

    } else if (correo.includes("@") === false) {

        aviso.textContent = "Ese correo está mal escrito: le falta el arroba.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
        event.preventDefault();

    } else {

        aviso.textContent = "Cita reservada - te atiende Madai Alejandra Monrroy Vega";
        aviso.classList.add("exito");
        aviso.classList.remove("error");

    }

}

formulario.addEventListener("submit", revisarFormularioCita);