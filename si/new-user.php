<?php
session_start();
require_once 'class/dbhandler.php';

$mysqli = new dbhandler();
//comprueba si está activa una sesión
include 'checkSession.php';
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<title>Inicio</title>
	</head>

<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills p-3 float-right">		
					<li class="nav-item">
						<a class="nav-link" href="catalog.php">Catálogo<span class="sr-only">(current)</span></a>
					</li>
					<?php if($sessionActiva) {?>
					<li class="nav-item">
						<a class="nav-link" href="perfil.php">Perfil</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="#">Contacto</a>
					</li>
					<li class="nav-item">
						<?php
						if($sessionActiva==true){
						echo '<a class="nav-link" href="salir.php">Salir</a>';
						}else{
						echo '<a class="nav-link active" href="new-user.php">Sign Up</a>';
						}
						?>
					</li>
				</ul>
			</nav>
		<h1 class="text-muted p-2"><a class="nav-link" href="index.php">Electronix</a></h1>
		</div>
		
		<?php
		if(!$sessionActiva){
		?>
			<div class="jumbotron">
				<div class="container text-center">
					<h2 class="display-3">Crear cuenta</h2>
					<?php
					if($_GET['error']==true){
					?>
					<p class="lead">Ya existe el email introducido, pruebe con otro.</p>
					<?php
					}else{
					?>
					<p class="lead">Rellena el formulario para crear una cuenta</p>
					<?php
					}
					?>
				</div>
				<form class="form-signin" method="POST" action="procesa_signup.php">
					
					<div class="form-group row">
						<label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
						<div class="col-sm-10">
							<input type="text" name="usuario" class="form-control" id="usuario" placeholder="Login" required autofocus>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
						<div class="col-sm-10">
							<input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="birth" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
						<div class="col-sm-10">
							<input type="date" name="birth" class="form-control" id="birth" placeholder="dd/mm/aaaa" data-validation="date" data-validation-format="dd/mm/yyyy" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="password" class="col-sm-2 col-form-label">Contraseña</label>
						<div class="col-sm-10">
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="password2" class="col-sm-2 col-form-label">Re-Contraseña</label>
						<div class="col-sm-10">
							<input type="password" name="password2" class="form-control" id="password2" placeholder="Re-Password" required>
						</div>
					</div>
					
					<div class="row justify-content-md-center">
							<input type="submit" value="Crear cuenta" class="btn btn-primary">							
					</div>
				</form>
			</div>
		<?php
			}else {
			?>
				<div class="jumbotron">
					<div class="container text-center">
						<h2 class="display-3">Crear cuenta</h2>
						<p class="lead">No puedes crear una cuenta si estás usando una.</p>
					</div>
				</div>
			<?php
			}
		?>
		</div>
	</body>
	<script>
	var password = document.getElementById("password") , confirm_password = document.getElementById("password2");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Contraseñas no coinciden");
	  } else {
		confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	</script>
	<!--
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script>
	  $.validate({
		lang: 'es'
	  });
	</script>
	-->
</html>
