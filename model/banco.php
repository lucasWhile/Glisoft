<?php 

 class banco {


    public function   conectarBanco(){
       $conexao = new mysqli('localhost', 'root', '', 'glisoft');
  
     


        // Verifica erros de conexão
        if ($conexao->connect_error) {
            die("Erro ao conectar ao MySQL: " . $conexao->connect_error);
        }
    
        // Retorna a conexão se for bem-sucedida
        return $conexao;
    }
}
?>