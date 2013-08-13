<?php
require_once 'db.class.php';
include "session.php";

try {
	$query = "SELECT 
	    tucanoto_sci.sci_usuarios.id_sci_user,
		tucanoto_sci.sci_usuarios.empresa,
		tucanoto_sci.sci_usuarios.user,
		tucanoto_sci.sci_usuarios.psw
	FROM tucanoto_sci.sci_usuarios ORDER BY tucanoto_sci.sci_usuarios.empresa ";
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
	"sci_user"=>$elArray,
);

echo json_encode($res);
unset($db);