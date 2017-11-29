<?php
//comprueba si está activa una sesión
if(isset($_SESSION['user'])) {
	$sessionActiva = true;
	$user = $_SESSION['user'];
	$user = unserialize($user);
}else {	//si no existe sesión, comprueba si hay token de sesión
	if(isset($_COOKIE['tokenSession'])){
		$token = $_COOKIE['tokenSession'];
		$user = $mysqli->getSession($token);
		if ($user != FALSE) {
			$_SESSION['user'] = $user;
			$sessionActiva = true;
		}else $sessionActiva = false;
	}else $sessionActiva = false;
}
?>
