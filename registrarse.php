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
    Registro de Sesión
    </p>
<?php
//Formulario de iniciar sesión
?>

<div id="sesion" >

      <div class="form" align=center>
      <form name="formulario" method="post" action="registrarse.php">
         <h3> Registre sus datos </h3> 
          <div class="casilla" > 
            <p class="casillatext"> Usuario: </p>  <input class="input" name="usuario" type="text" id="usuario">
          </div></br> 
          <div class="casilla" > 
            <p class="casillatext"> Contraseña: </p>  <input class="input" name="clave" type="password" id="clave"> 
          </div> </br> 
          <div class="casilla" > <input class="btn" name="enviar" type="submit" id="enviar" value="Registrar" > </div>
          <br><br>
          <div class="casilla"> <a href="index.php">¿Ya tienes una cuenta? ¡Inicia Sesión aquí!</a> </div>

      </form> 
      <?php
      // Si se envió el formulario, se comprueban los campos
            if(isset($_POST['enviar'])){
              if(empty($_POST['usuario']) || empty($_POST['clave'])){
                echo 'Debe llenar todos los campos';
              }
              
            else{
              
              //Conexión a BD
              $bd = "clinica-abc-bd";
              $host= "localhost";
              $pw = ""; //pasword
              $user = "root";
              $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
              mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
              
              // Captar usuario y contraseña en variable, evitando inyección SQL
              $usuario = mysqli_real_escape_string($con,$_POST['usuario']);
              $clave = mysqli_real_escape_string($con,$_POST['clave']); 

              
              // Se cuentan cuantos ingresos coinciden con $usuario y $clave
              $sql = "select *from usuario where usuario = '$usuario'";  
              $resultado = mysqli_query($con, $sql);  
              $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC); 
              
              $cont_usuariocorrecto = mysqli_num_rows($resultado);  
                
             
              if($cont_usuariocorrecto >= 1){  
              
              echo "Error. Ese usuario ya existe...";
              }
              elseif($cont_usuariocorrecto == 0){  
                $sql = "INSERT INTO Usuario (Usuario, Clave) VALUES ('$usuario', '$clave')";
                echo "<script type='text/javascript'>window.location.href = 'registrado.php';</script>";


                if ($con->query($sql)===TRUE){
                    echo "Guardado";
                    }
                else{
                  echo "error: ".$sql . "<br>" . $con->error;
                    }
                    $con->close();
                
              }
              else{
                  echo "Ha ocurrido un error inesperado. No se registró el usuario.";
                }
                
                
                  
              }     
            }

        
              
            
            
        
          ?>


      </br> 
          </div>


</div>
</body>
</html>










