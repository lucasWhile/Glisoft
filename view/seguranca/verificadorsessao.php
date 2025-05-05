<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
        // Redireciona para a página de login
        $_SESSION['msg'] = 'Login expirado. Faça login novamente.';
        header("Location: usuario/loginUsuario.php");
        exit();
    }
}
else{

    if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
        // Redireciona para a página de login
        $_SESSION['msg'] = 'Login expirado. Faça login novamente.';
         header("Location: usuario/loginUsuario.php");
        exit();
    }

}



?>
