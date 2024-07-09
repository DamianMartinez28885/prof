<?php
  
  //include('../manejoSesion.inc');
  include("./datosConexionBase.php");
  
  $idCarrera = $_POST['idCarrera'];
  $identificador = $_POST['identificador'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];
  $fechaEvento = $_POST['fechaEvento'];
  $distancia = $_POST['distancia'];
  //$documentoPdf = $_POST['documentoPdf'];
  
  $respuesta_estado = "";

  $consulta = "INSERT INTO `carreras`(`idCarrera`, `identificador`, `descripcion`, `categoria`, `distancia`, `fechaEvento`, `deslinde`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')";
?>