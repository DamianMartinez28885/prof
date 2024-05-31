<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra Variable servidor</title>
    <style>
         table{
            border: 2px solid black;
            border-collapse: collapse;
            width: auto;
            background-color: beige;
            width: 50%;
        }

        th,td{
            border: 2px solid black;
            padding: 1%;
            
            
        }


    </style>
</head>
<body>
    <?php
        echo"<h2>Variable del servidor</h2>";
        echo "<table>
        <tr>
            <td>SERVER_ADDR</td>
            <td>". $_SERVER['SERVER_ADDR']."</td>
        </tr>
        <tr>
            <td>SERVER_PORT</td>
            <td>". $_SERVER['SERVER_PORT']."</td>
        </tr>
        <tr>
            <td>SERVER_NAME</td>
            <td>". $_SERVER['SERVER_NAME']."</td>
        </tr>
        <tr>
            <td>DOCUMENT_ROOT</td>
            <td>". $_SERVER['DOCUMENT_ROOT']."</td>
        </tr>
        
        </table>";



        echo"<h2>Variable de cliente</h2>";
        echo "<table>
        <tr>
            <td>REMOTE_ADDR</td>
            <td>". $_SERVER['REMOTE_ADDR']."</td>
        </tr>
        <tr>
            <td>REMOTE_PORT</td>
            <td>". $_SERVER['REMOTE_PORT']."</td>
        </tr>
        
        </table>";

        echo"<h2>Remote de Requerimiento</h2>";
        echo "<table>
        <tr>
            <td>SCRIPT_NAME</td>
            <td>". $_SERVER['SCRIPT_NAME']."</td>
        </tr>
        <tr>
            <td>REQUEST_METHOD</td>
            <td>". $_SERVER['REQUEST_METHOD']."</td>
        </tr>
        
        </table>";

        echo "<h2>TODAS</h2>";
        foreach ($_SERVER as $key_name => $key_value) {
            echo "<p>$key_name .$key_value <br>";
        }


        
    ?>
</body>
</html>