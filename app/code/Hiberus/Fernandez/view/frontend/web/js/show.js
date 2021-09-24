const targetDiv = document.getElementById("listado-notas");
const btn = document.getElementById("toggle");
btn.onclick = function () {
    if (targetDiv.style.display !== "none") {
        targetDiv.style.display = "none";
        btn.innerText = "Mostrar listado";
    } else {
        targetDiv.style.display = "block";
        btn.innerText = "Ocultar listado";
    }
};

