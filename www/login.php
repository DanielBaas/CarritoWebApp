<?php 
    require 'includes/init.php';

    Auth::login();

    //Url::redirect('/');
    
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>INICIAR SESI&Oacute;N - BACARO ONLINE TECH-STORE </title>
	<!-- Bootstrap 4, JQuery 3.2.1, Popper 1.12.9 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font Awesome 5.0.9 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	
    <link rel="stylesheet" href="css/login.css" media="all">
	<script type="text/javascript" src="js/registro.js"></script>
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
            </div>

            <div class="col-3">
                <div class="row">
                    <div id="frase-informativa" class="col" align="center">¡La tienda del millenial!</div>
                </div>
            </div>
        </div> <!-- encabezado -->
		
		<div class="login-form" align="center">
			<p>
			<h3>
			<b>Accede a tu cuenta</b>
			</h3>
			</p>
            </br>
            <?php if (!empty($error)): ?>
                <p><?=$error ?></p>
            <?php endif; ?>

            </br>
			<form class="elementoLogin" name="formaAcceder" id= "formaAcceder" action="" method = "post"  >
			<input class="elementoLogin" type="email" id="emailUsuario" name="emailUsuario" required placeholder="e-mail de usuario" value= ""/>
			</br>
			<input class="elementoLogin" type="password" id="pwdUsuario" name="pwdUsuario" required placeholder="Contrase&ntilde;a" value= "" />
			</br>
			</br>
			<input  class="elementoLogin" type="submit" id="btnAcceder" name="btnAcceder" value="Acceder"/>
			</form>
			</br>
			<p>
				<a href="http://www.facebook.com"> <img src="img/accederFacebook.png"/> </a>
				<h6>
					¿No tienes una cuenta? <a href="registro.html"> Reg&iacute;strate</a>
				</h6>
				<h6>
					¿Se te olvidó tu contrase&ntilde;a? <a href=""> Restaurar Contrase&ntilde;a</a>
				</h6>
			</p>
		</div>
		</br>

    </div> <!-- container -->
</body>
</html>
</html>
