const video = document.querySelector("#video");
const canvas = document.querySelector("#canvas");
const btnCapturar = document.querySelector("#btn-capturar");
const instruccion = document.querySelector("#instruccion");

// este script solo corre en la página de registro
if (video && btnCapturar) {

    const pasos = ["carnet", "frente", "izquierda", "derecha"];
const instrucciones = {
    carnet: "Paso 1 de 4: muestra tu carnet frente a la cámara",
    frente: "Paso 2 de 4: ahora mira de frente a la cámara",
    izquierda: "Paso 3 de 4: gira tu rostro hacia la izquierda",
    derecha: "Paso 4 de 4: gira tu rostro hacia la derecha"
};

    let pasoActual = 0;

    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            video.srcObject = stream;
        })
        .catch(function () {
            alert("Necesitamos acceso a tu cámara para verificarte.");
        });

    btnCapturar.addEventListener("click", function () {
        const pasoNombre = pasos[pasoActual];

        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext("2d").drawImage(video, 0, 0);

        const foto = canvas.toDataURL("image/jpeg", 0.8);

        document.querySelector("#foto_" + pasoNombre).value = foto;

        const preview = document.querySelector("#preview-" + pasoNombre);
        preview.src = foto;
        preview.style.display = "inline-block";

        pasoActual++;

        if (pasoActual < pasos.length) {
            instruccion.textContent = instrucciones[pasos[pasoActual]];
        } else {
            instruccion.textContent = "Las 3 fotos fueron capturadas";
            btnCapturar.disabled = true;
            video.srcObject.getTracks().forEach(function (track) {
                track.stop();
            });
        }
    });
}
