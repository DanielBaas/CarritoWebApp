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

    $clientes = User::getAll($conn);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuarios - BACARO Admin Page</title>

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
						<div id="contenidoTabla" class="infoProduct">
						  <h2>Lista de Usuarios</h2>
						  <div class="accionAgregar"><button><a href="../webapp/products.html"><i class="fas fa-plus"> </i> Agregar</a></button></div>          
							  <table class="table table-hover">
									<thead>
										<tr>
                                            <th>ID</th>
											<th>Nombre</th>
											<th>Apellido</th>
                                            <th>Email</th>
                                            <th>Contrase&ntilde;a</th>
                                            <th>Cumplea&ntilde;os</th>
                                            <th>ImagenPerfil</th>
											<th>Descripci&oacute;n</th>
                                            <th>TipoDeCuenta</th>
                                            <th>FechaDeRegistro</th>
											<th>&nbsp; </th>
										</tr>
									</thead>
									<tbody>
                                    <?php foreach($clientes as $cliente): ?>
                                        <tr>
                                            <td><?=$cliente['id_cliente']; ?></td>
                                            <td><?=$cliente['nombre']; ?></td>
											<td><?=$cliente['apellido']; ?></td>
											<td><?=$cliente['correo']; ?></td>
											<td><?=$cliente['contrasena']; ?></td>
                                            <td><?=$cliente['cumpleanos']; ?></td>
											<td><?=$cliente['imagen_perfil']; ?></td>
                                            <td><?=$cliente['bio']; ?></td>
                                            <td><?=$cliente['tipo_cuenta']; ?></td>
                                            <td><?=$cliente['fecha_registro']; ?></td>
											<td>
												<div class="accionTabla">
                                                    <a href="profiletInfo.php?id_cliente=<?=$cliente['id_cliente']; ?>" >
                                                        <button id="editar">
                                                            <i class="far fa-edit"></i>
                                                        </button> 
                                                    </a> 
													<button id="eliminar">
														<a href="#">
                                                            <i class="far fa-trash-alt"></i>
														</a>
													</button> 
													
												</div> 
											</td>
										</tr>
                                    <?php endforeach; ?>
									</tbody>
							  </table>
						</div>

						</form> 
					</div><!--  div  form -->
                    
                </div>
            </div> <!-- info cards -->
        </div>
    </div>
</body>
</html>