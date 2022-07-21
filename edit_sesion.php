<?php
session_start();

?>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="plantillas/estilo.css">
	<link rel="shortcut icon" href="imagenes/logo.png">
	<title>Sesion </title>

</head>


<p class="barra_logout">  <?php  echo "Sesión: " . $_SESSION['usuario']?></p> 
<div style="text-align:center">
	</br> <a class="volver" href="edit_pass.php" style="display:inline-block"> Cambiar Contraseña  </a></br>
    </br> <a class="volver" href="logout.php" style="display:inline-block"> Cerrar sesión  </a>
</div>

