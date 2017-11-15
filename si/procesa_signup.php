<?php
session_start();
require_once'class/dbhandler.php';

$usuario = $_POST['usuario'];
$apellidos = $_POST['apellidos'];
$nombre = $_POST['nombre'];
//$str = strtotime($_POST['birth']);
//$birth = date("Y-m-d",$str);
$birth = $_POST['birth'];
$email = $_POST['email'];
$password = $_POST['password'];

$mysqli = new dbhandler();
$result = $mysqli->newUser($usuario, $password, $email, $nombre, $apellidos, $birth);

?>

<!DOCTYPE html>
<html lang="es">
	<head> 
		<?php
		if (!$result){
			echo '<meta http-equiv="refresh" content="0; URL=new-user.php?error=true" />';
		}else{
			echo '<meta http-equiv="refresh" content="0; URL=index.php?signup=ok" />';
		}
		?>
	</head>
	<body>
	</body>
</html>
