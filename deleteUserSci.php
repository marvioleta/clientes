<?php
include "session.php";
require_once 'db.class.php';

$id_sci_user=$_GET['id_sci_user'];

$query="DELETE FROM tucanoto_sci.sci_usuarios WHERE id_sci_user='".$id_sci_user."'";

/*
echo $query;
die();
//*/

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