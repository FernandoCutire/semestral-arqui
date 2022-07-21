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
          <br><br>
          <div class="casilla"> <a href="registrarse.php">¿No tienes cuenta? ¡Registrese aquí!</a> </div>

      </form> 
      
      </br>

      <?php
    

      // Si se envió el formulario, se comprueban los campos
            if(isset($_POST['enviar'])){
              if(empty($_POST['usuario']) || empty($_POST['clave'])){
                echo 'Debe llenar todos los campos';
              }
              
            else{
              
              //Conexión a BD
              $bd = "clinica-abc";
              $host= "localhost";
              $pw = ""; //pasword
              $user = "root";
              $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
              mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
              
              // Captar usuario y contraseña en variable, evitando inyección SQL
              $usuario = mysqli_real_escape_string($con,$_POST['usuario']);
              $clave = mysqli_real_escape_string($con,$_POST['clave']); 

              
              // Se cuentan cuantos ingresos coinciden con $usuario y $clave
              $sql = "select *from usuario where usuario = '$usuario' and clave = '$clave'";  
              $resultado = mysqli_query($con, $sql);  
              $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC); 
              
              $cont_usuariocorrecto = mysqli_num_rows($resultado);  

              if($cont_usuariocorrecto >= 1){  
                
              $_SESSION['usuario']=$_POST['usuario'];
              $_SESSION['clave']=$_POST['clave'];
              echo "Inicio de sesión correcto. Redirigiendo...";
              echo "<script type='text/javascript'>setTimeout(function () {window.location.href = 'set.php';}, 1000);</script>";  
                }  
              else{  
                echo "Credenciales incorrectas. Intentelo nuevamente...";
                
                }     
              


              }
            
            }
          
          ?>
          </div>
          


</div>





  
</body>
</html>










