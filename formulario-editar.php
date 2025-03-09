<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- link do boostrap -->
<style>
    .formulario {
            /* estilizando a class formulario */

        display: flex;
                /* define a posição do elemento com o resto */

        flex-direction: column;
                /* define o elemento em direção de coluna */

        align-items: center;
                /* centraliza na vertical os elementos */

        justify-content: center;
                /* centraliza na horizontal os elementos */

        gap: 70px;
                /* espaçamento entre os elementos de 70px */

    }
    img{
        width: 200px;
        /* tamanho da horizontal */
        height: 200px;
        /* tamanho na vertical */
    }
    
</style>
<section class="linha-formulario">
    <div class="formulario" class="text-center">

        <?php
        $id_aluno_alterar = $_GET['id_aluno_alterar'];
        // variavel global GET guarda as informações na variavel id_aluno


        var_dump($id_aluno_alterar);
        // var_dump aparece os registros
        
        ?>
        <h1>Editar Cadastro</h1>
        <?php

        // variavel global GET guarda as informações na variavel id_aluno
        $id_aluno_alterar = $_GET['id_aluno_alterar'];

        $dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
        // dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1

        $user = 'root';
        // usuario root
        $password = '';
        // sem senha estabelecida

        // PDO é a biblioteca é o caminho que faz do banco,usuario e senha
        $banco = new PDO($dsn, $user, $password);

        $select = 'SELECT tb_info_alunos.*, tb_alunos.nome FROM tb_info_alunos INNER JOIN tb_alunos ON tb_alunos.Id_alunos = tb_info_alunos.id WHERE tb_info_alunos.id=' . $id_aluno_alterar;
        // script que selecionando todos os campos da tabela tb_info_allunos e o campo da tabela alunos, com o fim de selecionar as informações de tabelas diferentes com a chave estrangeira o id_alunos

        // query é um script de consulta
        $dados = $banco->query($select)->fetch();
        // dados está fazendo uma consulta no banco 
        ?>


        <form action="./aluno-editar.php" method="POST">
            <!-- o post captura as informações do conteúdo e enviando para aluno-editar.php  -->
            <img src="./img/<?php echo $dados['img']?>" alt="foto usuario"><br>
            <!-- caminho da imagem -->
            <input type="hidden" placeholder="id" name="id" value="<?php echo $dados['id'] ?>"><br>
            <!-- o campo ID oculto -->
            <input type="text" placeholder="nome" name="nome" value="<?php echo $dados['nome'] ?>"><br>
            <!-- campo nome do aluno -->
            <input type="number" placeholder="Telefone" name="telefone" value="<?php echo $dados['telefone'] ?>"><br>
            <!-- campo numero do aluno -->
            <input type="email" placeholder="Email" name="email" value="<?php echo $dados['email'] ?>"><br>
            <!-- campo email -->
            <input type="date" placeholder="Nascimento" name="nascimento" value="<?php echo $dados['nascimento'] ?>"><br>
            <!-- campo da data de nascimento -->
            <div>
                <label>Frequente?</label>
                <input type="checkbox" placeholder="Frequente" name="frequente"><br>
                <!-- checkbox a frequencia do aluno  -->
            </div>
            <input type="file" accept="imagem/*" name="img"><br>
            <!-- selecina uma imagem no explore -->
            <input type="submit">
            <!-- botão de envio -->
        </form>
    </div>
</section>,