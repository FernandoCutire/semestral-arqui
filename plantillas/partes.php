
<?php
function encabezado(){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="plantillas/estilo.css">
	<link rel="shortcut icon" href="imagenes/logo.png">
	<title>Clínicas ABC</title>
</head>
<script src="plantillas/script.js" language= "javascript" type="text/javascript"></script>
<body>
	<header>

  <section class="encabezado">
    
    <a href="inicio.php" title="Inicio">
    <img class="logo_index" src="imagenes/logo_clinica.png" alt="Logo Clinicas ABC"/> </br></a> 
    
    <a href='logout.php' class="user_desktop">  
    <img class= "user_img" src="imagenes/user.png" alt="User image"/>
              
               
                <p id="text_user">
                <?php
                  $usuario_actual = substr($_COOKIE['usuario'], 0, 5);
                  $mensaje2 = 'Usuario: ' . $usuario_actual;
                  echo $mensaje2;
                ?>
                </br>Cerrar Sesión
                </p>
              
            
    </a>
  
  </section>
    
	</header>

	<nav>
    <div class="barra">
 
      <button onclick="window.location.href='inicio.php'" id="opcion_barra_der" class="opcion_barra" type="button" href="inicio.php">   
        Inicio
      </button>

      <button onclick="window.location.href='masinformacion.php'" class="opcion_barra" type="button" href="inicio.php">   
        Más Información
      </button>

      <button onclick="window.location.href='acercade.php'" class="opcion_barra" type="button" href="inicio.php">   
        Acerca de
      </button>


    </div>
	</nav>

        
<?php
}
?>



<?php
function encabezado_mobile(){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="plantillas/estilo.css">
	<link rel="shortcut icon" href="imagenes/logo.png">
	<title>Clinicas ABC</title>
</head>
<body>
	<header>

  <section class="encabezado">
    
    <a href="inicio.php" title="Inicio">
    <img class="logo_index" src="imagenes/logo_clinica.png" alt="Logo Clinicas ABC"/> </br></a> 


    <script src="plantillas/script.js" language= "javascript" type="text/javascript"></script>

          <img class="img_menu" src="imagenes/menu-icon.png" alt="Menu"/>
            <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">
          </button>
          <div id="myDropdown" class="dropdown-content">
            <a href='logout.php' class="user">  
  
              
                <img class= "user_img" src="imagenes/user.png" alt="User image"/>
                <p id="text_user">
                <?php
                  $usuario_actual = substr($_COOKIE['usuario'], 0, 5);
                  $mensaje2 = 'Usuario: ' . $usuario_actual;
                  echo $mensaje2;
                ?>
                </br>
                Cerrar Sesión
                </p>
              
            
            </a>

            <a href="inicio.php">Inicio</a>
            <a href="masinformacion.php">Más Información</a>
            <a href="acercade.php">Acerca de</a>
          </div>
            </div>

        <script>
        /* Cuando el usuario toca el boton muestra el menu desplegable */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

        //  Cuando el usuario toca el boton cierra el menu desplegable
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>

  </section>
    
	</header>

	<nav>
    <div class="barra_mobile">
    </div>
	</nav>

        
<?php
}
?>




    
<?php
function pie($mensaje){
?>
        <footer class="pie">
            <center>
                <button class = "botoncontador" type="button">   
                  <?php echo $mensaje; ?>
                </button> </br>
                 Cutire-Feng-Gamero-St.Rose-Sáenz - Clínicas ABC &copy <?php echo date("Y") ?> Copyright<br>
                Arquitecura y Desarrollo de Aplicaciones Web<br>
                Evaluación de Aprendizajes N°2
                
            </center>
        </footer>
    </body>
    </html>
<?php
}
?>

<?php
function logout(){
    session_start();
    if(isset($_COOKIE['salida'])){
        ?>
        <p class="barra_logout">
        <?php
        echo $_COOKIE['salida']; 
        ?>
        </p>
        <?php
        setcookie("salida");

    }

    if(!empty($_SESSION['usuario'])){
        session_unset();
        session_destroy();
        ?>
        <p class="barra_logout">
        Sesión Finalizada </p>
        <?php
    }
}
?>




    
<?php
function formulario_imc(){
?>
<div class="formulario" >
   

   <div class="form" align=center>
   <form name="imc_form" method="post" action="imc_resultados.php">
      <h2> Índice de Masa Corporal </h2> 
      <h3> Ingrese sus datos </h3> 
       
         <p class="casillatext"> Altura (m): </p>  <input class="input" name="altura_imc" type="number" step="0.01" min="0.2" max="2.5" id="altura_imc" required>
        
         <p class="casillatext"> Masa (kg): </p>  <input class="input" name="masa_imc" type="number" step="1" min="1" max="1000" id="masa_imc" required> 
        
       <div class="casilla" > <input class="btn" name="enviar_imc" type="submit" id="enviar_imc" value="Calcular IMC" > </div>
   </form> 
   
   </br>
       </div>
       


</div>

<?php
}
?>

