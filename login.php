<?php
include "form_login.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<link rel="shortcut icon" href="tucano.ico" type="image/x-icon" />
    	<title>Administrador de Clientes - Ingresar</title>
        <link href="//api.tucanotours.com.ar/bs/css/todc.bs.css" rel="stylesheet">
    	<link href="clientes.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="login" class="box shadow">
            <div style="width:250px; margin-left:auto; margin-right:auto; margin-bottom:30px">
                <img alt="Tucano Tours SRL" src="img/tucano-tours.png"/>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <table width="240" align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="100" align="center">Usuario:</td>
                        <td><input name="usuario" type="text" value="<?php echo $_COOKIE['usucookie']; ?>" /></td>
                    </tr>
                    <tr>
                        <td align="center">Clave:</td>
                        <td><input style="margin-top:10px" name="psw" type="password" value="<?php echo $_COOKIE['pswcookie']; ?>" /></td>
                    </tr>
                </table>
                <div style="width:100px; margin-left:auto; margin-right:auto; margin-top:30px">
                    <button class="btn btn-inverse" type="submit">Ingresar</button>
                <div>
            </form>
        </div>
    </body>
</html>
