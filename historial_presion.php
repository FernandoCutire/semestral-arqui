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
if (isset($_COOKIE['contador_historial_presion'])) {
    setcookie('contador_historial_presion', $_COOKIE['contador_historial_presion'] + 1);
    $mensaje = 'Visitante: #' . $_COOKIE['contador_historial_presion'];
} else {
    setcookie('contador_historial_presion', 2);
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

<div class="form" align=center>
<h1>Presión Arterial</h1>
<br><br>

    



        <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
        $past_siete = date("y/m/d", strtotime("-1 week"));
        $hoy = date("y/m/d", strtotime("today"));
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '$past_siete' and '$hoy'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Últimos 7 días</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>





<br><br>
<h1>Historial Mensual de Presión Arterial</h1>
<br><br>


<div class="gestor_table">
    



        <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/01/01' and '2022/01/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Enero</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/02/01' and '2022/02/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Febrero</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/03/01' and '2022/03/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Marzo</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/04/01' and '2022/04/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Abril</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/05/01' and '2022/05/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Mayo</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/06/01' and '2022/06/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Junio</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/07/01' and '2022/07/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Julio</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/08/01' and '2022/08/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Agosto</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Resultado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/09/01' and '2022/09/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Septiembre</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Presion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/10/01' and '2022/10/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Octubre</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Presion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/11/01' and '2022/11/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Noviembre</h3>

            <table class="table">
            <<tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Presion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>

    <?php
        //Conexión a BD
        $bd = "clinica-abc-bd";
        $host= "localhost";
        $pw = ""; //pasword
         $user = "root";
         $con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
        mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");
 
        $usuario = mysqli_real_escape_string($con,$_SESSION['usuario']);
 
        // Se crea un loop para leer la bd
        $sql = "select *from resultados where Usuario = '$usuario' and Tipo = 'Presion' and  Fecha between '2022/12/01' and '2022/12/31'";  
        $resultado = mysqli_query($con, $sql); 
        //Cuenta cuántas entradas hay en ese mes
        $cont_entradas = mysqli_num_rows($resultado);
        //Solo muestra la tabla si tiene una o más entradas
        if ($cont_entradas>= 1){
            ?>
        <h3>Diciembre</h3>

            <table class="table">
            <tr class="gestor_table_first_column">
            <td>Presión sistólica (mm Hg)</td>
            <td>Presión diastólica (mm Hg)</td>
            <td>Lectura</td>
            <td>Fecha</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($resultado)){
            
        echo "<tr class='gestor_table_rows'>";
        echo "<td>" . htmlspecialchars($row['Registro1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Registro2']) . "</td>";
        echo "<td class='gestor_table_rows-estatus'>" . htmlspecialchars($row['Presion']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Fecha']) . "</td>";
        }
        }
        ?>
    </table>



</div>
</div>



<main>

</main>

<?php
pie($mensaje);
?>

</article>
</html>