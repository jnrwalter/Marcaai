<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Partidas de Futebol</title>
    <link rel="stylesheet" href="../css/agendamento-partida.css">
</head>
<body>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 5</div>
            <img src="../imagens/arenas/img(1).jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 5</div>
            <img src="../imagens/arenas/img(2).jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 5</div>
            <img src="../imagens/arenas/img(3).jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 5</div>
            <img src="../imagens/arenas/img(4).jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">5 / 5</div>
            <img src="../imagens/arenas/img(5).jpeg" style="width:100%">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="container">
        <h1>Agendamento de Partidas de Futebol</h1>
        
        <!-- Botão para abrir modal de criar novo jogo -->
        <button id="btn-abrir-modal">Criar Novo Jogo</button>

        <!-- Lista de jogos -->
        <div id="jogos-list" class="jogos-list">
            <!-- Aqui serão listados os jogos dinamicamente -->
        </div>
    </div>

    <!-- Modal para inserção de jogador -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Adicionar Jogador</h2>
            <form id="form-jogador">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="posicao">Posição em Campo:</label>
                <select id="posicao" name="posicao" required>
                    <option value="">Selecione...</option>
                    <option value="Goleiro">Goleiro</option>
                    <option value="Defensor">Zagueiro</option>
                    <option value="Meio-campo">Meio campo</option>
                    <option value="Pivô">Pivô</option>
                    <option value="Atacante">Atacante</option>
                </select>                
                <button type="button" id="btn-confirmar">Adicionar-me ao jogo</button>
            </form>
        </div>
    </div>

    <!-- Modal para criar novo jogo -->
    <div id="modal-novo-jogo" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Novo Jogo</h2>
            <form id="form-novo-jogo">
                <label for="nome-jogo">Nome do Jogo:</label>
                <input type="text" id="nome-jogo" name="nome-jogo" required>

                <label for="descricao-jogo">Descrição:</label>
                <textarea id="descricao-jogo" name="descricao-jogo" rows="4" cols="50" required></textarea>
                
                <label for="data-jogo">Data:</label>
                <input type="date" id="data-jogo" name="data-jogo" required>
                
                <label for="horario-jogo">Horário:</label>
                <input type="time" id="horario-jogo" name="horario-jogo" required>
                
                <label for="min-jogadores">Quantidade Mínima de Jogadores:</label>
                <input type="number" id="min-jogadores" name="min-jogadores" min="1" required>
                
                <label for="max-jogadores">Quantidade Máxima de Jogadores:</label>
                <input type="number" id="max-jogadores" name="max-jogadores" min="1" required>
                
                <div class="div-botoes">
                    <button type="button" id="btn-criar-jogo">Criar Jogo</button>
                </div>
                
            </form>
        </div>
    </div>

    <!-- Modal para pagamento -->
    <div id="modal-pagamento" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Escolha o Método de Pagamento</h3>
            <select id="metodo-pagamento">
                <option value="dinheiro">Dinheiro</option>
                <option value="pix">Pix</option>
            </select>
            <div id="chave-pix-container" style="display: none;">
                <label for="chave-pix">Chave Pix:</label>
                <input type="text" id="chave-pix" placeholder="Chave Pix" readonly>
            </div>
            <button id="btn-pagamento">Confirmar Pagamento</button>
        </div>
    </div>

    <!-- Modal de feedback -->
    <div id="modal-feedback" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

    <script src="../js/script-agendamento.js"></script>
</body>
</html>
