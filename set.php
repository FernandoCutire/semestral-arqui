<?php
session_start();
//Pone la cookie del usuario
setcookie('usuario', $_SESSION['usuario']);
echo "<script type='text/javascript'>window.location.href = 'inicio.php';</script>";
?>
