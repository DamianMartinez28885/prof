<?php
include('./manejoSesion.php');
//include('./libreria.inc');
session_destroy();
header('location:./formularioDeLogin.html');
?>