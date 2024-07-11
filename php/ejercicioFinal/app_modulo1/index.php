<?php
//include('../manejoSesion.inc');
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
			<!--<td class="titulosColumnas" campo-dato="articulos_btC" id="th_articulos_btC">C</td>	-->
			<td class="titulosColumnas" campo-dato="articulos_btModi">MODIFICAR</td>
			<td class="titulosColumnas" campo-dato="articulos_btModi">BAJA</td>
			</tr>

			<tr style="height:40%">
			<td campo-dato="carreras_idCarrera"><input id="fila_id"></input></td>
			<td campo-dato="carreras_identificador"><input id="fila_identificador"></input></td>
			<td campo-dato="carreras_descripcion"><input id="fila_descripcion"></input></td>
			
			<td campo-dato="carreras_categoria">
				<select id="fila_categoria" name="categoria"></select> 
				<!--<input id="f_articulos_familia"></input>-->
			</td>
			
			
			<td campo-dato="carreras_fechaEvento"><input id="fila_fechaEvento"></input></td>
			<td campo-dato="carreras_distancia"></td>
			<td campo-dato="carreras_deslinde"></td>
			<td campo-dato="articulos_btC"></td>
			<td campo-dato="articulos_btModi"></td>
			<td campo-dato="articulos_btbaja"></td>
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









	<!--Ventana modal alta-->
	<div id="ventanaModalFormularioAlta" class="ventanaModalFormulario">

		<header>
			<p>FORMULARIO ALTA</p>
			<div id="btCruzFormularioAlta" class="btCruz">X</div>
		</header>

		<div id="contenidoModalFormularioAlta" class="contenidoModal">

			<form  id="formArticulosAlta"  method="post" enctype="multipart/form-data">

				<ul>
				<li>
				<label>INGRESAR ID DE CARRERA: </label>
				<input id="formArticulosEntCodArtAlta" name="idCarrera" required />
				</li>
				
				
				<li>
				<label>NOMBRE DE LA CARRERA: </label>
				<input id="formArticulosEntUmAlta" name="identificador" required />
				</li>

				<li>
				<label>DESCRIPCION DE LA CARRERA: </label>
				<input id="formArticulosEntDescripcionAlta" name="descripcion" required />
				</li>


				<li>
				<label>CATEGORIA: </label>
				<select id="formArticulosEntFamiliaAlta" name="categoria" required></select> 
				</li>


		
				<li>
				<label>FECHA DE LA CARRERA:</label>
				<input type="date" id="formArticulosEntfechaAltaAlta" name="fechaEvento"  required />
				</li>

				<li>
				<label>DISTANCIA: </label>
				<input type="number" min=0 id="formArticulosEntSaldoStockAlta" name="distancia" value="10" required />
				</li>

				<li>
				<label>PDF: </label>
				<input type="file" id="formArticulosEntDocumentoPdfAlta" name="deslinde" />
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

			<form  id="formArticulosModi"  method="post" >
			<ul>

			<li>
			<label>INGRESAR ID: </label>
			<input id="formArticulosEntCodArtModi" name="idCarrera" required />
			</li>

			<li>
			<label>DESCRIPCION CARRERA: </label>
			<input id="formArticulosEntDescripcionModi" name="descripcion" required />
			</li>

			<li>
			<label>CATEGORIA: </label>
			<select id="formArticulosEntFamiliaModi" name="categoria" required></select> 
			</li>


			<li>
			<label>NOMBRE CARRERA: </label>
			<input id="formArticulosEntUmModi" name="identificador" required />
			</li>
	
			<li>
			<label>FECHA EVENTO:</label>
			<input type="date" id="formArticulosEntfechaAltaModi" name="fechaEvento"  required />
			</li>

			<li>
			<label>DISTANCIA: </label>
			<input type="number" min=0 id="formArticulosEntSaldoStockModi" name="distancia" value="10" required />
			</li>

		
			<li>
			<label>Documento Pdf: </label>
			<input type="file" id="formArticulosEntDocumentoPdfModi" name="deslinde"  />
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