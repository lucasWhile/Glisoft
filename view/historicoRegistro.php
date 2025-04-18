<?php
include_once '../model/Glicose.php';
$glicose = new Glicose('', "", "", '','');
session_start();
$dados = $glicose->buscarTodosRegistros($_SESSION["id_usuario"]);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial - Glisoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      html, body {
        height: 100%;
        margin: 0;
      }
      body {
        background-color: #f8f9fa;
        display: flex;
        flex-direction: column;
      }
      .navbar {
        border-bottom: 2px solid #ddd;
      }
      .navbar-nav .nav-link.active {
        font-weight: bold;
        color: #28a745 !important;
      }
      .container {
        flex: 1;
        padding-top: 30px;
        padding-bottom: 20px;
      }
      .btn-custom {
        background-color: #28a745;
        color: white;
      }
      .btn-custom:hover {
        background-color: #218838;
      }
      .table th, .table td {
        vertical-align: middle;
        text-align: center;
      }
      .table th {
        background-color: #28a745;
        color: white;
      }
      .table-responsive {
        overflow-x: auto;
        margin-top: 20px;
      }
      .footer {
        background-color: #28a745;
        color: white;
        padding: 15px 0;
        text-align: center;
      }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-success bg-gradient">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php">Glisoft</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav"></ul>
        </div>
      </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Histórico de Glicose</h4>
        <a href="index.php" class="btn btn-custom">Voltar</a>
      </div>

      <div class="table-responsive">
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
                <td><?= date('d/m/Y', strtotime($dado['data'])); ?></td>
                <td><?= date('H:i', strtotime($dado['hora'])); ?></td>
                <td><?= $dado['glicose_registro']; ?></td>
                <td><?= $dado['status']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Rodapé -->
    <footer class="footer">
      <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
