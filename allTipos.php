<?php
include "session.php";
require_once 'db.class.php';

//$id=$_POST['cli_cod'];

$query = "select * from tipos_clientes";
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