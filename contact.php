<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
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
    //pegando a variável de seção 
    $id_user = $_SESSION['id'];

    // pesquisando no banco 
    $pesquisa_usuario = "SELECT * FROM users WHERE id = '$id_user'";
    $resultado_pesquisa_usuario = mysqli_query($conexao, $pesquisa_usuario);
    $row_pesquisa_usuario = mysqli_fetch_assoc($resultado_pesquisa_usuario);

    $foto_perfil= $row_pesquisa_usuario['foto_perfil_icon'];
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/style_contact.css">
        <link rel="stylesheet" href="assets/navbar.css">
        <title>Dev Way - Contate-nos</title>
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
        <div class="container">
            <div class="pergaminho">
                <form action="submitContact.php" method="POST" class="form">
                    <h1>Contate-nos</h1>
                    <div class="box">
                        <input type="text" name="subject" placeholder="Assunto" class="input" required>
                    </div>
                    <div class="box">
                        <textarea name="message" id="message" class="input" placeholder="Mensagem" cols="20" rows="10" required></textarea>
                    </div>
                    <div class="box">
                        <button id="button" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="javascript/system.js"></script>
        <script src="javascript/nav.js"></script>
    </body>
</html>

