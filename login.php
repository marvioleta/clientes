<?php
include "form_login.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<link rel="shortcut icon" href="tucano.ico" type="image/x-icon" />
    	<title>Ingresar al Administrador de Clientes</title>
        <link href="//api.tucanotours.com.ar/bs/css/todc.bs.css" rel="stylesheet">
    	<link href="clientes.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="login box">
            <img alt="Tucano Tours SRL" src="img/tucano-tours.png"/>
            <form action="" method="post" enctype="multipart/form-data">
                <table width="140" align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>Usuario:</td>
                        <td><input style="margin-left:10px; margin-top:10px;" name="usuario" type="text" class="input" value="<?php echo $_COOKIE['usucookie']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Clave:</td>
                        <td><input style="margin-left:10px; margin-top:10px;" name="psw" type="password" class="input" value="<?php echo $_COOKIE['pswcookie']; ?>" /></td>
                    </tr>
                    <tr>
                        <td align="center" height="70" ><input type="submit" class="btn btn-inverse" value="Ingresar" /></td>
                        <td>&nbsp;</td>
                    </tr>

                </table>
            </form>
        </div>
    </body>
</html>