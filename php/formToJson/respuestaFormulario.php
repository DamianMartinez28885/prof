<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta Formulario</title>
</head>
<body>
    
    <?php
    echo "<h2>Respuesta Formulario</h2>";
    
        echo "NUMERO: ". $_POST['clave'] . "<br>";
        echo "APELLIDO: ". $_POST['apellido'] . "<br>";
        echo "NOMBRE: ". $_POST['nombre'] . "<br>";
        echo "DNI: ". $_POST['dni'] . "<br>";
        echo "FECHA DE NACIMIENTO: ". $_POST['fecha'] . "<br>";





      
    
    ?>
   
    
</body>
</html>