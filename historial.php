<?php
//Inicio de sesión 
session_start();


//Detecta si no has iniciado sesión, si no lo has hecho te devolverá a la página de login
if (!isset($_SESSION['usuario'])) {
    echo "<script type='text/javascript'>window.location.href = 'out.php';</script>";
    exit();
}
//Pone la cookie del usuario
setcookie('usuario', $_SESSION['usuario']);

//Contador de esta página
if (isset($_COOKIE['contador_historial'])) {
    setcookie('contador_historial', $_COOKIE['contador_historial'] + 1);
    $mensaje = 'Visitante: #' . $_COOKIE['contador_historial'];
} else {
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
if ($detect->isMobile() || $detect->isTablet()) {
    encabezado_mobile();
} else {
    encabezado();
}

?>

<article>


<div class="gestor_table">
    <h3>Reporte mensual IMC</h3>

    <table class="table">
        <tr class="gestor_table_first_column">
            <td>Altura(m)</td>
            <td>Masa(kg)</td>
            <td>IMC</td>
            <td>Fecha</td>
        </tr>
        <?php
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . "1.75" . "</td>";
        echo "<td>" . "60" . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . "25" . "</td>";
        echo "<td>" . "21-07-2022" . "</td>";
        ?>
    </table>
</div>

<h1>Glucosa</h1>

<div class="gestor_table">
    <h3>Reporte semanal Glucosa</h3>
    <table class="table">
        <tr class="gestor_table_first_column">
            <td>Lectura Glucómetro (mg/L)</td>
            <td>Lectura hecha en</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . "150" . "</td>";
        echo "<td>" . "En ayuda" . "</td>";
        echo "<td>" . "Diabetes" . "</td>";
        echo "<td>" . "21-07-2022" . "</td>";
        ?>
    </table>
</div>


<div class="gestor_table">
    <h3>Reporte mensual Glucosa</h3>
    <table class="table">
        <tr class="gestor_table_first_column">
            <td>Lectura Glucómetro (mg/L)</td>
            <td>Lectura hecha en</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . "150" . "</td>";
        echo "<td>" . "En ayuda" . "</td>";
        echo "<td>" . "Diabetes" . "</td>";
        echo "<td>" . "21-07-2022" . "</td>";
        ?>
    </table>
</div>

<h1>Presión Arterial</h1>

<div class="gestor_table">
    <h3>Reporte semanal Presión Arterial</h3>
    <table class="table">
        <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . "150" . "</td>";
        echo "<td>" . "160" . "</td>";
        echo "<td>" . "Normal" . "</td>";
        echo "<td>" . "21-07-2022" . "</td>";
        ?>
    </table>
</div>


<div class="gestor_table">
    <h3>Reporte mensual Presión Arterial</h3>
    <table class="table">
        <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . "150" . "</td>";
        echo "<td>" . "160" . "</td>";
        echo "<td>" . "Normal" . "</td>";
        echo "<td>" . "21-07-2022" . "</td>";
        ?>
    </table>
</div>

<?php
  historial();
?> 

<main>

</main>

<?php
pie($mensaje);
?>

</article>
</html>