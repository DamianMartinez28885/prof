<?php
include ('../manejoSesion.php')
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="./style.css">
<script src="./jquery.js"></script>
<script src="./app.js"></script>
</head>


<body>
	<div id="contenedorTablaCarreras" class="contenedorTabla">
		
		<header >
			<label >ORDENADO POR:</label>
			<input type="text" name="orden" id="orden" readonly value="" >

			<button id="btAccionCarga">CARGAR DATOS</button>
			<button id="btAccionVacia">VACIAR DATOS</button>
			<button id="btLimpiaFiltros">LIMPIAR FILTRO</button>
			<button id="btAlta">ALTA REGISTRO</button>
			<button id="btCierraSesion">CERRAR SECION</button>
		</header>

		<table>
			<thead >
			<tr style="height:50%">
			<td class="titulosColumnas" campo-dato="carreras_idCarrera" id="th_idCarrera">ID</td>
			<td class="titulosColumnas" campo-dato="carreras_identificador" id="th_identificador">LUGAR</td>
			<td class="titulosColumnas" campo-dato="carreras_descripcion" id="th_descripcion">DESCRIPCION</td>
			<td class="titulosColumnas" campo-dato="carreras_categoria" id="th_categoria">CATEGORIA (AÑOS)</td>
			<td class="titulosColumnas" campo-dato="carreras_fechaEvento" id="th_fechaEvento">FECHA EVENTO</td>
			<td class="titulosColumnas" campo-dato="carreras_distancia" id="th_distancia">DISTANCIA</td>
			<td class="titulosColumnas" campo-dato="carreras_deslinde" id="th_deslinde">DESLINDE</td>
			<td class="titulosColumnas" campo-dato="carreras_btModi">MODIFICAR</td>
			<td class="titulosColumnas" campo-dato="carreras_btModi">BAJA</td>
			</tr>

			<tr style="height:40%">
			<td campo-dato="carreras_idCarrera"><input id="fila_id"></input></td>
			<td campo-dato="carreras_identificador"><input id="fila_identificador"></input></td>
			<td campo-dato="carreras_descripcion"><input id="fila_descripcion"></input></td>
			
			<td campo-dato="carreras_categoria">
				<select id="fila_categoria" name="categoria"></select> 
				
			</td>
			
			
			<td campo-dato="carreras_fechaEvento"><input id="fila_fechaEvento"></input></td>
			<td campo-dato="carreras_distancia"></td>
			<td campo-dato="carreras_deslinde"></td>
			<td campo-dato="carreras_pdf"></td>
			<td campo-dato="carreras_btModi"></td>
			<td campo-dato="carreras_btBaja"></td>
			</tr>
			</thead>

			<tbody id="tbDatos">
			</tbody>

			

		</table>

		<footer>
			<div id="totalRegistros" class="totalRegistros">
			</div>
			<div id="textoPie" class="textoPie"><h1 font>DAMIAN MARTINEZ LEG:28885</h1>
			</div>
		</footer>
	</div>


	<div id="ventanaModalFormularioAlta" class="ventanaModalFormulario">

		<header>
			<p>FORMULARIO ALTA</p>
			<div id="btCruzFormularioAlta" class="btCruz">X</div>
		</header>

		<div id="contenidoModalFormularioAlta" class="contenidoModal">

			<form  id="formCarrerasAlta"  method="post" enctype="multipart/form-data">

				<ul>
				<li>
				<label>INGRESAR ID DE CARRERA: </label>
				<input id="formCarrerasidCarreraAlta" name="idCarrera" required />
				</li>
				
				
				<li>
				<label>NOMBRE DE LA CARRERA: </label>
				<input id="formCarrerasEntIdentificadorAlta" name="identificador" required />
				</li>

				<li>
				<label>DESCRIPCION DE LA CARRERA: </label>
				<input id="formCarrerasEntDescripcionAlta" name="descripcion" required />
				</li>


				<li>
				<label>CATEGORIA: </label>
				<select id="formCarrerasEntCategoriaAlta" name="categoria" required></select> 
				</li>


		
				<li>
				<label>FECHA DE LA CARRERA:</label>
				<input type="date" id="formCarrerasEntfechaEventoAlta" name="fechaEvento"  required />
				</li>

				<li>
				<label>DISTANCIA: </label>
				<input type="number" min=0 id="formCarrerasEntDistanciaAlta" name="distancia" value="10" required />
				</li>

				<li>
				<label>PDF: </label>
				<input type="file" id="formCarrerasEntDeslindeAlta" name="deslinde" />
				</li>


				</ul>

			</form>
		</div> 

		<footer>
			<button id="btEnvioFormAlta" class="btAlta">ENVIAR</button>
		</footer>

	</div> 

	
	<div id="ventanaModalFormularioModi" class="ventanaModalFormulario">

		<header>
			<p>FORMULARIO MODI</p>
			<div id="btCruzFormularioModi" class="btCruz">X</div>
		</header> <!--Cierra encabezado modal-->

		<div id="contenidoModalFormularioModi" class="contenidoModal">

			<form  id="formCarrerasModi"  method="post" >
			<ul>

			<li>
			<label>INGRESAR ID DE CARRERA: </label>
			<input id="formCarrerasEntIdCarreraModi" name="idCarrera" required />
			</li>


			<li>
			<label>NOMBRE DE LA CARRERA: </label>
			<input id="formCarrerasEntIdentificadorModi" name="identificador" required />
			</li>

			<li>
			<label>DESCRIPCION DE LA CARRERA: </label>
			<input id="formCarrerasEntDescripcionModi" name="descripcion" required />
			</li>

			<li>
			<label>CATEGORIA: </label>
			<select id="formCarrerasEntCategoriaMod" name="categoria" required></select> 
			</li>

			
	
			<li>
			<label>FECHA DE LA CARRERA:</label>
			<input type="date" id="formCarrerasEntfechaEventoModi" name="fechaEvento"  required />
			</li>

			<li>
			<label>DISTANCIA: </label>
			<input type="number" min=0 id="formCarrerasEntDistanciaModi" name="distancia" value="10" required />
			</li>

		
			<li>
			<label>PDF: </label>
			<input type="file" id="formCarrerasEntDeslindeModi" name="deslinde"  />
			</li>
			
			</ul>

			</form>
		</div> <!--Cierra contenido Modal-->

		<footer>
			<button id="btEnvioFormModi" class="btModi">Enviar Modi</button>
		</footer>

	</div> <!--Cierra ventana modal formulario-->

	<!--Ventana Modal para respuesta que debe estar fuera del contenedor-->
	<div id="ventanaModalRespuesta" class="ventanaModalRespuesta">

		<!--<div id="encabezadoModalRespuesta" class="encabezadoModal" >Encabezado modal Respuesta-->
		<header>
			<p>Respuesta del servidor</p>
			<div id="btCruzRespuesta" class="btCruz">X</div>		
		</header> <!--Cierra encabezado modal respuesta-->

		<div id="contenidoModalRespuesta" class="contenidoModal">
		</div><!-- cierra contenidoModalRespuesta-->

	</div> <!--Cierra ventana modal-->
</body>
</html>