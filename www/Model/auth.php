<?php
//require '../includes/init.php';

class Auth{
    /**
     * Return the user authentication status
     *
     * @return boolean True if a user is logged in, false otherwise
     */
    public static function isLoggedIn()
    {
        return isset($_SESSION['usuario']) && $_SESSION['usuario'];
    }

    /**
     * Require the user to be logged in, stopping with an unauthorised message if not
     *
     * @return void
     */
    public static function requireLogin()
    {
        if (! static::isLoggedIn()) {

            die("unauthorised");

        }
    }

    /**
     * Log in using the session
     *
     * @return void
     */
    public static function login()
    {
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){ 
            $conn = require 'includes/db.php';
            $userObj = new User();
            
            if(User::authenticate($conn, $_POST['emailUsuario'], $_POST['pwdUsuario'])){
                session_regenerate_id(true);
                $datosUsuario = $userObj->getData($conn,$_POST['emailUsuario']);
                $_SESSION['usuario'] = $datosUsuario;
                Auth::iniciarCarrito();
                Url::redirect('/');
            } else{
                $error = 'Usuario o contraseña incorrectos';
            }
        }
    }

    /**
     * Log out using the session
     *
     * @return void
     */
    public static function logout()
    {
        //$_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        unset($_SESSION['usuario']);
        unset($_SESSION['carrito']);
        header('Location: ../');
    }

    public static function iniciarCarrito(){

            $carrito = new ShoppingCart();
            session_regenerate_id(true);
            $_SESSION['carrito'] = $carrito;
        
    }



}

