  <!-- Botón que abre el modal -->
  <button id="miBoton">Abrir Modal</button>

<!-- El Modal -->
<div id="miModal" class="modal">
  <!-- Contenido del Modal -->
  <div class="modal-contenido">
    <span class="cerrar">&times;</span>
    <iframe id="miFrame" src="" style="display:none"></iframe>
  </div>
</div>

<!-- CSS para el modal -->
<style>
/* ... tus estilos de modal aquí ... */
</style>

<!-- JavaScript para manejar el modal -->
<script>
// Obtén el modal
var modal = document.getElementById("miModal");

// Obtén el botón que abre el modal
var btn = document.getElementById("miBoton");

// Obtén el elemento <span> que cierra el modal
var span = document.getElementsByClassName("cerrar")[0];

// Cuando el usuario haga clic en el botón, abre el modal 
btn.onclick = function() {
  document.getElementById("miFrame").src = "modal/index.html";
  document.getElementById("miFrame").style.display = "block";
  modal.style.display = "block";
}

// Cuando el usuario haga clic en <span> (x), cierra el modal
span.onclick = function() {
  document.getElementById("miFrame").src = "";
  document.getElementById("miFrame").style.display = "none";
  modal.style.display = "none";
}

// Cuando el usuario haga clic en cualquier lugar fuera del modal, cierra el modal
window.onclick = function(event) {
  if (event.target == modal) {
    document.getElementById("miFrame").src = "";
    document.getElementById("miFrame").style.display = "none";
    modal.style.display = "none";
  }
}
</script>