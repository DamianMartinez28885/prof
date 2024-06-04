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
            padding: auto;
            

        }

        #divResultado{
            background-color: yellow;
            float: left;
            box-sizing: border-box;
        }

        #divEstado{
            background-color: skyblue;
            clear: both;
            box-sizing: border-box;
        }

        input{
            width: 80%;
            display: block;
            height: 15%;
        }

        h2{
            display: block;
            font-size : 40px;
        }

        #submit {
            
            width: 95%;
            height: auto;
            
            

        }

        


    </style>
</head>
<body>
<form action="./respuestaFormulario.php" target="_blank" method="get">
    <div id="divPrincipal">
        <div id="divInput">
            <label for=""><h2>Dato de entrada</h2></label><br>
            
            <input type="text" name="dato">
            
        </div>
        <div id="divBoton">
        <input type="image" src="./enviar.jpg"  name="submit" id="submit" value="enviar">
        </div>
        <div id="divResultado"></div>
        <div id="divEstado"></div>





    </div>
</form>    
</body>
</html>