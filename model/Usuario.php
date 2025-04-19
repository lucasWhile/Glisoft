<?php
class Usuario 
{
    private $nome;
    private $email;
    private $senha;
    private $nivel;


    public function __construct($nome, $email, $senha, $nivel){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->nivel = $nivel;
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

    public function adicionarUsuario(){
        $conexao = $this->conectarBanco();
        $sql = "INSERT INTO usuario (nome, email, senha, nivel) VALUES ('$this->nome', '$this->email', '$this->senha', '$this->nivel')";
        if ($conexao->query($sql) === TRUE) {
            echo "Novo usuário adicionado com sucesso";
        } else {
            echo "Error: ". $sql. "<br>". $conexao->error;
        }
    }

    public function login() {

        // Conectar ao banco de dados
        $conexao = $this->conectarBanco();
    
        // Prevenir SQL Injection utilizando Prepared Statements
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
        $stmt = $conexao->prepare($sql);
    
        // Verificar se a preparação da query foi bem-sucedida
        if ($stmt === false) {
            return false;
        }
    
        // Vincular os parâmetros
        $stmt->bind_param("ss", $this->email, $this->senha);
    
        // Executar a query
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Verificar se o usuário foi encontrado
        if ($result->num_rows > 0) {
            $dados = $result->fetch_assoc();
    
            // Iniciar a sessão e armazenar os dados do usuário
            $_SESSION["id_usuario"] = $dados["id_usuario"];
            $_SESSION["nome"] = $dados["nome"];
            $_SESSION["email"] = $dados["email"];
            $_SESSION["nivel"] = $dados["nivel"];
    
            // Fechar a declaração
            $stmt->close();
    
            return true;
        } else {
            // Caso o login não seja bem-sucedido
            $stmt->close();
            return false;
        }
    }
    


    public function logout() {
        session_start();
        session_destroy();
      
    }
    
}



?>