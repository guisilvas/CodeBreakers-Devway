<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
        $_SESSION["idTrilha"] = 1;
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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style_sobre.css">
    <script src="script.js"></script>
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="assets/navbar.css">
</head>
<body>
    <header>
        <nav class="navbar_sobre">
            <button class="btnmenu" onclick="abrirmenu()" id="btnmenu">MENU</button>
        </nav>
        <div class="menu1_sobre" id="menu1">
            <div class="menu2" id="menu2">
                <div class="menup">
                    <img id="img_profile" class="aa" src="<?php echo $foto_perfil ?>" alt="Perfil">
                    <input id="inputbloq1" type="text" name="Usuario" value="<?php echo $row_pesquisa_usuario['nome'];?>" class="nomeinput">
                </div>
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
    <div class="about">
        <div class="background-image">
            <img src="assets/devs/turma2.jpeg">
        </div>
    </div>
    <div class="history">
        <h1>CONHEÇA A EQUIPE DEVWAY</h1>
        <p>
            A ideia nasceu quando nos foi lançado o desafio de criar um site mais interativo, onde poderíamos mostrar o nível de conhecimento adquirido em sala de aula no curso de desenvolvimento de sistemas.
            <br>
            <br>
            Nosso time é composto por alunos do curso de Desenvolvimento de Sistemas da escola PROZ Educação. Cada membro da equipe contribui com habilidades únicas para criar um conteúdo de alta qualidade e desafios interessantes para o site.
            <br>
        </p>
    </div>
    <section class="devs">
        <h1 class="titulo_devs">Desenvolvedores</h1>
        <div class="cards_geral">
            <div class="card_item">
                <h1 class="card_nome" style="margin-top: 1em;">Professor Felipe</h1>
                <img class="card_img" src="assets/devs/felipe.jpeg">
                <div class="card_links">
                    <a href="https://github.com/depaulaio" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/felipe-de-paula-io/" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Anny</h1>
                <img class="card_img" src="assets/devs/anny.jpeg">
                <div class="card_links">
                    <a href="https://github.com/Muniz-DuarteAnny" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="http://www.linkedin.com/in/annycaroliny1" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Breno</h1>
                <img class="card_img" src="assets\devs\breno.jpeg">
                <div class="card_links">
                    <a href="https://github.com/brngom3s"target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/breeno-gomes/" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Bruna</h1>
                <img class="card_img" src="assets\devs\bruna.jpeg">
                <div class="card_links">
                    <a href="https://github.com/brunagtmaia" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/brunagtmaia/" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Douglas</h1>
                <img class="card_img" src="assets\devs\douglas.jpeg">
                <div class="card_links">
                    <a href="https://github.com/DouglasLima352" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Eduarda</h1>
                <img class="card_img" src="assets\devs\eduarda.jpeg">
                <div class="card_links">
                    <a href="https://github.com/DudaLeandra" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="http://www.linkedin.com/in/eduarda-leandra" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Gabriel</h1>
                <img class="card_img" src="assets\devs\gabriel.jpeg">
                <div class="card_links">
                    <a href="https://github.com/Gabriel037" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/gabriel-mendon%C3%A7a-4b0814244/" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Guilherme</h1>
                <img class="card_img" src="assets\devs\guilherme.jpeg">
                <div class="card_links">
                    <a href="https://github.com/guisilvas" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/guisilvas/" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Henrique</h1>
                <img class="card_img" src="assets\devs\henrrique.jpeg">
                <div class="card_links">
                    <a href="https://github.com/hriquerios" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/henriquerios/" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Luzia</h1>
                <img class="card_img" src="assets\devs\luzia.jpeg">
                <div class="card_links">
                    <a href="https://github.com/Luziarcd"><img src="assets\icons\icons8-github-50.png" target="_blank"></a>
                    <a href="https://www.linkedin.com/in/luzia-rodrigues-a45707131" target="_blank"><img src="assets\icons\icons8-linkedin-50.png" target="_blank"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Maísa</h1>
                <img class="card_img" src="assets\devs\maysa.jpeg">
                <div class="card_links">
                    <a href="https://github.com/ChyaaNkh"><img src="assets\icons\icons8-github-50.png" target="_blank"></a>
                    <a href="https://br.linkedin.com/in/ma%C3%ADsa-resende-633525280" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Pablo</h1>
                <img class="card_img" src="assets\devs\pablo.jpeg">
                <div class="card_links">
                    <a href="https://github.com/PabloSoares1572"></a>
                    <a href="https://www.linkedin.com/mwlite/in/pablo-soares-597755280" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
            <div class="card_item">
                <h1 class="card_nome">Pedro</h1>
                <img class="card_img" src="assets\devs\pedro.jpeg">
                <div class="card_links">
                    <a href="https://github.com/Paindrin" target="_blank"><img src="assets\icons\icons8-github-50.png"></a>
                    <a href="https://www.linkedin.com/in/pedro-gabriel-silva-dos-reis-383a0a27b?trk=contact-info" target="_blank"><img src="assets\icons\icons8-linkedin-50.png"></a>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="javascript/nav.js"></script>
</body>
</html>
