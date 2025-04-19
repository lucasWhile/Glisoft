<?php
include_once '../../model/Insulina.php';
session_start();
echo $tipoInsulina=$_POST['tipoInsulina'];
echo $marca=$_POST['marca'];
$id_usuario= $_SESSION["id_usuario"];

$insulina= new insulina($tipoInsulina,$marca,true,$id_usuario);

 if($insulina->adicicionarRegistroInsulina()==true){
    $_SESSION['msg']='insulina: '. $tipoInsulina . ' adicionar com sucesso';
    header("Location:../../view/insulina/adicionarinsulina.php");
 }
 else{

 }


?>