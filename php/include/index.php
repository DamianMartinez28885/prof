<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de include()</title>
    <style>
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
    <?php
    echo "<h1>En este ejemplo utilizamos la funcion include() que ubica codigo en el archivo ejemplo2.inc :</h1>";
    echo "<h2>Antes de insertar el include las variables declaradas en el mismo no existen</h2>";
    echo "<h2>Las variables son:</h2>";
    for ($i=1; $i < 6; $i++) { 
        echo $bebidas[$i];
    }
    
    echo "<h2>La longitud de los arreglos son 0</h2>";
    include("./ejemplo2.inc");
    echo "<h2>Ya se ejecuto la funcion include, si el archivo no existe, se visualiza warning y el scrip sigue ejectandose, hasta el final</h2>";
    echo "<h2>La ".count($aBebidasCalientes). " variables de tipo array asociativos en el inc son:</h2>";
    echo "<table>";
    foreach ($aBebidasCalientes as $bebidas){
        echo "<tr>";
            for ($i=0; $i < count($bebidas); $i++) { 
                echo "<td>$bebidas[$i]</td>";
            }        
        
        echo "</tr>";

    } 
    echo "</table>";
    
    echo "<h2>La cantidad de arreglos es: " . count($bebidas)."</h2>";
    
    
    
    
    
   
    



    ?>
    
</body>
</html>