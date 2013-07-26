<?php
function __autoload($class)
{
	require_once "$class.class.php";
}

$tipo = $_GET['tipo'];

if($tipo != "EMISORA")
{
	$query = "select * from tipos_clientes where tipo_cliente='".$tipo."'";
	$stmt = db::getStatement($query);
	$stmt->execute();
	
	//var_dump($query);
	
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	//var_dump($data);
	?>

<style type="text/css">
.center-color {
	color: #ed2d2d;
	text-align:center !important;
}
</style>
<table class="ttip_tipos" width="300" border="0" cellspacing="0" cellpadding="0">
			<tr class="center-color">
				<td align="center" colspan="2">EMISIONES<hr /></td>
			</tr>
			<tr>
				<td><strong>FEE cabotaje</strong></td>
				<td><?php echo $data["fee_cab"]; ?></td>
			</tr>
			<tr>
				<td><strong>FEE internacional</strong></td>
				<td><?php echo $data["fee_int"]; ?></td>
			</tr>
			<tr class="center-color">
				<td align="center" colspan="2"><strong>COMISION Y OVER</strong>					<hr /></td>
			</tr>
			<tr class="center-color">
				<td><strong>Emisiones con:</strong></td>
				<td>Retener</td>
			</tr>
			<tr>
				<td><strong>Comisión y Over</strong></td>
				<td><?php echo $data["comi_over"]; ?></td>
			</tr>
			<tr>
				<td><strong>Solo Comisión</strong></td>
				<td><?php echo $data["solo_comi"]; ?></td>
			</tr>
			<tr>
				<td class="center-color"><strong>CIA</strong></td>
				<td><?php echo $data["cia_com_esp"]; ?></td>
			</tr>
			<tr>
				<td><strong>Comisión y Over</strong></td>
				<td><?php echo $data["com_esp"]; ?></td>
			</tr>
			<tr>
				<td><strong>Solo Comisión</strong></td>
				<td><?php echo $data["over_com_esp"]; ?></td>
			</tr>
			<tr class="center-color">
				<td align="center" colspan="2"><strong>BT</strong>					<hr /></td>
			</tr>
			<tr class="center-color">
				<td><strong>Monto</strong></td>
				<td>CIA</td>
			</tr>
			<tr>
				<td><strong><?php echo $data["monto_bt1"]; ?></strong></td>
				<td><?php echo $data["cia_bt1"]; ?></td>
			</tr>
			<tr>
				<td><strong><?php echo $data["monto_bt2"]; ?></strong></td>
				<td><?php echo $data["cia_bt2"]; ?></td>
			</tr>
			<tr>
				<td><strong><?php echo $data["monto_bt3"]; ?></strong></td>
				<td><?php echo $data["cia_bt3"]; ?></td>
			</tr>
			<tr>
				<td><strong><?php echo $data["monto_bt4"]; ?></strong></td>
				<td><?php echo $data["cia_bt4"]; ?></td>
			</tr>
			<tr class="center-color">
				<td colspan="2"><strong>RE-EMISION</strong>					<hr /></td>
			</tr>
			<tr>
				<td><strong>FEE cabotaje</strong></td>
				<td><?php echo $data["fee_re_cab"]; ?></td>
			</tr>
			<tr>
				<td><strong>FEE internacional</strong></td>
				<td><?php echo $data["fee_re_int"]; ?></td>
			</tr>
			<tr class="center-color">
				<td align="center" colspan="2"><strong>GUARDIA</strong>					<hr /></td>
			</tr>
			<tr>
				<td class="center-color"><strong>Emisión</strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>FEE cabotaje</strong></td>
				<td><?php echo $data["fee_gu_cab"]; ?></td>
			</tr>
			<tr>
				<td><strong>FEE internacional</strong></td>
				<td><?php echo $data["fee_gu_int"]; ?></td>
			</tr>
			<tr>
				<td class="center-color"><strong>Reemisión</strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><strong>FEE cabotaje</strong></td>
				<td><?php echo $data["fee_gu_re_cab"]; ?></td>
			</tr>
			<tr>
				<td><strong>FEE Internacional</strong></td>
				<td><?php echo $data["fee_gu_re_int"]; ?></td>
			</tr>
		</table>
<?php }else{
echo "Mismas Condiciones que Tucano.";
} ?>
