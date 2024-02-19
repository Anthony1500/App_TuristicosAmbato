window.onload = function() {
    // Obtén el modal
    var modal = document.getElementById("myalertdialog");
  
    // Obtén el elemento <span> que cierra el modal
    var span = document.getElementsByClassName("alertClose")[0];
  
    // Verifica si el usuario ya ha visto el modal
    if (!document.cookie.split('; ').find(row => row.startsWith('modalShown='))) {
      // Si el usuario no ha visto el modal, muéstralo
      modal.style.display = "block";
      modal.classList.remove('fade-out'); // Asegúrate de que el modal sea completamente visible al inicio
  
      setTimeout(function() {
        modal.classList.add('fade-out'); // Después de 30 segundos, agrega la clase 'fade-out' para comenzar la transición
        setTimeout(function() {
          modal.style.display = "none"; // Después de la transición, cambia el estilo de visualización a 'none'
        }, 2000); // 2000 milisegundos son 2 segundos, que es la duración de la transición
      }, 5000); // 5000 milisegundos son 5 segundos
  
      // Marca el modal como mostrado
      document.cookie = "modalShown=true; expires=Fri, 31 Dec 9999 23:59:59 GMT";
    }
  
    // Cuando el usuario haga clic en <span> (x), cierra el modal
    span.onclick = function() {
      modal.style.display = "none";
    }
  }
  
  