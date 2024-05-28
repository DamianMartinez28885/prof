var PRODUCTOS= JSON.parse(json);

var button_Cargar= $("#Cargar").click(Crear);
var button_borrar= $("#Vaciar").click(Vaciar);
var tbody= document.getElementById("tbody");

function Crear(){
{
      Vaciar();
      PRODUCTOS.CARRERA.forEach(function(Carrera){

         var fila= document.createElement("tr");
         var CeldaFecha= document.createElement("td");
         var CeldaLugar= document.createElement("td");
         var CeldaDistancia= document.createElement("td");
         var CeldaTipoCarrera= document.createElement("td");
         var CeldaPrecio= document.createElement("td");
      
         fila.className="tabla";
         tbody.appendChild(fila);

         CeldaFecha.className="celda";
         CeldaFecha.innerHTML=Carrera.FECHA;
         fila.appendChild(CeldaFecha);

         CeldaLugar.className="celda";
         CeldaLugar.innerHTML=Carrera.LUGAR
         fila.appendChild(CeldaLugar);

         CeldaDistancia.className="celda";
         CeldaDistancia.innerHTML=Carrera.DISTANCIA
         fila.appendChild(CeldaDistancia);
         
         CeldaTipoCarrera.className="celda";
         CeldaTipoCarrera.innerHTML=Carrera.TIPOCAR
         fila.appendChild(CeldaTipoCarrera);

         CeldaPrecio.className="celda";
         CeldaPrecio.innerHTML=Carrera.PRECIO        
         fila.appendChild(CeldaPrecio);
         
 });
}
}

function Vaciar() {
$("#tbody").empty();
}
