<?php

    //Iniciando seção caso ainda não tenha sido iniciada
    if(!isset($_SESSION)) {
        // Seção iniciada
        session_start();
    }
    
    include_once('connect.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        // Não está logado
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

        // Destroi a sessão
        session_destroy();

        // Volta ao Login
        header('Location: index.php');
    }

    // Verifica se o botão de sair foi clicado
    if (isset($_POST['sair'])) {
        // Remove todas as variáveis de sessão
        session_unset();
        
        // Destroi a sessão
        session_destroy();
        
        // Redireciona para a página de login
        header('Location: index.php');
        exit();
    }

    // ESTE TRECHO IRÁ ENCERRAR A SEÇÃO AO FECHAR A PÁGINA CASO O USUÁRIO NÃO ESCOLHA SE MANTER LOGADO POR 7 DIAS
    // MAS, APARENTEMENTE NÃO FUNCIONA NO XAMPP

    // Verifica se o usuário optou por permanecer logado por 7 dias
    if (!isset($_SESSION['manter_logado']) || $_SESSION['manter_logado'] !== true) {
        // Verifica se o cookie de sessão está presente
        if (!isset($_COOKIE[session_name()])) {
            // Remove todas as variáveis de sessão
            session_unset();
            
            // Destroi a sessão
            session_destroy();
            
            // Redireciona para a página de login ou qualquer outra página desejada
            header('Location: login.php');
            exit();
        }
    }

    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM cadastro WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM cadastro ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
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
