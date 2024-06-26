<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marca aí</title>
    <script type="text/javascript" src="/js/hideContent.js"></script>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="background-superior">
        <div id="content" class="content">
            <nav class="menu-superior" id="menu-superior">
                <a href="./telas/arenas.php">
                    <li>Arenas</li>
                </a>
                <a href="">
                    <li>Rankings</li>
                </a>
                <a href="./telas/login.html">
                    <li>Login</li>
                </a>
                <a href="">
                    <li>Sobre</li>
                </a>
            </nav>
            <div class="slogan" id="sloganId">
                <h2>A magia do futebol em suas mãos - agende, jogue, conquiste!</h2>
                <h1>Transforme sua paixão pelo esporte em momentos inesquecíveis de diversão e camaradagem, tudo com a
                    facilidade e conveniência do nosso aplicativo de agendamento de partidas de futebol amador.
                    Experimente agora e descubra como é simples jogar quando quiser, onde quiser, com quem quiser.</h1>
                <a href="./telas/arenas.php">
                    <button id="quero-jogar">Quero jogar</button>
                </a>
            </div>

        </div>
        <video muted autoplay loop>
            <source src="./video/exemploFundo.mp4" type="video/mp4">
        </video>
    </div>

    <!--<section id="features">

        <div class="div-descricao-app">

            <div class="divHero">
                <p class="p-descricao-app">Agende suas partidas com apenas alguns toques na tela do seu dispositivo
                    móvel.
                    Nosso
                    aplicativo intuitivo permite que você escolha a data, o horário e o local da partida de forma
                    conveniente,
                    garantindo que todos os participantes estejam informados e prontos para jogar. </p>
                <img src="./imagens/fundoMarcaai.jpeg" width="200px" height="200px">
            </div>

            <div class="divHero">
                <img src="./imagens/fundoMarcaai.jpeg" width="200px" height="200px">
                <p>Mantenha-se
                    atualizado com notificações instantâneas sobre novas partidas, alterações de horários e outros
                    detalhes
                    importantes. Nunca mais perca uma oportunidade de entrar em campo com seus amigos.</p>
            </div>

        </div>

        <div class="feature">
            <h2>Agendamento Simples</h2>
            <p>Agende partidas com apenas alguns cliques. Escolha a data, o horário e o local da partida.</p>
        </div>
        <div class="feature">
            <h2>Notificações</h2>
            <p>Fique atualizado com notificações automáticas sobre as partidas agendadas.</p>
        </div>
        <div class="feature">
            <h2>Convide Amigos</h2>
            <p>Convide seus amigos para participar das partidas diretamente pelo aplicativo.</p>
        </div>
    </section>

    <footer>
        aaaaaaaaaaaaaaaa
    </footer> -->

    <script>
        window.addEventListener('scroll', function () {
            var temp = document.getElementById("sloganId")
            temp.classList.toggle('rolagemHide', window.scrollY > 50)
            document.getElementById("menu-superior").style.display = "none";
            document.getElementById("content").style.display = "none";
        })

        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                document.getElementById("menu-superior").style.display = "none";
            } else {
                document.getElementById("menu-superior").style.display = "flex";
                document.getElementById("content").style.display = "block";
            }

        })
    </script>

</body>

</html>