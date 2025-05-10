<?php
include_once '../../model/Glicose.php';
include_once '../../model/Correcao.php';
session_start();
$id_usuario=$_SESSION['id_usuario'];


$glicose_registro=$_GET['inputGlicose'];

$horaCliente=$_GET['horaCliente'];


if($glicose_registro>0 && $glicose_registro<1000){

    
    

        // Obtém a data e a hora atual
         $partes = explode(' ', $horaCliente);
         $data = $partes[0]; // "2024-04-27"
         $hora = substr($partes[1], 0, 8); // "15:30:00" (pega só até os segundos)
      
     
        $glicose = new Glicose($data, $hora, $glicose_registro, '',$id_usuario);
        $glicose->setStatus($glicose->classificacaoStatus());
        
       

        $glicose->adicicionarRegistro();
        $ultimoId=$glicose->buscarUltimoID();
     
        if(isset($_GET['checkInsulina'])){
            
            $id_insulina=$_GET['id_insulina'];
            $quantidade_insulina=$_GET['unidades'];
            //$ckeckInsulina=$_GET['checkInsulina'];
            $correcao= new Correcao($quantidade_insulina,$id_insulina,$ultimoId);
        
            if($correcao->adicicionarRegistro() ){
    
              
                $_SESSION['msg']='Valor e correção registrado';

                header("Location:../../view/index.php");
            }
    


        }
        else{
            $_SESSION['msg']='Valor registrado';
            header("Location:../../view/index.php");
        }
       


       

}
else{
    $_SESSION['msg']='valor nulo inserido!';
    header("Location:../../view/index.php");
}




?>