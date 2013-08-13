<?php
require_once 'db.class.php';
include "session.php";

$id_cli=$_GET['id_cli'];
$accion=$_GET['accion'];
$cli_cod=$_POST['cli_cod'];
$nombre=$_POST['nombre'];
$factura=$_POST['factura'];
$tipo_cliente=strtoupper($_POST['tipo_cliente']);
$sci=$_POST['sci'];
$motor_sci=$_POST['motor_sci'];
$web_terminal=$_POST['web_terminal'];
$gds_tucano=$_POST['gds_tucano'];
$gds_propio=$_POST['gds_propio'];
$telefono=$_POST['telefono'];
$email=$_POST['mail'];
$direccion=$_POST['direccion'];
$localidad=$_POST['localidad'];
$vendedor=$_POST['vendedor'];
$monto_garantia=$_POST['monto_garantia'];
$tipo_garantia=$_POST['tipo_garantia'];
$limite_credito=$_POST['limite_credito'];
$cuit=$_POST['cuit'];

if ($accion == "editar"){
	$query = "update clientes SET
		cli_cod='".$cli_cod."',
		nombre='".$nombre."',
		factura='".$factura."',
		tipo_cliente='".$tipo_cliente."',
		sci='".$sci."',
		motor_sci='".$motor_sci."',
		web_terminal='".$web_terminal."',
		gds_tucano='".$gds_tucano."',
		gds_propio='".$gds_propio."',
		telefono='".$telefono."',
		mail='".$email."',
		direccion='".$direccion."',
		localidad='".$localidad."',
		vendedor='".$vendedor."',
		monto_garantia='".$monto_garantia."',
		tipo_garantia='".$tipo_garantia."',
		limite_credito='".$limite_credito."',
		cuit='".$cuit."'
	WHERE id_cli='".$id_cli."'";
}

if ($accion == "crear"){
	$query = "INSERT INTO clientes values
		('null',
		'".$cli_cod."',
		'".$nombre."',
		'".$factura."',
		'".$tipo_cliente."',
		'".$sci."',
		'".$motor_sci."',
		'".$web_terminal."',
		'".$gds_tucano."',
		'".$gds_propio."',
		'".$telefono."',
		'".$email."',
		'".$direccion."',
		'".$localidad."',
		'".$vendedor."',
		'".$monto_garantia."',
		'".$tipo_garantia."',
		'".$limite_credito."',
		'".$cuit."',
		null,null)";
}

/* 
var_dump($query);
die();
*/

/*
$stmt = DB::getStatement($query);
$stmt->execute();
$data="";
*/

/*
if (!$stmt){
	$error="Ocurrio un error en la ejecucion de la Query";
}else{
	$error="OK";
}
*/

try {
	$stmt = DB::getStatement($query);
	$stmt->execute();
	$data="";
	$error="OK";
} catch (Exception $e) {
	$error .= "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

$res=array(
	"error"=>$error,
	"resultado"=>$data,
);

echo json_encode($res);
unset($db);