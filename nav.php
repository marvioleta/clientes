<div id="filtro-contenido">
	<input id="searchTerm" name="searchTerm" class="input float-left" type="text" />
	<select id="term" class="float-left" name="term">
		<option selected value="nombre">Nombre</option>
		<option value="cli_cod">Código VSTOUR</option>
		<option value="fac">Razón Social</option>
		<option value="tipo_cliente">Tipo Cliente</option>
		<option value="sci">Addin SCI</option>
		<option value="motor_sci">Motor SCI</option>
		<option value="web_terminal">Web Terminal</option>
		<option value="gds_tucano">GDS Tucano</option>
		<option value="gds_propio">GDS Propio</option>
		<option value="telefono">Teléfono</option>
		<option value="mail">Email</option>
		<option value="direccion">Dirección</option>
		<option value="localidad">Localidad</option>
		<option value="vendedor">Vendedor</option>
		<option value="cuit">Cuit</option>
	</select>
	<a href="#" id="buscar" class="btn btn-primary float-left">Buscar</a>
	&nbsp;
	<div class="btn-group">
		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-filter icon-white"></i> Filtrar <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a id="filtro-notas">Notas</a></li>
		</ul>
	</div>

	<img id="cargando" src="ajax-loader.gif"/>

	<!-- <a href="http://clientes.tucanotours.com.ar/Administrador%20de%20clientes%20-%20Tucano%20Tours.pdf" id="instructivo" target="_blank" class="btn btn-primary float-right">Instructivo de Uso</a> -->
	<div class="btn-group float-right" id="nav" style="margin-right:5px;">
		<button id="menos" class="btn btn-primary"><i class="icon-backward icon-white"></i> Prev</button>
		<button id="mas" class="btn btn-primary">Sig <i class="icon-forward icon-white"></i></button>
	</div>	
</div>