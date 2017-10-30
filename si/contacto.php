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
					<?php if($sessionActiva) {?>
					<li class="nav-item">
						<a class="nav-link" href="perfil.php">Perfil</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link active" href="contacto.php">Contacto</a>
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
		<div class="jumbotron">
			<div class="container text-center">
				<h2 class="form-signin-heading">Información de contacto.</h2>
			</div>
		</div>
