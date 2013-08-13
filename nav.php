<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li class="dropdown" id="term">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buscar por:&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li selected value="nombre"><a href="#">Nombre</a></li>
                    <li value="cli_cod"><a href="#">Código VSTOUR</a></li>
                    <li value="fac"><a href="#">Razón Social</a></li>
                    <li value="tipo_cliente"><a href="#">Tipo Cliente</a></li>
                    <li value="sci"><a href="#">Cotización SCI</a></li>
                    <li value="motor_sci"><a href="#">Emisión SCI</a></li>
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
                <button class="btn btn-danger btn-mini" type="submit">
                    <i class="icon-search icon-white"></i>
                </button>
            </form>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">VER<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a id="ver-clientes" href="#">Todos los Clientes</a></li>
                    <li><a id="ver-tipo" href="#">Tipos de Cliente</a></li>
                </ul>
            </li>
            <?php
                $rol = $_SESSION['rol'];
                if ($rol == 'a' || $rol == 'adm' || $rol == 'l' || $rol == 'edit') {
            ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">CREAR<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a id="crear" href="#">Cliente</a></li>
                        <?php
                        if ($rol == 'a' || $rol == 'edit') {
                            ?>
                        <li><a id="crear-tipo" href="#">Tipo de Cliente</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php
                }
            ?>
            <li id="filtro" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-filter"></i>FILTRAR<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a id="filtro-notas">Notas</a></li>
                </ul>
            </li>
            <?php
                $rol = $_SESSION['rol'];
                if ($rol == 'a' || $rol == 'edit') {
            ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a id="facturar_sci" href="#">Clientes a Facturar SCI</a></li>
                        <li><a id="manuales_sci" href="#">Acceso Manuales SCI</a></li>
                        <li><a id="roles" href="#">Administrar Roles</a></li>
                    </ul>
                </li>
            <?php
                }
            ?>            
        </ul><!--nav-->
        <img id="cargando" src="ajax-loader.gif"/>
        <button id="cerrar-sesion" class="btn btn-inverse pull-right" type="submit">Cerrar Sesión</button>
    </div><!--navbar-inner-->
</div><!--navbar-->

