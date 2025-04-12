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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white" href="#">Histórico</a>
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
                            <input type="text" class="form-control" id="inputGlicose" name="inputGlicose" placeholder="Insira o valor" autocomplete="off">
                            <span class="input-group-text">mg/dL</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-custom">Registrar</button>
                    </div>
                </form>   
            </div>

        </div>
    </div>

    <footer class="footer text-center">
        <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
