<?php
require_once 'db.class.php';
include "session.php";

$hoy = new DateTime("now",new DateTimeZone('ART'));
$accion = $_GET['accion'];
$id_cli = $_GET['id_cli'];
$user = $_SESSION['ususesion'];
$fecha = $hoy->format('d-m-y H:i:s');

$alcance = $_POST['alcance_negocio'];
$obs_comerciales = $_POST['obs_comerciales'];
$obs_atencion = $_POST['obs_atencion'];
$obs_tecno = $_POST['obs_tecno'];
$cliente_guardia = $_POST['cliente_guardia'];
$cliente_operadora = $_POST['cliente_operadora'];

if ($accion == "abrir") {
	try {
		$query = "SELECT * FROM comentariosComerciales where id_cli='". $id_cli ."'";
		$stmt = DB::getStatement($query);
		$stmt->execute();

		if ($stmt->rowCount() == 0) {
			$vacio = "vacio";
		}else{
			$data=$stmt->fetch(PDO::FETCH_ASSOC);
		}
		$error="OK";
	} catch (Exception $e) {
		$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
	}
}

if ($accion == "guardar") {
	if ($alcance || $obs_comerciales || $obs_tecno || $obs_atencion || $cliente_guardia || $cliente_operadora) {
		try {
			$query = "UPDATE comentariosComerciales SET 
				id_cli='".$id_cli."',
				alcance_negocio='".$alcance."',
				obs_comerciales='".$obs_comerciales."',
				obs_atencion='".$obs_atencion."',
				obs_tecno='".$obs_tecno."',
				cliente_guardia='".$cliente_guardia."',
				cliente_operadora='".$cliente_operadora."'";

			$stmt = DB::getStatement($query);
			$stmt->execute();
			$data="";
			$error="OK";
		} catch (Exception $e) {
			$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
		}	
	}
}

if ($accion == "crear") {
	try {
		$query = "INSERT INTO comentariosComerciales values
			('null',
			'".$id_cli."',
			'".$alcance."',
			'".$obs_comerciales."',
			'".$obs_atencion."',
			'".$obs_tecno."',
			'".$cliente_guardia."',
			'".$cliente_operadora."')";

		$stmt = DB::getStatement($query);
		$stmt->execute();
		$data="";
		$error="OK";	
	} catch (Exception $e) {
		$error .= "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
	}	
}

$res=array(
	"error"=>$error,
	"resultado"=>$data,
	"vacio"=>$vacio
);

echo json_encode($res);
unset($db);