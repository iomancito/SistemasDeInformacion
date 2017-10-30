<?php
session_start();
include 'dbData.php';
include 'user.php';
if(isset($_SESSION['user'])) {
	$sessionActiva = true;
}else {
	$sessionActiva = false;
}
$user = $_SESSION['user'];
$user = unserialize($user);
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
					<li class="nav-item">
						<a class="nav-link active" href="perfil.php">Perfil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contacto.php">Contacto</a>
					</li>
					<li class="nav-item">
						<?php
						if($sessionActiva){
						echo '<a class="nav-link" href="salir.php">Salir</a>';
						}else{
						echo '<a class="nav-link" href="new-user.php">Sign Up</a>';
						}
						?>
					</li>
				</ul>
			</nav>
		
		<h1 class="text-muted p-2"><a class="nav-link" href="index.php">Electronix</a></h1>
		</div>
		<?php
		
		?>
      <div class="container">
		<div class="jumbotron">
			<div class="container text-center">
				<h3 class="display-3">Datos del perfil</h2>
			</div>
			<form name="profile", method="POST" action="procesa_modify_user.php">
				<!-- Must fill value="" with whatever data was stored at the DB for that user-->
				<div class="form-group row">
					<label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
					<div class="col-sm-10">
						<input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos" value="<?php echo $user->getSurname()?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $user->getNombre()?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="nacimiento" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
					<div class="col-sm-10">
						<input type="text" name="birth" class="form-control" id="nacimiento" placeholder="dd/mm/aaaa" value="<?php echo $user->getDob()?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $user->getEmail()?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="password" name="password" class="form-control" id="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group row">
					<label for="password2" class="col-sm-2 col-form-label">Re-Contraseña</label>
					<div class="col-sm-10">
						<input type="password" name="password2" class="form-control" id="password2" placeholder="Re-Password">
					</div>
				</div>			
				<div class="form-row text-center">
					<div class="form-group col-sm-12">
						<input type="submit" value="Confirmar cambios" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
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
</html>
