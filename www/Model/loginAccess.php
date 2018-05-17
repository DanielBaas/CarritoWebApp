<?php
require 'Model/Database.php';
require 'Model/user.php';
require 'includes/url.php';

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $db = new Database();
    $conn = $db->getConn();
    $userObj = new User();
    
    if(User::authenticate($conn, $_POST['emailUsuario'], $_POST['pwdUsuario'])){
        session_regenerate_id(true);
        $datosUsuario = $userObj->getData($conn,$_POST['emailUsuario']);
        $_SESSION['usuario'] = $datosUsuario;
        redirect('/');
    } else{
        $error = 'Usuario o contraseña incorrectos';
    }
}