<?php
 class Glicose
{
    private $data;
    private $hora;
    private $glicose_registro;
    private $status;
    private $id_usuario;


    public function setStatus($status){
        $this->status = $status;
    }

    public function __construct($data, $hora, $glicose_registro, $status,$id_usuario){
        $this->data = $data;
        $this->hora = $hora;
        $this->glicose_registro = $glicose_registro;
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


    
    public function adicicionarRegistro(){
        $this->data = date('Y-m-d');
        $this->hora = date('H:i:s');
        $conexao = $this->conectarBanco();
        $sql = "INSERT INTO registros_glicose (data, hora, glicose_registro, status, id_usuario) VALUES ('$this->data', '$this->hora', '$this->glicose_registro', '$this->status','$this->id_usuario')";
        if ($conexao->query($sql) === TRUE) {
            echo "Novo registro adicionado com sucesso";
        } else {
            echo "Error: ". $sql. "<br>". $conexao->error;
        }
    
    }


    public function classificacaoStatus(){
        if ($this->glicose_registro < 70) {
            return "Baixo";
        } elseif ($this->glicose_registro >= 70 && $this->glicose_registro <= 150) {
            return "Normal";
        } else {
            return "Elevado";
        }
    }

    function buscarUltimosRegistros($id_usuario) { 
        
        $sql = "SELECT * FROM registros_glicose WHERE id_usuario = '$id_usuario' ORDER BY id DESC LIMIT 3";
 
        $conexao = $this->conectarBanco();
        $resultado = $conexao->query($sql);
        return $resultado;

}


function mediaGlicose($id_usuario) { 
        
    $sql = "SELECT AVG(glicose_registro) AS media_glicose FROM registros_glicose WHERE id_usuario = '$id_usuario' ORDER BY id DESC LIMIT 5";

    $conexao = $this->conectarBanco();
    $resultado = $conexao->query($sql);
    $row = $resultado->fetch_assoc();
    return $row['media_glicose'];;

}



function buscarTodosRegistros($id_usuario) {
      
    $sql = "SELECT * FROM registros_glicose WHERE id_usuario = '$id_usuario' ORDER BY id DESC;";
    $conexao = $this->conectarBanco();
    $resultado = $conexao->query($sql);
    return $resultado;

}
}

?>