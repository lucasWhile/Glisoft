<?php
include_once '../../model/Glicose.php';

session_start();
$id_usuario=$_SESSION['id_usuario'];
echo 'teste';

$glicose_registro=$_GET['inputGlicose'];

if($glicose_registro>0 && $glicose_registro<1000){

    
        date_default_timezone_set('America/Sao_Paulo');

        // Obtém a data e a hora atual
        $data = date('Y-m-d'); // Formato: 2024-12-30
        $hora = date('H:i:s'); 


        $glicose = new Glicose($data, $hora, $glicose_registro, '',$id_usuario);
        $glicose->setStatus($glicose->classificacaoStatus());

        $glicose->adicicionarRegistro();

        header("Location:../../view/index.php");

}
else{
    $_SESSION['msg']='valor nulo inserido!';
    header("Location:../../view/index.php");
}




?>