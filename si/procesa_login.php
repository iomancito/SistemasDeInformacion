<?php
session_start();
require_once 'class/dbhandler.php';
$mysqli = new dbhandler();

$email = $_POST['inputEmail'];
$pass = $_POST['inputPassword'];

$user = $mysqli->login($email, $pass);
if (!$user) echo "no";
else $_SESSION['user'] = serialize($user);

if($_POST['remember']=="remember"){
	if($user != FALSE){
		$token = $mysqli->createSession($user->getUid());
		setcookie("tokenSession", $token, time()+7*24*60*60);
	}else echo "nok";
}else setcookie('tokenSession', 'notoken', 1);

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
		if (!$user) echo '<meta http-equiv="refresh" content="0; URL=index.php?error=true" />';
		else {
			$_SESSION['user'] = serialize($user);
			echo '<meta http-equiv="refresh" content="0; URL=index.php" />';
		}
		?>
	</head>
	<body>
	</body>
</html>
