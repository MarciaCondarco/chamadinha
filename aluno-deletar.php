<?php

echo'<h1>Aluno deletar</h1>';

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

// variavel global começa $_
// var_dump($_GET);

$idFormulario = $_GET['id'];

// apagando a tabela tb_alunos
$delete = 'DELETE FROM tb_alunos WHERE Id_alunos = :id';
$box = $banco->prepare($delete);
$box->execute([
    ':id' => $idFormulario
]);

// apagando a tabela tb_info_alunos
$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos';
// variavel box, contem o a variavel banco para preparar o script $delete
$box = $banco->prepare($delete);
$box->execute([
    ':id_alunos' => $idFormulario
]);

echo 
'<script> 
    alert("Aluno apagado com sucesso!!!")
    window.location.replace("index.php")
</script>';

// header('location:index.php');