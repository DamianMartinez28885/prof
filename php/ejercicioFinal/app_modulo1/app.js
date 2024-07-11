
/*Evento de carga inicial*/

$(document).ready(function() {
		objTbDatos=document.getElementById("tbDatos");//Para usar con java script
		objCodArtAlta=document.getElementById("formArticulosEntCodArtAlta");
		objFamiliaAlta=document.getElementById("formArticulosEntFamiliaAlta");
		objDescripcionAlta=document.getElementById("formArticulosEntDescripcionAlta");
		objCodArtModi=document.getElementById("formArticulosEntCodArtModi");
		objFamiliaModi=document.getElementById("formArticulosEntFamiliaModi");
		objDescripcionModi=document.getElementById("formArticulosEntDescripcionModi");
		$("#orden").val("idCarrera"); //suponiendo que de entrada quisiera este orden
		$("#contenedorTablaCarreras").attr("className","contenedorActivo");
		$("#ventanaModalFormularioAlta").css("visibility","hidden");
		$("#ventanaModalFormularioModi").css("visibility","hidden");
		$("#ventanaModalRespuesta").css("visibility","hidden");
		$("#btEnvioFormModi").attr("disabled",true);
		$("#btEnvioFormAlta").attr("disabled",true);
		llenaCategorias();
});


/*Eventos Modales*/

	$(document).ready(function() {
		$("#btCruzFormularioAlta").click(function() {
			
			$("#contenedorTablaCarreras").attr("className","contenedorTabla");
			$("#contenedorTablaCarreras").attr("className","contenedorActivo");
			$("#ventanaModalFormularioAlta").css("visibility","hidden");
		}); 
	});


	$(document).ready(function() {
		$("#btCruzFormularioModi").click(function() {
			
			$("#contenedorTablaCarreras").attr("class","contenedorTabla");
			$("#contenedorTablaCarreras").attr("className","contenedorActivo");
			$("#ventanaModalFormularioModi").css("visibility","hidden");
			
		}); 
	});



	$(document).ready(function() {
		$("#btCruzRespuesta").click(function() {
			
			$("#contenedorTablaCarreras").attr("class","contenedorTabla");
			$("#contenedorTablaCarreras").attr("className","contenedorActivo");
			$("#ventanaModalRespuesta").css("visibility","hidden");
			$("#contenidoModalRespuesta").empty();
			$("#ventanaModalFormularioModi").css("visibility","hidden");
			$("#ventanaModalFormularioAlta").css("visibility","hidden");

		}); 
	});





/*Eventos de Tablas*/


$(document).ready(function() {
	$("#btAccionCarga").click(function() {
		cargaTabla();
	});
});



$(document).ready(function() {
	$("#btAccionVacia").click(function() {
		$("#tbDatos").empty();
	});
});

$(document).ready(function() {
	$("#btLimpiaFiltros").click(function() {
		limpiaFiltros();
	});
});




$(document).ready(function() {
	$("#btAlta").click(function() {
		$("#contenedorTablaCarreras").attr("className","contenedorPasivo");
		$("#ventanaModalFormularioAlta").css("visibility","visible");
		vaciaFormulario(); //carga valor vacío en todos los campos del form
		llenaCategoriasAlta(); //completa familias del cuadro de lista
	});
});


$(document).ready(function() {
	$("#th_idCarrera" ).click(function() {
		$("#orden").val("idCarrera"); //solo cargo esta variable orden
		cargaTabla();
	});	//cierro click
}); //cierro ready


$(document).ready(function() {
	$("#th_identificador" ).click(function() {
		$("#orden").val("identificador"); //solo cargo esta variable orden
		cargaTabla();
	});	//cierro click
}); //cierro ready


$(document).ready(function() {
	$("#th_categoria" ).click(function() {
		$("#orden").val("categoria"); //solo cargo esta variable orden
		cargaTabla();
	});	//cierro click
}); //cierro ready

$(document).ready(function() {
	$("#th_descripcion" ).click(function() {
		$("#orden").val("descripcion"); //solo cargo esta variable orden
		cargaTabla();
	});	//cierro click
}); //cierro ready

