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
      .footer {
        background-color: #28a745;
        color: white;
        padding: 15px 0;
        text-align: center;
      }
      .form-container {
        margin-top: 30px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    <!-- Formulário de Fuso Horário -->
    <div class="container">
      <h4>Selecione seu Fuso Horário</h4>
      <form action="../controller/system_controller/fusohorario.php" id="fusoHorarioForm"  method="GET" >
        <div class="mb-3">
          <label for="fuso_horario" class="form-label">Fuso Horário</label>
          <select class="form-select" id="fuso_horario" name="fuso_horario" required onchange="mostrarHora()">
            <option value="">Selecione o fuso horário</option>
            <option value="UTC-3">UTC -3:00 (Brasília, São Paulo, Rio de Janeiro, Porto Alegre)</option>
            <option value="UTC-4">UTC -4:00 (Mato Grosso, Rondônia, Acre, parte do Amazonas)</option>
            <option value="UTC-5">UTC -5:00 (Acre, parte do Amazonas)</option>
            <option value="UTC+0">UTC 0:00 (Reino Unido, Portugal)</option>
            <option value="UTC+1">UTC +1:00 (Alemanha, França, Espanha)</option>
            <option value="UTC+2">UTC +2:00 (África do Sul, Grécia)</option>
            <option value="UTC+3">UTC +3:00 (Arábia Saudita, Moscovo)</option>
            <option value="UTC+4">UTC +4:00 (Azerbaijão, Dubai)</option>
            <option value="UTC+5">UTC +5:00 (Paquistão, Uzbequistão)</option>
            <option value="UTC+9">UTC +9:00 (Japão, Coreia do Sul)</option>
          </select>
        </div>

        <!-- Botão de Confirmar -->
        <button type="submit" class="btn btn-custom" onclick="mostrarHora()">Confirmar</button>
      </form>

      <!-- Exibição da Hora -->
      <div id="horaResultado" class="mt-3">
        <p><strong>Hora no fuso horário escolhido:</strong></p>
        <p id="horaExibida"></p>
      </div>
    </div>

    <!-- Rodapé -->
    <footer class="footer">
      <p>&copy; 2024 Glisoft - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
  let intervaloRelogio; // Variável para controlar o intervalo

  function mostrarHora() {
    const fusoHorario = document.getElementById('fuso_horario').value.trim();
    const resultadoElemento = document.getElementById('horaExibida');

    // Se já existir um intervalo rodando, limpar ele
    if (intervaloRelogio) {
      clearInterval(intervaloRelogio);
    }

    if (fusoHorario) {
      const fusoOffset = parseInt(fusoHorario.match(/([+-]?\d+)/)[0]);

      // Atualizar a hora a cada segundo
      intervaloRelogio = setInterval(() => {
        const dataAtual = new Date();
        dataAtual.setHours(dataAtual.getUTCHours() + fusoOffset);

        resultadoElemento.textContent = `Hora no fuso ${fusoHorario}: ${dataAtual.toLocaleTimeString()}`;
      }, 1000);
    } else {
      resultadoElemento.textContent = 'Por favor, selecione um fuso horário válido.';
    }
  }
</script>

  </body>
</html>
