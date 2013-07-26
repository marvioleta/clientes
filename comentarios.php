<?php
include "session.php";
require_once 'db.class.php';

$hoy = new DateTime("now",new DateTimeZone('ART'));

$accion=$_GET['accion'];
$nota = $_POST['comentario'];
$id_cli = $_POST['id_cli'];
$user = $_SESSION['ususesion'];
$fecha = $hoy->format('d-m-y H:i:s');
$id_nota=$_POST['id_nota'];

if ($accion == "borrar") {
	$query = "DELETE FROM guardia_clientes WHERE id_nota='".$id_nota."'";
}
if ($accion == "guardar") {
	$query = "INSERT INTO guardia_clientes values (null,'".$id_cli."','".$nota."','".$user."','".$fecha."')";
}

if (!empty($query)) {

	try {
		$stmt = DB::getStatement($query);
		$stmt->execute();
		$data="";
		$error="OK";
	} catch (Exception $e) {
		$error="Ocurrio un error en la ejecucion de la Query";		
	}

	$res=array(
		"error"=>$error,
		"resultado"=>$data,
	);

	echo json_encode($res);

	unset($db);
}