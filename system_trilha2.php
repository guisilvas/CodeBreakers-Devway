<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
        $_SESSION["idTrilha"] = 2;
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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/navbar.css"> 
    <link rel="stylesheet" href="assets/style_trilhas.css">
    <title>Dev Way - Trilha</title>
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
                    <a href="system.php">Trilhas</a>
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
    
    <div class="content">
        <?php
            $nomeTrilha = $_GET["trilha"];
            $progressTrilha = 0;
            echo "<h1 class='titleTrilha'>" . $nomeTrilha . ":" .  "</h1>";
            // pesquisando o nome dos temas
            $pesquisa_temas = "SELECT * FROM temas  WHERE trilha_id = $_SESSION[idTrilha]";
            $resultado_pesquisa_temas = mysqli_query($conexao, $pesquisa_temas);

            // Verifica se a consulta retornou resultados para TEMAS
            if (mysqli_num_rows($resultado_pesquisa_temas) > 0) {
                // conta tipo o id do tema 
                $contador = 1;
                $contTemas = 0;
                // Loop para percorrer os resultados e exibir os temas em divs
                while ($row = $resultado_pesquisa_temas->fetch_assoc()) {
                    $idTema = $row["id"];
                    $nome = $row["nome"];
                    
                    // exibição do tema
                    echo "<div class='tema_conteiner_principal'>";
                    echo "<div class='tema_nome'>" . $nome ;
                    echo "<button class='seta_tema' id='seta_".$idTema."' name='bt_brir_cursos' onclick='abrir_cursos(\"tema_".$idTema."\", \"seta_".$idTema."\")'><img src='assets\icons\seta.png'></button>";
                    echo "</div>";
                    echo "<div class='tema_conteiner' id='tema_".$idTema."' style='display: none;'>";
                    echo "<div class=\"fundo\">";
                    echo "<img src=\"assets/pergaminho_margem_top.png\" class=\"bordertop\">";
                    echo "<div class= \"cursos_tema\">";
                   
                    //filtra os cursos pro tema
                    $pesquisa_filtrar_cursos = "SELECT * FROM cursos WHERE tema_id = $idTema";
                    $resultado_filtrar_cursos = mysqli_query($conexao, $pesquisa_filtrar_cursos);

                    //verifica se retornou resultador dos cursos
                    if (mysqli_num_rows($resultado_filtrar_cursos) > 0) {
                    // loop para listar os cursos
                        // Controle do numero de cursos(Cursos marcados)
                        $contadorCursos = 0;
                        // Controle do progresso
                        $controlProgresso = 0;
                        while ($row_curso = $resultado_filtrar_cursos->fetch_assoc()) {
                            // captura os dados
                            $curso_nome = $row_curso['nome'];
                            $curso_link = $row_curso['link'];
                            $cursoTemaId = $row_curso['tema_id'];
                            $idCurso = $row_curso['id'];
                            $id_user = $_SESSION['id'];

                            // Pesquisa curso e usuário, se retornar quer dizer que o curso já está concluido
                            $sql_curso_especifico = "SELECT * FROM usuariocurso WHERE curso_id = '$idCurso' AND user_id = '$id_user'";
                            $resultado_curso_especifico = mysqli_query($conexao, $sql_curso_especifico);
                            
                            
                            // exibição
                            echo "<div class='courseList'>";
                            // se retornar já está concluido ent a caixa tem que estar marcada 
                            if (mysqli_num_rows($resultado_curso_especifico) > 0){
                                echo "<input type='checkbox' name='curso' data-curso-id='$idCurso' checked>";
                                echo "<a class=nome_curso href=" . $curso_link . " for='curso' target=\"\_blank\"\">" . $curso_nome ."</a>";
                                // Adiciona 1 ao progresso a cada curso marcado
                                $controlProgresso++;
                            }else{
                                // se não, ainda não foi concluido e podemos carca-la 
                                echo "<input type='checkbox' name='curso' data-curso-id='$idCurso'>";
                                echo "<a class=nome_curso href=" . $curso_link . " for='curso' target=\"\_blank\"\">" . $curso_nome ."</a>";
                                $chave = false;
                            }
                            echo "</div>";
                            $contadorCursos++;
                        }
                    } else {
                        echo '<script>alert("Nenhum curso encontrado");</script>';
                    }
                    echo "</div>";
                    echo "<img src=\"assets/pergaminho_margem_bottom.png\" class=\"borderbottom\"></div>";
                    // fecha a div do tema
                    echo "</div>";
                    // soma +1 no tema para calcular o próximo 
                    $contador++;
                    
                    $progresso = ($controlProgresso * 100) / $contadorCursos;
                    // Progresso do tema
                    // echo "<h3 class=\"trilhas_nome\"> Progresso: " . $progresso ."%</h3>";
                    echo "<progress class=\"progress_bar\" id=\"progress_bar\" value=\"" . $progresso . "\" max=\"100\"> </progress>";
                    echo "</div>";
                    $contTemas += $progresso ;
                }
            } else {
                echo '<script>alert("Nenhuma trilha encontrada");</script>';
            }
            $progressTrilha += (($contTemas / (($contador - 1) * 100)) * 100);
            // print_r($progressTrilha);
            
            $sqlprogress = "UPDATE usuariotrilha SET progress = round('$progressTrilha', 1) WHERE user_id = '$_SESSION[id]' and trilha_id = $_SESSION[idTrilha]";
            $resultado_progress = mysqli_query($conexao, $sqlprogress);
            echo "<div class=\"progress-all-trail\">";
                $resultadoProgress = "SELECT progress FROM usuariotrilha WHERE user_id = '$_SESSION[id]'and trilha_id = '$_SESSION[idTrilha]' ";
                $consulta = mysqli_query($conexao, $resultadoProgress);
                $row = $consulta->fetch_assoc();
                $progressoT = $row["progress"];
                echo "Progresso Total:  $progressoT%";
                
            echo "</div>"
            ?>
    </div>
    <script src="javascript/system.js"></script>
    <script src="javascript/nav.js"></script>
</body>
</html>
