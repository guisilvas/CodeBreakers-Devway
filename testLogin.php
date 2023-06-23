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
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conexao, $sql);

        // Consulta do nome
        $sqlName = "SELECT nome FROM users WHERE email = '$email'";
        $resultName = mysqli_query($conexao, $sql);
        if (mysqli_num_rows($resultName) > 0) {
            $_SESSION['nome'] = $row['nome'];
        }

        if (mysqli_num_rows($result) > 0) { // Verifica se o email está cadastrado
            $row = mysqli_fetch_assoc($result);
            $hash = $row['senha']; // Obtém a senha criptografada do banco de dados

            // Verifica se a senha digitada corresponde à senha criptografada
            if (password_verify($senha, $hash)) {
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $row['id'];
                header("Location: system.php");
                // header("Location: system.php?user_id=". $row['id']);
            } else {
                // Senha incorreta
                echo "<script>alert('E-mail ou senha incorretos!')</script>";
                echo "<script>window.location.href = 'index.html';</script>";
            }
        } else {
            // Email não cadastrado
            echo "<script>alert('E-mail não cadastrado!')</script>";
            echo "<script>window.location.href = 'index.html';</script>";
        }

        mysqli_close($conexao); // Fechando a conexão
    } else if (!isset($_POST['submit'])) { // Tentativa de acesso sem ser pelo método POST
        // Tentativa de acesso via URL, vai para a página de acesso negado
        header('Location: denied.html');
    } else {
        // Campos vazios
        echo "<script>alert('Preencha seus dados!')</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    }

?>
