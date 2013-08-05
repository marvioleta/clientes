$(document).ready(function(){

	//defino el template de la tabla de clientes clientes

	$('#clienteTemplate').template("ClientTmpl");

	//tipos de cliente con template

	$('#tiposTemplate').template("TipoTmpl");

	//template de los popovers

	$('#popoverTemplate').template("PopTmpl");



	//AJAX LOADING GIF

	$("body")

	.ajaxStart(function(){

		$("#cargando").fadeIn('fast');

	})

	.ajaxComplete(function(){

		$("#cargando").fadeOut('slow');

		botones();

	});



	$('#listado').on("click",'.ver_detalle', function(event){

		var div = $(this).parent();

		div.parent().nextAll('.detalle').slideToggle();

		$(".tabla-comentarios .row:odd").addClass("odd-row radius shadow");

	});



	//se inicia la variable va a contener el this del popover

	var pop;

	//al iniciar se dispara el template de lso clientes	

	var limit = "inicio";

	cargarClientes(limit);



	/*

	//al iniciar se llena el combo de busqueda

	$.ajax({

		url:"getColumns.php",

		dataType: "json",

		success: function(data){

			$('#term').html("");								

			$.each(data,function(k,v){

				if ( v == 'nombre')

				{

					$('#term').append("<option selected>" + v + "</option>");

				}else{

					$('#term').append("<option>" + v + "</option>");

				}

			});

		}

	});

	*/

	

	//al ser clickeado un boton, la funcion de abajo atrapa la accion deseada

	$(document).on("click","a,button,label",function(){

		//atrapo la accion de cada boton, que es el id

		var accion=$(this).attr('id');

		//alert(accion);

		//abre la ventana para la edicion del cliente		

		if (accion == "editar"){

			//alert('sdasdas')

			var cli =$(this).attr('id_cli');

			var action=$(this).attr('id');

			$('body').data('id_cli',cli);

			$('body').data('action', action);

			$.ajax({

				type:'POST',

				data:'id_cli='+cli,

				url:'getCliente.php',

				dataType:'json',

				success: function(data){

					//alert(data.resultado.nombre)

					if(typeof data.active_user == 'undefined'){

						if (data.error == "OK") {

							$("#dialog-cliente #cli_cod").attr("value",data.resultado.cli_cod);

							//$("#dialog-cliente #cli_cod").attr("readonly","readonly");

							$("#dialog-cliente #nombre").attr("value",data.resultado.nombre);

							$("#dialog-cliente #factura").attr("value",data.resultado.factura);

							$("#dialog-cliente #tipo_cliente").attr("value",data.resultado.tipo_cliente);

							$("#dialog-cliente #sci").attr("value",data.resultado.sci);

							$("#dialog-cliente #motor_sci").attr("value",data.resultado.motor_sci);

							$("#dialog-cliente #web_terminal").attr("value",data.resultado.web_terminal);

							$("#dialog-cliente #gds_tucano").attr("value",data.resultado.gds_tucano);

							$("#dialog-cliente #gds_propio").attr("value",data.resultado.gds_propio);

							$("#dialog-cliente #telefono").attr("value",data.resultado.telefono);

							$("#dialog-cliente #email").attr("value",data.resultado.mail);

							$("#dialog-cliente #direccion").attr("value",data.resultado.direccion);

							$("#dialog-cliente #vendedor").attr("value",data.resultado.vendedor);

							$("#dialog-cliente #localidad").attr("value",data.resultado.localidad);					

							$("#dialog-cliente #cuit").attr("value",data.resultado.cuit);

							$("#dialog-cliente #monto_garantia").attr("value",data.resultado.monto_garantia);

							$("#dialog-cliente #tipo_garantia").attr("value",data.resultado.tipo_garantia);

							$("#dialog-cliente #limite_credito").attr("value",data.resultado.limite_credito);

							$( "#dialog-cliente" ).dialog( "open" );

						}else{

							alert(data.error);

						}

					}else{

						alert(data.user_message);

						window.location="login.php";

					}

				}

			});

		}

		//NAVIGATION DE CLIENTES

		if (accion == "mas" || accion == "menos"){			

			cargarClientes(accion);

		}



		//abrir el popover

		if (accion == "pop_tipos"){

			pop = $(this);			

			var tipo = $(this).attr('tipo');

			pop.addClass('pop');

			$.ajax({

				type:'POST',

				data:'tipo='+tipo,

				url:'getTipos.php',

				dataType:'json',

				success: function(data){

					$("#ttip").empty();

					$.tmpl("PopTmpl",data).appendTo("#ttip");

					createPop();

					return true;

				}

			});			

		}

		//cerrar el popover

		if (accion == "cerrar-pop"){

			//alert(accion)

			pop.clickover('hide');

			//pop.removeAttr('id','pop_tipos');

			pop.removeClass('pop');

		}

		//ABRE EL DIALOG PARA LOCALIZAR AL CLIENTE CON GOOGLE MAPS

		if (accion == "mapear"){

			var cli =$(this).attr('id_cli');

			$('body').data('id_cli', cli);



			$.ajax({

				type:'POST',

				data:'id_cli='+cli,

				url:'getLatLng.php',

				dataType:'json',

				success: function(data){

					if(typeof data.active_user == 'undefined'){

						$('body').data("lat",data.lat);

						$('body').data("lng",data.lng);

						$( "#dialog-map" ).dialog( "open" );

						initialize();

						//addMarker();

					}else{

						alert(data.user_message);

						window.location="login.php";

					}

				}

			});

		}



		//ABRE DIALOG PARA LA CREACION DE UN NUEVO CLIENTE

		if (accion == "crear"){

			var action=$(this).attr('id');

			$('body').data('action', action);

			$( "#dialog-cliente" ).dialog( "open" );

		}

		

		if (accion == "borrar"){

			var cli =$(this).attr('id_cli');

			var dc = confirm("Esta seguro de borrar el cliente "+cli+"?");

			if (dc){

				$.ajax({

					type:'POST',

					data:'id_cli='+cli,

					url:'deleteCliente.php',

					dataType:'json',

					success: function(data){

						if(typeof data.active_user == 'undefined'){

							if (data.error != "OK"){

								alert("Ha ocurrido el siguiente error "+data.error);

							}else{

								alert(data.error);

								location.reload();

							}

						}else{

							alert(data.user_message);

							window.location="login.php";

						}

					}

				});

			}else{

				return false;

			}

		}

		

		if (accion == "crear-tipo"){

			var action=$(this).attr('id');

			$('body').data('action', action);

			$( "#dialog-tipos" ).dialog( "open" );

		}

		

		if (accion == "ver-clientes"){

			location.reload();

		}



		if (accion == "cerrar-sesion"){

			$.ajax({

				url:"logout.php",

				success: function(){

					window.location = "login.php";

				}

			});			

		}



		if (accion == "ver-tipo"){

			//var rol = get('rsgk');

			$('#nav').fadeOut();

			$.ajax({

				//url:'getTipos.php?id_cli=A',

				url:"allTipos.php",

				dataType: "json",

				success: function(data){

					if(typeof data.active_user == 'undefined'){

						$(".clientes").empty();

						$.tmpl("TipoTmpl",data).appendTo(".clientes");

					}else{

						alert(data.user_message);

						window.location="login.php";

					}

				}

			});			

		}



		if (accion == "insertar-comentario"){

			var cod_cli=$(this).attr('id_cli');

			$('body').data('id_cli', cod_cli);

			$( "#dialog-comentarios" ).dialog( "open" );

		}



		if (accion == "comentario-comercial"){

			var id_cli = $(this).attr('id_cli');

			$('body').data('id_cli', id_cli);

			$.ajax({

				type: "POST",

				url:"comentariosComerciales.php?accion=abrir&id_cli=" + id_cli,				

				dataType:"json",

				success: function(data){

					if (data.error == "OK" ) {

						$('body').data('vacio',data.vacio);

						if (data.vacio != "vacio") {

							$("#dialog-comercial #alcance_negocio").attr("value",data.resultado.alcance_negocio);

							$("#dialog-comercial #obs_comerciales").attr("value",data.resultado.obs_comerciales);

							$("#dialog-comercial #obs_atencion").attr("value",data.resultado.obs_atencion);

							$("#dialog-comercial #obs_tecno").attr("value",data.resultado.obs_tecno);

							$("input[name=cliente_guardia][value=" + data.resultado.cliente_guardia + "]").attr('checked', 'checked');

							$("input[name=cliente_operadora][value=" + data.resultado.cliente_operadora + "]").attr('checked', 'checked');

							$( "#dialog-comercial" ).dialog( "open" );

						}else{

							$( "#dialog-comercial" ).dialog( "open" );

						}

					}else{

						alert(data.error);

					}

				}

			});

		}



		if (accion == "borrar-comentario"){

			var id_nota=$(this).attr('id_nota');

			var bc=confirm("Confirma que desea eliminar su comentario?");

			if(bc)

			{

				$.ajax({

					type: 'post',

					url: 'comentarios.php?accion=borrar',

					data: 'id_nota=' + id_nota,

					success: function(data){

						if(typeof data.active_user == 'undefined'){

							if(!data.error){

								location.reload();

							}else{

								alert("Ha ocurrido el siguiente error "+data.error);

							}

						}else{

							alert(data.user_message);

							window.location="login.php";

						}

					},

					error: function(data){

						alert("Ha ocurrido el siguiente error "+data.error);

					}

				});

			}

		}



		if (accion == "buscar"){

			//hago la busqueda definiendo el WHERE y el LIKE 

			var where=$('#term').val();

			var igual=$('#searchTerm').val();

			if (igual) {

				$.ajax({

					type:'post',

					url:"search.php",

					data: 'where='+where+'&igual='+igual,

					dataType: "json",

					success: function(data){

						if(typeof data.active_user == 'undefined'){

							if(!data.error){

								$('#nav').fadeOut();

								$(".clientes").empty();

								$.tmpl("ClientTmpl",data).appendTo(".clientes");

							}else{

								alert("No se econtraron resultados");

							}

						}else{

							alert(data.user_message);

							window.location="login.php";

						}

					},

					error: function(data){

						alert("No se econtraron resultados");

					}

				});

			}

		}



		if (accion == "editar-tipo")

		{

			var cli =$(this).attr('tipo_cli');

			var action=$(this).attr('id');

			$('body').data('action', action);

			$.ajax({

				type:'POST',

				data:'tipo='+cli,

				url:'getTipos.php',

				dataType:'json',

				success: function(data){

					if(typeof data.active_user == 'undefined'){

						$("#dialog-tipos #tipo_cli").attr("value",data[0].tipo_cliente);

						$("#dialog-tipos #tipo_cli").attr("readonly","readonly");

						$("#dialog-tipos #fee_cab").attr("value",data[0].fee_cab);

						$("#dialog-tipos #fee_int").attr("value",data[0].fee_int);

						$("#dialog-tipos #comi_over").attr("value",data[0].comi_over);

						$("#dialog-tipos #solo_comi").attr("value",data[0].solo_comi);

						$("#dialog-tipos #cia_com_esp").attr("value",data[0].cia_com_esp);

						$("#dialog-tipos #com_esp").attr("value",data[0].com_esp);

						$("#dialog-tipos #over_com_esp").attr("value",data[0].over_com_esp);

						$("#dialog-tipos #monto_bt1").attr("value",data[0].monto_bt1);

						$("#dialog-tipos #cia_bt1").attr("value",data[0].cia_bt1);

						$("#dialog-tipos #monto_bt2").attr("value",data[0].monto_bt2);

						$("#dialog-tipos #cia_bt2").attr("value",data[0].cia_bt2);

						$("#dialog-tipos #monto_bt3").attr("value",data[0].monto_bt3);

						$("#dialog-tipos #cia_bt3").attr("value",data[0].cia_bt3);

						$("#dialog-tipos #monto_bt4").attr("value",data[0].monto_bt4);

						$("#dialog-tipos #cia_bt4").attr("value",data[0].cia_bt4);

						$("#dialog-tipos #fee_re_cab").attr("value",data[0].fee_re_cab);

						$("#dialog-tipos #fee_re_int").attr("value",data[0].fee_re_int);

						$("#dialog-tipos #fee_gu_cab").attr("value",data[0].fee_gu_cab);

						$("#dialog-tipos #fee_gu_int").attr("value",data[0].fee_gu_int);

						$("#dialog-tipos #fee_gu_re_cab").attr("value",data[0].fee_gu_re_cab);

						$("#dialog-tipos #fee_gu_re_int").attr("value",data[0].fee_gu_re_int);

						$("#dialog-tipos #cia_fee1").attr("value",data[0].cia_fee1);

						$("#dialog-tipos #monto_fee1").attr("value",data[0].monto_fee1);

						$("#dialog-tipos #cia_fee2").attr("value",data[0].cia_fee2);

						$("#dialog-tipos #monto_fee2").attr("value",data[0].monto_fee2);

						$("#dialog-tipos #cia_fee3").attr("value",data[0].cia_fee3);

						$("#dialog-tipos #monto_fee3").attr("value",data[0].monto_fee3);

						$("#dialog-tipos #cia_fee4").attr("value",data[0].cia_fee4);

						$("#dialog-tipos #monto_fee4").attr("value",data[0].monto_fee4);						

						$( "#dialog-tipos" ).dialog( "open" );

					}else{

						alert(data.user_message);

						window.location="login.php";

					}

				}

			});

		}

		

		if (accion == "borrar-tipo")

		{

			var cli =$(this).attr('tipo_cli');

			var dt=confirm("Esta seguro de borrar el tipo de cliente "+cli+"?");

			if (dt){

				$.ajax({

					type:'POST',

					data:'tipo_cli='+cli,

					url:'deleteTipos.php',

					dataType:'json',

					success: function(data){

						if(typeof data.active_user == 'undefined'){

							if (data.error != "OK"){

								alert("Ha ocurrido el siguiente error "+data.error);

							}else{

								alert(data.error);

								$(".clientes").empty();

								$.tmpl("TipoTmpl",data).appendTo(".clientes");

							}

						}else{

							alert(data.user_message);

							window.location="login.php";

						}

					}

				});

			}else{

				return false;

			}				

		}

		if (accion == "filtro-notas")

		{

			$('#nav').fadeOut();

			$.ajax({

				url:"filtro.php",

				dataType: "json",

				success: function(data){

					if(typeof data.active_user == 'undefined'){

						if(!data.error){

							$('#nav').fadeOut();

							$(".clientes").empty();

							$.tmpl("ClientTmpl",data).appendTo(".clientes");

						}else{

							alert("No se econtraron resultados");

						}

					}else{

						alert(data.user_message);

						window.location="login.php";

					}

				},

				error: function(data){

					alert("No se econtraron resultados");

				}

			});

		}

	});



	$('#cia_especifica').on('click',function(){

		$('#com-especial').slideToggle('slow');		

	});

	

	//------------------ FUNCIONES DEL DIALOG DE EDICION DE CLIENTES --------------------------	

		var cli_cod=$('#cli_cod'),

			nombre=$('#nombre'),

			factura=$('#factura'),

			tipo_cliente=$('#tipo_cliente'),

			sci=$('#sci'),

			motor_sci=$('#motor_sci'),

			web_terminal=$('#web_terminal'),

			gds_tucano=$('#gds_tucano'),

			gds_propio=$('#gds_propio'),

			telefono=$('#telefono'),

			mail=$('#email'),

			direccion=$('#direccion'),

			localidad=$('#localidad'),

			vendedor=$('#vendedor'),

			monto_garantia=$('#monto_garantia'),

			tipo_garantia=$('#tipo_garantia'),

			limite_credito=$('#limite_credito'),

			cuit=$('#cuit'),

			allFields = $( [] ).add( cli_cod ).add( nombre ).add( factura ).add( tipo_cliente )

		.add( sci ).add( motor_sci ).add( web_terminal ).add( gds_tucano ).add( gds_propio ).add( telefono )

		.add( mail ).add( direccion ).add( localidad ).add( vendedor ).add( monto_garantia ).add( tipo_garantia )

		.add( limite_credito ).add( cuit ),tips = $( ".validateTips" );

		

		var tipo_cli=$('#tipo_cli'),

			fee_cab=$('#fee_cab'),

			fee_int=$('#fee_int'),

			comi_over=$('#comi_over'),

			solo_comi=$('#solo_comi'),

			cia_com_esp=$('#cia_com_esp'),

			com_esp=$('#com_esp'),

			over_com_esp=$('#over_com_esp'),

			monto_bt1=$('#monto_bt1'),

			cia_bt1=$('#cia_bt1'),

			monto_bt2=$('#monto_bt2'),

			cia_bt2=$('#cia_bt2'),

			monto_bt3=$('#monto_bt3'),

			cia_bt3=$('#cia_bt3'),

			monto_bt4=$('#monto_bt4'),

			cia_bt4=$('#cia_bt4'),

			fee_re_cab=$('#fee_re_cab'),

			fee_re_int=$('#fee_re_int'),

			fee_gu_cab=$('#fee_gu_cab'),

			fee_gu_int=$('#fee_gu_int'),

			fee_gu_re_cab=$('#fee_gu_re_cab'),

			fee_gu_re_int=$('#fee_gu_re_int'),

			cia_fee1=$('#cia_fee1'),

			monto_fee1=$('#monto_fee1'),

			cia_fee2=$('#cia_fee2'),

			monto_fee2=$('#monto_fee2'),

			cia_fee3=$('#cia_fee3'),

			monto_fee3=$('#monto_fee3'),

			cia_fee4=$('#cia_fee4'),

			monto_fee4=$('#monto_fee4'),

		campos=$( [] ).add( tipo_cli ).add( fee_cab ).add( fee_int).add( comi_over).add( solo_comi ).add( cia_com_esp )

		.add( com_esp ).add( over_com_esp).add( monto_bt1).add( cia_bt1).add( monto_bt2).add( cia_bt2).add( monto_bt3)

		.add( cia_bt3).add( monto_bt4).add( cia_bt4 ).add( fee_re_cab).add( fee_re_int).add( fee_gu_cab).add( fee_gu_int)

		.add( fee_gu_re_cab).add( fee_gu_re_int)

		.add( cia_fee1 ).add( cia_fee2 ).add( cia_fee3 ).add( cia_fee4 )

		.add( monto_fee1 ).add( monto_fee2 ).add( monto_fee3 ).add( monto_fee4 );

			

		var comentario=$("#comentario");



		var	obs_comerciales = $('#obs_comerciales'),

		obs_atencion = $('#obs_atencion'),

		obs_tecno = $('#obs_tecno'),

		campos_comerciales = $([]).add(obs_comerciales)

							      .add(obs_atencion)

								  .add(obs_tecno);



		function updateTips( t ) {

			tips

				.text( t )

				.addClass( "ui-state-highlight" );

			setTimeout(function() {

				tips.removeClass( "ui-state-highlight", 1500 );

			}, 500 );

		}



		function checkLength( o, n, min, max ) {

			if ( o.val().length > max || o.val().length < min ) {

				o.addClass( "ui-state-error" );

				updateTips( "El largo de " + n + " debe ser entre " +

					min + " y " + max + " caracteres." );

				return false;

			} else {

				return true;

			}

		}



		function checkRegexp( o, regexp, n ) {

			if ( !( regexp.test( o.val() ) ) ) {

				o.addClass( "ui-state-error" );

				updateTips( n );

				return false;

			} else {

				return true;

			}

		}



	$("#dialog-cliente" ).dialog({

		autoOpen: false,

		height: 460,

		width: 450,

		modal: true,

		buttons: {

			"Guardar": function() {

					var acc=$('body').data('action');

					var id_cli = $('body').data('id_cli')

					var bValid = true;

					allFields.removeClass( "ui-state-error" );



					bValid = bValid && checkLength( nombre, "Nombre", 3, 80 );

					bValid = bValid && checkLength( factura, "Factura", 3, 80 );

					bValid = bValid && checkLength( tipo_cliente, "Tipo de Cliente", 1, 8 );

					//bValid = bValid && checkLength( sci, "SCI", 2, 2 );

					bValid = bValid && checkLength( cli_cod, "Codigo de Cliente", 2, 5 );

					bValid = bValid && checkLength( vendedor, "Vendedor", 3, 80 );

					/*bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "ej. tu@email.com" );*/



					if( bValid ){

						var formu=$("#dialog-cliente form").serialize();

						$.ajax({

							type: 'POST',

							url: 'saveCliente.php?accion=' + acc + '&id_cli=' + id_cli,

							data: formu,

							dataType: 'json',

							success: function(data){

								//alert(data.error);

								if(typeof data.active_user == 'undefined'){

									if (data.error != "OK"){

										alert("Ha ocurrido el siguiente error "+data.error);

										$( this ).dialog( "close" );

									}else{

										alert(data.error);

										location.reload();

										$( this ).dialog( "close" );

									}

								}else{

									alert(data.user_message);

									window.location="login.php";

								}

							}

						});

					}

			},

			"Cancelar": function() {

				$( this ).dialog( "close" );

			}

		},

		close: function() {

			// saco la propiedad remove only del codigo de cliente.

			$("#dialog-cliente #cli_cod").removeAttr("readonly");		

			allFields.val("").removeClass( "ui-state-error" );

		}

	});

	//------------------ FIN DE LAS FUNCIONES DEL DIALOG DE EDICION --------------------------	

	

	//----------------DIALOG PARA LOS TIPOS DE CLIENTES ---------------------------------

	$("#dialog-tipos" ).dialog({

		autoOpen: false,

		height: 750,

		width: 480,

		modal: true,

		buttons: {

			"Guardar": function() {

					var acc=$('body').data('action');

					var bValid = true;

					campos.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( tipo_cli, "Nombre", 1, 10 );



					if( bValid ){

						var formu=$("#dialog-tipos form").serialize();

						$.ajax({

							type: "POST",

							url:"saveTipos.php?accion="+acc,

							data: formu,

							dataType:"json",

							success: function(data){

								if(typeof data.active_user == 'undefined'){

									if (data.error != "OK"){

										alert("Ha ocurrido el siguiente error "+data.error);

										$( this ).dialog( "close" );

									}else{

										alert(data.error);

										location.reload();

										$( this ).dialog( "close" );

									}

									$( this ).dialog( "close" );

								}else{

									alert(data.user_message);

									window.location="login.php";

								}

							}

						});

					}

			},

			"Cancelar": function() {

				$( this ).dialog( "close" );

			}

		},

		close: function() {

			// saco la propiedad readonly del codigo de cliente.

			$("#dialog-tipos #tipo_cli").removeAttr("readonly");		

			campos.val("").removeClass( "ui-state-error" );

		}

	});



	$("#dialog-comentarios" ).dialog({

		autoOpen: false,

		height: 240,

		width: 250,

		modal: true,

		buttons: {

			"Guardar": function() {

					var bValid = true;

					comentario.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( comentario, "Comentario", 1, 1000 );



					if( bValid ){

						var id_cli = $('body').data('id_cli');

						//alert(comentario.val());

						var formu = "comentario=" + comentario.val() + "&id_cli=" + id_cli;

						$.ajax({

							type: "POST",

							url:"comentarios.php?accion=guardar",

							data: formu,

							dataType:"json",

							success: function(data){

								if(typeof data.active_user == 'undefined'){

									if (data.error != "OK"){

										alert("Ha ocurrido el siguiente error "+data.error);

										$( this ).dialog( "close" );

									}else{

										alert(data.error);

										location.reload();

										$( this ).dialog( "close" );

									}

									$( this ).dialog( "close" );

								}else{

									alert(data.user_message);

									window.location="login.php";

								}

							}

						});

					}

			},

			"Cancelar": function() {

				$( this ).dialog( "close" );

			}

		},

		close: function() {

			comentario.val("").removeClass( "ui-state-error" );

		}

	});



	$("#dialog-comercial" ).dialog({

		autoOpen: false,

		height: 600,

		width: 360,

		modal: true,

		buttons: {

			"Guardar": function() {

					var bValid = true;

					var vacio = $('body').data('vacio');

					var accion;

					campos_comerciales.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( obs_comerciales, "Observaciones Comerciales", 1, 2000 );

					bValid = bValid && checkLength( obs_atencion, "Observaciones de Atención", 1, 2000 );

					bValid = bValid && checkLength( obs_tecno, "Observaciones Tecnológicas", 1, 2000 );

					if (vacio == "vacio") {

						accion = "crear"

					}else{

						accion = "guardar"

					}



					if( bValid ){

						var id_cli = $('body').data('id_cli');

						//alert(comentario.val());

						var formu = $('#dialog-comercial form').serialize();

						$.ajax({

							type: "POST",

							url:"comentariosComerciales.php?accion=" + accion + "&id_cli=" + id_cli,

							data: formu,

							dataType:"json",

							success: function(data){

								if(typeof data.active_user == 'undefined'){

									if (data.error != "OK"){

										alert("Ha ocurrido el siguiente error "+data.error);

										$( this ).dialog( "close" );

									}else{

										alert(data.error);

										location.reload();

										$( this ).dialog( "close" );

									}

									$( this ).dialog( "close" );

								}else{

									alert(data.user_message);

									window.location="login.php";

								}

							}

						});

					}

			},

			"Cancelar": function() {

				$( this ).dialog( "close" );

			}

		},

		close: function() {

			campos_comerciales.val("").removeClass( "ui-state-error" );

		}

	});



	$("#dialog-map" ).dialog({

		autoOpen: false,

		height: 530,

		width: 610,

		modal: true,

		buttons: {

			"Guardar": function() {

				var cliente = $('body').data('id_cli');

				var lat = $('body').data('lat');

				var lng = $('body').data('lng');

				$.ajax({

					type: 'post',

					dataType: 'json',

					url: 'saveLatLng.php',

					data: 'id_cli=' + cliente + '&lat=' + lat + '&lng=' + lng,

					success: function(data){

						if(typeof data.active_user == 'undefined'){

							if (data.error != "OK"){

								alert("Ha ocurrido el siguiente error "+data.error);

								$( this ).dialog( "close" );

							}else{

								alert(data.error);

								location.reload();

								$( this ).dialog( "close" );

							}

							$( this ).dialog( "close" );

						}else{

							alert(data.user_message);

							window.location="login.php";

						}

					}

				});

			},

			"Cancelar": function() {

				$( this ).dialog( "close" );

			}

		},

		close: function() {



		}

	});

	//------------------ FIN DE LAS FUNCIONES DEL DIALOG DE EDICION --------------------------



function createPop(){

	$('.pop').clickover({

		content: $('#ttip').html(),

		title: 'Detalle Tipo de cliente <div class="span2 float-right"><a class="btn btn-mini btn-inverse" id="cerrar-pop" tipo_cli="${tipo_cliente}"><i class="icon-remove icon-white"></i></div>',

		html: true,

		trigger: 'click'

	}).clickover('show');

}





});// cierra el document ready



