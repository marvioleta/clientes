<?php
include "session.php";
require_once 'db.class.php';

$id_sci_fac=$_GET['id_sci_fac'];

$query="DELETE FROM tucanoto_sci.codigos_clientes WHERE id_sci_fac='".$id_sci_fac."'";

try {
	$stmt = DB::getStatement($query);
	$stmt->execute();
	$data="";	
	$error="OK";
} catch (Exception $e) {
	$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

$res=array(
	"error"=>$error,
	"resultado"=>$query,
);

echo json_encode($res);
unset($db);