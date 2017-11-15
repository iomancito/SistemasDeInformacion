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

$mysqli = new dbhandler();

$apellidos = $_POST['apellidos'];
$nombre = $_POST['nombre'];
//$str = strtotime($_POST['birth']);
//$birth = date("Y-m-d",$str);
$birth = $_POST['birth'];
$email = $_POST['email'];
$password = $_POST['password'];

$result = $mysqli->modifyUser($nombre, $apellidos, $email, $birth, $password, $user->getEmail());

if($result){
	$user = new user($nombre, $user->getLogin(), $email, $apellidos, $birth);
	$_SESSION['user'] = serialize($user);
}

?>

<!DOCTYPE html>
<html lang="es">
	<head> 
		<?php
		if  (!$result) {
			echo '<meta http-equiv="refresh" content="0; URL=error.php" />';
		} else{
			echo '<meta http-equiv="refresh" content="0; URL=perfil.php" />';
		}
		mysql_close($enlace);
		?>
	</head>
	<body>
	</body>
</html>
