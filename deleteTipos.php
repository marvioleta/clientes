<?php
include "session.php";
require_once 'db.class.php';

$tipo_cliente=$_POST['tipo_cli'];

$query="delete from tipos_clientes where tipo_cliente='".$tipo_cliente."'";

$stmt = DB::getStatement($query);
$stmt->execute();
$data="";

if (!$stmt){
	$error="Ocurrio un error en la ejecucion de la Query";
}else{
	$error="OK";
}

$res=array(
	"error"=>$error,
	"resultado"=>$data,
);

echo json_encode($res);
unset($db);