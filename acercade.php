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
if(isset($_COOKIE['contador_acercade'])){
  setcookie('contador_acercade', $_COOKIE['contador_acercade'] + 1);
  $mensaje = 'Visitante: #' . $_COOKIE['contador_acercade'];
}
else{
  setcookie('contador_acercade', 2);
  $mensaje = 'Visitante: #1';
}

//Inclusión de archivos necesarios
include('plantillas/partes.php');
include('clases/clases.php');

//Integración de código open-source para detectar dispositivos móviles
//Respectivos créditos en la siguiente carpeta:
require_once 'clases/Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;


//Pone diferente encabezado en función si es un dispositivo móvil
if ( $detect->isMobile() ||  $detect->isTablet() ) {
  encabezado_mobile();
}
else{
  encabezado();
}

?>

<article>
<center><h2> Acerca de nosotros </h2> </center> </br>
<center><h3> Clínicas ABC </h3> </center></br>
<img class="img_info" src="imagenes/logo_clinica.png" alt="logo_clinica"/>
 <p class="text_resultado">
 Imagínate que aquí hay info de la clínica. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 </p> </br>
<main>
        
</main>

<?php
pie($mensaje);
?>
</article>
</html>
