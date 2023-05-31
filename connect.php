<?php

    // Conectando ao banco
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'devway';

    // Passando os parâmetros para conectar ao banco
    $conexao = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if(!$conexao) {
        // Conexão não estabelecida e cancelada
        die("Houve um erro: ". mysqli_connect_error());

    } else {
        // Conxão estabelecida, não precisa ser mostrado
        // echo "Conexão com banco de dados efetuada com sucesso!";
    }

?>
