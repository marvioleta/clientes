<?php
include "session.php";
require_once 'db.class.php';

$nombre_cli = $_POST['nombre_cli'];
$cli_cod    = $_POST['cli_cod'];
$fac_cod    = $_POST['fac_cod'];

$query = "INSERT INTO tucanoto_sci.codigos_clientes (nombre_cli,cli_cod,fac_cod) VALUES
    ('".$nombre_cli."',
     '".$cli_cod."',
     '".$fac_cod."')";

echo $query;
die();

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