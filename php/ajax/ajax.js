const enviar = $("#enviar");
const resultado = $("#divResultado");
const estado = $("#divEstado");

enviar.click(function(){ 
resultado.empty();
resultado.html("<h2>Esperando resultado</h2>");
estado.empty();
estado.append("<h2>Estado del requerimiento</h2>");
$ajax({
    type:"post",
    url: "./respuestaFormulario.php",
    data: { clave: $("#clave").val()},
    success: function (repuestaDelServer,estado){
        resultado.html("<h2>Resultado</h2><h4>" + repuestaDelServer   + "</h4>");
        estado.append("<h4>"+ estado +"</h4>");

    }



})




});





