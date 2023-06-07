<?php
// Verifica se o campo 'campo' e 'id_curso' foram enviados por POST
if (isset($_POST['campo']) && isset($_POST['id_curso'])) {
    $valor = $_POST['campo'];
    $idCurso = $_POST['id_curso'];
    $idUser = $_SESSION['id'];
    $idTrilha = $_SESSION["idTrilha"];
    // Conecte-se ao banco de dados
    include_once('connect.php');
    
    // Atualize o campo no banco de dados apenas para o curso com o ID correspondente
    // Aqui você precisa substituir 'tabela' e 'campo' pelos nomes corretos da sua tabela e campo no banco de dados
    $sql = " UPDATE cursos SET finish = $valor WHERE id IN (SELECT id FROM cursos
        JOIN temas ON cursos.tema_id = temas.id
        JOIN usuarioTrilha ON temas.trilha_id = usuarioTrilha.trilha_id
        WHERE usuarioTrilha.user_id = $idUser
        AND usuarioTrilha.trilha_id = $idTrilha
    )";
    $resultado = mysqli_query($conexao, $sql);
    
    if ($resultado) {
        echo "Campo atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar campo: " . mysqli_error($conexao);
    }
} else {
    echo "Campo não foi enviado";
}
?>
