<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
        // pega o id do usuário atravez do metodo get
        // $user_id = $_GET['user_id'];
    }
    
    // Incluindo o arquivo connect.php
    include_once('connect.php');

    // Verifica se as seções de email e senha estão ativas
    if ((!isset($_SESSION['email']) == true)) { // Não estão
        // Não está logado
        unset($_SESSION['email']);

        // Destroi a sessão
        session_destroy();

        // Tentativa de acesso via URL, vai para a página de acesso negado
        header('Location: denied.html');
    }
    //pegando a variável de seção 
    $id_user = $_SESSION['id'];

    // pesquisando no banco 
    $pesquisa_usuario = "SELECT * FROM users WHERE id = '$id_user'";
    $resultado_pesquisa_usuario = mysqli_query($conexao, $pesquisa_usuario);
    $row_pesquisa_usuario = mysqli_fetch_assoc($resultado_pesquisa_usuario);

    $foto_perfil= $row_pesquisa_usuario['foto_perfil_icon'];

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
    <link rel="stylesheet" href="assets/navbar.css">
    <script src="javascript/nav.js"></script>
    <title>Dev Way - A Jornada</title>
</head>
<body>
<header>
        <nav class="navbar">
            <button class="btnmenu" onclick="abrirmenu()" id="btnmenu">MENU</button>
        </nav>
        <div class="menu1" id="menu1">
            <div class="menu2" id="menu2">
                <a class="menup" href="profile.php">
                    <img id="img_profile" class="aa" src="<?php echo $foto_perfil ?>" alt="Perfil">
                    <input id="inputbloq1" type="text" name="Usuario" value="<?php echo $row_pesquisa_usuario['nome'];?>" class="nomeinput">
                </a>
                <div class="linksmenu">
                    <a href="system.php">Trilhas</a>
                </div>
                <div class="linksmenu">
                    <a href="contact.php">Contato</a>
                </div>
                <div class="linksmenu">
                    <a href="sobre.php">Sobre Nós</a>
                </div>

                <div class="bn">
                    <form method="post" action="">
                        <input type="submit" name="sair" value="sair">
                    </form>
                </div>
            </div> 
            </div>
        </div>
    </header>
    <!-- <img src="assets/fundo-system.jpg" class="fundo"> -->
    <div class="container">
        <div class="trilhas">
            <h1>Meus Cursos</h1>
                <?php
                    $pesquisa_trilhas = "SELECT nome FROM trilhas";
                    $resultado_pesquisa_trilhas = mysqli_query($conexao, $pesquisa_trilhas);
                    // Verifica se a consulta retornou resultados
                    if (mysqli_num_rows($resultado_pesquisa_trilhas) > 0) {
                        $contador = 1; // Inicializa o contador para mudar o link 
                        // Loop para percorrer os resultados e exibir As trilhas em divs
                        while ($row = $resultado_pesquisa_trilhas->fetch_assoc()) {
                            $nome = $row["nome"];
                            echo "<a href='system_trilha" . $contador . ".php?trilha=" .  $nome ."'><div class='trilhas_conteiner'>";
                            echo "<h3 class='trilhas_nome'>" . $nome . "</h3>";
                            echo "</div></a>";
                            $contador++;
                        }
                    } else {
                        echo '<script>alert("Nenhuma trilha encontrada");</script>';
                    }
        
                ?>
        </div>
    </div>
    <script src="javascript/nav.js"></script>
</body>
</html>
