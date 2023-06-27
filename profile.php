<?php
    // Iniciando sessão caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        session_start();
    }
    // Incluindo o arquivo connect.php
    include_once('connect.php');

    //pegando a variável de seção 
    $id_user = $_SESSION['id'];

    // pesquisando no banco 
    $pesquisa_usuario = "SELECT * FROM users WHERE id = '$id_user'";
    $resultado_pesquisa_usuario = mysqli_query($conexao, $pesquisa_usuario);
    $row_pesquisa_usuario = mysqli_fetch_assoc($resultado_pesquisa_usuario);

    $foto_perfil= $row_pesquisa_usuario['foto_perfil'];

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
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/style_profile.css">
    <title>Dev Way - Perfil</title>
<style>
    
    body{
        font-family: 'Press Start 2P', cursive;
        background-image: url('./assets/fundo_main.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 100%;
        width: 100%;
        background-attachment: fixed;
    }

    .fatherOfAll{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .grid-container{
        display: flex;
        width: 70%;
        height: 100%;
        align-items: center;
        background-image: url('./assets/pergaminho.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        justify-content: center;
    }
    
    .form_profile input{ 
        color: black;;
        width: 80%;
        height: 3.5rem;
        background-color: #D0A270;
        margin: 1.3rem;
        /*font-size: 1.5rem*/
        padding-left: 10px ;
        border-color: black;
        border-radius:0px;
    }
    
    .text{
        color: black;
    }
     
    .trocar_img {
        width: 100%;
        height: 100%;
    }

    .buttomperfil {
        display: flex;
        position: absolute;
        right: 90px;
        top: 35px;
        cursor: pointer;
        z-index: 1;
        height: 13%;
        width: 10%;
    }
    @media screen and (max-width: 425px){
        .btnmenu{
            height: 2.5rem;
        }
        .linksmenu{
            height: 20%;

        }
    }

</style>
</head>

<body>
    <header>
        <nav class="navbar" style="position:initial;">
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
    </header>

    <div class="fatherOfAll">
        <div class="grid-container" id="grid-container!">
            <div class="grid-item">
                <div class="img_profile1">
                    <?php 
                        if (isset($_GET['image'])) {
                            $newImageUrl = $_GET['image'];
                            $newImageIconUrl = $_GET['image_icon'];
                            echo "<img id=\"img_profile\" class=\"aa\" src=\"" . $newImageUrl . "\" alt=\"Perfil\">";
                            echo "<a href=\"select_character.html\" class=\"buttomperfil\"><img class=\"trocar_img\" src=\"assets/botaotp.png\"></a>";
                            // Atualizar a imagem de perfil do usuário com a nova URL ($newImageUrl)
                            // ... (código para atualizar a imagem de perfil no banco de dados ou onde quer que esteja armazenada)
                            $update_image = "UPDATE users SET foto_perfil = '$newImageUrl', foto_perfil_icon = '$newImageIconUrl' WHERE id = '$id_user'";
                            $resultado_update_image = mysqli_query($conexao, $update_image);
                            if ($resultado_update_image) {
                                echo "<script>window.location.href = 'system.php';</script>";
                                echo "<script>window.location.reload();</script>";
                            }
                            // if ($resultado_update_image){
                            //     echo "<script>alert('Foto atualizada');</script>";
                            // }else{
                            //     echo "<script>alert('Erro para atualizar a foto de perfil');</script>";
                            // }
                        }else{
                            echo "<img id=\"img_profile\" class=\"aa\" src=".$foto_perfil." alt=\"Perfil\">";
                            echo "<a href=\"select_character.html\" class=\"buttomperfil\"><img class=\"trocar_img\" src=\"assets/botaotp.png\"></a>";
                        }
                    ?>
                    <!-- <img src="assets\characters\defaultCharacter.png" class="aa" id="img_profile"></div>
                    <a href="select_character.html"class="buttomperfil">
                        <img class="trocar_img" src="assets/botaotp.png">
                    </a> -->
                </div>
            </div>
            <div class="grid-item">
                <div class="title_profile" id="title">
                    <h2 class="text">Perfil</h2></div>
                    <div class="form_profile">
                        <input id="inputbloq1" type="text" name="Usuario" value="<?php echo $row_pesquisa_usuario['nome'];?>"
                        oninput="ajustarTamanhoFonte(this)">
                        <input id="inputbloq2" type="text" name="E-mail" value="<?php echo $row_pesquisa_usuario['email'];?>"
                        oninput="ajustarTamanhoFonte(this)">
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</body>
<script>


    //bloqueando os inputs para o usuário
    var inputElement1 = document.getElementById("inputbloq1");
    inputElement1.disabled = true;

    var inputElement2 = document.getElementById("inputbloq2");
    inputElement2.disabled = true;



    //ajustando o tamanho da fonte com base no comprimento do texto inserido no input
    
    
  
  function ajustarTamanhoFonte() {
    var tamanhoInicial = 24;   // Tamanho inicial da fonte
    var tamanhoMinimo = 12;    // Tamanho mínimo da fonte
    var fatorReducao = 1.5;    // Fator de redução da fonte

    // Obtém as referências para os elementos de input
    var inputElement1 = document.getElementById("inputbloq1");
    var inputElement2 = document.getElementById("inputbloq2");

    // Obtém o tamanho do texto do input 1
    var tamanhoTexto1 = inputElement1.value.length;

    // Calcula o novo tamanho da fonte para o input 1
    var novoTamanhoFonte1 = tamanhoInicial - (tamanhoTexto1 * fatorReducao);

    // Limita o tamanho da fonte do input 1 ao tamanho mínimo
    novoTamanhoFonte1 = Math.max(novoTamanhoFonte1, tamanhoMinimo);

    // Obtém o tamanho do texto do input 2
    var tamanhoTexto2 = inputElement2.value.length;

    // Calcula o novo tamanho da fonte para o input 2
    var novoTamanhoFonte2 = tamanhoInicial - (tamanhoTexto2 * fatorReducao);

    // Limita o tamanho da fonte do input 2 ao tamanho mínimo
    novoTamanhoFonte2 = Math.max(novoTamanhoFonte2, tamanhoMinimo);

    // Aplica os novos tamanhos de fonte aos inputs
    inputElement1.style.fontSize = novoTamanhoFonte1 + "px";
    inputElement2.style.fontSize = novoTamanhoFonte2 + "px";
   }

    // Tamanho mínimo para adicionar a nova classe
    let tamanhoMinimo = 500; // Por exemplo, 500 pixels de largura

    // Verificar o tamanho da tela e adicionar a nova classe
    function adicionarNovaClasse() {
    let larguraTela = window.innerWidth;
    let elemento = document.getElementById('grid-container!'); // Substitua 'seu-elemento' pelo ID do seu elemento HTML

    if (larguraTela <= tamanhoMinimo) {
        elemento.classList.add('novocontainer');
        elemento.classList.remove('grid-container');
    } else {
        elemento.classList.remove('novocontainer');
        elemento.classList.add('grid-container');
    }
    }

    // Chamar a função quando a janela for redimensionada
    window.addEventListener('resize', adicionarNovaClasse);

    // Chamar a função no carregamento inicial da página
    window.addEventListener('load', adicionarNovaClasse);

     // Obter as referências das divs
    var divOrigem = document.getElementById('title');
    var divDestino = document.getElementById('grid-container!');

    // Dimensão mínima da tela para a realocação
    var larguraMinima = 500; // Por exemplo, 768 pixels

    // Função para verificar a dimensão da tela e realocar a div
    function verificarDimensaoTela() {
      var larguraTela = window.innerWidth;

      if (larguraTela <= larguraMinima) {
        // Remover a div da divOrigem
        divOrigem.remove();

        // Adicionar a div removida à divDestino
        divDestino.insertAdjacentElement('afterbegin',divOrigem) ;
      }
    }

    // Chamar a função no carregamento inicial da página
    window.addEventListener('load', verificarDimensaoTela);

    // Chamar a função quando a janela for redimensionada
    window.addEventListener('resize', verificarDimensaoTela)

</script>
<script src="javascript/nav.js"></script>
<script src="javascript/selectChar.js" defer></script>


</html>