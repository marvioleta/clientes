<?php
require_once 'db.class.php';
include "session.php";

$id_cli=$_POST['id_cli'];

$query="delete from clientes where id_cli='".$id_cli."'";

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

//echo $query;

unset($db);