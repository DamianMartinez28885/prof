<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
    <style>
        body,html{
            width: 100%;
            padding: 1%;
            
            
        }

        #divPrincipal{
            background-color: beige;
            width: 50%;
            height: 500px;
            position: relative;
            margin: auto;
            
        }

        #divPrincipal div {
            width: 33.3%;
            height: 50%;
            box-sizing: border-box;
            }

        #divInput{
            background-color: green;
            float: left;
            padding: 1%;
            box-sizing: border-box;
        }

        #divBoton{
            background-color: greenyellow;
            float: left;
            box-sizing: border-box;
            
            padding: 1%;

        }

        #divResultado{
            background-color: yellow;
            float: left;
            box-sizing: border-box;
            padding: 1%;
        }

        #divEstado{
            background-color: skyblue;
            clear: both;
            box-sizing: border-box;
            padding: 1%;
        }

        input{
            width: 80%;
            display: block;
            height: 15%;
        }

        h2{
            display: block;
            
        }

        #enviar {
            
            width: 80%;
            height: auto;
            
            

        }

        


    </style>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="./ajax.js"></script>
</head>
<body>
<form action="./respuestaFormulario.php" target="_blank" method="post">
    <div id="divPrincipal">
        <div id="divInput">
            <label for=""><h2>Dato de entrada</h2></label><br>
            
            <input type="text" name="clave" id="clave">
            
        </div>
        <div id="divBoton">
        <label for=""><h2>Encriptar</h2></label><br>
        <input type="image" src="./enviar.jpg"  name="submit" id="enviar" value="enviar">
        </div>
        
        
        <div id="divResultado">
        <label for=""><h2>Resultado</h2></label><br>
        </div>
        
        
        
        <div id="divEstado">
        <label for=""><h2>Estado de requerimiento</h2></label><br>
        </div>





    </div>

</form>    
</body>
</html>