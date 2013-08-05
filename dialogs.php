<div id="dialog-cliente" title="Info del Cliente">

	<form>

		<div class="span5">

			<div class="row"><p class="validateTips"><strong>Complete los datos</strong></p></div>

			<div class="row">

				<div class="span2"><label>Código Vstour</label></div>

				<div class="span3"><input class="input" id="cli_cod" name="cli_cod" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Nombre</label></div>

				<div class="span3"><input class="input" id="nombre" name="nombre" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Addin SCI</label></div>

				<div class="span3"><input class="input" id="sci" name="sci" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Tipo de Cliente</label></div>

				<div class="span3"><input class="input" id="tipo_cliente" name="tipo_cliente" size="30"></div>

			</div>

			<div class="row">

				<div class="span5"><hr></div>

			</div>

			<div class="row">

				<div class="span2"><label>CUIT</label></div>

				<div class="span3"><input class="input" id="cuit" name="cuit" size="30"></div>

			</div>			

			<div class="row">

				<div class="span2"><label>Monto Garantía</label></div>

				<div class="span3"><input class="input" id="monto_garantia" name="monto_garantia" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Tipo de Garantía</label></div>

				<div class="span3">

					<select name="tipo_garantia" id="tipo_garantia">

						<option value=""></option>

						<option value="cheque">Cheque</option>

						<option value="mutuo_c_cheque">Firma mutuo c/ cheque</option>

						<option value="mutuo_c_pagare">Firma mutuo c/ pagaré</option>

						<option value="comercial">Comercial con valor real</option>

						<option value="caucion">Caución</option>

						<option value="sin_garantia">Sin garantía</option>

					</select>

				</div>

			</div>

			<div class="row">

				<div class="span2"><label>Límite de Crédito</label></div>

				<div class="span3"><input class="input" id="limite_credito" name="limite_credito" size="30"></div>

			</div>

			<div class="row">

				<div class="span5"><hr></div>

			</div>

			<div class="row">

				<div class="span2"><label>Razón Social</label></div>

				<div class="span3"><input class="input" id="factura" name="factura" size="30"></div>

			</div>			

			<div class="row">

				<div class="span2"><label>Teléfono</label></div>

				<div class="span3"><input class="input" id="telefono" name="telefono" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Mail</label></div>

				<div class="span3"><input class="input" id="email" name="mail" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Dirección</label></div>

				<div class="span3"><input class="input" id="direccion" name="direccion" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Localidad</label></div>

				<div class="span3"><input class="input" id="localidad" name="localidad" size="30"></div>

			</div>			

			<div class="row">

				<div class="span5"><hr></div>

			</div>			

			<div class="row">

				<div class="span2"><label>Motor SCI</label></div>

				<div class="span3"><input class="input" id="motor_sci" name="motor_sci" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Vendedor</label></div>

				<div class="span3"><input class="input" id="vendedor" name="vendedor" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>Web Terminal</label></div>

				<div class="span3"><input class="input" id="web_terminal" name="web_terminal" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>GDS de Tucano</label></div>

				<div class="span3"><input class="input" id="gds_tucano" name="gds_tucano" size="30"></div>

			</div>

			<div class="row">

				<div class="span2"><label>GDS Propio</label></div>

				<div class="span3"><input class="input" id="gds_propio" name="gds_propio" size="30"></div>

			</div>

		</div>

	</form>

</div>



