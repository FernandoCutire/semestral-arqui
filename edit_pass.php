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
	<title>Cambiar Contraseña </title>

</head>

<body>

<?php
//Encabezado
?>

<section class="encabezado">
    
    <img class="logo_index" src="imagenes/logo_clinica.png" alt="Spanish image"/> </br> 
    
  
  </section>
    
  <p class="barra_index">
    Cambio de Contraseña
    </p>
<?php
//Formulario de iniciar sesión
?>

<div id="sesion" >

      <div class="form" align=center>
      <form name="formulario" method="post" action="edit_pass.php">
         <h3> Ingrese Nueva Contraseña </h3> 
          <div class="casilla" > 
            <p class="casillatext"> Usuario: <?php echo $_SESSION['usuario'];?></p>  
          </div></br> 
          <div class="casilla" > 
            <p class="casillatext"> Nueva contraseña: </p>  <input class="input" name="clave" type="password" id="clave"> 
          </div> </br> 
          <div class="casilla" > <input class="btn" name="enviar" type="submit" id="enviar" value="Registrar" > </div><br><br>
          <div class="casilla" >   <a class="btn" href="index.php"> Cancelar  </a> </div>
          <br><br>
          

      </form> 
      <?php
      // Si se envió el formulario, se comprueban los campos
            if(isset($_POST['enviar'])){
              if( empty($_POST['clave'])){
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
              $clave = mysqli_real_escape_string($con,$_POST['clave']); 
              $usuario = $_SESSION['usuario'];
              $sql = "UPDATE usuario SET clave ='$clave' WHERE usuario= '$usuario' ";
              
              
                


                if ($con->query($sql)===TRUE){
                  echo "<script type='text/javascript'>window.location.href = 'registrado.php';</script>";
                    }
                else{
                  echo "error: ".$sql . "<br>" . $con->error;
                    }
                    $con->close();
                
              }
              
                
                  
              }     
            

        
              
            
            
        
          ?>


      </br> 
          </div>


</div>
</body>
</html>










