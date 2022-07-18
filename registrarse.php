<?php
//Inicio de sesión
session_start();

?>

<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="plantillas/estilo.css">
	<link rel="shortcut icon" href="imagenes/logo.png">
	<title>Registro </title>

</head>

<body>

<?php
//Encabezado
?>

<section class="encabezado">
    
    <img class="logo_index" src="imagenes/logo_clinica.png" alt="Spanish image"/> </br> 
    
  
  </section>
    
  <p class="barra_index">
    Resgistrase 
    </p>
<?php
//Formulario de iniciar sesión
?>

<div id="sesion" >

      <div class="form" align=center>
      <form name="formulario" method="post" action="registro.php">
         <h3> Registre sus datos </h3> 
          <div class="casilla" > 
            <p class="casillatext"> Usuario: </p>  <input class="input" name="usuario" type="text" id="usuario">
          </div></br> 
          <div class="casilla" > 
            <p class="casillatext"> Contraseña: </p>  <input class="input" name="clave" type="password" id="clave"> 
          </div> </br> 
          <div class="casilla" > <input class="btn" name="enviar" type="submit" id="enviar" value="Enviar" > </div>
      </form> 

      </br> 
          </div>


</div>
</body>
</html>










