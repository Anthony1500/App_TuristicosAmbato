<!DOCTYPE html>
<html lang="es" >
<head>
<title>Ambato Paraíso Escondido</title>
<meta property="og:title" content="Assured Visible Eagle" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="utf-8" />
<meta property="twitter:card" content="summary_large_image" />
<link rel="icon" href="components/imagenes/logo.png"/> 
<link rel="stylesheet" href="./index.css">
<link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="form-structor">
	<video playsinline autoplay muted loop>
		<source src="./components/video/Ambato.mp4" type="video/mp4">
	  </video>
	  <form>
	<div class="signup">
		<h2 class="form-title" id="signup"><span>o</span>Regístrate</h2>
		<div class="form-holder">
			<input type="text" class="input" placeholder="Usuario" />
			<input type="email" class="input" placeholder="Correo" />
			<input type="password" class="input" placeholder="Contraseña" />			
		</div>
		<div class="error-message-signup" style="color: red;"></div>
		<button class="submit-btn signup-btn">Registrarse</button>
	</div>
	</form>
	
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>o</span>Inicia sesión</h2>
			<div class="form-holder">
				<input type="email" class="input" placeholder="Correo" />
				<input type="password" class="input" placeholder="Contraseña" />						
			</div>
			<div class="error-message-login" style="color: red;"></div>	
			<button class="submit-btn login-btn">Acceder</button>
		</div>
	</div>
	
</div>


  <script  src="./index.js"></script>

</body>
</html>
