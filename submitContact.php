<?php
    //Iniciando seção caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        // Seção iniciada
        session_start();
    }
    // Incluindo a ligação com o banco de dados e login
    include_once("connect.php");
    include_once("testLogin.php");

    //Variáveis do formulário
    $id_user = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $assunto = $_POST['subject'];
    $mensagem = $_POST['message'];

    $sql = "INSERT INTO contato(id_user, nome, email, assunto, mensagem) VALUES ('$id_user', '$nome', '$email', '$assunto', '$mensagem')";

    if (mysqli_query($conexao, $sql)) {
    // Envio bem-sucedido
        echo "<script>alert('Enviado com sucesso!')</script>";
        header('Location: contact.php');
    } else {
    echo "Erro ao enviar mensagem."; // Envio com erro
    // echo "Erro" . mysqli_connect_error($conexao); // opcional: exibir detalhes do erro
    }
    mysqli_close($conexao);
?>