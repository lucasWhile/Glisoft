<?php

include_once '../model/Insulina.php';
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
    <title>Tela Inicial - Glisoft</title>
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
        .search-bar input {
            width: 300px;
            margin-bottom: 20px;
        }
        .table-container {
            margin-top: 20px;
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
          <a class="navbar-brand text-white" href="index.php">Glisoft</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
              <a class="nav-link  text-white" href="historicoRegistro.php">Histórico</a>

              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-md-8 form-container">
                <h3 class="text-center mb-4">Registro de Glicose</h3>

                <form action="../controller/glicose_controller/adicionarRegistro.php" method="get">
                    <div class="mb-3">
                        <label for="inputGlicose" class="form-label">Qual o valor da sua glicose?</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="inputGlicose" name="inputGlicose" placeholder="Insira o valor" autocomplete="off" min="0" max="1000" required>
                            <span class="input-group-text">mg/dL</span>
                        </div>
                    </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="ckeckInsulina" name="checkInsulina" id="checkDefault">
            <label class="form-check-label" for="checkDefault">
                Correção?
            </label>
        </div>
        <input type="hidden" id="horaCliente" name="horaCliente">

<div id="insulinaFields" style="display: none;">
    <label for="tipoInsulina">Qual tipo de insulina?</label>

    <?php if ($dados->num_rows > 0) { ?>
        <select class="form-select" name="id_insulina" aria-label="Default select example">
            <option selected>Selecione a insulina</option>
            <?php while ($dado = $dados->fetch_assoc()) { ?>
                <option value="<?php echo $dado['id_insulina']; ?>">
                    <?php echo $dado['tipo_insulina']; ?>
                </option>
            <?php } ?>
        </select>

        <br>

        <label for="unidades">Quantas unidades?</label>
        <input type="number" id="unidades" name="unidades" placeholder="Digite as unidades">
    <?php } else { ?>
        <select class="form-select" disabled>
            <option>Nenhuma insulina disponível</option>
        </select>

        <div class="alert alert-warning mt-2" role="alert">
            Nenhuma insulina cadastrada. Por favor,
            <a href="../view/insulina/adicionarInsulina.php" class="alert-link">cadastre uma insulina</a> primeiro.
        </div>
    <?php } ?>
</div>



        <script>
            document.getElementById('checkDefault').addEventListener('change', function() {
                var insulinaFields = document.getElementById('insulinaFields');
                if (this.checked) {
                    insulinaFields.style.display = 'block'; // Exibe os campos
                } else {
                    insulinaFields.style.display = 'none'; // Esconde os campos
                }
            });
        </script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var agora = new Date();
        
        var ano = agora.getFullYear();
        var mes = String(agora.getMonth() + 1).padStart(2, '0');
        var dia = String(agora.getDate()).padStart(2, '0');
        var hora = String(agora.getHours()).padStart(2, '0');
        var minuto = String(agora.getMinutes()).padStart(2, '0');
        var segundo = String(agora.getSeconds()).padStart(2, '0');

        var horarioCliente = `${ano}-${mes}-${dia} ${hora}:${minuto}:${segundo}`;

        document.getElementById('horaCliente').value = horarioCliente;
        console.log(horarioCliente)
    });
</script>


                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-custom">Registrar</button>
                    </div>

                  
                </form>   
                <div class="d-flex justify-content-start">
                        <a href="index.php" class="btn btn-custom ">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
