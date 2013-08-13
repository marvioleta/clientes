<?php
include "session.php";
require_once 'db.class.php';

$limit = $_POST['limit'];
$hoy = new DateTime("now",new DateTimeZone('ART'));
$vigencia = new DateTime("-7 days",new DateTimeZone('ART'));
$alertas=array();

/*
var_dump($hoy);
echo "<br/>";
var_dump($vigencia);
die();
*/

//$limit = "+";

$a = $_SESSION['a'];
$b = 13;

//$b = $_SESSION['b'];
//if (isset($_SESSION['a']) && isset($_SESSION['b'])) {

if (($limit != "inicio") && (isset($a) && isset($b)) ) {
	if ($limit == "mas") {
		$a+="13";
//		$b+="13";
	}
	if ($limit == "menos") {
		$a-="13";
//		$b-="13";
	}
}else{
	$a = "0";
//	$b = "13";
}

$_SESSION['a'] = $a;
//$_SESSION['b'] = $b;

/*
unset($_SESSION['a']);
unset($_SESSION['b']);
var_dump($limit);
var_dump($_SESSION);
die();
*/

$query = "SELECT COUNT(*) as cant FROM clientes";
$stmt0 = DB::getStatement($query);
$stmt0->execute();
$count = $stmt0->fetch(PDO::FETCH_ASSOC);

$query = "select * from clientes LIMIT ".$a.",".$b;
$stmt = DB::getStatement($query);
$stmt->execute();

$Array1=array();
$i=0;

while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
	foreach ($data as $k=>$v){
		$Array1[$k]=$v;
	}
	$clientes_array[$i]=$Array1;
	$i++;
}

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

/*
var_dump($hoy);
//echo "<br/>";
var_dump($vigencia);
//echo "<br/>";
var_dump($guardia_array);
//echo "<br/>";
*/

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

/*
var_dump($fecha);
//echo "<br/>";
var_dump($int);
//echo "<br/>";
var_dump($fecha < $vigencia );
//echo "<br/>";
*/

$alertas = array_unique($alertas);

$dataArray = array(
	"clientes"=>$clientes_array,
	"guardia"=>$guardia_array,
	"sesion"=>$_SESSION,
/*
	"active_user"=>$session,
	"user_message"=>$session_msg,
*/
	"cantidadClientes"=>$count,
	"alertas"=>$alertas
);

/*
echo "<pre>";
print_r($alertas);
echo "</pre>";
die();
*/

echo json_encode($dataArray);
unset($db);