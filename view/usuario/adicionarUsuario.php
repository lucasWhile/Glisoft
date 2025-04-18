<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #28a745;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .card-footer {
            background-color: #f8f9fa;
            text-align: center;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            padding: 10px;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
  </head>
  <body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                    <h4 class="mb-0 text-center">Glisoft</h4>
                        <h4 class="mb-0 text-center">Criar Novo Usuário</h4>
                    </div>
                    <div class="card-body">
                        <form action="../../controller/user_controller/NovoUsuario.php" method="get">
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="exampleInputName" name="nome" placeholder="Digite seu nome" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Digite seu email" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha" required>
                            </div>

                            <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-custom">Criar Conta</button>
                           </div>

                            <div class="d-grid">
                                <a href="loginUsuario.php" class="btn btn-custom" role="button">Voltar</a>
                            </div>


                            <input type="hidden" id="nivel" name="nivel" value="usuario">
                        </form>
                   
                    </div>
                 
                    <div class="card-footer text-center">
                        <small class="text-muted">Todos os campos são obrigatórios.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


