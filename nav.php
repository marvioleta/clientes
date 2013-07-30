<div class="navbar">
    <div class="navbar-inner">
        <!--<a class="brand" href="#">Title</a>-->
        <ul class="nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buscar por...<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li selected value="nombre"><a href="#">Nombre</a></li>
                    <li value="cli_cod"><a href="#">Código VSTOUR</a></li>
                    <li value="fac"><a href="#">Razón Social</a></li>
                    <li value="tipo_cliente"><a href="#">Tipo Cliente</a></li>
                    <li value="sci"><a href="#">Addin SCI</a></li>
                    <li value="motor_sci"><a href="#">Motor SCI</a></li>
                    <li value="web_terminal"><a href="#">Web Terminal</a></li>
                    <li value="gds_tucano"><a href="#">GDS Tucano</a></li>
                    <li value="gds_propio"><a href="#">GDS Propio</a></li>
                    <li value="telefono"><a href="#">Teléfono</a></li>
                    <li value="mail"><a href="#">Email</a></li>
                    <li value="direccion"><a href="#">Dirección</a></li>
                    <li value="localidad"><a href="#">Localidad</a></li>
                    <li value="vendedor"><a href="#">Vendedor</a></li>
                    <li value="cuit"><a href="#">Cuit</a></li>
                </ul>
            </li>
            <form class="navbar-search" action="">
                <input class="search-query span2" type="text" placeholder="Search">
                <button class="btn btn-mini" type="submit">
                    <i class="icon-search"></i>
                </button>
            </form>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">VER<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Todos los Clientes</a></li>
                    <li><a href="#">Tipos de Cliente</a></li>
                </ul>
            </li>
            <!--<?php
                $rol = $_SESSION['rol'];
                if ($rol == 'a' || $rol == 'adm' || $rol == 'l') {
                    echo '<a id="crear" class="btn">Ingresar Cliente</a>';
                }
                if ($_SESSION['rol'] == 'a') {
                    echo '<a id="crear-tipo" class="btn">Crear Tipo de Cliente</a>';
                }
            ?>-->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">EDITAR<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Cliente</a></li>
                    <li><a href="#">Tipo de Cliente</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-filter"></i>FILTRAR<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a id="filtro-notas">Notas</a></li>
                </ul>
            </li>
            <!--<div class="btn-group">
                <a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-filter"></i> Filtrar <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a id="filtro-notas">Notas</a></li>
                </ul>
            </div><!--btn-group filtro-->
            <div id="cerrar-sesion" class="btn-group">
                <button class="btn btn-inverse" type="submit">Cerrar Sesión</button>
            </div>
        </ul><!--nav-->
    </div><!--navbar-inner-->
</div><!--navbar-->

