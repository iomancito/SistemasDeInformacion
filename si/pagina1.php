<?php
// pagina1.php

session_start();
session_status();
echo 'Bienvenido a la página #1';

$_SESSION['color']  = 'verde';
$_SESSION['animal'] = 'gato';
$_SESSION['instante']   = time();

// Funciona si la cookie de sesión fue aceptada
echo '<br /><a href="pagina2.php">página 2</a>';

// O quizás pasar el id de sesión, si fuera necesario
echo '<br /><a href="pagina2.php?' . SID . '">página 2</a>';
?>
<form action="pagina2.php" method="post">
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <p>Su edad: <input type="text" name="edad" /></p>
 <p><input type="submit" /></p>
</form>
