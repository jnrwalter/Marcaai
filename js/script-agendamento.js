// Dados iniciais (simulando dados sem banco de dados)
// Dados iniciais (simulando dados em memória)
let jogos = [
    {
        jogo: "Jogo de Abertura",
        descricao: "Primeiro jogo na Arena XYZ",
        data: "2024-07-01",
        horario: "18:00",
        minJogadores: 5,
        maxJogadores: 10,
        jogadoresConfirmados: [
            { nome: "João", foto: "https://via.placeholder.com/50", posicao: "Goleiro" },
            { nome: "Maria", foto: "https://via.placeholder.com/50", posicao: "Atacante" }
        ]
    },
    {
        jogo: "Torneio Amador",
        descricao: "Torneio entre amigos",
        data: "2024-07-15",
        horario: "14:00",
        minJogadores: 2,
        maxJogadores: 15,
        jogadoresConfirmados: [
            { nome: "Pedro", foto: "https://via.placeholder.com/50", posicao: "Defensor" },
            { nome: "Ana", foto: "https://via.placeholder.com/50", posicao: "Meio-campo" }
        ]
    }
];

// Função para formatar data (DD/MM/YYYY)
function formatarData(data) {
    let partesData = data.split('-');
    return `${partesData[2]}/${partesData[1]}/${partesData[0]}`;
}

// Função para obter o dia da semana em português
function getDiaDaSemana(data) {
    let diasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
    let diaSemana = new Date(data).getDay();
    return diasSemana[diaSemana];
}

// Função para inicializar a lista de jogos na página
function inicializarJogos() {
    let jogosList = document.getElementById('jogos-list');
    jogosList.innerHTML = '';

    jogos.forEach((jogo, index) => {
        let jogoCard = document.createElement('div');
        jogoCard.classList.add('jogo-card');

        let jogoInfo = document.createElement('h3');
        jogoInfo.textContent = `${jogo.jogo} - ${formatarData(jogo.data)} (${getDiaDaSemana(jogo.data)}) às ${jogo.horario}`;
        jogoCard.appendChild(jogoInfo);

        let descricao = document.createElement('p');
        descricao.textContent = `Descrição: ${jogo.descricao}`;
        jogoCard.appendChild(descricao);

        let jogadoresDiv = document.createElement('div');
        jogo.jogadoresConfirmados.forEach(jogador => {
            let jogadorDiv = document.createElement('div');
            jogadorDiv.classList.add('jogador');
            jogadorDiv.innerHTML = `
                <img src="${jogador.foto}" alt="${jogador.nome}">
                <div class="info">
                    <strong>${jogador.nome}</strong><br>
                    <span>${jogador.posicao}</span>
                </div>
            `;
            jogadoresDiv.appendChild(jogadorDiv);
        });
        jogoCard.appendChild(jogadoresDiv);

        // Botão "Adicionar-me ao jogo"
        let btnAdicionar = document.createElement('button');
        btnAdicionar.classList.add('btn-adicionar');
        btnAdicionar.textContent = 'Adicionar-me ao jogo';
        btnAdicionar.addEventListener('click', () => {
            // Verifica se a quantidade máxima de jogadores foi atingida
            if (jogo.jogadoresConfirmados.length >= jogo.maxJogadores) {
                alert('Número máximo de jogadores atingido para este jogo.');
            } else {
                // Mostra a modal ao clicar no botão
                showModal(index);
            }
        });
        if (jogo.jogadoresConfirmados.length < jogo.maxJogadores) {
            jogoCard.appendChild(btnAdicionar);
        }

        // Botão "Confirmar Agendamento"
        let btnConfirmar = document.createElement('button');
        btnConfirmar.classList.add('btn-confirmar-agendamento');
        btnConfirmar.textContent = 'Confirmar Agendamento';
        btnConfirmar.addEventListener('click', () => {
            if (jogo.jogadoresConfirmados.length >= jogo.minJogadores) {
                showModalPagamento(index);
            } else {
                alert(`Número mínimo de jogadores não alcançado para confirmar o agendamento.`);
            }
        });
        if (jogo.jogadoresConfirmados.length >= jogo.minJogadores) {
            jogoCard.appendChild(btnConfirmar);
        }

        jogosList.appendChild(jogoCard);
    });
}

// Event listener para abrir modal de criar novo jogo
document.getElementById('btn-abrir-modal').addEventListener('click', function() {
    let modalNovoJogo = document.getElementById('modal-novo-jogo');
    modalNovoJogo.style.display = 'block';
});

// Event listener para o span de fechar no modal de criar novo jogo
let spanFecharNovoJogo = document.querySelectorAll('#modal-novo-jogo .close')[0];
spanFecharNovoJogo.addEventListener('click', function() {
    let modalNovoJogo = document.getElementById('modal-novo-jogo');
    modalNovoJogo.style.display = 'none';
});

// Event listener para fechar o modal ao clicar fora dele
window.onclick = function(event) {
    let modalNovoJogo = document.getElementById('modal-novo-jogo');
    if (event.target == modalNovoJogo) {
        modalNovoJogo.style.display = 'none';
    }
};

