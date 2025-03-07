<?php 
// 
echo '<h1>Cadastro de aluno</h1>';
// ordem importa o <pre> precisa estar encima do vardump
echo '<pre>';
// $_post -> variavel global, ela funciona em todo o projeto.
var_dump($_POST);
// visualizar a variavel global $_POST

$nomeFormulario = $_POST['nome'];
$telefoneFormulario = $_POST['telefone'];
$emailFormulario = $_POST['email'];
$nascimentoFormulario = $_POST['nascimento'];
$frequenteFormulario = $_POST['frequente'];
$imgFormulario = $_POST['img'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1

$user = 'root';
// a variavel $user diz que o usuario é o root 

$password = '';
// senha para acessar o banco de dados. 

$banco = new PDO($dsn, $user, $password);
// a variavel $banco contém as variavel da conexão com o banco.

$insert = 'INSERT INTO tb_alunos (nome) VALUES (:nome)' ;
// script para inserir as informações  da tabela tb_alunos da coluna nome

$box = $banco->prepare($insert);
// o box vai guardar o banco preparado. 

$box->execute([
    // o box vai executar
    ':nome' => $nomeFormulario 
]);

$id_aluno = $banco -> lastInsertId();

echo $id_aluno;

// ---------------------------------------------------------------
$insert = 'INSERT INTO tb_info_alunos (telefone,email,nascimento,frequente,id_alunos,img)  VALUES (:telefone,:email,:nascimento,:frequente,:id_alunos,:img)';
// script para inserir as informações  da tabela tb_alunos da coluna nome

$bancoprepara = $banco->prepare($insert);
// a variavel $bancoprepara para a variavel $banco preparar o script da variavel insert

$bancoprepara->execute([
    // variavel bancoprepara vai executar
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':id_alunos' => $id_aluno,
    ':img' => $imgFormulario,
]);

