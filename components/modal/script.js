// Obtener la URL actual
var url = window.location.href;
// Crea un objeto URL
var urlObj = new URL(url);
// Obtén el parámetro de consulta 'titulo' y 'imagen'
var titulo = urlObj.searchParams.get("titulo");
var imagen = urlObj.searchParams.get("imagen");

// Obtener el elemento <h1>
var h1text = document.querySelector(".modal-container-title span");
var h1imagen = document.querySelector(".modal-container-title img");

    


// Imprime
if(titulo !== null) {
    h1text.textContent = titulo;
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'index.php',true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        
    }
    xhr.send("titulo=" + titulo);
} else {
    h1text.textContent = "Sin texto"; 
}

// Verifica si la imagen es null
if(imagen !== null) {
    h1imagen.src = imagen;
} else {
    h1imagen.src = "../icons/noimagen.png"; 

}

var modal = document.getElementById("miFrame")

  function abrirIframe(id,nombre) {       
     modal.style.display = "block";       
     modal.src = "../info_modal/index.php?id=" + encodeURIComponent(id) + "&titulo=" + encodeURIComponent(titulo)+ "&nombre=" + encodeURIComponent(nombre);
      
  }


  document.addEventListener("DOMContentLoaded", function() {
    

    modal.onload = function() {
        var btn = modal.contentWindow.document.getElementById("modalclose");

        if (btn) {
            btn.onclick = function() {
                modal.src = "";
                modal.style.display = "none";
                document.body.style.overflow = "auto";
            }
        } 
    };
});

//**************************************************************

var tituloRaw = urlObj.searchParams.get("titulo");
var titulo = tituloRaw !== null ? tituloRaw.trim() : null;
var contenedor = document.querySelector(".modal-container-body");
var fondos = {
  'Parques': 'url("../imagenes/parque2.jpg")',
  'Iglesias': 'url("../imagenes/iglesia3.jpg")',
  'Museos': 'url("../imagenes/museos6.jpg")',
  'Restaurantes': 'url("../imagenes/restaurante3.jpg")',
  'Eventos Festivos': 'url("../imagenes/fiestas1.jpg")',
  'default': '#ffffffcc'
};
if(titulo in fondos) {
  contenedor.style.backgroundImage = fondos[titulo];
} else {
  contenedor.style.backgroundImage = fondos['default'];
}