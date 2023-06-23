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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navteste</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        body{
            font-family: 'Press Start 2P', cursive;
            background: linear-gradient(180deg, #0E1947 -3.65%, rgba(32, 6, 58, 0.71) 96.35%);
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-attachment: fixed;
            margin:0px;
        }

        .navbar{
            width: 100%;
            height: 8vh;
            background-color: white;   
            display: flex;
            flex-direction: row;
            align-items: center;
            position: fixed;
            z-index: 1;
            background-image: url('assets/tronconav.png');
            background-repeat: repeat-x;
            background-size:auto 100%;
            background-position: center top;
        }

        .btnmenu{
            cursor:pointer;
            position:absolute;
            right: 2rem;
            height: 5vh;
            width: 7vw;
            background-image: url('assets/button_action.png');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            color:white;
            text-shadow: 2px 2px 2px gray;
            font-family: 'Press Start 2P', cursive;
            border:none;
            
        }

        .menu1{
            display: block;
            justify-content: center;
            height: 100vh;
            width: 0vw;
            z-index: 1;
            position: fixed;
            right:0rem;
            top: 8vh;
            transition: width 0.5s ease; /* Adicionado: Transição de altura com duração de 0.5s e função ease */
            transition-delay: 1s;
            overflow: hidden; /* Adicionado: Para esconder o conteúdo quando o menu está fechado */
            background-image: url('assets/fundo-pergaminho.png');
          
        }
        .menu2{
            height:100%;
            width:100%;
            opacity: 0;
        }

        .img_profile1 {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .aa {
            /*width: 100%;*/
            height: 90%;     
        
        }

        .linksmenu,.menup{
            height: 10%;
            width: 100%;
            display:flex;
            justify-content: center; 
            align-items: center;
            border-bottom: 10px;
            border-bottom-color:black;
        }



        .linksmenu a{
            color:black;
            font-size: 130%;
            text-decoration: none;
        }

        .nomeinput {
            text-align: center;
            background-color: transparent;
            border: none;
            color: black;
            font-style: bold;
            font-size: 100%;
            height: 50%;
            width: 60%;
            font-family: 'Press Start 2P', cursive;
        }

        .bn input{
            cursor:pointer;
            position:absolute;
            right: 2rem;
            height: 5vh;
            width: 7vw;
            background-image: url('assets/button_action.png');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            color:white;
            text-shadow: 2px 2px 2px gray;
            font-family: 'Press Start 2P', cursive;
            border:none;
        }

        
        @media screen and (max-width: 1024px){

            .btnmenu{
                font-size: 10px;
                height: 4vh;
            }
            .bn input{
                font-size: 10px;
                height: 4vh;
            }
            .nomeinput{
                font-size:80%;
            }
            .aa{
                height: 70%;
            }
            .linksmenu{
                height: 7%;

            }
            .linksmenu a{
                font-size:80%
            }
        }
        @media screen and (max-width: 820px){
            .bn{
                display: flex;
                justify-content: center;
            }
            .bn input{
                position: initial;
            }
            .btnmenu{
                height:3vh;
                font-size: 7px;

            }
            .bn input{
                height:3vh;
                font-size: 7px;
            }
            .menup{
                height: 30%;
            }
            .menup input{
                display:none;
            }
            .linksmenu a{
                font-size: 60%;
            }
        }

        @media screen and (max-width: 425px){
            .btnmenu{
                height: 80%;
                font-size: 15px;
                width: 20vw;
            }
            .bn input{
                font-size: 15px;
                height: 50px;
                width: 20vw;
            }
            .linksmenu{
                height: 8%;
            }
            .linksmenu a{
                font-size: 150%
            }
        }
            
        
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <button class="btnmenu" onclick="abrirmenu()" id="btnmenu">MENU</button>
        </nav>
        <div class="menu1" id="menu1">
            <div class="menu2" id="menu2">
                <div class="menup">
                    <?php 
                            if (isset($_GET['image'])) {
                                $newImageUrl = $_GET['image'];
                                $newImageIconUrl = $_GET['image_icon'];
                                echo "<img id=\"img_profile\" class=\"aa\" src=\"" . $newImageUrl . "\" alt=\"Perfil\">";
                                // Atualizar a imagem de perfil do usuário com a nova URL ($newImageUrl)
                                // ... (código para atualizar a imagem de perfil no banco de dados ou onde quer que esteja armazenada)
                                $update_image = "UPDATE users SET foto_perfil = '$newImageUrl', foto_perfil_icon = '$newImageIconUrl' WHERE id = '$id_user'";
                                $resultado_update_image = mysqli_query($conexao, $update_image);
                                if ($resultado_update_image){
                                    echo "<script>alert('Foto atualizada');</script>";
                                }else{
                                    echo "<script>alert('Erro para atualizar a foto de perfil');</script>";
                                }
                            }else{
                                echo "<img id=\"img_profile\" class=\"aa\" src=".$foto_perfil." alt=\"Perfil\">";
                                
                            }
                        ?>
                    <input id="inputbloq1" type="text" name="Usuario" value="<?php echo $row_pesquisa_usuario['nome'];?>" class="nomeinput">
                </div>
                <div class="linksmenu">
                    <a href="system_trilha1.php">Front-end</a>
                </div>
                <div class="linksmenu">
                    <a href="system_trilha2.php">Back-end</a>
                </div>
                <div class="linksmenu">
                    <a href="system_trilha3.php">Git e Github</a>
                </div>
                <div class="linksmenu">
                    <a href="system_trilha4.php">Banco de Dados</a>
                </div>
                <div class="linksmenu">
                    <a href="#">Contato</a>
                </div>
                <div class="linksmenu">
                    <a href="#">Sobre Nós</a>
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
    <script>

        var inputElement1 = document.getElementById("inputbloq1");
        inputElement1.disabled = true;

        var parentDiv = document.getElementById("menu1");
        var childDiv = document.getElementById("menu2");
        var toggle = false;

        

        function abrirmenu() {
        if (toggle) {
            parentDiv.style.transition = "width 1s ease";
            childDiv.style.transition = "opacity 0.5s cubic-bezier(1, 0, 1, 0)";
            parentDiv.style.transitionDelay = "1s";
            childDiv.style.transitionDelay = "0s";
            parentDiv.style.width = "0vw";
            childDiv.style.opacity = "0";
        } else {
            parentDiv.style.transition = "width 1s ease";
            childDiv.style.transition = "opacity 0.5s cubic-bezier(1, 0, 1, 0)";
            parentDiv.style.transitionDelay = "0s";
            childDiv.style.transitionDelay = "1s";
            childDiv.style.opacity = "1";
            if (window.innerWidth <= 425) {
                parentDiv.style.width = "100vw";
            } else {
                parentDiv.style.width = "25vw";
            }
               
        }
        

        toggle = !toggle;
    }

    </script>                       
   
    
</body>
</html>
