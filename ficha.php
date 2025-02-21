<?php 
// variavel global GET guarda as informações na variavel id_aluno
$id_aluno = $_GET['id_aluno'];

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

// PDO é a biblioteca é o caminho que faço
$banco = new PDO($dsn, $user, $password);

$select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.Id_alunos = tb_info_alunos.id WHERE tb_info_alunos.id=' . $id_aluno;

// query é um script de consulta
$dados = $banco->query($select)->fetch();


?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 600px;
    }
</style>
<main class="container text-center my-5">
    <img src="./img/<?php echo $dados ['img']  ?>" alt="foto usuario">
    <form action="#">
        <label for="idade">Nome</label>
        <input type="text" value="<?php echo $dados ['nome']  ?>" disabled class="form-control">
        <div class="row mt-2">
            <div class="col">
                <label for="idade">Telefone</label>
                <input type="number" value="<?php echo $dados ['telefone']  ?>" disabled class="form-control">
            </div>
            <div class="col">
                <label for="idade">Email</label>
                <input type="email" value="<?php echo $dados ['email'] ?>" disabled class="form-control">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data Nascimento</label>
                <input type="date" value="<?= $dados ['nascimento'] ?>" disabled class="form-control">
            </div>
            <div class="col my-4 pt-2">                
                <input type="checkbox" class="form-check-input">
                <label for="frequente">Frequente</label>
            </div>
        </div>
    </form>
</main>