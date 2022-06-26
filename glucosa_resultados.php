<?php
//Inicio de sesión 
session_start();


//Detecta si no has iniciado sesión, si no lo has hecho te devolverá a la página de login
if(!isset($_SESSION['usuario'])){
  echo "<script type='text/javascript'>window.location.href = 'out.php';</script>";
  exit();
}

//Detecta si no has enviado el formulario, si no lo has hecho te devolverá a este
if(!isset($_POST['enviar_glucosa'])){
  echo "<script type='text/javascript'>window.location.href = 'glucosa.php';</script>";
}


//Contador de esta página
if(isset($_COOKIE['contador_glucosa_resultados'])){
  setcookie('contador_glucosa_resultados', $_COOKIE['contador_glucosa_resultados'] + 1);
  $mensaje = 'Visitante: #' . $_COOKIE['contador_glucosa_resultados'];
}
else{
  setcookie('contador_glucosa_resultados', 2);
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

<?php
resultados_glucosa();
?>

<main>
            
</main>

<?php
pie($mensaje);
?>
</article>
</html>
