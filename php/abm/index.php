<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styleTablaVariableArregloDeObjetos.css">
    <title>Tabla Variable Arreglo de Objetos</title>
</head>
    
<body>
    <div id="principal">
        <header id="encabezado">
            
            <div class="Botones">
                
                <input type="text" class="orden">
                <button id="Cargar" >CARGAR DATOS</button>
                <button id="Vaciar" >VACIAR DATOS</button>
                <button id="Cargar" >LIMPIAR FILTROS</button>
                <button id="Vaciar" >ALTA REGISTRO</button>
               
            </div>
        </header>
        
        <table id="general" >
            <thead>
                <tr id="filasEnCabezado">
                    <th class="celda">FECHA</th>
                    <th class="celda">LUGAR</th>
                    <th class="celda">DISTANCIA</th>
                    <th class="celda">TIPO CARRERA</th>
                    <th class="celda">PRECIO</th>
                    <th class="celda">PDF</th>
                    <th class="celda">MOD</th>
                    <th class="celda">BORRAR</th>

                </tr>
            </thead>
            <tbody id="tbody">
                

            </tbody>

            

        </table>


        <footer>
            <h2>Pie de pagina</h2>
        </footer>
        
   
    </div>
<script src="../Tabla variable arreglo de objetos/json.js"></script>
<script src="../jquery-3.7.1.min.js"></script>
<script src="./tablaVariableArreglosDeObjetos.js"></script>

</body>


</html>