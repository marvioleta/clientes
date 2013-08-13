<?php
include "session.php";
require_once 'db.class.php';

$id_user=$_GET['id_user'];


$query="DELETE FROM tucanoto_api.usuarios WHERE id_user='".$id_user."'";

/*
echo $query;
die();
//*/

try {
	if (empty($id_user)) {
		throw new Exception("El campo con el usuario no puede estar vacío.", 1);
	}
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