$(document).ready(function() {
	$("#th_fechaEvento" ).click(function() {
		$("#orden").val("fechaEvento"); //solo cargo esta variable orden
		cargaTabla();
	});	//cierro click
}); //cierro ready

$(document).ready(function() {
	$("#th_distancia" ).click(function() {
		$("#orden").val("distancia"); //solo cargo esta variable orden
		cargaTabla();
	});	//cierro click
}); //cierro ready



/*Eventos Formularios*/

$(document).ready(function() {
	$("#btEnvioFormModi").click(function() {
			modi();	
	});
});

$(document).ready(function() {
	$("#btEnvioFormAlta").click(function() {
			alta();	
	});
});






/*Validacion en formulario de alta*/
$(document).ready(function() {
	$("#formArticulosEntCodArtAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntDescripcionAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntUmAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready


$(document).ready(function() {
	$("#formArticulosEntSaldoStockAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready


$(document).ready(function() {
	$("#formArticulosEntFechaAltaAlta").change(function() {
			todoListoParaAlta();
		});
}); //cierro ready


/*Validacion en formulario de modi*/
$(document).ready(function() {
	$("#formArticulosEntCodArtModi").keyup(function() {
			todoListoParaModi();
		});
}); //cierro ready



$(document).ready(function() {
	$("#formArticulosEntDescripcionModi").keyup(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntFamiliaModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntDescricionModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntUmModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntFechaAltaModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntSaldoStockModi").keyup(function() {
			todoListoParaModi();
		});
}); //cierro ready


$(document).ready(function() {
	$("#btCierraSesion").click(function() {
		location.href="./ejer30Sesion/destruirsesion.php";
	});
});




/*Funciones*/

function todoListoParaAlta() { //Habilita/deshabilita boton de alta
	//alert("Dentro de todo listo para el alta");
	if (document.getElementById("formArticulosAlta").checkValidity()) {
		//alert("aquiTL");
		$("#btEnvioFormAlta").attr("disabled",false);
	}
	else { 
		$("#btEnvioFormAlta").attr("disabled",true);
	}
}

function todoListoParaModi() { //Habilita/deshabilita boton de modi
	//alert("dentro de todoListo para modi");

	if (document.getElementById("formArticulosModi").checkValidity()) {
		$("#btEnvioFormModi").attr("disabled",false);
	}
	else { 
		$("#btEnvioFormModi").attr("disabled",true);
	}
}





function cargaTabla() {
	
	$("#tbDatos").empty();
	$("#tbDatos").html("<p style='font-size: 50px;'>ESTABLECIENDO CONEXION --- ESPERE POR FAVOR</p>");
	var objAjax = $.ajax({
		type:"get", 
		url:"salidaJsonCarreras.php",
		timeout:8000,
		data: { 
			orden: $("#orden").val(),
			fila_id: $("#fila_id").val(),
			fila_categoria: $("#fila_categoria").val(),
			fila_identificador: $("#fila_identificador").val(),
			fila_descripcion: $("#fila_descripcion").val(),
			fila_fechaEvento:$("#fila_fechaEvento").val(),
			fila_distancia:$("#fila_distancia").val(),
		},
		success: function(respuestaDelServer,estado) {  //La funcion de callback que se ejecutara cuando el req. sea completado.
					//$("#tbDatos").html(respuestaDelServer)//para ver el json recibido dentro de tbDatos;
					$("#tbDatos").empty();
					alert(respuestaDelServer);
					
					objJson=JSON.parse(respuestaDelServer);
					//Luego barre el objeto de datos leyendo sus datos copiandolos al cuerpo de la tabla.
					objJson.carreras.forEach(function(argValor,argIndice) { 
						var objTr= document.createElement("tr");
						var objTd=document.createElement("td");
						//objTd.setAttribute("classname","")
						objTd.setAttribute("campo-dato","carreras_idCarrera");
						objTd.innerHTML=argValor.idCarrera;
						objTr.appendChild(objTd);

						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","carreras_identificador");
						objTd.innerHTML=argValor.identificador;
						objTr.appendChild(objTd);

						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","carreras_descripcion");
						objTd.innerHTML=argValor.descripcion;
						objTr.appendChild(objTd);


						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","carreras_categoria");
						objTd.innerHTML=argValor.categoria;
						objTr.appendChild(objTd);

						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","carreras_fechaEvento");
						objTd.innerHTML=argValor.fechaEvento;
						objTr.appendChild(objTd);

						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","carreras_distancia");
						objTd.innerHTML=argValor.distancia;
						objTr.appendChild(objTd);

						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","carreras_deslinde");
						objTd.innerHTML="<button class='btCelda'>PDF</button>";

						objTd.addEventListener("click", function() {
							$("#contenedorTablaCarreras").attr("className","contenedorPasivo");
							$("#ventanaModalRespuesta").css("visibility","visible");
							traeDoc(argValor.idCarrera);
						});

						objTr.appendChild(objTd);


						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","articulos_btModi");
						objTd.innerHTML="<button class='btCelda'>Modi</button>";

						objTd.addEventListener("click",function() {	
							$("#contenedorTablaCarreras").attr("className","contenedorPasivo");
							$("#ventanaModalFormularioModi").css("visibility","visible");
							//alert();
							llenaCategoriasModi();
							CompletaFichaArticulo(argValor.idCarrera);
						});

						objTr.appendChild(objTd);


						var objTd=document.createElement("td");
						objTd.setAttribute("campo-dato","articulos_btBaja");
						objTd.innerHTML="<button class='btCelda'>Borrar</button>";
						objTd.addEventListener("click", function() {	
						baja(argValor.idCarrera);
						});

						objTr.appendChild(objTd);

						objTbDatos.appendChild(objTr);
				
					});//cierra el forEach
					$("#totalRegistros").html("Nro de registros: " + objJson.carreras.length);
					
				}//cierra funcion asignada al success
			}); //cierra objeto de parametros y funcion ajax

}//cierra funcion cargaTabla






function CompletaFichaArticulo(argCarrera) {	
	$("#formArticulosEntCodArtModi").val(argCarrera);
	var objAjax = $.ajax({
		type:"get", 
		url:"./salidaJsonArticulo.php",
		data: { idCarrera:argCarrera },
		success: function(respuestaDelServer,estado) {  //La funcion de callback que se ejecutara cuando el req. sea completado.
			//alert(respuestaDelServer);
			objetoDato = JSON.parse(respuestaDelServer);
			$("#formArticulosEntCodArtModi").val(objetoDato.idCarrera);
			$("#formArticulosEntFamiliaModi").val(objetoDato.categoria);
			$("#formArticulosEntDescripcionModi").val(objetoDato.descripcion);
			$("#formArticulosEntUmModi").val(objetoDato.identificador);						
			$("#formArticulosEntfechaAltaModi").val(objetoDato.fechaEvento);
			$("#formArticulosEntSaldoStockModi").val(objetoDato.distancia);
			todoListoParaModi();//habilitacion del boton de enviar modi si todo valida
		} //cierra el success
	}); //cierro ajax
}




function vaciaFormulario() {
	$("#formArticulosEntCodArtAlta").val("");
	$("#formArticulosEntFamiliaAlta").val("");
	$("#formArticulosEntDescripcionAlta").val("");
	$("#formArticulosEntUmAlta").val("");						
	$("#formArticulosEntfechaAltaAlta").val("");
	$("#formArticulosEntSaldoStockAlta").val("");
}




function llenaCategorias() { //el argumento corresponde al objeto que será llenado
			$("#fila_categoria").empty();
			var objAjax = $.ajax({
			type:"get", 
			url:"./salidaJsonCategorias.php",
			
			success: function(respuestaDelServer,estado) {
						alert(respuestaDelServer);
						listaDeObjetos = JSON.parse(respuestaDelServer);
						/*Agrega la opcion vacia*/
						var objOption= document.createElement("option");
						/*objOption.setAttribute("class","elementoOptionSelect");*/
						objOption.setAttribute("value", ""); 
						objOption.innerHTML="";
						document.getElementById("fila_categoria").appendChild(objOption);

						/*Barre el array de lista de Objetos para agregar opciones*/
						listaDeObjetos.categorias.forEach(function(argValor,argIndice) { 
												
							var objOption= document.createElement("option");
							objOption.setAttribute("value", argValor.codCategoria); 
							//alert(argValor.codFamilia);
							objOption.innerHTML=argValor.descripcionCategoria;

							document.getElementById("fila_categoria").appendChild(objOption);
							
						});//cierra foreach
						return true;
			} //cierra el success
	}); //cierro ajax
}








function llenaCategoriasAlta() { //el argumento corresponde al objeto que será llenado
			$("#formArticulosEntFamiliaAlta").empty();
			var objAjax = $.ajax({
			type:"get", 
			url:"./salidaJsonCategorias.php",
			
			success: function(respuestaDelServer,estado) {
						//alert(respuestaDelServer);
						listaDeObjetos = JSON.parse(respuestaDelServer);
						listaDeObjetos.categorias.forEach(function(argValor,argIndice) { 
												
							var objOption= document.createElement("option");
							objOption.setAttribute("class","elementoOptionSelect");
							objOption.setAttribute("value", argValor.codCategoria); 
							
							objOption.innerHTML=argValor.codCategoria + argValor.descripcionCategoria;

							document.getElementById("formArticulosEntFamiliaAlta").appendChild(objOption);
							
						});//cierra foreach
						return true;
			} //cierra el success
	}); //cierro ajax
}



function llenaCategoriasModi() { 
	//alert($("#formArticulosEntFamiliaModi").val());
		$("#formArticulosEntFamiliaModi").empty(); //antes de llenar vacío para no duplicar elementos
	//alert($("#formArticulosEntFamiliaModi").val());		
			/*Este objeto del documento es un array de opciones que ya puede estar cargado de antes y hay
			que vaciarlo si lo deseo recargar.
			El value del select*/

			var objAjax = $.ajax({
			type:"get", 
			url:"./salidaJsonCategorias.php",
			
			success: function(respuestaDelServer,estado) {
						
						listaDeObjetos = JSON.parse(respuestaDelServer);
						listaDeObjetos.categorias.forEach(function(argValor,argIndice) { 
						
							
							var objOption= document.createElement("option");
							objOption.setAttribute("class","elementoOptionSelect");
							objOption.setAttribute("value", argValor.codCategoria); 

							//El formulario ya está cargado con los datos desde el momento en que 
							//hizo click en el boton de modi del registro apuntado.
							objOption.innerHTML=argValor.codCategoria + argValor.descripcionCategoria;
							if(objOption.value == $("#formArticulosEntFamiliaModi").val()) {
								objOption.setAttribute("selected","selected");
							}

							document.getElementById("formArticulosEntFamiliaModi").appendChild(objOption);
														
						});//cierra foreach
						return true;
			} //cierra el success
	}); //cierro ajax
}


function limpiaFiltros() {
	$("#fila_id").val("");
	$("#fila_categoria").val("");
	$("#fila_descripcion").val("");
	$("#fila_identificador").val("");
	$("#fila_fechaEvento").val("");
}

function consultaDatos(codArt) {
		//primera funcion:
		var promesaIsBloqueado = $.ajax({
			dataType:"text",
			type: "get",
			url: "./isBloqueado.php",
			data: {codArt:codArt}
		}); //cierra ajax

		// segunda funcion 
		var promesaPrecio = $.ajax({
			dataType:"text",
			type: "get",
			url: "./precio.php",
			data: {codArt:codArt}
		}); //cierra ajax

		//Puedo ejecutar n requerimientos ajax y pretender ejecutar un handler cuando todos los requerimientos
		//hayan recibido respuesta

		$.when(promesaIsBloqueado, promesaPrecio).done(function(respuestaDelServerIsBloqueado,respuestaDelServerPrecio) {
			//alert(respuestaDelServerIsBloqueado[0]);
			$("#ventanaModalRespuesta").css("visibility","visible");
			$("#encabezadoModalRespuesta").append("Respuestas del server");
			$("#contenidoModalRespuesta").empty();
			$("#contenidoModalRespuesta").append("<h2>Está bloqueado? "+respuestaDelServerIsBloqueado[0]+"<h2>");
			
			$("#contenidoModalRespuesta").append("<h2>Precio unitario: "+respuestaDelServerPrecio[0]+"</h2>");
			

		});//cierra el done


}




function modi() {
	if(confirm("¿Está seguro de modificar registro? " + $("#formArticulosEntCodArtModi").val())) {
/*
		var objAjax = $.ajax({
			type: "get",
			//url:'./salidaJsonFamilias.php',
			url: "./modi.php",
			data: {
				codArt:$("#formArticulosEntCodArtModi").val(),
				familia:$("#formArticulosEntFamiliaModi").val(),
				descripcion:$("#formArticulosEntDescripcionModi").val(),
				um:$("#formArticulosEntUmModi").val(),
				fechaAlta:$("#formArticulosEntfechaAltaModi").val(),
				saldoStock:$("#formArticulosEntSaldoStockModi").val()
			},
*/
			var data = new FormData($("#formArticulosModi")[0]);
			var objAjax = $.ajax({
			type: 'post',
			method: 'post',
			enctype: 'multipart/form-data',
			url: "./modi.php",
			processData: false,  // Importante!
      contentType: false,
      cache: false,
			data: data,

			success:function(respuestaDelServer) {
				//alert(respuestaDelServer);
				
				$("#ventanaModalRespuesta").css("visibility","visible");
				$("#contenidoModalRespuesta").empty();
				$("#encabezadoModalRespuesta").append("Respuesta del server: ");
				$("#contenidoModalRespuesta").append(respuestaDelServer);

				$("#ventanaModalFormulario").css("visibility","hidden");

			} //cierra success

		}); //cierra ajax
		//cargaTabla();
	} //cierra confirm
	//cargaTabla();
} //cierra modi()




function alta() {
	if(confirm("¿Está seguro de insertar registro? ")) {

		var data = new FormData($("#formArticulosAlta")[0]);//Definimos un objeto data que es el form completo
		var objAjax = $.ajax({
			type: 'post',
			method: 'post',
			enctype: 'multipart/form-data',
			url: "./alta.php",
			processData: false,  // Importante!
	    contentType: false,
	    cache: false,
			data: data,

			success:function(respuestaDelServer) {
				//alert(respuestaDelServer);
				

				$("#ventanaModalRespuesta").css("visibility","visible");
				$("#contenidoModalRespuesta").empty();
				$("#encabezadoModalRespuesta").append("Respuesta del server: ");
				$("#contenidoModalRespuesta").append(respuestaDelServer);

				$("#ventanaModalFormulario").css("visibility","hidden");

			} //cierra success
		
		}); //cierra ajax
		//cargaTabla();
	} //cierra confirm
	//cargaTabla();
	
} //cierra alta()



function baja(argArticulo) {
	if(confirm("¿Está seguro de borrar este registro? ")) {

		var objAjax = $.ajax({
			type: "get",
			url: "./baja.php",
			data: {
				idCarrera:argArticulo
			},
			success:function(respuestaDelServer) { //datos es lo que catura ajax
				//alert(respuestaDelServer);
				
				$("#ventanaModalRespuesta").css("visibility","visible");
				$("#contenidoModalRespuesta").empty();
				$("#contenidoModalRespuesta").append(respuestaDelServer);
				$("#ventanaModalFormulario").css("visibility","hidden");

			} //cierra success
		}); //cierra ajax
	} //cierra confirm
//cargaTabla();
} //cierra baja()


function traeDoc(argArticulo) {
	if(confirm("¿Está seguro de traer este dato? ")) {

		var objAjax = $.ajax({
			type: "get",
			url: "./traeDoc.php",
			data: {
				idCarrera:argArticulo
			},
			success:function(respuestaDelServer) { //datos es lo que catura ajax
				//alert("Respuesta del SERVER desde adentro del success:"+ respuestaDelServer);
				objetoDato = JSON.parse(respuestaDelServer);
				$("#ventanaModalRespuesta").css("visibility","visible");
				$("#contenidoModalRespuesta").empty();
				$("#contenidoModalRespuesta").html("<iframe width='100%' height='300px' src='data:application/pdf;base64,"+objetoDato.deslinde+"'></iframe>");

			} //cierra success
		}); //cierra ajax
	} //cierra confirm

cargaTabla();

} 


$(document).ready(function() {
	$("#btCierraSesion").click(function() {
		location.href="../destruirsesion.php";
	});
});


