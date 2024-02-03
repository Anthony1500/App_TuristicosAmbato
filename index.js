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
  // Obtener el contenedor
