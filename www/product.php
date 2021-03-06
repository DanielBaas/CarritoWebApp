<?php
    require 'includes/init.php';

    if(Auth::isLoggedIn()){
        if($_SESSION['usuario']['tipo_cuenta'] == "A"){
            Url::redirect('/AdminPage');
        } 
    }
    $conn = require 'includes/db.php';
    if (isset($_GET['id_producto'])) {

        $productos = Product::getByID($conn, $_GET['id_producto']);

        if ( ! $productos) {
            die("Product not found");
        }

    } else {
        die("id not supplied, Product not found");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST)) {
        $product = Product::getByID($conn, $_POST['id_producto']);
        $productDetail = [
            'id_producto' => $product->id_producto,
            'nombre' => $product->nombre,
            'marca' => $product->marca,
            'precio' => $product->precio,
            'imagen_producto' => $product->imagen
        ];
        $_SESSION['carrito']->addProduct($productDetail);
        Url::redirect('/carrito.php');

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
                <div class="input-group">
                    <input id="busqueda" type="text" class="form-control" placeholder="Buscar productos...">
                    <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">
                            <i class="fas fa-search lupa"></i>
                            </button>
                        </span>
                </div>
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

    <div class="row">
        <?php if ($productos === null): ?>
            <p>Producto no encontrado.</p>
        <?php else: ?>
        <div class="col seccion-producto">
            <div class="row">
                <div class="col">
                    <img src="/<?=$productos->imagen?>" alt="/<?=$productos->nombre?>">
                </div>
                <div class="col producto">
                    <h4><strong><?=$productos->nombre; ?></strong></h4> <br />
                    <h6>Por <strong><a href="#"><?=$productos->marca; ?></a></strong></h6>
                    <h6>Calificación: </h6> <h5 class="rating-color"><strong>4.5</strong></h5>
                    <h6>Edición: </h6> <h5><?=$productos->edicion; ?></h5>
                    <h6>Precio: </h6> <h2 class="precio"><strong>$<?=$productos->precio; ?></strong></h2> <br />
                    <h6 class="envio">Envío gratis a toda la república</h6> <br>

                    <div class="row botones-producto">
                        <div class="col botones-espacio">
                            <input class="spinner" type="number" name="cantidad" min="1" value="1">
                        </div>
                        <div class="col botones-espacio">
                            <form method="post">
                            <input type="hidden" id="id_producto" name="id_producto" value="<?=$productos->id_producto;?>"/>
                            <button type="button" class="btn btn-primary">Comprar Ahora</button>
                            
                        </div>
                        <div class="col botones-espacio">
                            <button type="submit" class="btn btn-default">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-100"></div>
                <div class="col separador"></div>
                <div class="w-100"></div>

                <div class="col descripcion">
                    <h4><strong>Descripcción</strong></h4>
                    <p>
                    <?=$productos->descripcion; ?>
                    </p>
                </div>

                <div class="w-100"></div>
                <div class="col separador"></div>
                <div class="w-100"></div>

                <div class="col opiniones">
                    <h4><strong>Opiniones sobre el producto:</strong></h4>
                    <h2 class="rating-bottom"><strong>4.5</strong></h2>

                    <div class="col separador"></div>

                    <div class="opinion">
                        <h6><strong>¡Excelente!</strong></h6>
                        <h4 class="rating-color"><strong>4.5</strong></h4>
                        <p>
                            Me animé a comprar esta Mac y la verdad que no me arrepiento (excepto por los pocos puertos, solo trae 2 USB-C solamente, habrá que comprar un hub de USB-C). Excelente precio y el producto llegó nuevo y la caja en perfectas condiciones. Para los que tienen dudas por la confusa descripción del producto, es la MacBook Pro 2016 de 13 pulgadas (sin Touch Bar) en color Space Gray, 256GB de almacenamiento, 8GB de RAM, Intel Core-i5 2GHz de 6ta generación, y el teclado viene en español.
                        </p>
                    </div>

                    <div class="col separador"></div>

                    <div class="opinion">
                        <h6><strong>Muy buen producto</strong></h6>
                        <h4 class="rating-color"><strong>5.0</strong></h4>
                        <p>
                            Lleno en muy buenas condiciones, está muy bonita la mac, trabaja muy bien, los únicos detalles negativos que puedo dar son los pocos puertos ya que solo hay 2 entradas (type-c) no tienes usb, pero cuando como la entrada de cargador también es type-c solo vas a poder trabajar con una entrada al estarla cargando, no tienen entrada HDMI ni ninguna otra para el cañón o la tv, pero igual puedes comprar los adaptadores :v vale mucho la pena a este precio la verdad
                        </p>
                    </div>

                </div>

            </div>
        </div>
        <?php endif; ?> 
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