<?php
function formulario_glucosa(){
?>
<div class="formulario" >
   

   <div class="form" align=center>
   <form name="glucosa_form" method="post" action="glucosa_resultados.php">
      <h2> Glucosa en Sangre </h2> 
      <h3> Ingrese sus datos </h3> 
      
         <p class="casillatext"> Lectura del glucómetro (mg/L): </p>  
            </br><input class="input" name="glucosa" type="number" step="1" min="10" max="500" id="glucosa" required>
         </br></br>

         <p class="casillatext"> Lectura hecha en: </p>

         <div class="contenedor_radiobuttons">
          <label class="contenedor_radio">
              <input class="input_r" type="radio" id="ayuna" name="glucosa_tipo" value="en ayuna" checked>
              En ayuna (Sin comer alimentos) 
          </label></br>
          <label class="contenedor_radio">
              <input class="input_r" type="radio" id="posprandial" name="glucosa_tipo" value="Posprandial">
              Posprandrial (dos horas después de comer)
                 
          </label></br>
  
         </div>

       <div class="casilla" > <input class="btn" name="enviar_glucosa" type="submit" id="enviar_glucosa" value="Calcular Glucosa" > </div>
   </form> 
   
   </br>
       </div>
       


</div>

<?php
}
?>

<?php
function formulario_presion(){
?>
<div class="formulario" >
   

   <div class="form" align=center>
   <form name="imc_form" method="post" action="presion_resultados.php">
      <h2> Presión Arterial </h2> 
      <h3> Ingrese sus datos </h3> 
       
         <p class="casillatext"> Presión sistólica (mm Hg): </p>  <input class="input" name="sistolica" type="number" step="1" min="10" max="500" id="sistolica" required>
        
         <p class="casillatext"> Presión diastólica (mm Hg): </p>  <input class="input" name="diastolica" type="number" step="1" min="10" max="500" id="diastolica" required> 
        
       <div class="casilla" > <input class="btn" name="enviar_presion" type="submit" id="enviar_presion" value="Calcular Presión" > </div>
   </form> 
   
   </br>
       </div>
       


</div>

<?php
}
?>


<?php
function resultados_imc(){
?>
<div class="formulario" >
   

   <div class="form" align=center>
   <form name="login" method="post" action="imc_resultados.php">
      <h2> Índice de Masa Corporal </h2> 
      <h3> Usted ingresó los datos: </h3> 

         <p> Altura:  <?php echo $_POST["altura_imc"] ?> m </p>

         <p> Masa: <?php echo $_POST["masa_imc"] ?> kg </p>
        </br>
      <h3> Resultados: </h3> 
        <?php
        if(isset($_POST["enviar_imc"])){
          $obj = new calculos();
          $imc_resultado = $obj->asignar_imc($_POST["altura_imc"], $_POST["masa_imc"]);
          echo $imc_resultado;
        }
        $obj->Calcularimc($_POST["altura_imc"], $_POST["masa_imc"]);
        ?>

       <button onclick="setTimeout(function () {window.location.href = 'imc.php';}, 250);" class = "btn" type="button" href="imc.php">   
          Volver
       </button>
   </form> 
   
   </br>
       </div>
       


</div>

<?php
}
?>

<?php
function resultados_glucosa(){
?>
<div class="formulario" >
   

   <div class="form" align=center>
   <form name="login" method="post" action="glucosa_resultados.php">
      <h2> Glucosa en la sangre </h2> 
      <h3> Usted ingresó los datos: </h3> 

         <p> Lectura del glucómetro:  <?php echo $_POST["glucosa"] ?> mg/dL </p>

         <p> Lectura hecha: <?php echo $_POST["glucosa_tipo"] ?> </p>
        </br>
      <h3> Resultados: </h3> 
        <?php
        if(isset($_POST["enviar_glucosa"])){
          $obj = new calculos();
          $obj->asignar_glucosa($_POST["glucosa"], $_POST["glucosa_tipo"]);
        }
        $obj->Calcularglucosa($_POST["glucosa"], $_POST["glucosa_tipo"]);
        ?>

       <button onclick="setTimeout(function () {window.location.href = 'glucosa.php';}, 250);" class = "btn" type="button" href="imc.php">   
          Volver
       </button>
   </form> 
   
   </br>
       </div>
       


</div>

<?php
}
?>

<?php
function resultados_presion(){
?>
<div class="formulario" >
   

   <div class="form" align=center>
   <form name="login" method="post" action="presion_resultados.php">
      <h2> Presión Arterial </h2> 
      <h3> Usted ingresó los datos: </h3> 

         <p> Lectura sistólica:  <?php echo $_POST["sistolica"] ?> mm Hg </p>

         <p> Lectura diastólica: <?php echo $_POST["diastolica"] ?> mm Hg </p>
        </br>
      <h3> Resultados: </h3> 
        <?php
        if(isset($_POST["enviar_presion"])){
          $obj = new calculos();
          $obj->asignar_presion($_POST["sistolica"], $_POST["diastolica"]);
        }
        $obj->Calcularpresion($_POST["sistolica"], $_POST["diastolica"]);
        ?>

       <button onclick="setTimeout(function () {window.location.href = 'presion.php';}, 250);" class = "btn" type="button" href="imc.php">   
          Volver
       </button>
   </form> 
   
   </br>
       </div>
       


</div>

<?php
}
?>
