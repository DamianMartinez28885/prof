<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<title>Formulario</title>
    <h1>Formulario en PHP</h1>

    <form action="./respuestaFormulario.php" target="_blank" method="get" >
    <label style="font-weight: bold" for="apellido">Apellido: </label><br>
    <input type="text" id="apellido" name="apellido" value="" required="required" ><br>

    <label style="font-weight: bold" for="apellido">Nombre: </label><br>
    <input type="text" id="nombre" name="nombre" value="" required="required"><br>  

    <label style="font-weight: bold" for="apellido">DNI: </label><br>
    <input type="numero" id="dni" name="dni" value="" required="required"><br>

    <label style="font-weight: bold;" for="categoria">Distancia</label><br>
        <select name="categoria" id="categoria">
            <option value="10 km" selected="selected">10 km (competitivo)</option>
            <option value="3 km">3k (caminata)</option>
            <option value="5 km">5k (participativo)</option>
            
        </select><br><br>

        <label style="font-weight: bold;" for="email">Ingresar un mail para enviarle info sobre futuras Carreras </label><br>
        <input type="email" name="email" id="email" placeholder="texto@texto"><br><br>

    
    
    
    
    
    
    
    
    <input type="submit" name="submit" id="submit" value="Enviar">  
    <input type="reset" name="reset" id="reset" value="Reestablecer">




    </form> 
<body>
    
</body>
</html>