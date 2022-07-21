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
if(isset($_COOKIE['contador_historial'])){
  setcookie('contador_historial', $_COOKIE['contador_historial'] + 1);
  $mensaje = 'Visitante: #' . $_COOKIE['contador_historial'];
}
else{
  setcookie('contador_historial', 2);
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

<p>Usuario: <span></span></p>

<h1>Reporte semanal</h1>

<h1>Reporte mensual</h1>


<main>
       
</main>

<?php
pie($mensaje);
?>
</article>
</html>
