<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'devway';

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($mysqli->connect_errno) {
        echo "Erro ao conectar com o banco de dados.";
    } else {
        echo "Conexão com o banco de dados bem sucedida.";
    }


    /*"$conexao=mysqli_connect($dbhost, $dbUsername, $dbPassword, $dbName);
    if(!$conexao){
        die("Houve um erro: ".mysqli_connect_error());
    }"*/


?>