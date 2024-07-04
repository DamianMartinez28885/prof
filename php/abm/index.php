<!DOCTYPE html>

<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="abm.css">

<!-- RESUMEN de estructura del documento, de estilos de los contenedores y controles involucrados.
	HTML: Contenedor tabla y controles ,contenedor formulario de alta, contenedor formulario
		de modi, contenedor de respuestas del servidor.
	CSS: Definir estilos para los formularios y los contenedores de respuesta y las 
		ventanas modales correpondientes.
		Definir estilos para las nuevas columnas de botones modi y botones baja.
	JS: Definir objetos para los nuevos elementos del DOM que intervengan en procedimientos de java script
		Definir funciones para los nuevos eventos: Boton de alta, botones de modi y baja creados dinamicamente
		en cada ciclo de lectura de los registros JSON, 
		Definir funciones de evento para los botones de envío de los formularios de alta y de modi.
		Definir procedimientos de evento para los eventos keyUp y change de las entradas de los formularios.

-->




<script src="./jquery-3.7.1.min.js"></script>
<script src="./jsabm.js"></script>


</head>


<body>
	<div id="contenedorTablaArticulos" class="contenedorTabla">
		
		<header >
			
			<input type="text" name="orden" id="orden" readonly value="" >

			<button id="btAccionCarga">Cargar datos</button>
			<button id="btAccionVacia">Vaciar datos</button>
			<button id="btLimpiaFiltros">Limpiar filtros</button>
			<button id="btAlta">Alta registro</button>
			<!--<button id="btCierraSesion">Cierra Sesión</button>-->
		</header>



		<table>
			<thead >
			<tr style="height:50%">
			<td class="titulosColumnas" campo-dato="articulos_codArt" id="th_articulos_codArt">ID CARRERA</td>
			<td class="titulosColumnas" campo-dato="articulos_familia" id="th_articulos_familia">IDENTIFICADOR</td>
			<td class="titulosColumnas" campo-dato="articulos_um" id="th_articulos_um">DESCRIPCION</td>
			<td class="titulosColumnas" campo-dato="articulos_descripcion" id="th_articulos_descripcion">CATEGORIA</td>
			<td class="titulosColumnas" campo-dato="articulos_fechaAlta" id="th_articulos_fechaAlta">DISTANCIA</td>
			<td class="titulosColumnas" campo-dato="articulos_saldoStock" id="th_articulos_saldoStock">FECHA EVENTO</td>
			<td class="titulosColumnas" campo-dato="articulos_pdf" id="th_articulos_pdf">PDF</td>
			<!--<td class="titulosColumnas" campo-dato="articulos_btC" id="th_articulos_btC">C</td>	-->
			<td class="titulosColumnas" campo-dato="articulos_btModi">MODIFICAR</td>
			<td class="titulosColumnas" campo-dato="articulos_btModi">BAJA</td>
			</tr>

			<tr style="height:50%">
			<td campo-dato="articulos_codArt"><input id="f_articulos_codArt"></input></td>
			<td campo-dato="articulos_um"><input id="f_articulos_um"></input></td>
			<td campo-dato="articulos_descripcion"><input id="f_articulos_descripcion"></input></td>
            <td campo-dato="articulos_familia">
				<select id="f_articulos_familia" name="familia"></select> 
				<!--<input id="f_articulos_familia"></input>-->
			</td>
			<td campo-dato="articulos_fechaAlta"><input id="f_articulos_fechaAlta"></input></td>
			<td campo-dato="articulos_saldoStock"></td>
			<td campo-dato="articulos_pdf"></td>
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
			<div id="textoPie" class="textoPie"><h2>PIE DE PAGINA</h2>
			</div>
		</footer>
	</div> <!-- cierra contenedorTablaArticulos -->









	<!--Ventana Modal para formulario de alta que debe estar fuera del contenedor-->
	<div id="ventanaModalFormularioAlta" class="ventanaModalFormulario">

		<header>
			<p>Encabezado modal Formulario de alta</p>
			<div id="btCruzFormularioAlta" class="btCruz">X</div>
		</header> <!--Cierra encabezado modal-->

		<div id="contenidoModalFormularioAlta" class="contenidoModal">

			<form  id="formArticulosAlta"  method="post" enctype="multipart/form-data">

				<ul>
				<li>
				<label>codArt: </label>
				<input id="formArticulosEntCodArtAlta" name="codArt" required />
				</li>


				<li>
				<label>Descripción: </label>
				<input id="formArticulosEntDescripcionAlta" name="descripcion" required />
				</li>


				<li>
				<label>Familia de artículo: </label>
				<select id="formArticulosEntFamiliaAlta" name="familia" required></select> 
				</li>


				<li>
				<label>UM: </label>
				<input id="formArticulosEntUmAlta" name="um" required />
				</li>
		
				<li>
				<label>Fecha Alta:</label>
				<input type="date" id="formArticulosEntfechaAltaAlta" name="fechaAlta"  required />
				</li>

				<li>
				<label>Saldo stock: </label>
				<input type="number" min=0 id="formArticulosEntSaldoStockAlta" name="saldoStock" value="0" required />
				</li>

				<li>
				<label>Pdf: </label>
				<input type="file" id="formArticulosEntDocumentoPdfAlta" name="documentoPdf" />
				</li>


				</ul>

			</form>
		</div> <!--Cierra contenido Modal-->

		<footer>
			<button id="btEnvioFormAlta" class="btAlta">Enviar Alta</button>
		</footer>

	</div> <!--Cierra ventana modal formulario-->

	<!--Ventana Modal para formulario de Modi que debe estar fuera del contenedor-->
	<div id="ventanaModalFormularioModi" class="ventanaModalFormulario">

		<header>
			<p>Encabezado modal Formulario de modificación</p>
			<div id="btCruzFormularioModi" class="btCruz">X</div>
		</header> <!--Cierra encabezado modal-->

		<div id="contenidoModalFormularioModi" class="contenidoModal">

			<form  id="formArticulosModi"  method="post" enctype="multipart/form-data">
			<ul>

			<li>
			<label>codArt: </label>
			<input id="formArticulosEntCodArtModi" name="codArt" required />
			</li>

			<li>
			<label>Descripción: </label>
			<input id="formArticulosEntDescripcionModi" name="descripcion" required />
			</li>

			<li>
			<label>Familia de artículo: </label>
			<select id="formArticulosEntFamiliaModi" name="familia" required></select> 
			</li>


			<li>
			<label>UM: </label>
			<input id="formArticulosEntUmModi" name="um" required />
			</li>
	
			<li>
			<label>Fecha Alta:</label>
			<input type="date" id="formArticulosEntfechaAltaModi" name="fechaAlta"  required />
			</li>

			<li>
			<label>Saldo stock: </label>
			<input type="number" min=0 id="formArticulosEntSaldoStockModi" name="saldoStock" value="0" required />
			</li>

		
			<li>
			<label>Documento Pdf: </label>
			<input type="file" id="formArticulosEntDocumentoPdfModi" name="documentoPdf"  />
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