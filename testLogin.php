<?php

    // Iniciando sessão caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        session_start();
    }

    // Verificação de Login
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) { // Acessa através do método POST
        // Incluindo o arquivo connect.php
        include_once('connect.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta do email
        $sqlEmail = "SELECT * FROM users WHERE email = '$email'";
        $resultEmail = mysqli_query($conexao, $sqlEmail);

        if (mysqli_num_rows($resultEmail) > 0) { // Verifica se o email está cadastrado

            // Consulta do email e senha
            $sql = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
            $result = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($result) > 0) { // Email e senha corretos
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                // header('Location: system.php');
                $row = mysqli_fetch_assoc($result);
                header("Location: system.php?user_id=". $row['id']);

            } else { // Email e/ou senha incorretos
                echo "<script>alert('E-mail ou senha incorretos!')</script>";
                echo "<script>window.location.href = 'index.html';</script>";
            }

        } else { // Email inserido não cadastrado
            echo "<script>alert('E-mail não cadastrado!')</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        }

        mysqli_close($conexao); // Fechando a conexão
    }

    else if (!isset($_POST['submit'])) { // Tentativa de acesso sem ser pelo método POST
        // Tentativa de acesso via URL, vai para a página de acesso negado
        header('Location: denied.html');

    } else { // Campos vazios
        echo "<script>alert('Preencha seus dados!')</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    }

?>
