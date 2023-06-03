<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
        // pega o id do usuário atravez do metodo get
        $user_id = $_GET['user_id'];
    }
    
    // Incluindo o arquivo connect.php
    include_once('connect.php');

    // Verifica se as seções de email e senha estão ativas
    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) { // Não estão
        // Não está logado
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

        // Destroi a sessão
        session_destroy();

        // Tentativa de acesso via URL, vai para a página de acesso negado
        header('Location: denied.html');
    }

    // Verifica se o botão de sair foi clicado
    if (isset($_POST['sair'])) {
        // Remove todas as variáveis de sessão
        session_unset();
        
        // Destroi a sessão
        session_destroy();
        
        // Redireciona para a página principal
        header('Location: index.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style_main.css">
    <title>Dev Way - A Jornada</title>
    <style>
        .trilhas{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .trilhas_conteiner{
            display: flex;
            width: 300px;
            height: 200px;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(1rem);
            margin:10px;
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Acessou o Sistema</h1>
            <div class="header">
                <img src="img/personagem-correndo.gif" class="person-run">
            </div>
            <form method="post" action="">
                <input type="submit" name="sair" value="Sair">
            </form>
    </div>
    <h1>lista de trilhas</h1>
    <div class="trilhas">
        <?php
            $pesquisa_trilhas = "SELECT nome FROM trilhas";
            $resultado_pesquisa_trilhas = mysqli_query($conexao, $pesquisa_trilhas);

            // Verifica se a consulta retornou resultados
            if (mysqli_num_rows($resultado_pesquisa_trilhas) > 0) {
                $contador = 1; // Inicializa o contador para mudar o link 

                // Loop para percorrer os resultados e exibir As trilhas em divs
                while ($row = $resultado_pesquisa_trilhas->fetch_assoc()) {
                    // echo "Nome: " . $row["nome"] . "<br>";id=". $row['id'])
                    $nome = $row["nome"];
                    echo "<a href='system_tilha" . $contador . ".php?user_id=". $user_id ."&trilha=".$nome."'><div class='trilhas_conteiner'>";
                    echo "<h3 class='trilhas_nome'>" . $nome . "</h3>";
                    echo "</div></a>";

                    $contador++;
                }
            } else {
                echo '<script>alert("Nenhuma trilha encontrada");</script>';
            }

        ?>
    </div>
</body>
</html>
