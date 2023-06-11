<?php

    // Incluindo o arquivo connect.php
    include("connect.php");

    // Verifica se os dados foram passados via método POST e se todos estão preenchidos
    if (isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        // Linkando com o banco de dados
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


        // Verifica se o e-mail já está cadastrado
        $consulta = "SELECT COUNT(*) FROM users WHERE email = '$email'";
        $resultado = mysqli_query($conexao, $consulta);
        $count = mysqli_fetch_array($resultado)[0];

        // Verificar se o e-mail já existe
        if ($count > 0) { // Se existir surge um alert e retorna à página inicial
            echo "<script>alert('Este e-mail já foi utilizado!')</script>";
            echo "<script>window.location.href = 'index.html';</script>";

        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Verificar se o email possui um formato válido
            echo "<script>alert('O e-mail digitado é inválido!')</script>";
            echo "<script>window.location.href = 'index.html';</script>";

        } else { // Preparando a consulta SQL
            $sql = "INSERT INTO users (nome, email, senha, foto_perfil) VALUES ('$nome', '$email', '$senha', 'assets/characters/defaultCharacter.png')";

            // Execução da consulta
            if (mysqli_query($conexao, $sql)) { // Cadastro efetuado com sucesso
                echo "<script>alert('Cadastro realizado com sucesso!')</script>";
                echo "<script>window.location.href = 'index.html';</script>";

            } else { // Cadastro não efetuado
                echo "Erro ao cadastrar no banco de dados " . mysqli_error($conexao);
            }
        }

    // Acesso pelo método POST
    } else if (isset($_POST['submit']) && (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']))) { // Campos vazios
        echo "<script>alert('Preecha todos os campos.')</script>";
        echo "<script>window.location.href = 'index.html';</script>";

    } else { // Tentativa de acesso via URL
        header('Location: denied.html');
      }

    // Fim da conexão
    mysqli_close($conexao);

?>
