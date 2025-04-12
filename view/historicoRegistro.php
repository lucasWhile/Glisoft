<?php
include_once '../model/Glicose.php';
$glicose = new Glicose('', "", "", '','');
session_start();
$dados=$glicose->buscarTodosRegistros( $_SESSION["id_usuario"]);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }
      .navbar {
        border-bottom: 2px solid #ddd;
      }
      .navbar-nav .nav-link.active {
        font-weight: bold;
        color: #28a745 !important;
      }
      .table th, .table td {
        vertical-align: middle;
        text-align: center;
      }
      .table {
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
      }
      .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
      }
      .table th {
        background-color: #28a745;
        color: white;
      }
      .footer {
        background-color: #28a745;
        color: white;
        padding: 15px 0;
        margin-top: auto; /* Garantir que o rodapé vá para a parte inferior */
      }
      .container {
        padding-top: 40px;
        flex-grow: 1;
      }
      /* Adicionando rolagem horizontal se necessário */
      .table-responsive {
        overflow-x: auto;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-success bg-gradient">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php">Glisoft</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="#">Histórico</a>
            </li>
    
            <li class="nav-item">
              <a class="nav-link text-white" aria-disabled="true">Opção 3</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive"> <!-- Tabela com rolagem horizontal se necessário -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Glicose</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($dado = $dados->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo date('d/m/Y', strtotime($dado['data'])); ?></td>
                    <td><?php echo date('H:i', strtotime($dado['hora'])); ?></td>
                    <td><?php echo $dado['glicose_registro']; ?></td>
                    <td><?php echo $dado['status']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer text-center">
      <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
