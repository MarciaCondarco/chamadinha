<?php
echo '<h1>Aluno Editar</h1>';

var_dump($_POST);

$editarId = $_POST['id'];
$editarNome = $_POST['nome'];
$editarTelefone = $_POST['telefone'];
$editarEmail = $_POST['email'];
$editarNascimento = $_POST['nascimento'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

$update = 'UPDATE tb_alunos set nome = :nome where id_alunos = :id' ;

// o box vai guardar o banco preparado. 
$banco->prepare($update)->execute([
    ':id'=> $editarId,
    ':nome'=>$editarNome,
]);

// --------------------------------------
$update = 'UPDATE tb_info_alunos set telefone = :telefone, email = :email, nascimento = :nascimento where id_alunos = :id' ;

// o box vai guardar o banco preparado. 
$banco->prepare($update)->execute([
    ':id'=> $editarId,
    ':telefone'=> $editarTelefone,
    ':email'=>$editarEmail,
    ':nascimento'=>$editarNascimento,
]);

