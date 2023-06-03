<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
        // pega o id do usuário atravez do metodo get
        $user_id = $_GET['user_id'];
        $trilha = $_GET['trilha'];
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
<html>
    <head>
        <title></title>
        <style>
            body{
                background-color: #010133; 
            }
            nav{
                display: grid;
                grid-template-columns: 9% 80% 9%;
                align-items: center;
            }
            .bt_voltar{
                grid-column: 1;
                height: 50px;
            }
            .barra_progresso{
                grid-column: 2;
                margin: 10px;
                border-radius: 50px;
                width: 1%;
                height: 50px;
                background-color: #000099;
            }
            .bt_sair{
                grid-column: 3;
                height: 50px;
            }
            
        </style>
    </head>
    <body>
        <nav>
            <button class=bt_voltar>Voltar</button>
            <div class="barra_progresso"></div>
            <button class="bt_sair">sair</button>
        </nav>

        <h1><?php echo $trilha ?></h1>
        <?php
            // pesquisando o nome dos temas
            $pesquisa_temas = "SELECT nome FROM temas";
            $resultado_pesquisa_temas = mysqli_query($conexao, $pesquisa_temas);
            // pesuquisando o nome dos cursos
            $pesquisa_cursos = "SELECT * FROM cursos";
            $resultado_pesquisa_cursos = mysqli_query($conexao, $pesquisa_cursos);

            // Verifica se a consulta retornou resultados para TEMAS
            if (mysqli_num_rows($resultado_pesquisa_temas) > 0) {
                
                // Loop para percorrer os resultados e exibir As trilhas em divs
                while ($row = $resultado_pesquisa_temas->fetch_assoc()) {
                    // conta tipo o id do tema 
                    $contador = 1;
                    $nome = $row["nome"];

                    // exibição do tema
                    echo "<div class='tema_conteiner'>";
                    echo "<h3 class='trilhas_nome'>" . $nome . "</h3>";


                    // lista suspença de cursos
                    echo "<div class='cursos_conteiner'>";

                    //filtra os cursos pro tema
                    $pesquisa_filtrar_cursos = "SELECT * FROM CURSOS WHERE tema_id = $contador";
                    $resultado_filtrar_cursos = mysqli_query($conexao, $pesquisa_filtrar_cursos);
                            
                    //verifica se retornou resultador dos cursos
                    if (mysqli_num_rows($resultado_filtrar_cursos) > 0) {
                    // loop para listar os cursos
                            
                        while ($row_curso = $resultado_filtrar_cursos->fetch_assoc()) {
                               
                            // captura os dados
                            $nome_curso = $row_curso['nome'];
                            $curso_link = $row_curso['link'];
                            // exibição
                            echo "<ul>";
                            echo "<a href='".$curso_link."'><li>".$row_curso['tema_id']."</li></a>";
                            echo "</ul>";
                        }
                    }else{
                        echo '<script>alert("Nenhum curso encontrado");</script>';
                    }
                    echo "</div>";
                    echo "</div>";
                    $contador++;
                }
            } else {
                echo '<script>alert("Nenhuma trilha encontrada");</script>';
            }

        ?>
        <script type="text/javascript" src="javascript\system.js"></script>
    </body>
</html>