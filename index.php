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
	<title>Log In </title>

</head>

<body>

<?php
//Encabezado
?>

<section class="encabezado">
    
    <img class="logo_index" src="imagenes/logo_clinica.png" alt="Spanish image"/> </br> 
    
  
  </section>
    
  <p class="barra_index">
    Iniciar Sesión 
    </p>

<?php
//Formulario de iniciar sesión
?>


<div id="sesion" >
   

      <div class="form" align=center>
      <form name="login" method="post" action="index.php">
         <h3> Ingrese sus datos </h3> 
          <div class="casilla" > 
            <p class="casillatext"> Usuario: </p>  <input class="input" name="usuario" type="text" id="usuario">
          </div></br> 
          <div class="casilla" > 
            <p class="casillatext"> Contraseña: </p>  <input class="input" name="clave" type="password" id="clave"> 
          </div> </br> 
          <div class="casilla" > <input class="btn" name="enviar" type="submit" id="enviar" value="Enviar" > </div>
      </form> 
      
      </br>

      <?php
      // Si se envió el formulario, se comprueban los campos
            if(isset($_POST['enviar'])){
              if(empty($_POST['usuario']) || empty($_POST['clave'])){
                echo 'Debe llenar todos los campos';
              }
            elseif(($_POST['usuario'] == "user"  and $_POST['clave'] == "pass1234") || ($_POST['usuario'] == "test" and $_POST['clave'] == "test" )){
              $_SESSION['usuario']=$_POST['usuario'];
              $_SESSION['clave']=$_POST['clave'];
              echo "Inicio de sesión correcto. Redirigiendo...";
              echo "<script type='text/javascript'>setTimeout(function () {window.location.href = 'set.php';}, 1000);</script>";
              }
            else{
              echo "Credenciales incorrectas. Inténtelo nuevamente... </br> Ver README.txt";
            }
            }
          ?> 
          </div>
          


</div>





  
</body>
</html>










