<?php
if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['clave'])&&
!empty($_POST['clave'])){


//variables que cotienen los valores introducidas y captados mediante el metodo post
$usuarioReg=$_POST['usuario'];
$claveReg=$_POST['clave'];


$bd = "clinica-abc-bd";
$host= "localhost";
$pw = ""; //pasword
$user = "root";

//conexion con la bd

$con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
mysqli_select_db($con, $bd) or die ("no se pudo conectar a la BD");

$sql = "INSERT INTO Usuario (Usuario, Clave) 
VALUES ('$usuarioReg', '$claveReg')";

if ($con->query($sql)===TRUE){
    echo "guardado correctamente <br>";
    echo "</br> <a class='volver' href='index.php' style='display:inline-block'> Ir a iniciar sesión  </a>";
}
else{
    echo "error: ".$sql . "<br>" . $con->error;
}
$con->close();
}
else{
    echo "debe llenar los campos >:/ hdp";
}
?>