// Event listener para o botão de criar novo jogo na modal
document.getElementById('btn-criar-jogo').addEventListener('click', function() {
    criarNovoJogo();
});

// Função para criar um novo jogo
function criarNovoJogo() {
    let nomeJogo = document.getElementById('nome-jogo').value;
    let descricaoJogo = document.getElementById('descricao-jogo').value;
    let dataJogo = document.getElementById('data-jogo').value;
    let horarioJogo = document.getElementById('horario-jogo').value;
    let minJogadores = parseInt(document.getElementById('min-jogadores').value);
    let maxJogadores = parseInt(document.getElementById('max-jogadores').value);

    // Validação dos campos
    if (nomeJogo && descricaoJogo && dataJogo && horarioJogo && minJogadores && maxJogadores) {
        // Adicionar novo jogo à lista
        jogos.push({
            jogo: nomeJogo,
            descricao: descricaoJogo,
            data: dataJogo,
            horario: horarioJogo,
            minJogadores: minJogadores,
            maxJogadores: maxJogadores,
            jogadoresConfirmados: []
        });

        // Fechar modal de novo jogo
        let modalNovoJogo = document.getElementById('modal-novo-jogo');
        modalNovoJogo.style.display = 'none';

        // Inicializar a lista de jogos novamente
        inicializarJogos();
    } else {
        alert('Por favor, preencha todos os campos.');
    }
}

// Função para mostrar a modal de inserção de jogador
function showModal(indexJogo) {
    // Limpa os campos da modal
    document.getElementById('nome').value = '';
    document.getElementById('posicao').value = '';

    // Mostra a modal
    let modal = document.getElementById('myModal');
    modal.style.display = 'block';

    // Fecha a modal quando o usuário clica no 'x'
    let span = document.getElementsByClassName('close')[0];
    span.onclick = function() {
        modal.style.display = 'none';
    };

    // Fecha a modal quando o usuário clica fora dela
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    // Event listener para o botão de confirmar na modal
    document.getElementById('btn-confirmar').onclick = function() {
        let nome = document.getElementById('nome').value;
        let posicao = document.getElementById('posicao').value;
        if (nome && posicao) {
            // Adiciona o jogador ao jogo específico
            jogos[indexJogo].jogadoresConfirmados.push({ 
                nome: nome, 
                foto: 'https://via.placeholder.com/50', 
                posicao: posicao 
            });

            // Atualiza a lista de jogos na página
            inicializarJogos();

            // Fecha a modal
            modal.style.display = 'none';

            // Mostra feedback
            showFeedbackModal(`${nome} foi adicionado ao jogo ${jogos[indexJogo].jogo} com sucesso!`);
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    };
}

// Função para mostrar modal de pagamento
function showModalPagamento(indexJogo) {
    let modalPagamento = document.getElementById('modal-pagamento');
    modalPagamento.style.display = 'block';

    // Fecha a modal quando o usuário clica no 'x'
    let span = modalPagamento.getElementsByClassName('close')[0];
    span.onclick = function() {
        modalPagamento.style.display = 'none';
    };

    // Fecha a modal quando o usuário clica fora dela
    window.onclick = function(event) {
        if (event.target == modalPagamento) {
            modalPagamento.style.display = 'none';
        }
    };

    // Event listener para o botão de pagamento
    document.getElementById('btn-pagamento').onclick = function() {
        let metodoPagamento = document.getElementById('metodo-pagamento').value;

        if (metodoPagamento === 'Pix') {
            // Mostrar campo de chave Pix
            document.getElementById('chave-pix-container').style.display = 'block';
            // Gerar chave Pix aleatória (simulado)
            document.getElementById('chave-pix').value = Math.random().toString(36).substr(2, 10);
        } else {
            // Esconder campo de chave Pix
            document.getElementById('chave-pix-container').style.display = 'none';
        }

        // Aqui você pode implementar a lógica para processar o pagamento

        // Fechar modal de pagamento
        modalPagamento.style.display = 'none';

        // Remover botões "Adicionar-me ao jogo" e "Confirmar Agendamento"
        let jogoCard = document.getElementsByClassName('jogo-card')[indexJogo];
        let btnAdicionar = jogoCard.getElementsByClassName('btn-adicionar')[0];
        if (btnAdicionar) {
            btnAdicionar.remove();
        }
        let btnConfirmar = jogoCard.getElementsByClassName('btn-confirmar-agendamento')[0];
        if (btnConfirmar) {
            btnConfirmar.remove();
        }

        // Mostra feedback
        showFeedbackModal(`Agendamento confirmado para o jogo ${jogos[indexJogo].jogo}.`);
    };
}

// Função para mostrar modal de feedback
function showFeedbackModal(message) {
    let modalFeedback = document.getElementById('modal-feedback');
    let modalMessage = document.getElementById('modal-message');
    modalMessage.textContent = message;
    modalFeedback.style.display = 'block';

    // Fecha a modal de feedback após 3 segundos
    setTimeout(function() {
        modalFeedback.style.display = 'none';
    }, 3000);
}

// Inicializa a lista de jogos na página
inicializarJogos();


//Carrosel
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
