<?php

include_once '../../model/Insulina.php';
session_start();
echo $id_insulina=$_POST['id_insulina'];


$insulina= new insulina('','','','');



if ($insulina->desativarInsulina($id_insulina)) {
    $_SESSION['msg']='insulina deletada com sucesso';
    header("Location:../../view/insulina/adicionarinsulina.php");
    
}
?>