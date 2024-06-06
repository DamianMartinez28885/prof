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
    if (isset($_POST['clave'])){
        echo "Clave encriptada: ". $_POST['clave'] . "<br>";
        $claveAEncriptada = $_POST['clave'];

        echo "<h2>Clave encriptada en md5(128 bits o 16 pares hexadecimales):  </h2>";
        $claveEncriptada = md5($claveAEncriptada);
        echo $claveEncriptada;
        echo "<br><br>";
        echo "<p>Clave encriptada: $claveAEncriptada</p>";
        echo "<h2>Clave encriptada en sha1(160 bits o 20 pares hexadecimales):  </h2>";
        $claveEncriptada = sha1($claveAEncriptada);
        echo $claveEncriptada;



    }
    else{
        ?>
        <form action="./respuestaFormulario.php" target="_blank" method="post">
    
        <label style="font-weight: bold" for="clave">Ingresar la clave a encriptar: </label>
        <input type="text" id="clave" name="clave" value="" required="required"><br>

        <input type="submit" name="submit" id="submit" value="Obtener encriptacion">  
    
        </form>
    <?php
    }

    ?>
   
    
</body>
</html>