console.clear();
const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

// Selecciona los elementos del mensaje de error
const errorMessageSignup = document.querySelector('.error-message-signup');
const errorMessageLogin = document.querySelector('.error-message-login');

function hideErrorMessages() {
  // Oculta los mensajes de error
  errorMessageSignup.style.display = 'none';
  errorMessageLogin.style.display = 'none';
}

loginBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode.parentNode;
  Array.from(e.target.parentNode.parentNode.classList).find((element) => {
    if(element !== "slide-up") {
      parent.classList.add('slide-up')
    }else{
      signupBtn.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
  hideErrorMessages(); // Oculta los mensajes de error al hacer clic
});

signupBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode;
  Array.from(e.target.parentNode.classList).find((element) => {
    if(element !== "slide-up") {
      parent.classList.add('slide-up')
    }else{
      loginBtn.parentNode.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
  hideErrorMessages(); // Oculta los mensajes de error al hacer clic
});

// Agrega controladores de eventos a los campos de entrada
document.querySelector('.signup .input[type="text"]').addEventListener('input', validateFormsignup);
document.querySelector('.signup .input[type="email"]').addEventListener('input', validateFormsignup);
document.querySelector('.signup .input[type="password"]').addEventListener('input', validateFormsignup);
document.querySelector('.login .input[type="email"]').addEventListener('input', validateFormlogin);
document.querySelector('.login .input[type="password"]').addEventListener('input', validateFormlogin);

function validateFormsignup() {
  var user = document.querySelector('.signup .input[type="text"]').value;
  var emailSignup = document.querySelector('.signup .input[type="email"]').value;
  var passwordSignup = document.querySelector('.signup .input[type="password"]').value;

  
  errorMessageSignup.textContent = ''; // Limpiar cualquier mensaje de error anterior
  errorMessageSignup.classList.remove('active'); // Ocultar el mensaje de error
  errorMessageSignup.style.display = 'none';

  // Validación para el registro
  if (user == "" || emailSignup == "" || passwordSignup == "") {
    errorMessageSignup.textContent = "Por favor, llena todos los campos";
    errorMessageSignup.classList.add('active'); // Mostrar el mensaje de error
	errorMessageSignup.style.display = 'block';
    return false;
  }

  var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!emailRegex.test(emailSignup)) {
    errorMessageSignup.textContent = "Por favor, introduce una dirección de correo electrónico válida";
    errorMessageSignup.classList.add('active'); // Mostrar el mensaje de error
	errorMessageSignup.style.display = 'block';
    return false;
  }

  if (passwordSignup.length < 8) {
    errorMessageSignup.textContent = "La contraseña debe tener al menos 8 caracteres";
    errorMessageSignup.classList.add('active'); // Mostrar el mensaje de error
	errorMessageSignup.style.display = 'block';
    return false;
  }

  return true;
}

function validateFormlogin() {
  var emailLogin = document.querySelector('.login .input[type="email"]').value;
  var passwordLogin = document.querySelector('.login .input[type="password"]').value;

  
  errorMessageLogin.textContent = ''; // Limpiar cualquier mensaje de error anterior
  errorMessageLogin.classList.remove('active'); // Ocultar el mensaje de error
  errorMessageLogin.style.display = 'none';

  // Validación para el inicio de sesión
  if (emailLogin == "" || passwordLogin == "") {
    errorMessageLogin.textContent = "Por favor, llena todos los campos";
    errorMessageLogin.classList.add('active'); // Mostrar el mensaje de error
	  errorMessageLogin.style.display = 'block';
    return false;
  }

  var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!emailRegex.test(emailLogin)) {
    errorMessageLogin.textContent = "Por favor, introduce una dirección de correo electrónico válida";
    errorMessageLogin.classList.add('active'); // Mostrar el mensaje de error
	  errorMessageLogin.style.display = 'block';
    return false;
  } 

  return true;
}

document.querySelector('.login-btn').addEventListener('click', (event) => {
	event.preventDefault(); // Evita que el formulario se envíe de la manera predeterminada
  
	// Captura los datos del formulario
  const email = document.querySelector('.login input[type="email"]').value;
  const password = document.querySelector('.login input[type="password"]').value;
  errorMessageLogin.classList.remove('active'); // Ocultar el mensaje de error
  errorMessageLogin.style.display = 'none';

  // Validar los datos del formulario
  if (!validateFormlogin()) {
    return; // Si la validación falla, detiene el proceso de envío
  }
  
	// Envía una solicitud al metodo
	fetch('./components/db/login.php', {
	  method: 'POST',
	  headers: {
		'Content-Type': 'application/json',
	  },
	  body: JSON.stringify({email,password}),
	})
	.then(response => response.json())
	.then(data => {
	  if (data.success) {
      // Inicio de sesión exitoso      
      errorMessageLogin.classList.remove('active'); // Ocultar el mensaje de error
      errorMessageLogin.style.display = 'none';     
      window.location.replace('main.php');
  } else {
		// Muestra el mensaje de error    
    errorMessageLogin.textContent = data.message;
		errorMessageLogin.classList.add('active'); // Mostrar el mensaje de error
	  errorMessageLogin.style.display = 'block';
	  }
	});
});

  document.querySelector('.signup-btn').addEventListener('click', (event) => {
    event.preventDefault(); // Evita que el formulario se envíe de la manera predeterminada
    
    // Captura los datos del formulario
    const user = document.querySelector('.signup input[type="text"]').value;
    const email = document.querySelector('.signup input[type="email"]').value;
    const password = document.querySelector('.signup input[type="password"]').value;
    errorMessageSignup.classList.remove('active'); // Ocultar el mensaje de error
    errorMessageSignup.style.display = 'none';
    // Envía una solicitud al metodo
    fetch('./components/db/register.php', {
      method: 'POST',
      headers: {
      'Content-Type': 'application/json',
      },
      body: JSON.stringify({user,email,password}),
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Inicio de sesión exitoso
        errorMessageSignup.classList.remove('active'); // Ocultar el mensaje de error
        errorMessageSignup.style.display = 'none';
        window.location.replace('main.php');
    } else {
      // Muestra el mensaje de error    
      errorMessageSignup.textContent = data.message;
      errorMessageSignup.classList.add('active'); // Mostrar el mensaje de error
      errorMessageSignup.style.display = 'block';
      }
    });
    });
  
