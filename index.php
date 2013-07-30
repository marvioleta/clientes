<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="tucano.ico" type="image/x-icon" />
		<title>Administrador de Clientes | Tucano Tours</title>
		<link href="clientes.css" rel="stylesheet" type="text/css" />
		<link href="css/blitzer/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
		<link href="http://api.tucanotours.com.ar/bs/css/tucano.bs.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="//api.tucanotours.com.ar/bs/css/todc.bs.css" rel="stylesheet">
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANtzUhTdTuy6Mi9TTc-IPu1elpSiL6RPg&sensor=true"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.tmpl.js" type="text/javascript"></script>
		<script src="js/jQueryTmplPlus.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrapx-clickover.js"></script>
		<script src="js/clientes_core.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/maps.js"></script>
		<?php include "templates.php"; ?>
	</head>
	<body>
		<div id="header"><?php include "header.php" ?></div>
		<div id="wrapper">
			<div id="ttip" style="display:none;"></div>
			<div id="dialogs"><?php include "dialogs.php" ?></div>
			<div id="nav"><?php include "nav.php" ?></div>
			<div id="listado">
				<div class="clientes"></div>
			</div>
			<div class="btn-group float-right" id="nav">
                <button id="menos" class="btn"><i class="icon-backward"></i> Prev</button>
                <button id="mas" class="btn">Sig <i class="icon-forward"></i></button>
            </div>
		</div>
	</body>
</html>