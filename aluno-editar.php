<?php
echo '<h1>Aluno Editar</h1>';
// o titulo aluno editar aparece na pagina.

echo '<pre>';
// echo pre -> organiza as informações na vertical 

var_dump($_POST);
// aparece a variavel global 


$editarId = $_POST['id'];
$editarNome = $_POST['nome'];
$editarTelefone = $_POST['telefone'];
$editarEmail = $_POST['email'];
$editarNascimento = $_POST['nascimento'];
$editarImg = $_POST['img'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1

$user = 'root';
// a variavel $user diz que o usuario é o root 

$password = '';
// senha para acessar o banco de dados. 

$banco = new PDO($dsn, $user, $password);
// a variavel $banco contém as variavel da conexão com o banco.

$update = 'UPDATE tb_alunos set nome = :nome where id_alunos = :id' ;
// script para fazer uma atualização da tabela tb_alunos no nome onde o id do aluno selecionado


$banco->prepare($update)->execute([
// a variavel $banco prepara o script update, logo executar
    ':id'=> $editarId,
    ':nome'=>$editarNome,
]);

// --------------------------------------
$update = 'UPDATE tb_info_alunos set telefone = :telefone, email = :email, nascimento = :nascimento, img = :img where id_alunos = :id' ;
// script para fazer uma atualização da tabela tb_info_alunos nas colunas da tabela que são: telefone,email,nascimento e imagem onde o id do aluno selecionado
 
$banco->prepare($update)->execute([
// a variavel $banco prepara o script update, logo executar

    ':id'=> $editarId,
    ':telefone'=> $editarTelefone,
    ':email'=>$editarEmail,
    ':nascimento'=>$editarNascimento,
    ':img' => $editarImg,
]);

