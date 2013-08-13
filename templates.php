<script id="clienteTemplate" type="jquery/x-jquery-tmpl">
    {{each clientes}}
    <div class="cliente row radius bgcolor">
    <div class="centrar">
        <div class="span12">
            <div class="row">
                <div class="span3">
                    <label class="titulo_rojo">${nombre}</label>
                    {{each(x,y) alertas }}
                        {{if y == id_cli }}
                            <span class="badge badge-important float-right">!</span>
                        {{/if}}
                    {{/each}}
                </div>
                <div class="span2" align="center"><label class="titulo">Tipo de Cliente:</label>
                    {{if tipo_cliente != "tucano" && tipo_cliente != "emisora" && tipo_cliente != "TUCANO" && tipo_cliente != "EMISORA" }}
                        <label id="pop_tipos" class="tipo_cliente" tipo="${tipo_cliente}">${tipo_cliente}</label>
                    {{else}}
                        ${tipo_cliente}
                    {{/if}}
                </div>
                <div class="span2" align="center"><label class="titulo">Cotización SCI:</label> ${sci}</div>
                <div class="span2" align="center"><label class="titulo">Emisión SCI:</label> ${motor_sci}</div>
                <div class="span3" align="center">
                    <a class="ver_detalle float-right" href="#">Ver Detalles</a>
                    <?php
                    $rol = $_SESSION['rol'];

                    if ($rol == 'a' || $rol == 'adm' || $rol == 'l') {
                        echo '<a class="editar float-right" id="editar" href="#" id_cli="${id_cli}" value="editar">Editar</a>';
                    }

                    if ($rol == 'a') {
                        echo '<a class="borrar float-right" id="borrar" href="#" id_cli="${id_cli}" value="borrar">Borrar</a>';
                    }

                    if ($rol == 'a' || $rol == 'adm' || $rol == 'l' || $rol == 'g') {
                        echo '<a class="float-right insertar-comentario" id="insertar-comentario" href="#" id_cli="${id_cli}" value="insertar">Insertar Comentario</a>';
                    }

                    if ($rol == 'a' || $rol == 'adm' || $rol == 'l') {
                        echo '<a class="mapear float-right" id="mapear" href="#" id_cli="${id_cli}" value="mapear">Mapear</a>';
                    }

                    if ($rol == 'a' || $rol == 'adm' || $rol == 'l') {
                        echo '<a class="comentario-comercial float-right" id="comentario-comercial" href="#" id_cli="${id_cli}" value="comentario-comercial">Comentario Comercial</a>';
                    }
                    ?>
                </div>
            </div>
            <div class="row detalle" style="display:none;">
                <div class="row">
                    <div class="span3"><label class="titulo">Terminal Web:</label> ${web_terminal}</div>
                    <div class="span4"><label class="titulo">GDS Tucano:</label> ${gds_tucano}</div>
                    <div class="span5"><label class="titulo">GDS Propio:</label> ${gds_propio}</div>
                </div>
                <div class="row">
                    <div class="span3"><label class="titulo">Código VSTOUR:</label> ${cli_cod}</div>
                    <div class="span4"><label class="titulo">Razón Social:</label> ${factura}</div>
                    <div class="span5"><label class="titulo">Vendedor:</label> ${vendedor}</div>
                </div>
                <div class="row">
                    <div class="span3"><label class="titulo">E-mail:</label> ${mail}</div>
                    <div class="span4"><label class="titulo">Dirección:</label> ${direccion}</div>
                    <div class="span5"><label class="titulo">Localidad:</label> ${localidad}</div>
                </div>
                <div class="row">
                    <div class="span3"><label class="titulo">Telefono: </label> ${telefono}</div>
                    <div class="span4"><label class="titulo"></label></div>
                    <div class="span5"><label class="titulo"></label></div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div align="left" class="span12 borde_rojo"><strong>Datos Administrativos:</strong></div>
                    <div class="span3"><label class="titulo">Tipo de Garantía:</label> ${tipo_garantia}</div>
                    <div class="span4"><label class="titulo">Monto Garantía:</label> ${monto_garantia}</div>
                    <div class="span5"><label class="titulo">CUIT:</label> ${cuit} </div>
                </div>
                <div class="row">
                    <!-- <div class="span4"><label class="titulo">Límite de crédito:</label> ${limite_credito}</div> -->
                    <div class="span4"><label class="titulo"></label> </div>
                    <div class="span4"><label class="titulo"></label> </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="row">
                        <div align="left" class="span12 borde_rojo"><strong>Notas:</strong></div>
                        <div class="span3"><label class="titulo">Fecha:</div>
                        <div class="span4"><label class="titulo">Usuario:</div>
                        <div class="span5"><label class="titulo">Notas:</div>
                    </div>
                    <div class="tabla-comentarios">
                        {{each(i,g) guardia}}
                            {{if g.id_cli == cliCod($value,clientes)}}
                                <div class="row">
                                    <div class="span3" align="center">${fecha}</div>
                                    <div class="span3" align="center">${user}</div>
                                    <div class="span5">${nota}</div>
                                    <div class="span1" align="center">
                                        {{if sesion['ususesion'] == user}}
                                            <a id="borrar-comentario" class="borrar-comentario" id_nota="${id_nota}" href="#">Borrar Nota</a>
                                        {{/if}}
                                    </div>
                                </div>
                            {{/if}}
                        {{/each}}
                    </div>
                </div>
                <div class="row">&nbsp;</div>
            </div>
        </div>
    </div>
    </div>
    {{/each}}
