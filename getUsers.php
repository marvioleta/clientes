<?php
require_once 'db.class.php';
include "session.php";

$id_user = $_POST['id_user'];

try {
	$query = "SELECT 
	tucanoto_api.usuarios.id_user,
	tucanoto_api.usuarios.usuario,
	tucanoto_api.usuarios.psw,
	tucanoto_api.usuarios.rol,
	tucanoto_api.roles.descripcion,
	tucanoto_api.usuarios.sine_sabre,
	tucanoto_api.usuarios.sine_amadeus
	FROM tucanoto_api.usuarios 
		INNER JOIN tucanoto_api.roles
			ON tucanoto_api.usuarios.rol = tucanoto_api.roles.rol";
	if (!empty($id_user)) {
		$query .= " WHERE id_user='".$id_user."' ";
	}
	$query .= " ORDER BY tucanoto_api.usuarios.usuario ";
	$stmt = DB::getStatement($query);
	$stmt->execute();
	$miArray=array();

	$i=0;
	while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
		foreach ($data as $k=>$v){
			$miArray[$k]=$v;
		}
		$usuarios[$i]=$miArray;
		$i++;
	}
} catch (Exception $e) {
	$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

try {
	$query = "SELECT *
	FROM tucanoto_api.roles 
	ORDER BY tucanoto_api.roles.descripcion ";
	$stmt = DB::getStatement($query);
	$stmt->execute();
	$miArray=array();

	$i=0;
	while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
		foreach ($data as $k=>$v){
			$miArray[$k]=$v;
		}
		$roles[$i]=$miArray;
		$i++;
	}
} catch (Exception $e) {
	$error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}


$res=array(
	"error"=>$error,
	"usuarios"=>$usuarios,
	"roles" => $roles,
);

echo json_encode($res);
unset($db);