<?php
    require 'includes/init.php';

    if(Auth::isLoggedIn()){
        if($_SESSION['usuario']['tipo_cuenta'] == "A"){
            Url::redirect('/AdminPage');
        } 
    }
    $conn = require 'includes/db.php';
    $resultado = [];
    if (isset($_POST['buscar'])) {    
        $busqueda = trim($_POST['buscar']);
        $resultado = Product::searchProducts($conn, $busqueda);
    }
    if (isset($_GET['busqueda'])) {    
        $busqueda = trim($_GET['busqueda']);
        $resultado = Product::searchProducts($conn, $busqueda);
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

    <link rel="stylesheet" href="css/main.css" type="text/css">
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
                    <input id="buscar" name= "buscar" type="search" class="form-control" placeholder="Buscar productos...">
                    <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search lupa"></i>
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

    <div class="row resultados">
        <div class="col">
            <div class="coincidencia_busqueda">
            <h2>Resultados para: <a id="busq" href = "search.php?busqueda=<?=$busqueda?>"><strong><?=$busqueda?></strong></a></h2>
                <?php foreach($resultado as $res):?>
                    <p>
                        <a id="busq" href="product.php?id_producto=<?=$res['id_producto']?>" >
                            <image src="/<?=$res['imagen']?>" width= "100" height = "100"/>
                            <div><?=$res['nombre']?></div>
                        </a>
                    </p>    
                <?php endforeach;?>
            </div>
        </div>
    </div>

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