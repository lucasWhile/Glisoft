<?php
class insulina 
{
   public  $id_insulina;
   public  $tipo_insulina;
   public  $marca;
   public $status;
   public $id_usuario;

   public function __construct($tipo_insulina,$marca,$status,$id_usuario) {
    $this->tipo_insulina = $tipo_insulina;
    $this->marca = $marca;
    $this->status = $status;
    $this->id_usuario = $id_usuario;
   }

   
   public function   conectarBanco(){
    $conexao = new mysqli('localhost', 'root', '', 'glisoft');



    // Verifica erros de conexão
    if ($conexao->connect_error) {
        die("Erro ao conectar ao MySQL: " . $conexao->connect_error);
    }

    // Retorna a conexão se for bem-sucedida
    return $conexao;
}


public function adicicionarRegistroInsulina(){

    $conexao = $this->conectarBanco();
    $sql = "INSERT INTO insulina (tipo_insulina, marca ,status ,id_usuario) VALUES ('$this->tipo_insulina','$this->marca','$this->status','$this->id_usuario')";
  
  
    if ($conexao->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }

}


public function buscardadosinsulina($id_usuario){
    
    $conexao = $this->conectarBanco();
    $sql= "select * from insulina where id_usuario='$id_usuario' AND status=1";
   return $dados= $conexao->query($sql);

}


public function desativarInsulina($id){
    
    $conexao = $this->conectarBanco();
        $sql = "UPDATE insulina SET status = 0 WHERE id_insulina ='$id'";

    if ($conexao->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }

}



}


?>