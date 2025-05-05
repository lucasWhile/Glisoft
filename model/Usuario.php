<?php
include_once 'banco.php';
class Usuario extends banco
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
    
        // Buscar só pelo email
        $sql = "SELECT id_usuario, nome, email, senha, nivel FROM usuario WHERE email = ?";
        $stmt = $conexao->prepare($sql);
    
        if ($stmt === false) {
            return false;
        }
    
        // Vincular o email
        $stmt->bind_param("s", $this->email);
    
        // Executar
        $stmt->execute();
    
        // Vincular o resultado nas variáveis
        $stmt->bind_result($id_usuario, $nome, $email, $senhaBanco, $nivel);
    
        // Buscar os dados
        if ($stmt->fetch()) {
            // Agora validar a senha
            if (password_verify($this->senha, $senhaBanco)) {
                // Senha correta, criar sessão
                $_SESSION["id_usuario"] = $id_usuario;
                $_SESSION["nome"] = $nome;
                $_SESSION["email"] = $email;
                $_SESSION["nivel"] = $nivel;
                echo   'logou0;';
    
                $stmt->close();
                return true;
            }
        }
    
        $stmt->close();
        return false;
    }
    
    
    


    public function logout() {
        session_start();
        session_destroy();
      
    }
    
}



?>