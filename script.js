const boton = document.querySelector("#btn-tema");
const icono = document.querySelector("#icono-tema");

boton.addEventListener("click", function () {

    document.body.classList.toggle("oscuro");

    if(document.body.classList.contains("oscuro")){
        icono.className = "fa-solid fa-sun";
    }else{
        icono.className = "fa-solid fa-moon";
    }

});