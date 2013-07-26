<?php
include "session.php";
require_once 'db.class.php';

$query = "select distinct column_name from information_schema.columns where table_name='clientes'";
$stmt = DB::getStatement($query);
$stmt->execute();

$miArray=array();
$i=0;
while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
	foreach ($data as $k=>$v){
		$miArray[$i]=$v;
	}
	$i++;
}

echo json_encode($miArray);

unset($db);