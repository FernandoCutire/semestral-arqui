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
if(isset($_COOKIE['contador_masinformacion'])){
  setcookie('contador_masinformacion', $_COOKIE['contador_masinformacion'] + 1);
  $mensaje = 'Visitante: #' . $_COOKIE['contador_masinformacion'];
}
else{
  setcookie('contador_masinformacion', 2);
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
<center><h2> Más información </h2> </center> </br>
<center><h3> Índice de Masa Corporal </h3> </center></br>
<img class="img_info" src="imagenes/imc_info.jpg" alt="Menu"/>
 <p class="text_resultado">
El índice de masa corporal (IMC) es una razón matemática que asocia la masa y la talla de un individuo, ideada por el estadista belga Adolphe Quetelet, por lo que también se conoce como índice de Quetelet. </br> </br>
El IMC también puede calcularse a partir de tablas o gráficas que muestran el IMC en función de la masa y la altura usando líneas de contorno para distintas categorías. El IMC es un criterio ampliamente aceptado pero no es exacto. Clasifica a las personas en infrapeso, peso normal, sobrepeso y obesidad, basándose exclusivamente en la masa del individuo y su altura.
</br> </br>
<a target="_blank" href="https://es.wikipedia.org/wiki/%C3%8Dndice_de_masa_corporal">Fuente </a>
 </p> </br>

 <center><h3> Glucosa en Sangre </h3> </center></br>
 <img class="img_info" src="imagenes/glucosa_info.jpg" alt="Menu"/>
 <p class="text_resultado">
 La glucemia es la medida de concentración de glucosa libre en la sangre, suero o plasma sanguíneo. Durante el ayuno, los niveles normales de glucosa oscilan entre 70 y 100 mg/dL. Cuando la glucemia es inferior a este umbral se habla de hipoglucemia; cuando se encuentra entre los 100 y 125 mg/dL se habla de glucosa alterada en ayuno, y cuando supera los 126 mg/dL se alcanza la condición de hiperglucemia. Constituye una de las más importantes variables que se regulan en el medio interno (homeostasis).
 </br> </br> 
  El término fue propuesto inicialmente por el fisiólogo francés Claude Bernard (1813-1878).
  </br> </br>
  <a target="_blank" href="https://es.wikipedia.org/wiki/Glucemia">Fuente </a>
 </p> </br> 

 <center><h3> Presión Arterial </h3> </center></br>
 <img class="img_info" src="imagenes/presion_info.jpg" alt="Menu"/>
 <p class="text_resultado">
 La presión arterial es la tensión ejercida por la sangre que circula sobre las paredes de los vasos sanguíneos, y constituye uno de los principales signos vitales. La presión de la sangre disminuye a medida que la sangre se mueve a través de arterias, arteriolas, vasos capilares, y venas; el término presión sanguínea generalmente se refiere a la presión arterial, es decir, la presión en las arterias más grandes, las arterias que forman los vasos sanguíneos que toman la sangre desde el corazón. </br> </br>  La presión arterial es comúnmente medida por medio de un esfigmomanómetro, que usa la altura de una columna de mercurio para reflejar la presión de circulación (ver Medición no invasiva más abajo). Los valores de la presión sanguínea se expresan en milímetros del mercurio (mmHg), a pesar de que muchos dispositivos de presión vascular modernos ya no usan mercurio.
  </br> </br>
  <a target="_blank" href="https://es.wikipedia.org/wiki/Presi%C3%B3n_sangu%C3%ADnea">Fuente </a>
 </p> </br> 
<main>
       
</main>

<?php
pie($mensaje);
?>
</article>
</html>
