<?php
session_start();
require_once'class/dbhandler.php';
if(isset($_SESSION['user'])) {
	$sessionActiva = true;
}else {
	$sessionActiva = false;
}
$user = $_SESSION['user'];
$user = unserialize($user);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<title>Inicio</title>
	</head>

<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills p-3 float-right">		
					<li class="nav-item">
						<a class="nav-link active" href="catalog.php">Catálogo<span class="sr-only">(current)</span></a>
					</li>
					<?php if($sessionActiva) {?>
					<li class="nav-item">
						<a class="nav-link" href="perfil.php">Perfil</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="contacto.php">Contacto</a>
					</li>
					<li class="nav-item">
						<?php
						if($sessionActiva){
						echo '<a class="nav-link" href="salir.php">Salir</a>';
						}else{
						echo '<a class="nav-link" href="new-user.php">Sign Up</a>';
						}
						?>
					</li>
				</ul>
			</nav>
		
		<h1 class="text-muted p-2"><a class="nav-link" href="index.php">Electronix</a></h1>
		</div>
		
		<?php
		$id = $_GET['id'];
		$mysqli = new dbhandler();
		$product = $mysqli->productDetail($id);
		?>
      <div class="container text-center">
         <div class="jumbotron">
            <!-- This will have to be created dynamically and come from the DB I guess -->
            <h2 class="display-3"><?php echo $product->getName() ?></h2>
            <div class="text-justify">
               <div class="row">
                  <div class="col-sm-8">
                     <h3>Descripción</h3>
                     <p><?php echo $product->getDescription(); ?></p>
                     
                     <h3>Características</h3>
                     <dl>
                        <dt><b>Extra Fast!</b></dt>
                        <dd>Play your games at 9001 FPS or more!</dd>
                        <dt><b>Extra cheap!</b></dt>
                        <dd>It's so cheap we'll be paying you to buy it! (We reserve the right to pay you a negative ammount)<dd> 
                        <dt><b>And even more!</b></dt>
                        <dd>The feature bloat has never felt so good</dd>
                     </dl>
                  
                  </div>
                  <div class="col-sm-4">
                     <img alt="<?php echo $product->getName() ?>" src="<?php echo $product->getPicture(); ?>" class="img-thumbnail">
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   </body>

</html>
