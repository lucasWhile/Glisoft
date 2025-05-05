<?php

 class Correcao 
{
    public $quantidade_unidades	;
    public $id_insulina	;
    public $id_registro_glicose	;

    public function __construct($quantidade_unidades, $id_insulina,$id_registro_glicose) {
        $this->quantidade_unidades = $quantidade_unidades;
        $this->id_insulina = $id_insulina;
        $this->id_registro_glicose = $id_registro_glicose;

    }

    public function   conectarBanco(){
        $conexao = new mysqli('sql101.infinityfree.com', 'if0_38541035', 'K9728wuxY8', 'if0_38541035_glisoft');



        // Verifica erros de conexão
        if ($conexao->connect_error) {
            die("Erro ao conectar ao MySQL: " . $conexao->connect_error);
        }
    
        // Retorna a conexão se for bem-sucedida
        return $conexao;
    }


    public function adicicionarRegistro(){
       
        $conexao = $this->conectarBanco();
        $sql = "INSERT INTO registro_correcao (quantidade_unidades, id_insulina, id_registro_glicose) VALUES ('$this->quantidade_unidades', '$this->id_insulina', '$this->id_registro_glicose')";
        
        if ($conexao->query($sql) === TRUE) {
           return true;
        } else {
            return false;
        }
    
    }




}

?>