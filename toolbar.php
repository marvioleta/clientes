<div id="toolbar-head"><img src="head.png" width="1000" height="100" /></div>
<div id="toolbar-btns">
	<a id="cerrar-sesion" class="btn btn-primary">Cerrar Sesión</a>
	<a id="ver-clientes" class="btn">Ver todos los clientes</a>
	<?php
	$rol = $_SESSION['rol'];
	if ($rol == 'a' || $rol == 'adm' || $rol == 'l') {
		echo '<a id="crear" class="btn">Ingresar Cliente</a>';
	}
	if ($_SESSION['rol'] == 'a')
	{
		echo '<a id="crear-tipo" class="btn">Crear Tipo de Cliente</a>';
	}
	?>
	<a id="ver-tipo" class="btn">Ver Tipos de Clientes</a>
</div>