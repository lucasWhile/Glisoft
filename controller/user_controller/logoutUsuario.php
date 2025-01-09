<?php



include_once '../../model/Usuario.php';


$usuario = new Usuario('', '', '','');
$usuario->logout();
session_start();
$_SESSION['msg']='Logout realizado com sucesso';
header("Location:../../view/usuario/loginUsuario.php");


?>