<?php
include "session.php";
require_once 'db.class.php';

$id_cli=$_POST['id_cli'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];

$query = "update clientes SET
    lat='".$lat."',
    lng='".$lng."'
WHERE id_cli='".$id_cli."'";

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