<div id="dialog-tipos" title="Tipos de Cliente">

	<form>

	<p class="validateTips"><strong>Complete los datos</strong></p>

	<hr />

	<table width="400" border="0" cellspacing="0" cellpadding="0">

		<tr>

			<td>Nombre</td>

			<td><input class="input" name="tipo_cli" id="tipo_cli" /></td>

		</tr>

		<tr>

			<td align="center" colspan="2">EMISIONES<hr /></td>

		</tr>

		<tr>

			<td>FEE cabotaje</td>

			<td><input class="input" name="fee_cab" id="fee_cab" /></td>

		</tr>

		<tr>

			<td>FEE internacional</td>

			<td><input class="input" name="fee_int" id="fee_int" /></td>

		</tr>

		<tr>

			<td align="center" colspan="2">COMISION Y OVER<hr /></td>

		</tr>

		<tr>

			<td>Emisiones con:</td>

			<td>Retener</td>

		</tr>

		<tr>

			<td>Comisión y Over</td>

			<td><input class="input" name="comi_over" id="comi_over" /></td>

		</tr>

		<tr>

			<td>Solo Comisión</td>

			<td><input class="input" name="solo_comi" id="solo_comi" /></td>

		</tr>

		<tr>

			<td colspan="2"><a href="#" class="btn btn-mini btn-primary" id="cia_especifica">Agregar Línea Aérea específica</a></td>

		</tr>

		<tr>

			<td colspan="2">

				<div id="com-especial" style="display:none;">

					<table border="0">

						<tr>

							<td>CIA</td>

							<td><input class="input" name="cia_com_esp" id="cia_com_esp" /></td>

						</tr>

						<tr>

							<td>Comisión y Over</td>

							<td><input class="input" name="com_esp" id="com_esp" /></td>name

						</tr>

						<tr>

							<td>Solo Comisión</td>

							<td><input class="input" name="over_com_esp" id="over_com_esp" /></td>

						</tr>

					</table>

				</div>

			</td>

		</tr>

		<tr>

			<td align="center" colspan="2"><hr /></td>

		</tr>

		<tr>

			<td align="center" colspan="2"><strong>Fee por compañia aérea</strong><hr /></td>

		</tr>

		<tr>

			<td>Monto</td>

			<td>CIA</td>

		</tr>

		<tr>

			<td><input class="input" name="monto_fee1" id="monto_fee1" /></td>

			<td><input class="input" name="cia_fee1" id="cia_fee1" /></td>

		</tr>

		<tr>

			<td><input class="input" name="monto_fee2" id="monto_fee2" /></td>

			<td><input class="input" name="cia_fee2" id="cia_fee2" /></td>

		</tr>

		<tr>

			<td><input class="input" name="monto_fee3" id="monto_fee3" /></td>

			<td><input class="input" name="cia_fee3" id="cia_fee3" /></td>

		</tr>

		<tr>

			<td><input class="input" name="monto_fee4" id="monto_fee4" /></td>

			<td><input class="input" name="cia_fee4" id="cia_fee4" /></td>

		</tr>

		<tr>

			<td align="center" colspan="2"><hr /></td>

		</tr>

		<tr>

			<td align="center" colspan="2"><strong>BT</strong><hr /></td>

		</tr>

		<tr>

			<td>Monto</td>

			<td>CIA</td>

		</tr>

		<tr>

			<td><input class="input" name="monto_bt1" id="monto_bt1" /></td>

			<td><input class="input" name="cia_bt1" id="cia_bt1" /></td>

		</tr>

		<tr>

			<td><input class="input" name="monto_bt2" id="monto_bt2" /></td>

			<td><input class="input" name="cia_bt2" id="cia_bt2" /></td>

		</tr>

		<tr>

			<td><input class="input" name="monto_bt3" id="monto_bt3" /></td>

			<td><input class="input" name="cia_bt3" id="cia_bt3" /></td>

		</tr>

		<tr>

			<td><input class="input" name="monto_bt4" id="monto_bt4" /></td>

			<td><input class="input" name="cia_bt4" id="cia_bt4" /></td>

		</tr>



		<tr>

			<td colspan="2">RE-EMISION<hr /></td>

		</tr>

		<tr>

			<td>FEE cabotaje</td>

			<td><input class="input" name="fee_re_cab" id="fee_re_cab" /></td>

		</tr>

		<tr>

			<td>FEE internacional</td>

			<td><input class="input" name="fee_re_int" id="fee_re_int" /></td>

		</tr>

		<tr>

			<td align="center" colspan="2">GUARDIA<hr /></td>

		</tr>

		<tr>

			<td>Emisión</td>

			<td>&nbsp;</td>

		</tr>

		<tr>

			<td>FEE cabotaje</td>

			<td><input class="input" name="fee_gu_cab" id="fee_gu_cab" /></td>

		</tr>

		<tr>

			<td>FEE internacional</td>

			<td><input class="input" name="fee_gu_int" id="fee_gu_int" /></td>

		</tr>

		<tr>

			<td>Reemisión</td>

			<td>&nbsp;</td>

		</tr>

		<tr>

			<td>FEE cabotaje</td>

			<td><input class="input" name="fee_gu_re_cab" id="fee_gu_re_cab" /></td>

		</tr>

		<tr>

			<td>FEE Internacional</td>

			<td><input class="input" name="fee_gu_re_int" id="fee_gu_re_int" /></td>

		</tr>

	</table>

	</form>

</div>



<div id="dialog-comentarios" title="Insertar Comentario">

	<form>

		<div class="row">

			<div class="span4">

				<p class="validateTips"><strong>Inserte un Comentario</strong></p>

			</div>

		</div>

		<div class="row">

			<div class="span4">

				<textarea name="comentario" id="comentario" autofocus></textarea>

			</div>

		</div>

	</form>

</div>



<div id="dialog-map" title="Localización de Clientes">

	<form><div id="map_container"></div></form>

</div>



<div id="dialog-comercial" title="Insertar Notas Dpto. Comercial">

	<form>

		<div class="row">

			<div class="span2 margin-top">

				<label>1. Alcance del Negocio</label>

				<select name="alcance_negocio" id="alcance_negocio">

					<option value="">---Seleccione opción---</option>

					<option value="corporativo">Corporativo</option>

					<option value="vacacional">Vacacional</option>

					<option value="receptivo">Receptivo</option>

					<option value="emisivo">Emisivo</option>

					<option value="grupos">Grupos</option>

				</select>

			</div>

			<div class="span4">

				<label>2. Usa Guardia?</label>

			</div>

			<div class="span4">

				<div class="radio"><input type="radio" name="cliente_guardia" value="si">Si</input></div>

				<div class="radio"><input type="radio" name="cliente_guardia" value="no">No</input></div>

			</div>

			<div class="span4 margin-top">

				<label>3. Compra en la Operadora?</label>

			</div>

			<div class="span4">

				<div class="radio"><input type="radio" name="cliente_operadora" value="si">Si</input></div>

				<div class="radio"><input type="radio" name="cliente_operadora" value="no">No</input></div>

			</div>

			<div class="span4 margin-top">

				<label>4. Observaciones Comerciales</label>

				<textarea class="input-xlarge" name="obs_comerciales" id="obs_comerciales" autofocus></textarea>

			</div>

			<div class="span4">

				<label>5. Observaciones sobre Atenci&oacute;n</label>

				<textarea class="input-xlarge" name="obs_atencion" id="obs_atencion" autofocus></textarea>

			</div>

			<div class="span4">

				<label>6. Observaciones Tecnol&oacute;gicas</label>

				<textarea class="input-xlarge" name="obs_tecno" id="obs_tecno" autofocus></textarea>

			</div>

			

		</div>

	</form>

</div>

