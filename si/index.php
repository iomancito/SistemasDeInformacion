<?php
session_start();
require_once 'class/dbhandler.php';
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
					<?php if($sessionActiva) {?>
					<li class="nav-item">
						<a class="nav-link" href="perfil.php">Perfil</a>
					</li>
					<?php } ?>
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
	<div class="jumbotron text-center">			
	<img src="img/logo2.jpg" class="img-fluid" alt="Bienvenido a electronix">
	<div class="container">
		<?php
			if($_GET['error'])echo "<h3 class='text-danger'>No existen coincidencias. Intentelo de nuevo.</h3>";
			if($_GET['signup']=='ok') echo "<h3>Se ha registrado correctamente</h3>";
		if(!$sessionActiva){?>
		<h2 class="form-signin-heading">Introduzca su información de usuario</h2>

		<form class="form-signin" method="POST" action="procesa_login.php">
			<div class="row justify-content-md-center">
				<div class="col col-lg-5">
					<label for="inputEmail" class="sr-only">Correo Electronico</label>
					<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Correo Electrónico" required autofocus>
				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col col-lg-5">
					<label for="inputPassword" class="sr-only">Contreseña</label>
					<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contreseña" required>
				</div>
			</div>
			<div class="checkbox">
				<label>
				<input type="checkbox" value="remember-me"> Recordar mis datos
				</label>
			</div>
			<input class="btn btn-lg btn-primary" type="submit" name="submit" value="Enviar">
		</form>
		<?php
		}else{
			echo "<h3>Bienvenido ".$user->getLogin()."</h3>";
		}
		?>
	</div>
</body>
</html>
