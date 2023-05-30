<?php

    //Iniciando seção caso ainda não tenha sido iniciada
    if(!isset($_SESSION)) {
        // Seção iniciada
        session_start();
    }

    // Verificação de Login

    // Acessa
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        include_once('connect.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Preparar a consulta SQL com uma declaração preparada
        $sql = "SELECT * FROM cadastro WHERE email = ? AND senha = ?";
        $stmt = mysqli_prepare($conexao, $sql);

        // Verificar se a preparação foi bem-sucedida
        if ($stmt) {
            // Binde dos parâmetros da declaração preparada
            mysqli_stmt_bind_param($stmt, 'ss', $email, $senha);

            // Execução da declaração preparada
            mysqli_stmt_execute($stmt);

            // Armazenar o resultado
            $result = mysqli_stmt_get_result($stmt);

            // Verificar se o usuário existe
            if(mysqli_num_rows($result) < 1) {
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: index.php');
            } else {

                // Se funcionar no 000Webhost
                // Verifica se a opção de "manter logado" foi selecionada
                if (isset($_POST['manter_logado']) && $_POST['manter_logado'] == 'on') {
                    // Define o tempo de expiração da sessão para 7 dias (em segundos)
                    $expiracao = 7 * 24 * 60 * 60;
                    ini_set('session.gc_maxlifetime', $expiracao);
                    $_SESSION['manter_logado'] = true;
                    setcookie(session_name(), session_id(), time() + $expiracao);
                }

                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                header('Location: system.php');
            }

            // Fechando a declaração preparada
            mysqli_stmt_close($stmt);
        } else {
            // Erro ao preparar a declaração
            echo "Erro na preparação da consulta SQL" . mysqli_error($conexao);
        }
    } else {
        header('Location: login.php');
    }

?>