</script>

<script id="tiposTemplate" type="jquery/x-jquery-tmpl">
    <div class="caja backcolor borde_blanco">
        <div class="centrar">
            <div class="row borde_blanco bgcolor margin height_titulo">
                <div class="row">
                    <div class="span8"><label class="titulo_rojo" style="margin-left:10px;">Tipo de Cliente ${tipo_cliente}</label></div>
                    <?php
                        if ($rol == 'a') {
                            echo '
                                <div class="span2"><a class="btn btn-mini btn-inverse" id="editar-tipo" tipo_cli="${tipo_cliente}">Editar</a></div>
                                <div class="span2"><a class="btn btn-mini btn-inverse" id="borrar-tipo" tipo_cli="${tipo_cliente}"><label>Borrar</label></a></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="centrar">       
            <div class="row">
                <div class="span6 borde_blanco bgcolor margin">
                    <div align="center" class="borde_rojo"><label><strong>Emisión</strong></label></div>
                    <div class="row">
                        <div class="span3"><label>Con Com y Over:</label></div>
                        <div class="span3">${comi_over}</div>
                        <div class="span3"><label>Solo Com:</label></div>
                        <div class="span3">${solo_comi}</div>
                        <div class="span3"><label>Compañía:</label></div>
                        <div class="span3">${cia_com_esp}</div>
                        <div class="span3"><label>Con Com y Over:</label></div>
                        <div class="span3">${over_com_esp}</div>
                        <div class="span3"><label>Solo Com:</label></div>
                        <div class="span3">${com_esp}</div>
                    </div>  
                </div>
                <div class="span6 borde_blanco bgcolor margin">
                    <div align="center" class="borde_rojo"><label><strong>GUARDIA</strong></label></div>
                    <div class="row">
                        <div class="span3"><label>Fee Cabotaje:</label></div>
                        <div class="span3">${fee_gu_cab}</div>
                        <div class="span3"><label>Fee Internacional:</label></div>
                        <div class="span3">${fee_gu_int}</div>
                        <div class="span3"><label>Reemisión Cabotaje:</label></div>
                        <div class="span3">${fee_gu_re_cab}</div>
                        <div class="span3"><label>Reemisión Internacional:</label></div>
                        <div class="span3">${fee_gu_re_int}</div>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="span6 borde_blanco bgcolor margin">
                    <div align="center" class="borde_rojo"><label><strong>Fee</strong></label></div>
                    <div class="row">
                        <div class="span3"><label>Fee Cabotaje:</label></div>
                        <div class="span3">${fee_cab}</div>
                        <div class="span3"><label>Fee Internacional:</label></div>
                        <div class="span3">${fee_int}</div> 
                    </div>          
                </div>
                <div class="span6 borde_blanco bgcolor margin">
                    <div align="center" class="borde_rojo"><label><strong>Reemisión</strong></label></div>
                    <div class="row">
                        <div class="span3"><label>Fee Cabotaje:</label></div>
                        <div class="span3">${fee_re_cab}</div>
                        <div class="span3"><label>Fee Internacional:</label></div>
                        <div class="span3">${fee_re_int}</div>
                    </div>      
                </div>
            </div>
            <div class="row">
                <div class="span6 borde_blanco bgcolor margin">
                    <div align="center" class="borde_rojo"><label><strong>Fees emisión por Compañia</strong></label></div>
                    <div class="row">
                        <div class="span3">${cia_fee1}:</div>
                        <div class="span3">${monto_fee1}</div>
                        <div class="span3">${cia_fee2}:</div>
                        <div class="span3">${monto_fee2}</div>
                        <div class="span3">${cia_fee3}:</div>
                        <div class="span3">${monto_fee3}</div>
                        <div class="span3">${cia_fee4}:</div>
                        <div class="span3">${monto_fee4}</div>
                    </div>
                    <div class="row">
                        <label><u>Comentarios:</u></label>
                    </div>
                </div>
                <div class="span6 borde_blanco bgcolor margin">
                    <div align="center" class="borde_rojo"><label><strong>BT</strong></label></div>
                    <div class="row">
                        <div class="span3">${cia_bt1}:</div>
                        <div class="span3">${monto_bt1}</div>
                        <div class="span3">${cia_bt2}:</div>
                        <div class="span3">${monto_bt2}</div>
                        <div class="span3">${cia_bt3}:</div>
                        <div class="span3">${monto_bt3}</div>
                        <div class="span3">${cia_bt4}:</div>
                        <div class="span3">${monto_bt4}</div>
                    </div>
                    <div class="row">
                        <label><u>Comentarios:</u></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="borde_blanco bgcolor margin"><label><strong>Notas:</strong></label></div>
            </div>
        </div>
    </div>
</script>

<script id="popoverTemplate" type="jquery/x-jquery-tmpl">
    <div class="row bgcolor">
            <div class="row">
                <div class="span4">Tipo de Cliente ${tipo_cliente}</div>
            </div>
            <div class="row">
                <div class="span4 borde_rojo">Emisión</div>
            </div>
            <div class="row">
                <div class="span2">Con Com y Over:</div>
                <div class="span2">${comi_over}</div>
            </div>
            <div class="row">
                <div class="span2">Solo Com:</div>
                <div class="span2">${solo_comi}</div>
            </div>
            {{if cia_com_esp}}
                <div class="row">
                    <div class="span2">Compañía</div>
                    <div class="span2">${cia_com_esp}</div>
                </div>
                <div class="row">
                    <div class="span2">Con Com y Over:</div>
                    <div class="span2">${over_com_esp}</div>
                </div>
                <div class="row">
                    <div class="span2">Solo Com:</div>
                    <div class="span2">${com_esp}</div>
                </div>
            {{/if}}
            <div class="row">
                <div class="span4 borde_rojo">Fee</div>
            </div>
            <div class="row">
                <div class="span2">Fee Cabotaje</div>
                <div class="span2">${fee_cab}</div>
            </div>
            <div class="row">
                <div class="span2">Fee Internacional</div>
                <div class="span2">${fee_int}</div>
            </div>
    </div>
</script>

<script id="sciFacturaTemplate" type="jquery/x-jquery-tmpl">
    <div class="row bgcolor">
            <div class="row">
                <div class="span4">Nombre Cliente
                    <a id="agregar-sci-factura" class="btn btn-mini btn-inverse">Agregar Nuevo</a>
                </div>
                <div class="span2">Código VSTOUR</div>
                <div class="span2">Código VSTOUR a Facturar</div>
                <div class="span4">Acciones</div>
            </div>
            {{each sci_factura}}
                <div class="row">
                    <div class="span4">${nombre_cli}</div>
                    <div class="span2">${cli_cod}</div>
                    <div class="span2">${fac_cod}</div>
                    <div class="span4"><a class="borrar float-right" nombre="${nombre_cli}" id="borrar-facturar" href="#" id_sci_fac="${id_sci_fac}" value="borrar">Borrar</a></div>
                </div>
            {{/each}}
    </div>
</script>

<script id="sciUsersTemplate" type="jquery/x-jquery-tmpl">
    <div class="row bgcolor">
            <div class="row">
                <div class="span4">Empresa
                    <a id="agregar-sci-user" class="btn btn-mini btn-inverse">Agregar Nuevo</a>
                </div>
                <div class="span2">Usuario</div>
                <div class="span2">Password</div>
                <div class="span4">Acciones</div>
            </div>
            {{each sci_user}}
                <div class="row">
                    <div class="span4">${empresa}</div>
                    <div class="span2">${user}</div>
                    <div class="span2">${psw}</div>
                    <div class="span4"><a class="borrar float-right" nombre="${empresa}" id="borrar-sci-user" href="#" id_sci_user="${id_sci_user}" value="borrar">Borrar</a></div>
                </div>
            {{/each}}
    </div>
</script>

<script id="usersTemplate" type="jquery/x-jquery-tmpl">
    <div class="row bgcolor">
            <div class="row">
                <div class="span4">Rol</div>
                <div class="span4">Nombre</div>
                <div class="span4">Descripción</div>
            </div>
            {{each roles}}
                <div class="row">
                    <div class="span4">${rol}</div>
                    <div class="span4">${descripcion}</div>
                    <div class="span4">${detalle}</div>
                </div>
            {{/each}}
            <div class="row">
                <hr>
            </div>
            <div class="row">
                <div class="span2">Usuario
                    <a id="agregar-user" class="btn btn-mini btn-inverse">Agregar Nuevo</a>
                </div>
                <div class="span2">Password</div>
                <div class="span2">Rol</div>
                <div class="span1">Sine Sabre</div>
                <div class="span1">Sine Amadeus</div>
                <div class="span2">Acciones</div>
            </div>
            {{each usuarios}}
                <div class="row">
                    <div class="span2">${usuario}</div>
                    <div class="span2">${psw}</div>
                    <div class="span2">${descripcion}</div>
                    <div class="span1">${sine_sabre}</div>
                    <div class="span1">${sine_amadeus}</div>
                    <div class="span1"><a class="editar float-right" nombre="${usuario}" id="editar-user" href="#" id_user="${id_user}" value="editar">Editar</a></div>
                    <div class="span1"><a class="borrar float-right" nombre="${usuario}" id="borrar-user" href="#" id_user="${id_user}" value="borrar">Borrar</a></div>
                </div>
            {{/each}}
    </div>
</script>