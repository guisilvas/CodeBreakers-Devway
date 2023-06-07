<?php
    // Iniciando sessão caso ainda não tenha sido iniciada
    if (!isset($_SESSION)) {
        session_start();
    }
    // Incluindo o arquivo connect.php
    include_once('connect.php');

    //pegando a variável de seção 
    $id_user = $_SESSION['id'];


    // pesquisando no banco 
    $pesquisa_usuario = "SELECT "
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style_profile.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar">
           
            <a href="system.php"></a>
            
        </nav>
    </header>


    <div class="grid-container">
        <div class="grid-item">
            <div class="img_profile1"><a href="-----"><img src="/assets/characters/defaultCharacter.png" class="aa"></a></div>
        </div>
        <div class="grid-item">
            <div class="title_profile">
                <h2 class="text">Perfil</h2></div>
                <div class="form_profile">
                   <!-- <form  class="form"> -->
                    <input type="text" name="Usuario">
                    <input type="text" name="E-mail">
                   <!-- </form> -->
                </div>
            </div>
        </div>
     
      </div>




</body>
</html>