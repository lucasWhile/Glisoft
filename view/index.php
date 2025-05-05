<?php
session_start();
include_once '../model/Glicose.php';
include_once 'seguranca/verificadorsessao.php';

$glicose = new Glicose('', "", "", '','');
$id_usuario=$_SESSION["id_usuario"];
$dados=$glicose->buscarUltimosRegistros($id_usuario);
$media=$glicose->mediaGlicose($id_usuario);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial - Glisoft</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .navbar {
            border-bottom: 2px solid #fff;
        }
        .alert {
            margin-top: 20px;
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
        .search-bar input {
            width: 300px;
            margin-bottom: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100"> <!-- Usando flexbox para o layout da página -->
    <nav class="navbar navbar-expand-lg bg-success bg-gradient">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="index.php">Glisoft</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
       <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-white" href="historicoRegistro.php">Histórico</a>
            </li>
            
            <!-- Dropdown de Configurações -->
                <li class="nav-item dropdown">
                  <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Configurações essenciais
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../view/insulina/adicionarInsulina.php">Adicionar Insulina</a></li>
                  <!--  <li><a class="dropdown-item" href="#">Fuso Horario</a></li>  -->
               <!--       <li><a class="dropdown-item" href="#">Configuração 3</a></li>  -->
                  </ul>
                </li>

                <?php if (isset($_SESSION['nivel'])) { ?>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="../controller/user_controller/logoutUsuario.php">Sair</a>
                  </li>
                <?php } ?>
              </ul>
      </div>

        </div>
    </nav>

    <?php if(isset($_SESSION['msg'])){ ?>
      <div class="alert alert-success text-center" role="alert">
        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
      </div>
    <?php } ?>

    <div class="container-fluid p-3 table-container flex-grow-1">
        <div class="row">
            <div class=" col-md-9">
          

                <table class="table  table-sm table-bordered table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Glicose</th>
                        <th scope="col">Status</th>
                        <th scope="col">Correção?</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php while ($dado = $dados->fetch_assoc()) { ?>
                      <tr>
                      <td><?php echo date('d/m/Y', strtotime($dado['data'])); ?></td>
                      <td><?php echo date('H:i', strtotime($dado['hora'])); ?></td>
                        <td><?php echo $dado['glicose_registro']; ?></td>
                        <td><?php echo $dado['status']; ?></td>
                        <td> <?php 
                        if (isset($dado['quantidade_unidades'])) {    ?>
                           <?php echo $dado['quantidade_unidades'] .' uni-'.$dado['tipo_insulina']; ?>
                       <?php }
                       else{?>
                       Não

                    <?php   }
                        ?>
                          
                      </td>

                      </tr>
                    <?php } ?>
                    </tbody>
                </table>


              
            </div>

            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <a type="button" href="adicionarRegistro.php" class="btn btn-custom">Adicionar Novo Registro</a>
            </div>
        </div>

       
        <div class="row p-3">
            <div class="col-6">
                <div class="border border-success p-1"> <!-- Adicionando padding e a borda -->
                    <p>Média da glicose</p>
                    <!-- Verifique se a variável $media está definida antes de exibi-la -->
                    <?php if (isset($media)) : ?>
                        <p><?php echo number_format($media, 2, ',', '.'); ?> mg/dL</p> <!-- Formatação do número -->
                    <?php else : ?>
                        <p>Não há dados suficientes para calcular a média.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center mt-auto">
        <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
