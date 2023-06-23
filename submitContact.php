<?php
    // Incluindo a ligação com o banco de dados
    include_once("connect.php");

    //Variáveis do formulário
    $nome = $_SESSION['id'];
    $email = $resultEmail;
    $assunto = $_POST['subject'];
    $mensagem = $_POST['message'];

    $sql = "INSERT INTO contato(nome, email, assunto, mensagem) VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    if (mysqli_query($conexao, $sql)) {
    // Envio bem-sucedido
    // echo "OK";
        header('Location: contact.php');
    } else {
    echo "Erro ao enviar mensagem."; // Envio com erro
    // echo "Erro" . mysqli_connect_error($conexao); // opcional: exibir detalhes do erro
    }
    mysqli_close($conexao);
?>