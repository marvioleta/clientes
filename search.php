<?php
include "session.php";
require_once 'db.class.php';

$where=$_POST['where'];
$igual=$_POST['igual'];
$hoy = new DateTime("now",new DateTimeZone('ART'));
$vigencia = new DateTime("-7 days",new DateTimeZone('ART'));
$alertas=array();

$query = "select * from clientes where ".$where." LIKE '%".$igual."%'";
$stmt = DB::getStatement($query);
$stmt->execute();

$miArray=array();
$i=0;

if ($stmt->rowCount() > 0){
	while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
		foreach ($data as $k=>$v){
			$miArray[$k]=$v;
		}
		$elArray[$i]=$miArray;
		$i++;
	}
	$error="";

	$query = "select * from guardia_clientes";
	$stmt1 = DB::getStatement($query);
	$stmt1->execute();

	$i=0;
	while($data1=$stmt1->fetch(PDO::FETCH_ASSOC)){
		foreach ($data1 as $k=>$v){
			$Array2[$k]=$v;
		}
		$guardia_array[$i]=$Array2;
		$i++;
	}
	if ($guardia_array){
		foreach ($guardia_array as $key) {
			foreach ($key as $i => $v) {
				if ($i == "fecha"){
					$fecha = DateTime::createFromFormat('d-m-y H:i:s',$v);
					//$interval = $vigencia->diff($fecha);
					//$int = $interval->format('%a');
					if ($fecha > $vigencia) {
						$alertas[]=$key['id_cli'];
		 			}
				}
			}
		}
	}	
}else{
	$error="La busqueda no obtuvo resultados";
}

if($elArray){
	$res=array(
		"error"=>$error,
		"clientes"=>$elArray,
		"guardia"=>$guardia_array,
		"sesion"=>$_SESSION,
		"alertas"=>$alertas
	);
}else{
	$res=array(
		"error"=>$error,		
	);
}

echo json_encode($res);

unset($db);