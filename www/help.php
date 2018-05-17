<?php 
    require 'includes/init.php';

    if(Auth::isLoggedIn()){
        if($_SESSION['usuario']['tipo_cuenta'] == "A"){
            Url::redirect('/AdminPage');
        } 
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
                <a href="index.php">Ofertas de temporada</a> |
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
        <div class="col seccion-ayuda">
            <div id="acordeon" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h3 class="mb-0">
                            <a data-toggle="collapse" data-parent="#acordeon" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ¿Cómo puedo realizar una compra?
                            </a>
                        </h3>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block faq-contenido">
                            Empezar a comprar es muy sencillo. Sólo sigue estos sencillos pasos:
                            <ol>
                                <li>
                                    <strong>Selecciona algo que te interese:</strong> Tal vez ya es hora de que te des ese
                                    gusto y compres ese iPhone que deseas ;)
                                </li>
                                <li>
                                    <strong>Haz clic en el botón "Comprar":</strong> Al dar clic agregarás el producto a tu
                                    carrito de compras.
                                </li>
                                <li>
                                    <strong>Procede a pagar tu carrito:</strong> Una vez que hayas llenado tu carrito puedes
                                    dar clic en el ícono, y proceder a pagar seleccionando la opción "Pagar".
                                </li>
                                <li>
                                    <strong>Selecciona tu método de pago:</strong> Ingresa tu método de pago preferido. Puedes
                                    usar el plástico de negro blindado mientras sea Visa o Master Card. ¡Además aceptamos Paypal!
                                    ¡Gracias Elon!
                                </li>
                                <li>
                                    <strong>Selecciona una dirección de envío:</strong> Ya sea que nos des la dirección de tu casa,
                                    oficina, o el hotel con número de silla frente el mar en el que te encuentras. ¡Si tiene
                                    código postal te lo enviaremos ahí!
                                </li>
                                <li>
                                    <strong>Revisa los últimos detalles de tu compra:</strong> Asegúrate que el precio,
                                    dirección de envío y método de pago sean los correctos. Una vez que hayas confirmado
                                    estos datos puedes proceder a finalizar la compra presionando el botón "Finalizar compra".
                                </li>
                            </ol>
                            ¡Listo! Ahora solo queda esperar a que llegue tu producto. Una vez comprobado el pago y la disponibilidad
                            del producto se procederá a generar un número de rastreo que te brindaremos de inmediato.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h3 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#acordeon" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ¿Qué métodos de puedo puedo usar?
                            </a>
                        </h3>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="card-block faq-contenido">
                            <p>
                                Aceptamos tarjetas de crédito y débito, tanto Visa como Master Card. Además puedes
                                usar Paypal.
                            </p>

                            <div class="row seccion-categorias">
                                <div class="col">
                                    <div class="row" align="center">
                                        <div class="col categoria">
                                            <div class=" tarjeta-categoria borde-categoria tarjeta-ayuda" align="center">
                                                <i class="far fa-credit-card icono-categoria"></i>
                                                <h4>Tarjeta de crédito/débito</h4>
                                            </div>
                                        </div>
                                        <div class="col categoria">
                                            <div class=" tarjeta-categoria borde-categoria tarjeta-ayuda" align="center">
                                                <i class="fab fa-paypal icono-categoria"></i>
                                                <h4>Paypal</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- seccion-categorias -->
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h3 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#acordeon" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                ¿Cómo puedo cancelar un pedido?
                            </a>
                        </h3>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="card-block faq-contenido">
                            <p>
                                Si deseas cancelar un pedido debes de hacerlo antes de que el envío sea realizado. Una vez que
                                tu producto ha sido enviado ya no es posible realizar una cancelación, a excepción del muy
                                raro caso de que tu pedido se extravíe en paquetería.
                            </p>
                            <p>
                                Una vez que solicites la cancelación tomará hasta tres días hábiles en realizar la devolución
                                de tu pago. Estaremos informándote vía correo electrónico apenas se haya realizado la devolución.
                            </p>
                            <p>
                                Sabemos que romper un compromiso es difícil, y entendemos que no somos nosotros, sino tu, pero
                                no te preocupes. Esperamos que puedas realizar una nueva compra que te guste mucho más y sea feliz.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingFour">
                        <h3 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#acordeon" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Otras preguntas
                            </a>
                        </h3>
                    </div>
                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="card-block faq-contenido">
                                <h5>¿Qué puedo hacer si mi pedido no ha llegado?</h5>
                                <p>
                                    Cuando un pedido llega al repartidor local no tiene un horario de entrega fijo, así que
                                    el repartir puede llegar a tu domicilio en el transcurso del día. Tal vez se entretuvo
                                    en el tráfico o está batallando cotra un ser de otro universo que llegó a amenazar la tierra.
                                    En cualquier momento debes recibir tu paquete. Además, el repartidor se comunicará al
                                    número que proporcionaste en caso de que no encuentre tu domicilio o no respondan a la
                                    puerta. ¡No te distraigas!

                                    En el caso de que el pedido aún no llegue al repartidor local, algunas veces las guías de
                                    rastreo tardan en actualizar el estado actual del pedido. Puedes refrescar la página
                                    para probar suerte.

                                    Si por alguna razón el pedido nunca llegó o se atrasó por más de tres días, puedes ponerte
                                    en contacto con nosotros, y nosotros procederemos como en los pasos listados en la parte
                                    de paquete perdido por paquetería.
                                </p>

                                <h5>¿Y si la paquetería pierde mi envío?</h5>
                                <p>
                                    En caso de extravío por parte de la paquetería, nosotros nos pondremos de acuerdo con
                                    el transportista para solucionar la situación. En caso de que el producto no aparezca
                                    reenviaremos otro paquete a tu dirección. Este proceso toma a lo más tres días hábiles,
                                     así que mientras esperas puedes decidir realizar la cancelación y realizaremos los pasos
                                    listados en la sección de cancelaciones. Mientras tanto acepta este gatito de disculpas.
                                </p>
                                <div class="faq-img" align="center"><img src="img/kitten.jpg" alt=""></div>

                                <h5>¿Quién ganaría: Gokú o Saitama?</h5>
                                <p>La respuesta es obvia...¡One puuuunch!</p>
                        </div>
                    </div>
                </div>
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