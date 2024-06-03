<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta Formulario PHP</title>
</head>
<body>
    <h1>Estas son las respuestas del formulario</h1>
    <?php
    echo "Apellido: ". $_GET['apellido'] . "<br>";
    echo "Nombre: ". $_GET['nombre'] . "<br>";
    echo "DNI: ". $_GET['dni'] . "<br>";
    echo "Categoria: ". $_GET['categoria'] . "<br>";
    echo "Mail: ". $_GET['email'] ."<br>";
    


    ?>
    
</body>
</html>