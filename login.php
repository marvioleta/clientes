<?php
include "form_login.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="tucano.ico" type="image/x-icon" />
	<title>Administrador de Clientes</title>
	<link href="clientes.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
</head>

<body>
	<div class="login shadow radius" align="center">
		<img src="logo_tucano_low_190.png" width="190" height="122" style="margin-top:31px;" />
	</div>
    <div class="login shadow radius" style="margin-top:10px">
        <form action="" method="post" enctype="multipart/form-data">
            <table width="140" align="center" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Usuario:</td>
                    <td><input style="margin-left:10px; margin-top:10px;" name="usuario" type="text" class="input radius" value="<?php echo $_COOKIE['usucookie']; ?>" /></td>
                </tr>
                <tr>
                    <td>Clave:</td>
                    <td><input style="margin-left:10px; margin-top:10px;" name="psw" type="password" class="input radius" value="<?php echo $_COOKIE['pswcookie']; ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2">Recordar datos?<input style="margin-left:10px; margin-bottom:5px;" name="recordar" type="checkbox"<?php if(@$_COOKIE['recordar']) {echo " checked";} ?> /></td>
                </tr>
                <tr>
                    <td align="center" height="70" colspan="2"><input type="submit" class="btn btn-primary" value="Ingresar" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>