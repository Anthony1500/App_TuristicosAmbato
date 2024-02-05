  function handleButtonClick() {
    const featuresElement = document.getElementById("features");
    const home_container = document.getElementById("home_container");
    const buttonOffset = this.getBoundingClientRect().top; // 'this' se refiere al botón
  
    window.scrollTo({
      top: featuresElement.offsetTop - buttonOffset,
      behavior: "smooth"
    });
  }
  function handleButtonClick2() {
    const featuresElement = document.getElementById("features");
    const home_container = document.getElementById("home_container");
    const buttonOffset = this.getBoundingClientRect().top; // 'this' se refiere al botón
  
    window.scrollTo({
      top: home_container.offsetTop - buttonOffset,
      behavior: "smooth"
    });
  }
  
  function observeContainer(container1,container2) {
    var btn = document.getElementById("buttonhidd");
    const observer1 = new IntersectionObserver((entries, observer1) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
            btn.style.display = "";
        }
      });
    });
    const observer2 = new IntersectionObserver((entries, observer2) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
           btn.style.display = "none";
            
          }
        });
      });
  
    observer1.observe(container1);
    observer2.observe(container2);
  }
  //window.onscroll = function() {scrollFunction()};



  const container1 = document.querySelector(".home-features");
  const container2 = document.querySelector(".home-btn-group");
  // Observar el contenedor
  observeContainer(container1,container2);
  
  var button = document.querySelector(".home-btn-group button");  
  button.addEventListener("click", handleButtonClick);
  var button2 = document.getElementById("buttonhidd");
  button2.addEventListener("click", handleButtonClick2);
  
  // Obtén los contenedores
  var contenedores = document.getElementsByClassName("feature-card-feature-card");
  
  // Para cada contenedor...
  for (var i = 0; i < contenedores.length; i++) {
      // Agrega un controlador de eventos de clic
      contenedores[i].addEventListener("click", function() {
        // Aquí va el código que se ejecutará cuando se haga clic en el contenedor
        
      var modal = document.getElementById("miFrame");
      
      
      
      
      var span = document.getElementsByClassName("cerrar")[0];
    
    // Cuando el usuario haga clic en el botón, abre el modal 
      
      document.getElementById("miFrame").src = "modal/index.php";
      document.getElementById("miFrame").style.display = "block";
      //modal.style.display = "block";
      
      modal.onload = function() {
        // Accede a un elemento en la página del iframe
        
        var btn = modal.contentWindow.document.getElementById("modalclose");
        if (btn) {
          // Cuando el usuario haga clic en  (x), cierra el modal
          btn.onclick = function() {
            document.getElementById("miFrame").src = "";
            document.getElementById("miFrame").style.display = "none";
            modal.style.display = "none";
          }
        } 
          
        
      };
      
      
      
      // Cuando el usuario haga clic en cualquier lugar fuera del modal, cierra el modal
      window.onclick = function(event) {
        if (event.target == modal) {
          document.getElementById("miFrame").src = "";
          document.getElementById("miFrame").style.display = "none";
          modal.style.display = "none";
        }
      }

    });
  }
