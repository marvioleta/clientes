<?php
include "session.php";
require_once 'db.class.php';

$accion = $_GET['acc'];
$id_user = $_GET['id_user'];
$rol = trim($_POST['rol']);
$user    = trim($_POST['usuario']);
$psw    = trim($_POST['psw']);
$sine_sabre    = trim($_POST['sine_sabre']);
$sine_amadeus    = trim($_POST['sine_amadeus']);

if ($accion == 'agregar-user') {
    $query = "INSERT INTO tucanoto_api.usuarios (rol,usuario,psw,sine_sabre,sine_amadeus) VALUES
        ('".$rol."',
         '".$user."',
         '".$psw."',
         '".$sine_sabre."',
         '".$sine_amadeus."')";
}

if ($accion == 'editar-user') {
    $query = "UPDATE tucanoto_api.usuarios SET
        rol='".$rol."',
        usuario='".$user."',
        psw='".$psw."',
        sine_sabre='".$sine_sabre."',
        sine_amadeus='".$sine_amadeus."'
        WHERE id_user='".$id_user."'";
}
/*
echo $query;
die();
//*/
try {
    if (empty($accion)) {
        throw new Exception("La acción no puede estar vacía.", 1);
    }

    if (empty($rol)) {
        throw new Exception("El campo rol no puede estar vacío.", 1);
    }

    if (empty($user)) {
        throw new Exception("El campo usuario no puede estar vacío.", 1);
    }

    if (empty($psw)) {
        throw new Exception("El campo password no puede estar vacío.", 1);
    }

    if (empty($sine_sabre)) {
        throw new Exception("El campo sine_sabre no puede estar vacío.", 1);
    }

    if (empty($sine_amadeus)) {
        throw new Exception("El campo sine_amadeus no puede estar vacío.", 1);
    }

    $stmt = DB::getStatement($query);
    $stmt->execute();
    $data="";
} catch (Exception $e) {
    $error = "Ocurrio un error en la ejecucion de la Query" . $e->getMessage();
}

$res=array(
    "error"=>$error,
    "resultado"=>$data,
);

echo json_encode($res);
unset($db);