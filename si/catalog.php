<?php
session_start();
require_once 'class/dbhandler.php';

$mysqli = new dbhandler();
//comprueba si está activa una sesión
include 'checkSession.php';
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<title>Catálogo</title>
	</head>

<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills p-3 float-right">		
					<li class="nav-item">
						<a class="nav-link active" href="catalog.php">Catálogo<span class="sr-only">(current)</span></a>
					</li>
					<?php if($sessionActiva) { ?>
					<li class="nav-item">
						<a class="nav-link" href="perfil.php">Perfil</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="contacto.php">Contacto</a>
					</li>
					<li class="nav-item">
						<?php
						if($sessionActiva) echo '<a class="nav-link" href="salir.php">Salir</a>';
						else echo '<a class="nav-link" href="new-user.php">Sign Up</a>';
						?>
					</li>
				</ul>
			</nav>
		
		<h1 class="text-muted p-2"><a class="nav-link" href="index.php">Electronix</a></h1>
		</div>
      
		
		<div class="jumbotron">
			<div class="container text-center">
				<h2 class="display-3">Catálogo</h2>		
				<p class="lead">Seleccione el producto a visualizar</p>
			</div>
			<?php
			if(isset($_GET['pag'])){
				$pag = $_GET['pag'];
			}else{
				$pag = 1;
			}
			$mysqli = new dbhandler();
			$numPaginas = $mysqli->numPaginas("product", 5);
			$splProductos = $mysqli->listadoArticulos($pag,5);
			?>
			<table class="table table-hover table-striped">
				<thead class="thead">
					<tr>
						<th>
							<?php if($pag>1) {?><a href="catalog.php?pag=<?php echo $pag-1; ?>"><<</a><?php } ?>
						</th>
						
						<th>Página <?php echo $pag; ?></td>
						<th>
							<?php if($numPaginas>$pag) {?><a href="catalog.php?pag=<?php echo $pag+1; ?>">>></a><?php } ?>
						</th>
					</tr>
				</thead>
			</table>
			<table class="table table-hover table-striped">
				<thead class="thead-inverse">
				<tr>
				  <th></th>
				  <th>Nombre</th>
				  <th></th>
				  <th>Precio</th>
				</tr>
				<tr>
				</thead>
			<?php
			foreach($splProductos as $producto){?>
				  <tbody>
					<tr class='clickable-row' data-href='product-details.php?id=<?php echo $producto->getID(); ?>'>
						<th scope="row"><?php echo $n?></th>
						<td><?php echo $producto->getName(); ?></td>
						<td><img src="<?php echo $producto->getPicture(); ?>" class="img-thumbnail" width="100" height="100"></td>
						<td><?php echo $producto->getPrice(); ?></td>
					</tr>
				  </tbody>						  
						
			<?php
			}
			?>
			</table>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	
	<script>
	jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
		});
	});
	</script>
</body>
</html>
