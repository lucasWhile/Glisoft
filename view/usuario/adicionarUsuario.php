<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-success bg-gradient text-white">
                        <h4 class="mb-0">Criar Novo Usuário</h4>
                    </div>
                    <div class="card-body">
                        <form action="../../controller/user_controller/NovoUsuario.php" method="get">
                        <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="exampleInputName" name="nome" placeholder="Digite seu nome" >
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Digite seu email" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha">
                            </div>
                            <div class="d-grid bg-success bg-gradient">
                            <button type="submit" class="btn btn-success">Criar Conta</button>
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
