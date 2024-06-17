<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendamento de Partida de Futebol</title>
  <link rel="stylesheet" href="../css/agendamento.css">
</head>

<body>
  <a class="home" href="../index.html">Marca aí</a>
  <div class="container">
    <h2>Agendar Partida de Futebol</h2>
    <form id="footballForm" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="teamPlayers">Lista de Jogadores:</label>
        <ul id="teamPlayers" class="player-list"></ul>
        <input type="text" id="playerInput" placeholder="Adicionar jogador">
        <button type="button" onclick="addPlayer()">Adicionar jogador</button>
      </div>
      <div class="form-group">
        <label for="date">Data:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="form-group">
        <label for="time">Horário:</label>
        <input type="time" id="time" name="time" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Agendar" id="input-agendar">
      </div>
    </form>
    <div id="successMessage" class="success-message" style="display: none;">
      Partida agendada com sucesso!
    </div>
  </div>

  <script>
    function validateForm() {
      var players = document.getElementById("teamPlayers").getElementsByTagName("li");
      var date = document.getElementById("date").value;
      var time = document.getElementById("time").value;

      if (players.length === 0 || date.trim() === "" || time.trim() === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
      }

      // Simulação do envio do formulário (pode ser substituído por código de envio real)
      // Aqui estamos apenas mostrando a mensagem de sucesso após um pequeno atraso
      setTimeout(function() {
        document.getElementById("footballForm").reset(); // Limpa o formulário
        document.getElementById("successMessage").style.display = "block";
      }, 1000); // 1000 milissegundos = 1 segundo

      return false; // Retorna false para evitar o envio real do formulário
    }

    function addPlayer() {
      var playerName = document.getElementById("playerInput").value.trim();

      if (playerName !== "") {
        var ul = document.getElementById("teamPlayers");
        var li = document.createElement("li");
        li.textContent = playerName;
        ul.appendChild(li);
        document.getElementById("playerInput").value = "";
      }
    }
  </script>
</body>

</html>