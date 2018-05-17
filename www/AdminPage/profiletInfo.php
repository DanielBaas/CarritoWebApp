<?php

require 'includes/db_connection.php';

require '../includes/init.php';
    if(Auth::isLoggedIn()){
        if($_SESSION['usuario']['tipo_cuenta'] !="A"){
            Url::redirect('/');
        }
    } else{
        Url::redirect('/');
    }
    $conn = require '../includes/db.php';
    if (isset($_GET['id_cliente'])) {

        $clientes = User::getByID($conn, $_GET['id_cliente']);

        if ( ! $clientes) {
            die("Product not found");
        }

    } else {
        die("id not supplied, Product not found");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_cliente'])) {
        $cliente = User::getByID($conn, $_POST['id_cliente']);

        var_dump($_POST);
        $cliente->nombre= $_POST['NombreUsuario'];
        $cliente->apellido= $_POST['apellidosPerfil'];
        $cliente->correo= $_POST['correoElectronico'];
        $cliente->contrasena= $_POST['contrasena'];
        $cliente->imagen_perfil = $_POST['imagen_perfil'];
        $cliente->tipo_usuario = $_POST['accounts'];
        $cliente->bio= $_POST['descipcionUsuario'];
        $cliente->fecha_registro = $_POST['fecha_registro'];

        if ($cliente->update($conn)) {
            echo"yei";
            Url::redirect("/AdminPage/users.php");
    
        }
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informaci&oacute;n de Usuario - BACARO Admin Page</title>

    <!-- Bootstrap 4, JQuery 3.2.1, Popper 1.12.9 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font Awesome 5.0.9 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/productInfo.css">
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/charts.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex d-md-block flex-nowrap wrapper">
            <div class="col" id="menu-superior">
                    <div id="menu-hamburguesa">
                        <a href="#" data-target="#sidebar" data-toggle="collapse" class="hover-transition">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>

                    <div id="navbar-logo">
                        <a href="/AdminPage/index.php"><img src="img/bacaro.png" alt="BACARO logo"></a>
                    </div>

                    <div class="right-options">
                        <div id="fullscreen-button">
                            <a href="#" title="Ver en pantalla completa" class="hover-transition" onclick="toggleFullScreen()">
                                <i class="fas fa-expand-arrows-alt"></i>
                            </a>
                        </div>

                        <div class="dropdown" align="center">
                            <button id="profile-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                <div id="navbar-profile"></div>
                                <div class="nombre-perfil">
                                    <span> <?php echo ($_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido'])?></span>
                                </div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="profile-button">
                                <a class="dropdown-item" href="#">Mi perfil</a>
                                <a class="dropdown-item" href="#">Ajustes de la cuenta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../AdminPage/logout.php">Cerrar sesión</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- navbar superior -->

            <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width" id="sidebar">
            		<div class="list-group border-0 card text-center text-md-left">
                    <a href="/AdminPage/index.php" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="d-none d-md-inline"> Inicio</span>
                    </a>

                    <a href="#usuarios" class="list-group-item d-inline-block collapsed menu-hover" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="d-none d-md-inline"> Usuarios</span>
                    </a>
                    <div class="collapse" id="usuarios" data-parent="#sidebar">
                        <a href="/AdminPage/profiletInfo.php" class="list-group-item" data-parent="#usuarios">
                            <i class="fas fa-plus"></i>
                            <span class="d-none d-md-inline"> Añadir</span>
                        </a>
                        <a href="/AdminPage/users.php" class="list-group-item" data-parent="#usuarios">
                            <i class="far fa-edit"></i>
                            <span class="d-none d-md-inline"> Editar</span>
                        </a>
                        <a href="/AdminPage/users.php"  class="list-group-item" data-parent="#usuarios">
                            <i class="far fa-trash-alt"></i>
                            <span class="d-none d-md-inline"> Eliminar</span>
                        </a>
                    </div>

                    <a href="#productos" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-box-open"></i>
                        <span class="d-none d-md-inline"> Productos</span>
                    </a>
                    <div class="collapse" id="productos" data-parent="#sidebar">
                        <a href="/AdminPage/productInfo.php" class="list-group-item" data-parent="#productos">
                            <i class="fas fa-plus"></i>
                            <span class="d-none d-md-inline"> Añadir</span>
                        </a>
                        <a href="/AdminPage/products.php" class="list-group-item" data-parent="#productos">
                            <i class="far fa-edit"></i>
                            <span class="d-none d-md-inline"> Editar</span>
                        </a>
                        <a href="/AdminPage/products.php" class="list-group-item" data-parent="#productos">
                            <i class="far fa-trash-alt"></i>
                            <span class="d-none d-md-inline"> Eliminar</span>
                        </a>
                    </div>

                    <a href="/AdminPage/" class="list-group-item d-inline-block collapsed" data-parent="#sidebar" title="Bitácora de eventos del portal web">
                        <i class="fas fa-file-alt"></i>
                        <span class="d-none d-md-inline"> Bitácora</span>
                    </a>

                    <a href="/AdminPage/" class="list-group-item d-inline-block collapsed" data-parent="#sidebar">
                        <i class="fas fa-cog"></i>
                        <span class="d-none d-md-inline"> Configuración</span>
                    </a>
                </div>
            </div> <!-- menu lateral -->

            <div class="w-100"></div>

            <div class="col" id="dashboard">
                <div class="row">
                    <!--<div class="col-3 tarjeta-info">
                        <div class="tarjeta-contenido tarjeta1">
                            <h6>Total de <strong>VISITANTES</strong></h6>
                            <h1 id="total-visitantes">25, 153</h1>
                        </div>
                        <div class="tarjeta-footer tarjeta1-footer">
                            <span id="incremento-trafico">39%</span> <span> incremento en el tráfico</span>
                        </div>
                    </div> 

                   	<div class="w-100"></div>-->
					<div id="infoProductos" class="col">
                    
						
						<form id="ProductInfoForm"  method="post" >
                            <?php if ($clientes === null): ?>
                                <p>Cliente no encontrado.</p>
                            <?php else: ?>
							<div id= "contenidoProductForm">
								<div id="seccionInfo1" class="infoProduct">
									<h3><b>Información General</b></h1>
									</br>
                                    </br>
                                    <input type= "hidden" id="id_cliente" name="id_cliente" value="<?=$clientes->id_cliente; ?>"/>
                                    <input type= "hidden" id="fecha_registro" name="fecha_registro" value="<?=$clientes->fecha_registro; ?>"/>
                                    <input type= "hidden" id="imagen_perfil" name="imagen_perfil" value="<?=$clientes->imagen_perfil; ?>"/>
                                    <label for="NombreUsuario">Nombre:</label>
									</br>
									<input type="text" value="<?=$clientes->nombre ?>" id="NombreUsuario" name="NombreUsuario"  placeholder="Nombre del usuario" required/>
									</br>
									<label for="apellidosPerfil">Apellido:</label>
									</br>
									<input type="text" value="<?=$clientes->apellido; ?>" id="apellidosPerfil" name="apellidosPerfil"  placeholder="Apellido paterno del usuario" required/>
									</br>
									<label for="edadPerfil">Fecha de Nacimiento:</label>
									</br>
									<input type="date" value="<?=$clientes->cumpleanos; ?>" id="edadPerfil" name="edadPerfil"  placeholder="Fecha de Nacimiento" required/>
									</br>
									<label for="fotoPerfil">Imagen de perfil:</label>
									</br>
									<input type="file" id="fotoPerfil" name="fotoPerfil"  placeholder="Suba la imagen de perfil" />
									</br>
									<label for="descipcionUsuario">Descripci&oacute;n personal:</label>
									</br>
									<textarea id="descipcionUsuario" name="descipcionUsuario" placeholder="Descripción general del usuario. Esta informaci&oacute;n se mostrar&aacute; en tu perfil público."><?=$clientes->bio; ?></textarea>
								</div> <!-- infor del Producto-->
								<div id="seccionInfo2" class="infoProduct">
									<h3><b>Datos del Usuario</b></h1>
									</br>
									</br>
									<label for="correoElectronico">Correo Electr&oacute;nico:</label>
									</br>
									<input type="email" value="<?=$clientes->correo; ?>" id="correoElectronico" name="correoElectronico"  placeholder="me@example.com" required/>
									</br>
									<label for="contrasenia">Contrase&ntilde;a:</label>
									</br>
									<input type="password" value="<?=$clientes->contrasena; ?>" id="contrasena" name="contrasena"  placeholder="Extensión mínima de 8 dígitos" required/>
									</br>
									<label for="accounts">Tipo de cuenta: </label>
                                    </br>
                                    <?php
                                    $accounts = array(
                                        'C' => 'Cliente',
                                        'A' => 'Administrador'
                                    );
                                    ?>

                                    <select name="accounts">
                                    <?php foreach( $accounts as $var => $account ): ?>
                                    <option value="<?php echo $var ?>"<?php if( $var == $clientes->tipo_cuenta ): ?> selected="selected"<?php endif; ?>><?php echo $account ?></option>
                                    <?php endforeach; ?>
                                    </select>									
								</div><!--  datos del Producto-->

								
							</div>
							<div class="w-100"></div>
							</br>
							<input id="registrarProducto" type="submit" value="Guardar"/>
                            <?php endif; ?> 
                        </form> 
                        
					</div><!--  div  form -->
                       
                </div>
            </div> <!-- info cards -->
        </div>
    </div>
</body>
</html>