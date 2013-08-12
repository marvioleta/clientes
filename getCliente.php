<?php
require_once 'db.class.php';
include "session.php";

$id=$_POST['id_cli'];
//$accion=$_GET['accion'];

/* para unificar el archivo que trae los clientes voy a determinar una accion que le diga que es lo que
que es lo que tiene que traer.
*/

try {
	$query = "select * from clientes where id_cli='".$id."'";
	$stmt = DB::getStatement($query);
	$stmt->execute();
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	$error="OK";	
} catch (Exception $e) {
	$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

/*
$query = "select * from guardia_clientes where cli_cod='".$id."'";
$stmt = DB::getStatement($query);
$stmt->execute();
$data_clientes=$stmt->fetch(PDO::FETCH_ASSOC);
*/

$res=array(
	"error"=>$error,
	"resultado"=>$data,
);

echo json_encode($res);
unset($db);