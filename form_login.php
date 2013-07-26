<?php
require_once "db.class.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
	if($_POST['recordar']){
		setcookie("usucookie",$_POST['usuario'],time()+(60*60*96));
		setcookie("pswcookie",$_POST['psw'],time()+(60*60*96));
		setcookie("recordar",$_POST['recordar'],time()+(60*60*96));
	}else{
		setcookie("usucookie","");
		setcookie("pswcookie","");
		setcookie("recordar","");
	}
	
	$sql="select usuario,psw,rol from usuarios where usuario='".$_POST['usuario']."' and psw='".$_POST['psw']."'";
	$stmt = DB::getStatement($sql);
	$stmt->execute();

	if($stmt->rowCount()>0){
		session_start();
		$data=$stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['ususesion']=$data['usuario'];
		$_SESSION['rol']=$data['rol'];
		header("location:index.php");
	}else{
		$error="<font color='red'>Usuario y/o password no incorrectos</font>";
	}
}
?>