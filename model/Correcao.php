<?php
include_once 'banco.php';
 class Correcao extends banco
{
    public $quantidade_unidades	;
    public $id_insulina	;
    public $id_registro_glicose	;

    public function __construct($quantidade_unidades, $id_insulina,$id_registro_glicose) {
        $this->quantidade_unidades = $quantidade_unidades;
        $this->id_insulina = $id_insulina;
        $this->id_registro_glicose = $id_registro_glicose;

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