<?php
include "session.php";
require_once 'db.class.php';

$cli = $_POST['id_cli'];

$query = "SELECT lat,lng FROM clientes WHERE id_cli='".$cli."'";
$stmt = DB::getStatement($query);
$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);