<?php 
// variavel global GET guarda as informações na variavel id_aluno
$id_aluno = $_GET['id_aluno'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1

$user = 'root';
// usuario root

$password = '';
// sem senha definida 

// PDO é a biblioteca é o caminho que faço
$banco = new PDO($dsn, $user, $password);

$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.Id_alunos = tb_info_alunos.id WHERE tb_info_alunos.id=' . $id_aluno;
        // script que selecionando todos os campos da tabela tb_info_allunos e o campo da tabela alunos, com o fim de selecionar as informações de tabelas diferentes com a chave estrangeira o id_alunos


// query é um script de consulta
$dados = $banco->query($select)->fetch();


?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- link do boostrap -->

<style>
    main {
        display: flex;
        /* direcionando o elemento perante os outros, "algo mais flexivel"*/
        flex-direction: column;
        /* define o elemento em direção de coluna */
        align-items: center;
                /* centraliza na vertical os elementos */

    }

    form {
        width: 600px;
                /* tamanho da horizontal */
    }
</style>
<main class="container text-center my-5">
    <img src="./img/<?php echo $dados ['img']  ?>" alt="foto usuario">
    <!-- direcionando o caminho da imagem -->
    <form action="#">
        <label for="idade">Nome</label>
        <!-- texto que aparece para o campo do formulario -->
        <input type="text" value="<?php echo $dados ['nome']  ?>" disabled class="form-control">
        <!-- campo tipo texto, onde o registro do nome selecionado aparece -->
        <div class="row mt-2">
            <div class="col">
                <label for="idade">Telefone</label>
                        <!-- texto que aparece para o campo do formulario -->
                <input type="number" value="<?php echo $dados ['telefone']  ?>" disabled class="form-control">
                        <!-- campo tipo texto, onde o registro do telefone selecionado aparece -->

            </div>
            <div class="col">
                <label for="idade">Email</label>
                        <!-- texto que aparece para o campo do formulario -->
                <input type="email" value="<?php echo $dados ['email'] ?>" disabled class="form-control">
                        <!-- campo tipo texto, onde o registro do email selecionado aparece -->

            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data Nascimento</label>
                        <!-- texto que aparece para o campo do formulario -->
                <input type="date" value="<?= $dados ['nascimento'] ?>" disabled class="form-control">
                        <!-- campo tipo texto, onde o registro do nascimento selecionado aparece -->
            </div>
            <div class="col my-4 pt-2">                
                <input type="checkbox" class="form-check-input">
                <!-- campo tipo checkbox, que é um quadrado para selecionar -->
                <label for="frequente">Frequente</label>
            </div>
        </div>
    </form>
</main>