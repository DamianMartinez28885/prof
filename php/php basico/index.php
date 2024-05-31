<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP BASICO</title>
    <style>
        span{
            color: blue;
        }
        table{
            border: 2px solid black;
            border-collapse: collapse;
            width: auto;
        }

        th,td{
            border: 2px solid black;
            width: 25%;
        }
    </style>
</head>
<body>
    <h2>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php</h2>
    <hr>
    <h2>Todo texto html <span>entregado por el procesador php</span> va usando la sentencia echo</h2>
    <hr>
    <?php  
    $mivariable = "Valor1";
    echo "<h2>Sin usar concatenador \$mivariable : $mivariable </h2>" ;
    echo "<h2>Usando concatenador " . "\$mivariable" ." : ". $mivariable. "</h2>" ;
    ?>

    <hr>

    <?php  
    $mivariable = true;
    echo "<h2>Variable tipo booleano o logica (verdadero) \$mivariable : $mivariable </h2>" ;
    $mivariable = false;
    echo "<h2>Variable tipo booleano o logica (falso) \$mivariable : $mivariable </h2>" ;
    ?>

    <hr>

    <?php  
    define("MICONSTANTE","ValorConstante");
    echo "<h2> <span>MICONSTANTE</span> : " . MICONSTANTE ." </h2>" ;
    echo "<h2>Tipo de <span>MICONSTANTE</span> es :" . gettype(MICONSTANTE) ."</h2>" ;
    ?>

    <hr>
    <h2>Arreglos:</h2>
    <?php  
    $aMate=["con azucar","sin azucar"];
    echo "<h2><span>aMate[0] :</span>". $aMate[0] ."</h2>";
    echo "<h2><span>aMate[1] :</span>". $aMate[1] ."</h2>";
    echo "<h2>Tipo de <span>aMate :</span>". gettype($aMate) ."</h2>";
    ?>

    <h2>Se agregan por programa dos elementos nuevos</h2>
    <?php  
    array_push($aMate,"con edulcorante");
    array_push($aMate,"con hierbas");

    ?>

    <h2>Todos los elementos originales y los agregados</h2>
    <ul>
        <?php
         foreach ($aMate as $mate){
            echo "<li> <h3>$mate</h3></li>";

         }   

        ?>
    </ul>

    <?php

    $aMatecocido=["con azucar","sin azucar","con edulcorante","con leche"];
    $aTe=["boldo","menta","manzanilla","verde"];
    $aCafe=["cortado","lagrima","frio","con leche"];
    $aBebidasCalientes = [$aMate, $aMatecocido,$aTe, $aCafe];

    echo "<h2>La variable \$aBebidasCalientes es de tipo: " . gettype($aBebidasCalientes) .  "</h2>";

   echo"<TAble>";
    echo"<tr>
         <td>MATE</td>
         <td>MATECOCIDO</td>
         <td>TE</td>
         <td>CAFE</td>
   </tr>"; 
   for ($i=0; $i < 4; $i++) { 
    echo "<tr>";
    foreach ($aBebidasCalientes as $bebida){
        echo "<td>$bebida[$i]</td>";

    }

    echo "</tr>";

   }

   echo"</TAble>";

    echo "<h2>Tambien se puede expresar el valor de \$aBebidasCalientes[1][3]: ". $aBebidasCalientes[1][3] . " </h2>";
    echo  "<h2>La cantidad de elementos de BebidasCalientes es ". count($aBebidasCalientes) ."</h2>";

    ?>
    
    <footer><h2>Variable tipo arreglo asociativos</h2></footer>
    








</body>
</html>