//funcion que trae elementos en la url

function get( name ){

	var regexS = "[\\?&]"+name+"=([^&#]*)";

	var regex = new RegExp ( regexS );

	var tmpURL = window.location.href;

	var results = regex.exec( tmpURL );

	if( results == null )

		return"";

	else

		return results[1];

}



function botones(){

	$('.ver_detalle').button({

		icons:{

			primary: "ui-icon-plusthick"

		},text:false

	})

	$('.editar').button({

		icons: {

			primary: "ui-icon-pencil"

		},text:false

	});

	$('.borrar,.borrar-comentario').button({

		icons: {

			primary: "ui-icon-trash"

		},

		text:false

	});

	$('.insertar-comentario').button({

		icons: {

			primary: "ui-icon-comment"

		},

		text:false

	});	

	$('.mapear').button({

		icons: {

			primary: "ui-icon-flag"

		},

		text:false

	});

	$('.comentario-comercial').button({

		icons: {

			primary: "ui-icon-circle-plus"

		},

		text:false

	});

}



//esta funcion retorna a los templates el codigo de cliente del usuario con sesion iniciada

function cliCod( item, array)

{

	var cli = $.inArray( item, array );

	return array[cli].id_cli;

}

function cargarClientes(l){

	if (l == 'inicio'){

		var a = 0;

		var b = 13;

		$('body').data('a',a);

		$('body').data('b',b);

	}



	if (navClientes(l)){

		$.ajax({

			type: 'post',

			url:"allClientes.php",

			dataType: "json",

			data: "limit=" + l,

			success: function(data){

				if(typeof data.active_user == 'undefined'){

					$.tmpl("ClientTmpl",data).appendTo(".clientes");

					$(".clientes").fadeIn();

				}else{

					alert(data.user_message);

					window.location="login.php";

				}

			}

		});

	}

}

function navClientes(limit){

	var a = $('body').data('a');

	

	if (limit == 'inicio'){

		a = 0;

		$('body').data('a', a);

		$(".clientes").html('').fadeOut();

		return true;

	}



	if(a > 0 && limit == 'menos'){

		a = a - 13;

		$('body').data('a', a);

		$(".clientes").html('').fadeOut();

		return true;

	}



	if (limit == 'mas'){

		a = a + 13;

		$('body').data('a', a);

		$(".clientes").html('').fadeOut();

		return true;

	}



	return false;

}