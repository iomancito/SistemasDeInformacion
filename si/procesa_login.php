<?php
session_start();
include 'dbData.php';
include 'user.php';
$enlace = mysql_connect($dburl,  $dbuser, $dbpass);
if($enlace){
	$email = $_POST['inputEmail'];
	$pass = md5($_POST['inputPassword']);
	//echo $email."<br>";
	//echo $pass;
	mysql_select_db($dbname);
	$sql = "SELECT * 
			FROM registered_user 
			WHERE email = '$email' and password = '$pass'";
			//echo $sql;
	$resultado = mysql_query($sql);
	if(!$resultado){
		echo "No se pudo realizar la consulta";
	}
	if(mysql_num_rows($resultado) == 0){
		echo "no coincidencias";
		$error = true;
	}else{
		$fila = mysql_fetch_assoc($resultado);
		$user = new user($fila['name'], $fila['login'], $fila['email'], $fila['surname'], $fila['dob']);
		/*echo $user->getNombre();
		echo $user->getLogin();
		echo $user->getEmail();
		echo $user->getSurname();
		echo $user->getDob();*/
		$_SESSION['user'] = serialize($user);
	}

}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
		if  (!$enlace) {
			echo '<meta http-equiv="refresh" content="0; URL=error.php" />';
		} else{
			if ($error)
				echo '<meta http-equiv="refresh" content="0; URL=index.php?error=true" />';
			else
				echo '<meta http-equiv="refresh" content="0; URL=index.php" />';
		}
		mysql_close($enlace);
		?>
	</head>
	<body>
	</body>
</html>
