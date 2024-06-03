<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            justify-content: center;
            display: flex;
            align-items: center;

        }


    </style>
</head>
<body>
    <form action="./respuestaFormulario.php" target="_blank" method="post">
    
    <label style="font-weight: bold" for="clave">Ingresar la clave a encriptar: </label>
    <input type="text" id="clave" name="clave" value="" required="required"><br>

    <input type="submit" name="submit" id="submit" value="Obtener encriptacion">  
    
    </form>

</body>
</html>