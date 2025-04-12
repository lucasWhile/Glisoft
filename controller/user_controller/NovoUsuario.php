<?php
include_once '../../model/Usuario.php';

session_start();
$nome=$_GET["nome"];
$email=$_GET["email"];
$senha=$_GET["senha"];
$nivel=$_GET["nivel"];

echo "Nome: ".$nome."<br>";

echo "Email: ".$email."<br>";

echo "Senha: ".$senha."<br>";

$usuario = new Usuario($nome, $email, $senha,$nivel);
$usuario->adicionarUsuario();
$_SESSION['msg']='Conta criada com sucesso, faça login!';
header("Location:../../view/usuario/loginUsuario.php");


?>