
<?php
include_once '../../model/Insulina.php';
$insulina= new insulina('','','','');
session_start();
$id_usuario= $_SESSION["id_usuario"];
 $dados= $insulina->buscardadosinsulina($id_usuario);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Insulina - Glisoft</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }
        .container {
            flex: 1;
        }
        .navbar {
            border-bottom: 2px solid #fff;
        }
        .footer {
            background-color: #28a745;
            color: white;
            padding: 15px 0;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .form-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .navbar .nav-link {
            color: white;
        }
        .navbar .nav-link:hover {
            color: #f1f1f1;
        }
        .form-label {
            font-weight: bold;
        }
        .input-group-text {
            background-color: #28a745;
            color: white;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-success bg-gradient">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="../index.php">Glisoft</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white" href="historicoRegistro.php">Histórico</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['msg'])){ ?>
      <div class="alert alert-success text-center" role="alert">
        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
      </div>
    <?php } ?>

    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-8 form-container">
                <h3 class="text-center mb-4">Cadastro de Insulina</h3>

                <form action="../../controller/insulina_controller/adicionar_insulina.php" method="post">
                    <div class="mb-3">
                        <label for="tipoInsulina" class="form-label">Qual o tipo de insulina?</label>
                        <select class="form-select" id="tipoInsulina" name="tipoInsulina" required>
                        <option selected>Escolha o tipo de insulina</option>
                                <option value="Insulina NPH">Insulina NPH</option>
                                <option value="Insulina Glargina">Insulina Glargina</option>
                                <option value="Insulina Lispro">Insulina Lispro</option>
                                <option value="Insulina Aspart">Insulina Aspart</option>
                                <option value="Insulina Detemir">Insulina Detemir</option>
                                <option value="Insulina Glulisina">Insulina Glulisina</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="marca" class="form-label">Qual a marca da insulina?</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Digite a marca da insulina" required>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-custom">Adicionar</button>
                    </div>

                    <div class="d-flex justify-content-start mt-2">
                        <a href="index.php" class="btn btn-custom">Voltar</a>
                    </div>
                </form>   
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <p>Insulinas adicionadas</p>
                <table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo de Insulina</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $contador = 1; // Para numerar os itens
        while ($dado = $dados->fetch_assoc()) { 
        ?>
            <tr>
                <td><?php echo $contador++; ?></td>
                <td><?php echo $dado['tipo_insulina'] ?></td>
                <td>
                    <form action="../../controller/insulina_controller/deletar_insulina.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        <input type="hidden" name="id_insulina" value="<?php echo $dado['id_insulina']; ?>"> <!-- Assumindo que há um campo 'id' na tabela -->
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

  

            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
