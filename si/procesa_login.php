<?php
session_start();
require_once 'class/dbhandler.php';
$mysqli = new dbhandler();

$email = $_POST['inputEmail'];
$pass = $_POST['inputPassword'];

$user = $mysqli->login($email, $pass);

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
