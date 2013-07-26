<?php
session_start();

//var_dump($_SERVER);

//$session = (!isset($_SESSION['ususesion'])) ? false : true ;


$session = ($_SESSION['ususesion']) ? true : false ;

//var_dump($session);
//var_dump($_SESSION);


//valido si el request esta hecho a traves de ajax, entonces la accion a realizar es diferente.
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	if (!$session) {
		$session_msg = "La sesion ha caducado.";
		$data = array(
			"active_user"=>$session,
			"user_message"=>$session_msg,
		);
		echo json_encode($data);
		die();
	}
}else{
	if (!$session) {
		header("location:login.php");
	}
}

?>