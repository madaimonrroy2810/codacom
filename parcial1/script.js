const boton = document.querySelector("#btn-confirmar");
const mensaje = document.querySelector("#mensaje");

function mostrarMensaje() {
  mensaje.textContent = "Turno recibido - te atiende Madai Alejandra Monrroy Vega";
  mensaje.classList.remove("oculto");
}

boton.addEventListener("click", mostrarMensaje);