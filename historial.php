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

<article>
<center><h2> Historial </h2> </center> </br>
<center><h3> Índice de Masa Corporal </h3> </center></br>
<img class="img_info" src="imagenes/imc_info.jpg" alt="Menu"/>
 <p class="text_resultado">
El índice de masa corporal (IMC) es una razón matemática que asocia la masa y la talla de un individuo, ideada por el estadista belga Adolphe Quetelet, por lo que también se conoce como índice de Quetelet. </br> </br>
El IMC también puede calcularse a partir de tablas o gráficas que muestran el IMC en función de la masa y la altura usando líneas de contorno para distintas categorías. El IMC es un criterio ampliamente aceptado pero no es exacto. Clasifica a las personas en infrapeso, peso normal, sobrepeso y obesidad, basándose exclusivamente en la masa del individuo y su altura.
</br> </br>



<main>
       
</main>

<?php
pie($mensaje);
?>
</article>
</html>
