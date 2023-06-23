<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
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
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/style_contact.css">
        <title>Dev Way - Contate-nos</title>
    </head>
    <body>
        <header>
            <nav class="navbar">
            
                <a href="system.php"></a>
                
            </nav>
        </header>
        <div class="cotainer">
            <div class="pergaminho">
                <h1>Contate-nos</h1>
                <form action="submitContact.php" method="POST" class="form">
                    <!--
                    <div class="box">
                        <input type="text" name="name" placeholder="Nome" class="input" required>
                    </div>
                    <div class="box">
                        <input type="email" name="email" placeholder="Email" class="input" required>
                    </div> -->
                    <div class="box">
                        <input type="text" name="subject" placeholder="Assunto" class="input" required>
                    </div>
                    <div class="box">
                        <input type="text" name="message" placeholder="Mensagem" class="input" required>
                    </div>
                    <div class="box">
                        <button id="button" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="javascript/system.js"></script>
    </body>
</html>

