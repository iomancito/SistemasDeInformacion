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

$enlace = mysql_connect($dburl,  $dbuser, $dbpass);
if($enlace){
	$apellidos = $_POST['apellidos'];
	$nombre = $_POST['nombre'];
	$str = strtotime($_POST['birth']);
	$birth = date("Y-m-d",$str);
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	mysql_select_db($dbname);
	$mail = $user->getEmail();
	$sql = "SELECT u_id FROM registered_user WHERE email='$mail'";
	
	$resultado = mysql_query($sql);
	$fila = mysql_fetch_assoc($resultado);	
	$id = $fila['u_id'];

	$sql = "UPDATE registered_user 
			SET email='$email', password='$password', dob='$birth', name='$nombre', surname='$apellidos'
			WHERE u_id='$id'";
	mysql_query($sql);

	$user = new user($nombre, $user->getLogin(), $email, $apellidos, $birth);
	$_SESSION['user'] = serialize($user);
}
?>

<!DOCTYPE html>
<html lang="es">
	<head> 
		<?php
		if  (!$enlace) {
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
