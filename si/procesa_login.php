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
		echo "No se pudo realizar la consulta";   //error al realizar la consulta
	}
	
	if(mysql_num_rows($resultado) == 0){ 
		$error = true;    //No esxisten coincidencias
	}else{
		$fila = mysql_fetch_assoc($resultado);
		$user = new user($fila['name'], $fila['login'], $fila['email'], $fila['surname'], $fila['dob']);
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
