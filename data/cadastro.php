<?php
    include("conect.php");


    /*linkando com o banco de dados*/
    $nome=$_POST['nome'];
    $emai=$_POST['email'];
    $senha=$_POST['senha'];

    $sql="INSERT INTO cadastro(nome, email, senha) 
        VALUES ('$nome', '$email', '$senha')";
    if(mysqli_query(new mysqli, $sql)){
        echo "Usuário cadastrado com sucesso";
    }
    else{
        echo"Erro ao cadastrar no banco de dados".mysqli_connect_error(new mysqli);
    }
    mysqli_close(new mysqli);
?>