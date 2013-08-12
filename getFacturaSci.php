<?php
require_once 'db.class.php';
include "session.php";

try {
	$query = "SELECT * FROM tucanoto_sci.codigos_clientes ORDER BY tucanoto_sci.codigos_clientes.cli_cod ";
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
} catch (Exception $e) {
	$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

$res=array(
	"error"=>$error,
	"sci_factura"=>$elArray,
);

echo json_encode($res);
unset($db);