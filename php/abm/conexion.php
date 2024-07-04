<?php
$dbh = "";
$dbname = "dbcarreras"; 
$host = "localhost";
$user = "root";
$password = "";
$estado = "";

try{
$dsn= "mysql:host=$host;dbname=$dbname";
$dbh= new PDO($dsn,$user);
$estado = "Conexion exitosa";
}

catch(PDOException $e) {
$estado = $e-> getMessage();
$dbh = "";


}

?>