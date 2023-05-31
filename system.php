<?php

    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>devway</title>
</head>
<body>
    <h1>Acessou o Sistema</h1>
    <!-- Formulário com o botão de sair -->
    <form method="post" action="">
        <input type="submit" name="sair" value="Sair">
    </form>
</body>
</html>
