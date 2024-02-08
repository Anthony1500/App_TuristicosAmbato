// Obtener la URL actual
var url = window.location.href;
// Crea un objeto URL
var urlObj = new URL(url);
// Obtén el parámetro de consulta 'titulo' y 'imagen'
var id = urlObj.searchParams.get("id");
var titulo = urlObj.searchParams.get("titulo");
var nombre = urlObj.searchParams.get("nombre");
var imagen = urlObj.searchParams.get("imagen");

// Obtener el elemento <h1>
var h1text = document.querySelector(".modal-container-title span");
var h1imagen = document.querySelector(".modal-container-title img");


// Imprime
if(titulo !== null) {
    h1text.textContent = nombre;
    titulo = titulo.trim();
    switch (titulo) {
        case 'Parques':
            h1imagen.src = '../icons/park.png'; // Ruta a la imagen de Parques
            break;
        case 'Iglesias':
            h1imagen.src = '../icons/church.png'; // Ruta a la imagen de Iglesias
            break;
        case 'Museos':
            h1imagen.src = '../icons/colonial.png'; // Ruta a la imagen de Museos
            break;
        case 'Restaurantes':
            h1imagen.src = '../icons/fast-food.png'; // Ruta a la imagen de Restaurantes
            break;
        default:
            h1imagen.src = "../icons/noimagen.png"; // Ruta a la imagen por defecto
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST",'index.php',true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        
    }
    xhr.send("id=" + id);
} else {
    
}


    
    
