<?php

    // Incluindo o arquivo connect.php
    include("connect.php");

    // Linkando com o banco de dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparando a consulta SQL com uma declaração preparada
    $sql = "INSERT INTO cadastro(nome, email, senha) VALUES (?, ?, ?)";

    // Preparando a declaração
    $stmt = mysqli_prepare($conexao, $sql);

    // Verificando se a preparação foi bem-sucedida
    if ($stmt) {
        // Binde dos parâmetros da declaração preparada
        mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $senha);

        // Execução da declaração preparada
        if(mysqli_stmt_execute($stmt)) {
            // Cadastro efetuado com sucesso
            header('Location: index.html');
        } else {
            // Cadastro não efetuado
            echo "Erro ao cadastrar no banco de dados " . mysqli_stmt_error($stmt);
        }

        // Fechando a declaração preparada
        mysqli_stmt_close($stmt);
    } else {
        // Erro ao preparar a declaração
        echo "Erro na preparação da consulta SQL " . mysqli_error($conexao);
    }

    // Fim da conexão
    mysqli_close($conexao);

?>