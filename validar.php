<?php
$usuarioReg = $_POST['usuario'];
$claveReg = $_POST['clave'];
$bd="clinica-abc-bd";
$host= "localhost";
$pw = ""; //pasword
$user = "root";

//conexion con la bd

$con =mysqli_connect($host,$user,$pw,$bd) or die ("no se pudo autentificar con la BD");
if(empty($usuarioReg) || empty($claveReg)){
header("Location: index.html");
exit();
}
mysqli_connect('localhost','root','*****') or die("Error al conectar ");
mysqli_select_db($con,$bd) or die ("Error al seleccionar la Base de datos: ");
$result = mysqli_query("SELECT * from Usuario where Usuario='$usuarioReg" . $usuarioReg . "'");
if($row = mysqli_fetch_array($result)){
if($row['Clave'] == $claveReg){
session_start();
$_SESSION['usuario'] = $usuarioReg;
header("Location: inicio.php");
}else{
header("Location: index.html");
exit();
}
}else{
header("Location: index.html");
exit();
}
?>