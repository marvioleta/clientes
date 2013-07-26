<?php
include "session.php";
require_once 'db.class.php';

$id=$_POST['tipo'];

$query = "select * from tipos_clientes where tipo_cliente='".$id."'";
//echo $query;

$stmt = DB::getStatement($query);
$stmt->execute();

$miArray=array();
$i=0;
while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
	foreach ($data as $k=>$v){
		$miArray[$k]=$v;
	}
	$elArray[$i]=$miArray;
	$i++;
}

echo json_encode($elArray);
unset($db);
/*
$data=$stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
unset($db);
*/