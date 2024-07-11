//Primera accion 
$(document).ready(function() {
		objTbDatos=document.getElementById("tbDatos");
		objIdCarreraAlta=document.getElementById("formCarrerasidCarreraAlta");
		objCategoriaAlta=document.getElementById("formCarrerasEntCategoriaAlta");
		objDescripcionAlta=document.getElementById("formCarrerasEntDescripcionAlta");
		objIdCarreraModi=document.getElementById("formCarrerasEntIdCarreraModi");
		objCategoriaModi=document.getElementById("formCarrerasEntCategoriaModi");
		objDescripcionModi=document.getElementById("formCarrerasEntDescripcionModi");
		$("#orden").val("idCarrera"); 
		$("#contenedorTablaCarreras").attr("className","contenedorActivo");
		$("#ventanaModalFormularioAlta").css("visibility","hidden");
		$("#ventanaModalFormularioModi").css("visibility","hidden");
		$("#ventanaModalRespuesta").css("visibility","hidden");
		$("#btEnvioFormModi").attr("disabled",true);
		$("#btEnvioFormAlta").attr("disabled",true);
		llenaCategorias();
});


//Cambiar las ventanas modales de visibles a invisible

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






//boton de cargar tabla

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
		$("#orden").val("idCarrera");
		cargaTabla();
	});	
});


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
	$("#formCarrerasidCarreraAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formCarrerasEntDescripcionAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formCarrerasEntIdentificadorAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready


$(document).ready(function() {
	$("#formCarrerasEntDistanciaAlta").keyup(function() {
			todoListoParaAlta();
		});
}); //cierro ready


$(document).ready(function() {
	$("#formCarrerasEntfechaEventoAlta").change(function() {
			todoListoParaAlta();
		});
}); //cierro ready


/*Validacion en formulario de modi*/
$(document).ready(function() {
	$("#formCarrerasEntIdCarreraModi").keyup(function() {
			todoListoParaModi();
		});
}); //cierro ready



$(document).ready(function() {
	$("#formCarrerasEntDescripcionModi").keyup(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formCarrerasEntCategoriaMod").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formArticulosEntDescricionModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formCarrerasEntIdentificadorModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formCarrerasEntfechaEventoModi").change(function() {
			todoListoParaModi();
		});
}); //cierro ready

$(document).ready(function() {
	$("#formCarrerasEntDistanciaModi").keyup(function() {
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
	if (document.getElementById("formCarrerasAlta").checkValidity()) {
		//alert("aquiTL");
		$("#btEnvioFormAlta").attr("disabled",false);
	}
	else { 
		$("#btEnvioFormAlta").attr("disabled",true);
	}
}

function todoListoParaModi() { //Habilita/deshabilita boton de modi
	//alert("dentro de todoListo para modi");

	if (document.getElementById("formCarrerasModi").checkValidity()) {
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
						objTd.setAttribute("campo-dato","carreras_btModi");
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
						objTd.setAttribute("campo-dato","carreras_btBaja");
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
	$("#formCarrerasEntIdCarreraModi").val(argCarrera);
	var objAjax = $.ajax({
		type:"get", 
		url:"./salidaJsonCarrera.php",
		data: { idCarrera:argCarrera },
		success: function(respuestaDelServer,estado) {  //La funcion de callback que se ejecutara cuando el req. sea completado.
			//alert(respuestaDelServer);
			objetoDato = JSON.parse(respuestaDelServer);
			$("#formCarrerasEntIdCarreraModi").val(objetoDato.idCarrera);
			$("#formCarrerasEntCategoriaMod").val(objetoDato.categoria);
			$("#formCarrerasEntDescripcionModi").val(objetoDato.descripcion);
			$("#formCarrerasEntIdentificadorModi").val(objetoDato.identificador);						
			$("#formCarrerasEntfechaEventoModi").val(objetoDato.fechaEvento);
			$("#formCarrerasEntDistanciaModi").val(objetoDato.distancia);
			todoListoParaModi();//habilitacion del boton de enviar modi si todo valida
		} //cierra el success
	}); //cierro ajax
}




function vaciaFormulario() {
	$("#formCarrerasidCarreraAlta").val("");
	$("#formCarrerasEntCategoriaAlta").val("");
	$("#formCarrerasEntDescripcionAlta").val("");
	$("#formCarrerasEntIdentificadorAlta").val("");						
	$("#formCarrerasEntfechaEventoAlta").val("");
	$("#formCarrerasEntDistanciaAlta").val("");
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
			$("#formCarrerasEntCategoriaAlta").empty();
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

							document.getElementById("formCarrerasEntCategoriaAlta").appendChild(objOption);
							
						});//cierra foreach
						return true;
			} //cierra el success
	}); //cierro ajax
}



function llenaCategoriasModi() { 
	
		$("#formCarrerasEntCategoriaMod").empty(); 
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
							if(objOption.value == $("#formCarrerasEntCategoriaMod").val()) {
								objOption.setAttribute("selected","selected");
							}

							document.getElementById("formCarrerasEntCategoriaMod").appendChild(objOption);
														
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

function modi() {
	if(confirm("¿Está seguro de modificar registro? " + $("#formCarrerasEntIdCarreraModi").val())) {

			var data = new FormData($("#formCarrerasModi")[0]);
			var objAjax = $.ajax({
			type: 'post',
			method: 'post',
			enctype: 'multipart/form-data',
			url: "./modi.php",
			processData: false, 
      contentType: false,
      cache: false,
			data: data,

			success:function(respuestaDelServer) {
				
				$("#ventanaModalRespuesta").css("visibility","visible");
				$("#contenidoModalRespuesta").empty();
				$("#encabezadoModalRespuesta").append("Respuesta del server: ");
				$("#contenidoModalRespuesta").append(respuestaDelServer);

				$("#ventanaModalFormulario").css("visibility","hidden");
			} 
		});
	} 
} 




function alta() {
	if(confirm("¿Está seguro de insertar registro? ")) {

		var data = new FormData($("#formCarrerasAlta")[0]);
		var objAjax = $.ajax({
			type: 'post',
			method: 'post',
			enctype: 'multipart/form-data',
			url: "./alta.php",
			processData: false,  
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


