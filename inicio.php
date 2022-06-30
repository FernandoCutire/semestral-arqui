<?php
//Inicio de sesión 
session_start();


//Detecta si no has iniciado sesión, si no lo has hecho te devolverá a la página de login
if(!isset($_SESSION['usuario'])){
  echo "<script type='text/javascript'>window.location.href = 'out.php';</script>";
  exit();
}

//Pone la cookie del usuario
 setcookie('usuario', $_SESSION['usuario']);


//Contador de esta página
if(isset($_COOKIE['contador_inicio'])){
  setcookie('contador_inicio', $_COOKIE['contador_inicio'] + 1);
  $mensaje = 'Visitante: #' . $_COOKIE['contador_inicio'];
}
else{
  setcookie('contador_inicio', 2);
  $mensaje = 'Visitante: #1';
}

//Inclusión de archivos necesarios
include('plantillas/partes.php');
include('clases/clases.php');

//Integración de código open-source para detectar dispositivos móviles
//Respectivos créditos en la siguiente carpeta:
require_once 'clases/Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;

?>
<article>
<?php
//Pone diferente encabezado en función si es un dispositivo móvil
if ( $detect->isMobile() ||  $detect->isTablet() ) {
  encabezado_mobile();
}
else{
  encabezado();
}

?>
<center><h3> Seleccione una opción </h3> </center>

<main>
    
    <button onclick="setTimeout(function () {window.location.href = 'imc.php';}, 250);" class = "botontipo" type="button" href="imc.php">   
      
      <img class="icono" src="imagenes/imc.png" alt="IMC image"/>
      <br/> IMC
    </button>
    
    <button onclick="setTimeout(function () {window.location.href = 'glucosa.php';}, 250);" class = "botontipo" type="button" href="index_esp.php">   
      <img class="icono" id="invert_image" src="imagenes/glucosa.png" alt="Glucosa image"/>
      <br/> Glucosa en Sangre
    </button>

    <button onclick="setTimeout(function () {window.location.href = 'presion.php';}, 250);" class = "botontipo" class="botontipo_u" type="button" href="index_fra.php">   
      <img class="icono" id="invert_image" src="imagenes/presion.png" alt="Presion image"/>
      <br/> Presión Arterial
    </button>

            
</main>

<?php
pie($mensaje);
?>
</article>
</html>
