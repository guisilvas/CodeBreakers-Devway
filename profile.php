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
    $pesquisa_usuario = "SELECT * FROM users WHERE id = '$id_user'";
    $resultado_pesquisa_usuario = mysqli_query($conexao, $pesquisa_usuario);
    $row_pesquisa_usuario = mysqli_fetch_assoc($resultado_pesquisa_usuario);

    $foto_perfil= $row_pesquisa_usuario['foto_perfil'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\style_profile.css">
    <title>Document</title>
</head>
<style>
.trocar_img{
    width:50px;
    height:50px;
}
.buttomperfil{
    display:block;
    position: absolute;
    right: 10px;
    top: 10px;
    cursor:pointer;
   
}
</style>

<body onload="ajustarTamanhoFonte()">
    <header>
        <nav class="navbar">
           
            <a href="system.php"></a>
            
        </nav>
    </header>


    <div class="grid-container"id="grid-container!">
        <div class="grid-item">
            <div class="img_profile1">
                <?php 
                    if (isset($_GET['image'])) {
                        $newImageUrl = $_GET['image'];
                        echo "<img id=\"img_profile\" class=\"aa\" src=".$newImageUrl." alt=\"Perfil\">";
                        echo "<a href=\"select_character.html\"><img class=\"trocar_img\" src=\"assets/botaotp.png\"></a>";
                        // Atualizar a imagem de perfil do usuário com a nova URL ($newImageUrl)
                        // ... (código para atualizar a imagem de perfil no banco de dados ou onde quer que esteja armazenada)
                        $update_image = "UPDATE users SET foto_perfil = '$newImageUrl' WHERE id = '$id_user'";
                        $resultado_update_image = mysqli_query($conexao, $update_image);
                        if ($resultado_update_image){
                            echo "<script>alert('foto de perfil atualizada');</script>";
                        }else{
                            echo "<script>alert('Erro para atualizar a foto de perfil');</script>";
                        }
                    }else{
                        echo "<img id=\"img_profile\" class=\"aa\" src=".$foto_perfil." alt=\"Perfil\">";
                        echo "<a href=\"select_character.html\" class=\"buttomperfil\"><img class=\"trocar_img\" src=\"assets/botaotp.png\"></a>";
                    }
                ?>
                <!-- <img src="assets\characters\defaultCharacter.png" class="aa" id="img_profile"></div>
                <a href="select_character.html"class="buttomperfil">
                    <img class="trocar_img" src="assets/botaotp.png">
                </a> -->
            </div>
        <div class="grid-item">
            <div class="title_profile" id="title">
                <h2 class="text">Perfil</h2></div>
                <div class="form_profile">
                   <!-- <form  class="form"> -->
                    <input id="inputbloq1" type="text" name="Usuario" value="<?php echo $row_pesquisa_usuario['nome'];?>"
                    oninput="ajustarTamanhoFonte(this)">
                    <input id="inputbloq2" type="text" name="E-mail" value="<?php echo $row_pesquisa_usuario['email'];?>"
                    oninput="ajustarTamanhoFonte(this)">
                   <!-- </form> -->
                </div>
            </div>
        </div>
     
    </div>
</body>
<script>
    //bloqueando os inputs para o usuário
    var inputElement1 = document.getElementById("inputbloq1");
    inputElement1.disabled = true;

    var inputElement2 = document.getElementById("inputbloq2");
    inputElement2.disabled = true;


    //ajustando o tamanho da fonte com base no comprimento do texto inserido no input
    
    
  
  function ajustarTamanhoFonte() {
    var tamanhoInicial = 24;   // Tamanho inicial da fonte
    var tamanhoMinimo = 12;    // Tamanho mínimo da fonte
    var fatorReducao = 1.5;    // Fator de redução da fonte

    // Obtém as referências para os elementos de input
    var inputElement1 = document.getElementById("inputbloq1");
    var inputElement2 = document.getElementById("inputbloq2");

    // Obtém o tamanho do texto do input 1
    var tamanhoTexto1 = inputElement1.value.length;

    // Calcula o novo tamanho da fonte para o input 1
    var novoTamanhoFonte1 = tamanhoInicial - (tamanhoTexto1 * fatorReducao);

    // Limita o tamanho da fonte do input 1 ao tamanho mínimo
    novoTamanhoFonte1 = Math.max(novoTamanhoFonte1, tamanhoMinimo);

    // Obtém o tamanho do texto do input 2
    var tamanhoTexto2 = inputElement2.value.length;

    // Calcula o novo tamanho da fonte para o input 2
    var novoTamanhoFonte2 = tamanhoInicial - (tamanhoTexto2 * fatorReducao);

    // Limita o tamanho da fonte do input 2 ao tamanho mínimo
    novoTamanhoFonte2 = Math.max(novoTamanhoFonte2, tamanhoMinimo);

    // Aplica os novos tamanhos de fonte aos inputs
    inputElement1.style.fontSize = novoTamanhoFonte1 + "px";
    inputElement2.style.fontSize = novoTamanhoFonte2 + "px";
   }

    // Tamanho mínimo para adicionar a nova classe
    let tamanhoMinimo = 500; // Por exemplo, 500 pixels de largura

    // Verificar o tamanho da tela e adicionar a nova classe
    function adicionarNovaClasse() {
    let larguraTela = window.innerWidth;
    let elemento = document.getElementById('grid-container!'); // Substitua 'seu-elemento' pelo ID do seu elemento HTML

    if (larguraTela <= tamanhoMinimo) {
        elemento.classList.add('novocontainer');
        elemento.classList.remove('grid-container');
    } else {
        elemento.classList.remove('novocontainer');
        elemento.classList.add('grid-container');
    }
    }

    // Chamar a função quando a janela for redimensionada
    window.addEventListener('resize', adicionarNovaClasse);

    // Chamar a função no carregamento inicial da página
    window.addEventListener('load', adicionarNovaClasse);

     // Obter as referências das divs
    var divOrigem = document.getElementById('title');
    var divDestino = document.getElementById('grid-container!');

    // Dimensão mínima da tela para a realocação
    var larguraMinima = 500; // Por exemplo, 768 pixels

    // Função para verificar a dimensão da tela e realocar a div
    function verificarDimensaoTela() {
      var larguraTela = window.innerWidth;

      if (larguraTela <= larguraMinima) {
        // Remover a div da divOrigem
        divOrigem.remove();

        // Adicionar a div removida à divDestino
        divDestino.insertAdjacentElement('afterbegin',divOrigem) ;
      }
    }

    // Chamar a função no carregamento inicial da página
    window.addEventListener('load', verificarDimensaoTela);

    // Chamar a função quando a janela for redimensionada
    window.addEventListener('resize', verificarDimensaoTela)

</script>

<script src="javascript/selectChar.js" defer></script>


</html>