<?php
include "session.php";
require_once 'db.class.php';

$accion=$_GET['accion'];
$tipo_cliente=strtoupper($_POST['tipo_cli']);
$fee_cab=$_POST['fee_cab'];
$fee_int=$_POST['fee_int'];
$comi_over=$_POST['comi_over'];
$solo_comi=$_POST['solo_comi'];
$cia_com_esp=$_POST['cia_com_esp'];
$com_esp=$_POST['com_esp'];
$over_com_esp=$_POST['over_com_esp'];
$monto_bt1=$_POST['monto_bt1'];
$cia_bt1=$_POST['cia_bt1'];
$monto_bt2=$_POST['monto_bt2'];
$cia_bt2=$_POST['cia_bt2'];
$monto_bt3=$_POST['monto_bt3'];
$cia_bt3=$_POST['cia_bt3'];
$monto_bt4=$_POST['monto_bt4'];
$cia_bt4=$_POST['cia_bt4'];
$fee_re_cab=$_POST['fee_re_cab'];
$fee_re_int=$_POST['fee_re_int'];
$fee_gu_cab=$_POST['fee_gu_cab'];
$fee_gu_int=$_POST['fee_gu_int'];
$fee_gu_re_cab=$_POST['fee_gu_re_cab'];
$fee_gu_re_int=$_POST['fee_gu_re_int'];
$cia_fee1=$_POST['cia_fee1'];
$monto_fee1=$_POST['monto_fee1'];
$cia_fee2=$_POST['cia_fee2'];
$monto_fee2=$_POST['monto_fee2'];
$cia_fee3=$_POST['cia_fee3'];
$monto_fee3=$_POST['monto_fee3'];
$cia_fee4=$_POST['cia_fee4'];
$monto_fee4=$_POST['monto_fee4'];

if ($accion == "editar-tipo"){
	$query = "update tipos_clientes SET
		tipo_cliente='".$tipo_cliente."',
		fee_cab='".$fee_cab."',
		fee_int='".$fee_int."',
		comi_over='".$comi_over."',
		solo_comi='".$solo_comi."',
		cia_com_esp='".$cia_com_esp."',
		com_esp='".$com_esp."',
		over_com_esp='".$over_com_esp."',
		monto_bt1='".$monto_bt1."',
		cia_bt1='".$cia_bt1."',
		monto_bt2='".$monto_bt2."',
		cia_bt2='".$cia_bt2."',
		monto_bt3='".$monto_bt3."',
		cia_bt3='".$cia_bt3."',
		monto_bt4='".$monto_bt4."',
		cia_bt4='".$cia_bt4."',
		fee_re_cab='".$fee_re_cab."',
		fee_re_int='".$fee_re_int."',
		fee_gu_cab='".$fee_gu_cab."',
		fee_gu_int='".$fee_gu_int."',
		fee_gu_re_cab='".$fee_gu_re_cab."',
		fee_gu_re_int='".$fee_gu_re_int."',
		cia_fee1='".$cia_fee1."',
		monto_fee1='".$monto_fee1."',
		cia_fee2='".$cia_fee2."',
		monto_fee2='".$monto_fee2."',
		cia_fee3='".$cia_fee3."',
		monto_fee3='".$monto_fee3."',
		cia_fee4='".$cia_fee4."',
		monto_fee4='".$monto_fee4."'		
	WHERE tipo_cliente='".$tipo_cliente."'";
}

if ($accion == "crear-tipo"){
	$query = "INSERT INTO tipos_clientes values
		('".$tipo_cliente."',
		'".$fee_cab."',
		'".$fee_int."',
		'".$comi_over."',
		'".$solo_comi."',
		'".$cia_com_esp."',
		'".$com_esp."',
		'".$over_com_esp."',
		'".$monto_bt1."',
		'".$cia_bt1."',
		'".$monto_bt2."',
		'".$cia_bt2."',
		'".$monto_bt3."',
		'".$cia_bt3."',
		'".$monto_bt4."',
		'".$cia_bt4."',
		'".$fee_re_cab."',
		'".$fee_re_int."',
		'".$fee_gu_cab."',
		'".$fee_gu_int."',
		'".$fee_gu_re_cab."',
		'".$fee_gu_re_int."',
		'".$cia_fee1."',
		'".$monto_fee1."',
		'".$cia_fee2."',
		'".$monto_fee2."',
		'".$cia_fee3."',
		'".$monto_fee3."',
		'".$cia_fee4."',
		'".$monto_fee4."')";
}

/*
echo $query;
die();
*/

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