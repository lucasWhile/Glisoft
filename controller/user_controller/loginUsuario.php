<?php
session_start();
include_once '../../model/Usuario.php';

$email=$_POST['email'];
$senha=$_POST['senha'];

$usuario = new Usuario('', $email, $senha,'');


if($usuario->login()){
   echo  $_SESSION['email'];
     $_SESSION['msg']='logado com sucesso';
    header('Location: ../../view/index.php');
    
}
else{
    echo "não logado";
}

?>