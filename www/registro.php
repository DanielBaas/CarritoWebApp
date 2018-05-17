<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTRO - BACARO ONLINE TECH-STORE</title>

    <!-- Bootstrap 4, JQuery 3.2.1, Popper 1.12.9 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font Awesome 5.0.9 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	
    <link rel="stylesheet" href="css/registro.css">
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
		
		<div class="register-form">
			<p>
			<h3>
			<b>Crear una cuenta</b>
			</h3>
			</p>
			</br>
			<form name="formaRegistro" id= "formaRegistro" action="" method = "get" onSubmit="reporteRegistro(this)">
			<label for="nombreDelUsuario"><b>Nombre:</b></label>
			<input type="text" id="nombreDelUsuario" name="nombreDelUsuario" required placeholder="Nombre(s)" value="" />
			</br>
			<label for="apellidosDelUsuario"><b>Apellidos:</b></label>
			<input type="text" id="apellidosDelUsuario" name="apellidosDelUsuario" required placeholder="Apellidos" value=""/>
			</br>
			<label for="correoDelUsuario"><b>E-mail:</b></label>
			<input type="email" id="correoDelUsuario" name="correoDelUsuario" required placeholder="example@email.com"  value="" />
			</br>
			<label for="passwordDelUsuario"><b>Contrase&ntilde;a:</b></label>	
			<input type="password" id="passwordDelUsuario" name="passwordDelUsuario" required placeholder="Mínimo 6 caracteres" value="" />
			</br>
			<label for="confirmarPassword"><b>Confirmar Contrase&ntilde;a:</b></label>	
			<input type="password" id="confirmarPassword" name="confirmarPassword" required placeholder="Repetir Contrase&ntilde;a" value="" />
			</br>
			</br>
			<input class= "termsNConds" type="checkbox" id="terminosYCondiciones" name="terminosYCondiciones" onClick="checkifempty()" />
			<p id="termsText"><label for="terminosYCondiciones">&nbsp;Acepto que soy mayor de edad y estoy de acuerdo con los</label> <a href="index.html">Terminos y condiciones de BACARO Online Technology Store </a></p>
			</br>
			<input class="btnRegistrar" type="submit" id="botonRegistrar" name="botonRegistrar" value="Registrar" disabled="disabled" />
			</form>
			</br>
			<p>
				<a href="http://www.facebook.com"> <img src="img/registrarConFB.png"/> </a>
				<h6>
					¿Ya tienes una cuenta? <a href="login.html"> Inicia Sesión</a>
				</h6>
			</p>
		</div>
		</br>

    </div> <!-- container -->
</body>
</html>