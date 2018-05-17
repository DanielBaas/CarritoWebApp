<?php
    require 'includes/init.php';

    if(Auth::isLoggedIn()){
        if($_SESSION['usuario']['tipo_cuenta'] == "A"){
            Url::redirect('/AdminPage');
        } 
    }
    $conn = require 'includes/db.php';
    $articulos = Product::getAll($conn);

    if($_POST){
        $busqueda = trim($_POST['busqueda']);
        Url::redirect('/search.php?busqueda=' . $busqueda);
    
    }
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BACARO ONLINE TECH-STORE</title>

    <!-- Bootstrap 4, JQuery 3.2.1, Popper 1.12.9 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font Awesome 5.0.9 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-center encabezado">
            <div class="col" align="center">
                <a href="index.php"><img id="logo-encabezado" src="img/bacaro.png" alt="BACARO Online Store"></a>
            </div>

            <div class="col-6" align="center">
                <div class="col">
                <form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="input-group">
                    <input id="busqueda" name= "busqueda" type="search" class="form-control" placeholder="Buscar productos...">
                        
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search lupa"></i> </a>
                                </button>
                            </span>
                        
                    </div>
                    </form>
                </div>

                <div class="w-100"></div>

                <div class="col menu">
                    <a href="about.php">Acerca de nosotros...</a> |
                    <a href="help.php">Ayuda</a>
                </div>
            </div>

            <div class="col-3">
                <div class="row">
                    <div id="frase-informativa" class="col" align="center">¡La tienda del millenial!</div>
                    <div class="w-100"></div>
                    <div class="col menu">
                        <div class="dropdown">
                            <?php if (Auth::isLoggedIn()) : ?>
                                <a href="" id="nombre-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle icon"></i><?php echo ($_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido']) ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="nombre-usuario">
                                    <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                                </div>
                                <a href="#"><i class="fas fa-shopping-cart icon"></i>Mi carrito</a>
                            <?php else : ?>
                                <a href="" id="nombre-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle icon"></i>Identificarse
                                </a>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="nombre-usuario">
                                    <a class="dropdown-item" href="login.php">Iniciar Sesión</a>
                                    <a class="dropdown-item" href="registro.php">Registrarse</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- encabezado -->

        <div id="carrusel-principal" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carrusel-principal" data-slide-to="0" class="active"></li>
                <li data-target="#carrusel-principal" data-slide-to="1"></li>
                <li data-target="#carrusel-principal" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="search.php?busqueda=apple">
                        <img class="d-block w-100" src="img/apple.png" alt="Ecosistema Apple">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Apple lover</h5>
                            <p>Belleza y funcionalidad</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="search.php?busqueda=windows">
                        <img class="d-block w-100" src="img/windows.png" alt="Laptops Windows">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ecosistema Windows</h5>
                            <p>Bueno, bonito y barato</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="search.php?busqueda=fotografia">
                        <img class="d-block w-100" src="img/camera.png" alt="Selección de cámaras">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Selección de cámaras</h5>
                            <p>Captura siempre el momento</p>
                        </div>
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carrusel-principal" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carrusel-principal" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> <!-- carousel -->

        <div class="row seccion-vendidos">
            <div class="col">
                <h1 class="descubrir-encabezado subtitulo">Top: <strong>Lo más vendido</strong></h1>
                <div class="row">
                <?php 
                    $cont = 0; 
                    foreach($articulos as $articulo):
                        $cont += 1;
                        if($cont <6 )://&& ($cont %2 !=0)): 
                    ?>
                    <div class="col">
                    <a href="product.php?id_producto=<?=$articulo['id_producto']?>">
                            <div class="tarjeta-vendido grow">
                                <div class="tarjeta-vendido-img"><img src="/<?=$articulo['imagen']?>" alt=""></div>
                                <div class="tarjeta-texto subtitulo" align="center"><h6 class="no-margin-text"><?=$cont?>. </h6><h6 class="no-margin-text"><?=$articulo['nombre']?></h6></div>
                                <div class="tarjeta-texto subtitulo" align="center"><h6 class="no-margin-text">$<?=$articulo['precio']?></h6></div>
                            </div>
                        </a>
                    </div>
                    <?php 
                        endif;
                        endforeach; ?>

                </div>
            </div>
        </div> <!-- seccion-vendidos -->

        <div class="row"><div class="col separador"></div></div>

        <div class="row tarjetas-explorar" align="center">
            <div class="col">
                <h1 class="descubrir-encabezado subtitulo" align="left">Explora nuevas categorías</h1>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <a href="search.php?busqueda=camara"><img src="img/tarjetaCamaras.png" alt="Tarjeta camaras"></a>
            </div>
            <div class="col">
                <a href="search.php?busqueda=ipad"><img src="img/tarjetaTablets.png" alt="Tarjeta tablets"></a>
            </div>
        </div> <!-- tarjetas-explorar -->

        <div class="row"><div class="col separador"></div></div>

        <div class="row contenido">
            <div id="seccion-descubrir" class="col">
                <h1 class="descubrir-encabezado subtitulo">Descubre: <strong>Nintendo Switch</strong></h1>
                <div class="tarjeta-grande">
                    <a href="search.php?busqueda=nintendo switch">
                        <div class="tarjeta-gde-img">
                            <img src="https://goo.gl/VhBVfr" alt="Nintendo Switch">
                        </div>
                        <div align="center">
                            <h2 class="subtitulo">Nintendo Switch</h2>
                        </div>
                    </a>
                </div> <!-- tarjeta-grande -->
                <div class="tarjetas-mini">
                    <div class="tarjeta-mini">
                        <a href="search.php?busqueda=nintendo switch"><img src="https://goo.gl/HdBnw3" alt="Nintendo Switch"></a>
                    </div>
                    <div class="tarjeta-mini">
                        <a href="search.php?busqueda=Joycon Neon"><img src="https://goo.gl/xGTLqt" alt="Joycon Neon"></a>
                    </div>
                    <div class="tarjeta-mini">
                        <a href="search.php?busqueda=Joycon Pro Controller"><img src="https://goo.gl/GNRs7w" alt="Joycon Pro Controller"></a>
                    </div>
                    <div class="tarjeta-mini tarjeta-mini-ultima">
                        <a href="search.php?busqueda=Nintendo Switch case"><img src="https://goo.gl/XRvNxH" alt="Nintendo Switch case"></a>
                    </div>
                    <div class="tarjeta-mini">
                        <a href="search.php?busqueda=The Legend of Zelda: Breath of the Wild"><img src="https://goo.gl/MWEFzF" alt="The Legend of Zelda: Breath of the Wild"></a>
                    </div>
                    <div class="tarjeta-mini">
                        <a href="search.php?busqueda=Super Mario Odyssey"><img src="https://goo.gl/N5tHKV" alt="Super Mario Odyssey"></a>
                    </div>
                    <div class="tarjeta-mini">
                        <a href="search.php?busqueda=Xenoblade Chronicles 2"><img src="https://goo.gl/mcQd1d" alt="Xenoblade Chronicles 2"></a>
                    </div>
                    <div class="tarjeta-mini tarjeta-mini-ultima">
                        <a href="search.php?busqueda=Mario Kart 8 Deluxe"><img src="https://goo.gl/5Jp93X" alt="Mario Kart 8 Deluxe"></a>
                    </div>
                </div> <!-- tarjetas-mini -->
            </div> <!-- seccion-descubrir -->
        </div>

        <div class="row"><div class="col separador"></div></div>

        <div class="row seccion-categorias">
            <div class="col">
                <h1 class="descubrir-encabezado subtitulo">Categorías</h1>
                <div class="row">
                    <div class="col categoria">
                        <a href="search.php?busqueda=computo">
                            <div class=" tarjeta-categoria borde-categoria" align="center">
                                <i class="fas fa-laptop icono-categoria"></i>
                                <h4>Cómputo</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col categoria">
                        <a href="search.php?busqueda=videojuegos">
                            <div class=" tarjeta-categoria borde-categoria" align="center">
                                <i class="fas fa-gamepad icono-categoria"></i>
                                <h4>Videojuegos</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col categoria">
                        <a href="search.php?busqueda=fotografia">
                            <div class=" tarjeta-categoria borde-categoria" align="center">
                                <i class="fas fa-camera icono-categoria"></i>
                                <h4>Fotografía</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col categoria">
                        <a href="search.php?busqueda=smartphones">
                            <div class=" tarjeta-categoria borde-categoria" align="center">
                                <i class="fas fa-mobile-alt icono-categoria"></i>
                                <h4>Smartphones</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col categoria">
                        <a href="search.php?busqueda=audio">
                            <div class=" tarjeta-categoria borde-categoria" align="center">
                                <i class="fas fa-headphones icono-categoria"></i>
                                <h4>Audio</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col categoria">
                        <a href="search.php?busqueda=libros">
                            <div class=" tarjeta-categoria borde-categoria" align="center">
                                <i class="fas fa-book icono-categoria"></i>
                                <h4>Libros</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col categoria">
                        <a href="search.php?busqueda=software">
                            <div class=" tarjeta-categoria" align="center">
                                <i class="fab fa-microsoft icono-categoria"></i>
                                <h4>Software</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- seccion-categorias -->

        <footer class="footer">
            <div class="container-fluid pie-pagina">
                <div class="row" align="center">
                    <div class="col-4">
                        <img src="img/bacaro.png" alt="Bacaro Online Store">
                    </div>
                    <div class="col-4 pie-elemento">
                        <span class="align-middle">Copyright BACARO 2018 | Todos los derechos reservados</span>
                    </div>
                    <div class="col-4 pie-elemento">
                        <ul align="center" class="list-inline social-buttons">
                            <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook pie-icon"></i></a></li>
                            <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter pie-icon"></i></a></li>
                            <li><a href="https://www.plus.google.com" target="_blank"><i class="fab fa-google-plus pie-icon"></i></a></li>
                            <li><a href="https://mx.linkedin.com" target="_blank"><i class="fab fa-linkedin pie-icon"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div> <!-- container -->
</body>
</html>