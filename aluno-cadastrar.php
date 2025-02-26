<?php 
// 
echo '<h1>Cadastro de aluno</h1>';
// ordem importa o <pre> precisa estar encima do vardump
echo '<pre>';
// $_post -> variavel global, ela funciona em todo o projeto.
var_dump($_POST);

$nomeFormulario = $_POST['nome'];
$telefoneFormulario = $_POST['telefone'];
$emailFormulario = $_POST['email'];
$nascimentoFormulario = $_POST['nascimento'];
$frequenteFormulario = $_POST['frequente'];
$imgFormulario = $_POST['img'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO tb_alunos (nome) VALUES (:nome)' ;

// o box vai guardar o banco preparado. 
$box = $banco->prepare($insert);

// o box vai executar
$box->execute([
    ':nome' => $nomeFormulario 
]);

$id_aluno = $banco -> lastInsertId();

echo $id_aluno;

// ---------------------------------------------------------------
$insert = 'INSERT INTO tb_info_alunos (telefone,email,nascimento,frequente,id_alunos,img)  VALUES (:telefone,:email,:nascimento,:frequente,:id_alunos,:img)';

$bancoprepara = $banco->prepare($insert);

$bancoprepara->execute([
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':id_alunos' => $id_aluno,
    ':img' => $imgFormulario,
]);

