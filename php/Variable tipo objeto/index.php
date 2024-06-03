<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable tipo Objetos</title>
    <style>
        span{
            color: blue;
        }


    </style>
</head>
<body>
    <h2>Variable de tipo objeto en PHP. Objeto renglon de pedido</h2>
    
    <?php
    $objetoCarrera = new stdClass();
    
    $objetoCarrera->nombre="Tandil";
    $objetoCarrera->distancia="29K";
    $objetoCarrera->fecha="2025/03/19";
    $objetoCarrera->precio="$35000";
    echo "<h2><span>\$objetoCarrera</span></h2>";

    echo "<p>Nombre de carrera:".$objetoCarrera->nombre."</p>";
    echo "<p>Fecha de carrera:".$objetoCarrera->fecha ."</p>";
    echo "<p>Distancia de carrera:".$objetoCarrera->distancia ."</p>";
    echo "<p>Precio de carrera:".$objetoCarrera->precio  ."</p>";

    echo "<h2>Tipo de <span>\$objetoCarrera </span>: ". gettype($objetoCarrera)."</h2>";
  
    ?>
    <h2>Definamos arreglos de Carreras:</h2>
    <?php
    $aRenglonesCarrera = [];
    array_push($aRenglonesCarrera,$objetoCarrera);
    echo "<h2><span>\$aRenglonesCarrera</span></h2>"; 
    echo "<h2>Tabula <span>\$aRenglonesCarrera</span>. Recorrer el arreglo de renglones y tabularlos con html:</h2>";
    $objetoCarrera2 = new stdClass();
    $objetoCarrera2->nombre="Lujan";
    $objetoCarrera2->distancia="10K";
    $objetoCarrera2->fecha="2024/06/25";
    $objetoCarrera2->precio="GRATIS";

    array_push($aRenglonesCarrera,$objetoCarrera2);

    foreach ($aRenglonesCarrera as $Carrera){
        echo "<p>". $Carrera->nombre . "  " . $Carrera->fecha . "  " . $Carrera->distancia. "  " . $Carrera->precio ."</p>";
       
    }
    echo "<h2>La cantidad de renglones es " . count($aRenglonesCarrera ). "</h2>";
    $objetoRenglonesCarrera = new stdClass();
    $objetoRenglonesCarrera->renglonesCarrera = $aRenglonesCarrera;
    $objetoRenglonesCarrera->cantidadDeCarreras = count($aRenglonesCarrera);

    echo "<h2>Produccion de un objeto <span>\$objetoRenglonesCarrera</span> con dos atributos de array RenglonesCarrera y cantidadDeCarreras </h2>";
    echo "<p>Cantidad de renglones es " . count($aRenglonesCarrera) ."</p>";
    $json_RenglonesCarrera = json_encode($objetoRenglonesCarrera);

    echo "<h2>Produccion de  un Json JsonRengones:</h2>";
    echo "<p> $json_RenglonesCarrera</p>";

    
    ?>
    
    
    
</body>
</html>