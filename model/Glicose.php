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


    
    public function buscarUltimoID() {

        $conexao = $this->conectarBanco();

        // Consulta SQL para buscar o último ID registrado
        $sql = "SELECT MAX(id) AS ultimo_id FROM registros_glicose";
        
        // Executa a consulta
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0) {
            // Obtém o último ID registrado
            $row = $resultado->fetch_assoc();
            $ultimo_id = $row['ultimo_id'];
            //echo "O último ID registrado é: " . $ultimo_id;
            return $ultimo_id;
        } else {
            echo "Nenhum registro encontrado.";
        }
        
        
    }
    public function adicicionarRegistro(){
        date_default_timezone_set('America/Campo_Grande');
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
        
        $sql = "SELECT registros_glicose.data as data , registros_glicose.hora as hora, registros_glicose.glicose_registro 
        as glicose_registro, registros_glicose.status as status, registro_correcao.quantidade_unidades as quantidade_unidades
FROM registros_glicose 
LEFT JOIN registro_correcao 
    ON registro_correcao.id_registro_glicose = registros_glicose.id 
LEFT JOIN insulina 
    ON insulina.id_insulina = registro_correcao.id_insulina WHERE registros_glicose.id_usuario = '$id_usuario' ORDER BY id DESC LIMIT 3";
 
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
      
    $sql = "
    SELECT 
    registros_glicose.data as data, 
    registros_glicose.hora as hora, 
    registros_glicose.glicose_registro as glicose_registro, 
    registros_glicose.status as status, 
    registro_correcao.quantidade_unidades as quantidade_unidades,
    IFNULL(insulina.tipo_insulina, 'não') as tipo_insulina
FROM registros_glicose 
LEFT JOIN registro_correcao 
    ON registro_correcao.id_registro_glicose = registros_glicose.id 
LEFT JOIN insulina 
    ON insulina.id_insulina = registro_correcao.id_insulina 
WHERE registros_glicose.id_usuario = '$id_usuario' 
ORDER BY registros_glicose.id DESC ;

    
    ";
    $conexao = $this->conectarBanco();
    $resultado = $conexao->query($sql);
    return $resultado;

}

public function buscarTotalInsulina($id_usuario) {
    $conexao = $this->conectarBanco();

    $sql = "SELECT 
                registros_glicose.data as data, 
                SUM(registro_correcao.quantidade_unidades) as total_unidades
            FROM registros_glicose 
            LEFT JOIN registro_correcao 
                ON registro_correcao.id_registro_glicose = registros_glicose.id 
            LEFT JOIN insulina 
                ON insulina.id_insulina = registro_correcao.id_insulina 
            WHERE registros_glicose.id_usuario = ? 
            GROUP BY registros_glicose.data
            ORDER BY registros_glicose.data DESC";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    return $stmt->get_result();
}

}

?>