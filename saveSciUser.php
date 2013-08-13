<?php
include "session.php";
require_once 'db.class.php';

$empresa = $_POST['empresa'];
$user    = $_POST['user'];
$psw    = $_POST['psw'];

if (empty($empresa)) {
    throw new Exception("El campo empresa no puede estar vacío.", 1);
}

if (empty($user)) {
    throw new Exception("El campo usuario no puede estar vacío.", 1);
}

if (empty($psw)) {
    throw new Exception("El campo password no puede estar vacío.", 1);
}


$query = "INSERT INTO tucanoto_sci.sci_usuarios (empresa,user,psw) VALUES
    ('".$empresa."',
     '".$user."',
     '".$psw."')";
/*
echo $query;
die();
//*/
try {
    $stmt = DB::getStatement($query);
    $stmt->execute();
    $data="";
    $error="OK";
} catch (Exception $e) {
    $error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

$res=array(
    "error"=>$error,
    "resultado"=>$data,
);

echo json_encode($res);
unset($db);