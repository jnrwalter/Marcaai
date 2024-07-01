<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Arenas - Marca aí</title>
    <link rel="stylesheet" href="../css/arenas.css">
</head>

<body>
    <div class="container">

        <a class="home" href="../index.php">Marca aí</a>

        <div id="div-pesquisar">
            <input type="text" name="" id="">
            <button>Pesquisar</button>
        </div>

        <h1>Arenas disponíveis</h1>

        <div class="card-container" id="card-container">
            <?php
            // Configurações de conexão com o banco de dados PostgreSQL
            $host = "localhost";
            $port = "5434";
            $dbname = "marca_ai";
            $user = "postgres";
            $password = "post";

            // Conectando ao banco de dados PostgreSQL
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
            try {
                $pdo = new PDO($dsn);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta SQL para selecionar todas as arenas
                $sql = "SELECT id, nome, descricao, localizacao, capacidade FROM arenas";
                $stmt = $pdo->query($sql);

                // Exibindo as arenas em cards
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    echo '<div class="card">';
                    echo '<a href="../telas/agendamento.php" class="link-arena">';
                    echo '<img src="../imagens/arenas/img(5).jpeg">';
                    echo '<h2>' . htmlspecialchars($row["nome"]) . '</h2>';
                    echo '<p>' . htmlspecialchars($row["descricao"]) . '</p>';
                    echo '<p><strong>Localização:</strong> ' . htmlspecialchars($row["localizacao"]) . '</p>';
                    echo '<p><strong>Capacidade:</strong> ' . htmlspecialchars($row["capacidade"]) . ' pessoas</p>';
                    echo '</a>';
                    echo '</div>';
                }

                // Fechando a conexão
                unset($pdo);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
            ?>
        </div>
    </div>

    <script>
        // When the user clicks on div, open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>

    </script>
</body>

</html>