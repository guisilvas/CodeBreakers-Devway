<?php
//Iniciando seção caso ainda não tenha sido iniciada
if (!isset($_SESSION)) {
    // Seção iniciada
    session_start();
}
// Verifica se o campo 'campo' e 'id_curso' foram enviados por POST
if (isset($_POST['campo']) && isset($_POST['id_curso'])) {
    $valor = $_POST['campo'];
    $idCurso = $_POST['id_curso'];
    $idUser = $_SESSION['id'];
    // Conecte-se ao banco de dados
    include_once('connect.php');
    

    // olha de esse dado já esta na tabela, se estiver significa que o usuário já concluiu
    $sql_curso_especifico = "SELECT * FROM usuariocurso WHERE curso_id = '$idCurso' AND user_id = '$idUser'";
    $resultado_curso_especifico = mysqli_query($conexao, $sql_curso_especifico);

    // se o usuário já tiver concluido e desmarcar a caixa, o dado será escluido da tabela 
    if (mysqli_num_rows($resultado_curso_especifico) > 0) {
        // Usuário já concluio o curso
        $sql_curso_existente = "DELETE FROM usuariocurso WHERE curso_id = '$idCurso' AND user_id = '$idUser'";
        $resultado_curso_existente = mysqli_query($conexao, $sql_curso_existente);
        if ($resultado_curso_especifico) {
            echo "Curso deletado";
        } 
        
    }else{
        // senão ele será cadastrado 
        $sql = " INSERT INTO usuariocurso (user_id, curso_id, finish) VALUES ('$idUser', '$idCurso', '$valor');";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "Campo atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar campo: " . mysqli_error($conexao);
        }
    }

    

} else {
    echo "Campo não foi enviado";
}

?>
