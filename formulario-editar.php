<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .formulario {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 70px;
    }
    img{
        width: 200px;
        height: 200px;
    }
    
</style>
<section class="linha-formulario">
    <div class="formulario" class="text-center">

        <?php
        $id_aluno_alterar = $_GET['id_aluno_alterar'];

        var_dump($id_aluno_alterar);
        ?>
        <h1>Editar Cadastro</h1>
        <?php

        // variavel global GET guarda as informações na variavel id_aluno
        $id_aluno_alterar = $_GET['id_aluno_alterar'];

        $dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
        $user = 'root';
        $password = '';

        // PDO é a biblioteca é o caminho que faço
        $banco = new PDO($dsn, $user, $password);

        $select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.Id_alunos = tb_info_alunos.id WHERE tb_info_alunos.id=' . $id_aluno_alterar;

        // query é um script de consulta
        $dados = $banco->query($select)->fetch();
        ?>


        <form action="./aluno-editar.php" method="POST">
            <img src="./img/<?php echo $dados['img']?>" alt="foto usuario"><br>
            <input type="hidden" placeholder="id" name="id" value="<?php echo $dados['id'] ?>"><br>
            <input type="text" placeholder="nome" name="nome" value="<?php echo $dados['nome'] ?>"><br>
            <input type="number" placeholder="Telefone" name="telefone" value="<?php echo $dados['telefone'] ?>"><br>
            <input type="email" placeholder="Email" name="email" value="<?php echo $dados['email'] ?>"><br>
            <input type="date" placeholder="Nascimento" name="nascimento" value="<?php echo $dados['nascimento'] ?>"><br>
            <div>
                <label>Frequente?</label>
                <input type="checkbox" placeholder="Frequente" name="frequente"><br>
            </div>
            <input type="file" accept="imagem/*" name="img"><br>
            <input type="submit">
        </form>
    </div>
</section>,