



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-success bg-gradient">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Glisoft</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Historico</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Opção 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Opção 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Opção 3</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container p-3">
    <div class="row justify-content-center">

    <form action="../controller/glicose_controller/adicionarRegistro.php" method="get">
        <div class="col-12 col-md-8 d-flex align-items-end">
            <div class="flex-grow-1 me-2">
                <label for="inputGlicose" class="form-label">Qual o valor da sua glicose?</label>
                <input type="text" class="form-control" id="inputGlicose" name="inputGlicose" placeholder="Insira o valor" autocomplete="off">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>   
    </div>
</div>


    <footer class="bg-success bg-gradient text-white py-3">
        <div class="container text-center">
          <p>&copy; 2024 Glisoft</p>
        </div>
      </footer>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>