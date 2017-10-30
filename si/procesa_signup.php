<?php
session_start();
include 'dbData.php';
include 'user.php';
/*echo $_POST['usuario']."<br>";
echo $_POST['apellidos']."<br>";
echo $_POST['nombre']."<br>";
echo $_POST['birth']."<br>";
echo $_POST['email']."<br>";
echo $_POST['password'];*/
$enlace = mysql_connect($dburl,  $dbuser, $dbpass);
if($enlace){
	$usuario = $_POST['usuario'];
	$apellidos = $_POST['apellidos'];
	$nombre = $_POST['nombre'];
	$str = strtotime($_POST['birth']);
	$birth = date("Y-m-d",$str);
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	//echo $password;

	mysql_select_db($dbname);
	$sql = "SELECT email
			FROM registered_user 
			WHERE email = '$email'";
	$resultado = mysql_query($sql);
	if(!$resultado){
		echo "No se pudo realizar la consulta";
	}
	if(mysql_num_rows($resultado) != 0){
		$error = true;
	}else{
		$error = false;
		$sql = "INSERT INTO user () VALUES ()";
		mysql_query($sql);
		
		$sql = "INSERT INTO registered_user (u_id, login, email, password, dob, name, surname)
				VALUES ((SELECT MAX(u_id) FROM user), '$usuario', '$email', '$password', '$birth', '$nombre', '$apellidos')";
		mysql_query($sql);
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
			if ($error){
				echo '<meta http-equiv="refresh" content="0; URL=new-user.php?error=true" />';
			}else{
				echo '<meta http-equiv="refresh" content="0; URL=index.php?signup=ok" />';
			}
		}
		mysql_close($enlace);
		?>
	</head>
	<body>
	</body>
</html>
