<?php
require_once 'classes/usuarios.php';
    $u = new Usuario();
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }
?>
<h1>Bem-Vindo!</h1><br> 

Area Privada... 
<a href="sair.php"> Sair </a>