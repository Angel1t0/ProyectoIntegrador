<header>
        <div class="logo-place"><a href="index.php"><img src="img/logo.png"></a></div> <!--Indicamos el logo en una clase, junto a una imagen-->
        <div class="search-place"><!--El lugar del buscador-->
            <input type="text" id="idbusqueda" placeholder="Encuentra todo" value="<?php if(isset($_GET['text'])){echo $_GET['text'];}else{echo '';} ?>"><!--Un input de tipo texto para realizar las busquedas con un texto preestablecido-->
            <button class="btn-main btn-search" onclick="search_producto()"><i class="fa fa-search" aria-hidden="true"></i></button><!--Boton de busqueda, usaremos una clase de fuentes de "font-awesome-4.7.0"-->
        </div>
        <div class="options-place"> <!--Opciones para la web-->
            <?php
                if (isset($_SESSION['codusu'])) {
                    echo '<div class="item-option" onclick="mostrar_opciones()"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <p>'.$_SESSION['nomusu'].'</p></div>';
                    
                }else {
                    ?>
                <div class="item-option" title="Ingresar">
					<a href="login.php"><i class="fa fa-user-circle-o" aria-hidden="true" style="color:#000000;"></i></a>
				</div><!--Icono para ingresar-->
            <?php
            }
            ?>
            <div class="item-option" title="Mis compras"><!--Icono de carrito de compras-->
                <a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true" style="color:#000000;"></i></a>
            </div>
            <div class="item-option" id="menu-movil2">
                <div class="item-option" onclick="mostrar_acerca()"><i class="fa fa-bars" aria-hidden="true"></i></div><!--Icono para el responsive-->
            </div>
        </div>
            
            <div class="menu-movil">
                <div class="item-option" onclick="mostrar_opciones()"><i class="fa fa-bars" aria-hidden="true"></i></div><!--Icono para el responsive-->
            </div>
    </header>
    <script type="text/javascript">
        function mostrar_acerca(){
            if(document.getElementById("ctrl-menu2").style.display=="none"){
            document.getElementById("ctrl-menu2").style.display="block"; //Al hacer click en el usuario, muestra las opciones
        } else {
            document.getElementById("ctrl-menu2").style.display="none";
        }
        }
    </script>
     <div class="menu-opciones2" id="ctrl-menu2" style="display: none;">
     <ul>
		<li>
			<a href="acerca.php">
				<div class="menu-opcion2">Acerca de</div>
			</a>
		</li>
        <li>
			<a href="nosotros.php">
				<div class="menu-opcion2">Nosotros</div>
			</a>
		</li>
    </ul>
    </div>
    <script type="text/javascript">
        function mostrar_opciones(){
            if(document.getElementById("ctrl-menu").style.display=="none"){
            document.getElementById("ctrl-menu").style.display="block"; //Al hacer click en el usuario, muestra las opciones
        } else {
            document.getElementById("ctrl-menu").style.display="none";
        }
        }
    </script>
    <div class="menu-opciones" id="ctrl-menu" style="display: none;">
    
    <?php
	if (isset($_SESSION['codusu'])) {
	?>
     <?php
	if ($_SESSION['codusu']=='1' || $_SESSION['codusu']=='2' || $_SESSION['codusu']=='3') {
	?>
        <ul>
		<li>
			<a href="carrito.php">
				<div class="menu-opcion">Carrito</div>
			</a>
		</li>
		<li>
			<a href="pedido.php">
				<div class="menu-opcion">Pedidos por pagar</div>
			</a>
		</li>
		<li>
			<a href="_logout.php">
				<div class="menu-opcion">Salir</div>
			</a>
		</li>
        <li>
			<a href="administrador/layout.php">
				<div class="menu-opcion">Administrador</div>
			</a>
		</li>
	</ul>
    <?php
	} else {
    ?> 
	<ul>
		<li>
			<a href="carrito.php">
				<div class="menu-opcion">Carrito</div>
			</a>
		</li>
		<li>
			<a href="pedido.php">
				<div class="menu-opcion">Pedidos por pagar</div>
			</a>
		</li>
		<li>
			<a href="_logout.php">
				<div class="menu-opcion">Salir</div>
			</a>
		</li>
	</ul>
    <?php
	}
	?>
	<?php
	} else{
    ?>
	<ul>
         <li>
			<a href="register.php">
				<div class="menu-opcion">Registrar</div>
			</a>
		</li>
		<li>
			<a href="login.php">
				<div class="menu-opcion">Iniciar sessión</div>
			</a>
		</li>
		<li>
			<a href="carrito.php">
				<div class="menu-opcion">Carrito</div>
			</a>
		</li>
        <li>
             <a href="acerca.php">
                <div class="menu-opcion">Acerca de</div>
            </a>
        </li>
        <li>
			<a href="nosotros.php">
				<div class="menu-opcion2">Nosotros</div>
			</a>
		</li>
    </ul>
	<?php
	}
	?>
</div>