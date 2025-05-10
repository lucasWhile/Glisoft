<?php 

 class banco {


    public function   conectarBanco(){
        $conexao = new mysqli('localhost', 'root', '', 'glisoft');
        // $conexao = new mysqli('sql101.infinityfree.com', 'if0_38541035', 'K9728wuxY8', 'if0_38541035_glisoft');
  
     


        // Verifica erros de conexão
        if ($conexao->connect_error) {
            die("Erro ao conectar ao MySQL: " . $conexao->connect_error);
        }
    
        // Retorna a conexão se for bem-sucedida
        return $conexao;
    }
}
?>